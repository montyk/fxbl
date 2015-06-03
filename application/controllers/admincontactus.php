<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admincontactus extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('admincontactus/index');
    }

    public function add_contactus() {

        $this->load->view('admincontactus/add_contactus');
    }

    public function save_cs() {
        if ($this->formtoken->validateToken($_POST)) {
            $result = $this->contactus_model->save_cs($_POST);
            echo $result;
        } else {
            die('The form is not valid or has expired.');
        }
    }

    public function contactus_view() {
        $data = new stdclass();
        if (isset($_POST['id']) && $_POST['id'] != 0) {
            $contactus_info = $this->contactus_model->contactus_details($_POST['id']);
            if ($contactus_info) {
                $data = $contactus_info[0];
            }
        } else {
            $data = $this->users_model->gettabledetails(array('contactus'));
        }
        echo $this->load->view('admincontactus/contactus_view', $data, true);
    }

    public function getcontactusdata() {
        echo $this->contactus_model->getcontactusdata();
    }

    public function reply_mail($id = 0) {
        if (isset($id) && $id > 0) {
            $contactus_info = $this->contactus_model->contactus_details($id);
            if ($contactus_info) {
                $data = $contactus_info[0];
            }
            $this->load->view('admincontactus/reply_mail', $data);
        } else {
            redirect('admincontactus');
        }
    }

    public function send_mail() {
        if ($this->formtoken->validateToken($_POST)) {
            /*
            $email_data['from'] = $this->config->item('from_mail');
            $email_data['to'] = $_POST['email'];
            $email_data['subject'] = $_POST['subject'];
            $email_data['message'] = $_POST['content'];
            $email_data['content'] = $this->load->view('templates/reply_mail', $email_data, true);
            $result = $this->mail_model->send_mail($email_data);
            echo $result;
            */
            
            $post=$this->input->post();
            
            $emailDetails['from']=$this->config->item('from_mail');
            $emailDetails['to']=$post['email'];
            $emailDetails['subject']=((!empty($post['subject']))?$post['subject']:'Edealspot Contact US - You have a reply Message');

            $emailViewData=$post;
            $emailDetails['message']=$this->load->view('email_templates/reply_mail',$emailViewData,TRUE);

            // $this->mail_model->sendMail($emailDetails);
            $this->mail_model->send_mail($emailDetails);
            echo 1;
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */