<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminpayment extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('adminpayment/index');
    }

    public function getpaymentdata() {
        echo $this->payment_model->getpaymentdata();
    }

    public function payment_view($pm_id = 0) {
        $data = new stdclass();
        if (isset($pm_id['id']) && $pm_id['id'] != 0) {
            $payment_info = $this->payment_model->payment_view($pm_id);
            if ($payment_info) {
                $data = $payment_info[0];
                $data->label = 'Edit';
            }
        } else {
            $data = $this->users_model->gettabledetails(array('payment_methods'));
            $data->id = 0;
            $data->label = 'Add';
        }
        echo $this->load->view('adminpayment/payment_view', $data, true);
    }

    public function save_pm() {
        if ($this->formtoken->validateToken($_POST)) {
            $files = array();
            if (isset($_FILES) && !empty($_FILES)) {
                $files = $_FILES;
            }
            $return_id = $this->payment_model->save_pm($_POST, $files);
            echo $return_id;

            /*
              $_POST['pm_id'] = $this->payment_model->save_pm($_POST);
              if(isset($_FILES) && !empty($_FILES) )
              {
              $ref_id = $this->common_model->getReferenceID('payments');
              if($_POST['id']!=0)
              {
              $_POST['pm_id'] =  $_POST['id'];
              $this->common_model->delete_attachments($_POST['id'],$ref_id);
              }
              $ret_data = $this->do_upload();
              $post['display_name'] = $ret_data['upload_data']['file_name'];
              $post['original_name'] = $ret_data['original_name'];
              $post['url'] = $ret_data['upload_data']['full_path'];
              $post['global_id'] = $_POST['pm_id'];
              $post['reference_id'] = $ref_id;
              $_POST['attachments_id'] = $this->users_model->save_attachments($post);
              }
              echo $_POST['pm_id']; */
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */