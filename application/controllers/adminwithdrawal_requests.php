<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminwithdrawal_requests extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('withdrawal_model');
    }

    public function index() {
        $this->load->view('adminwithdrawal_requests/index');
    }

    public function get_withdrawal_requests() {
        echo $this->withdrawal_model->get_withdrawal_requests();
    }

}
