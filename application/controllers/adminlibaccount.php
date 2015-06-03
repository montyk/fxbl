<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminlibaccount extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('adminlibaccount/index');
    }

    public function account_view($la_id = 0) {
        $data = new stdclass();
        if (isset($la_id) && $la_id != 0) {
            $liberty_account_info = $this->liberty_account_model->account_view($la_id);
            if ($liberty_account_info) {
                $data = $liberty_account_info[0];
                $data->label = 'Edit';
            }
        } else {
            $data = $this->users_model->gettabledetails(array('accounts'));
            $data->id = 0;
            $data->label = 'Add';
        }
        echo $this->load->view('adminlibaccount/account_view', $data, true);
    }

    public function getLAdata() {
        echo $this->liberty_account_model->getLAdata();
    }

    public function save_la() {
        //print_r($_POST); die;
        if ($this->formtoken->validateToken($_POST)) {
            $result = $this->liberty_account_model->save_la($_POST);
            echo $result;
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */