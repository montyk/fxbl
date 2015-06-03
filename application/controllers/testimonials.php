<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonials extends MY_Controller {

    public function index() {
        $data['testmonial'] = $this->testimonials_model->getTMrecords();

        //echo '<pre>'; print_r($data['testmonial']);die;
        $this->load->view('testimonials/index', $data);
    }

}

?>