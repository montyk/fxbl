<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->load->view('login/index');
    }
    
    public function forgot_password() {
        $this->load->view('login/forgot_password');
    }

}
