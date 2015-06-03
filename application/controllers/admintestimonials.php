<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admintestimonials extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admintestimonials/index');
    }

    public function testimonial_view($tm_id = 0) {
        $data = new stdclass();
        if (isset($tm_id) && $tm_id != 0) {
            $testimonial_info = $this->testimonials_model->testimonial_view($tm_id);
            if ($testimonial_info) {
                $data = $testimonial_info[0];
                $data->label = 'Edit';
            }
            echo $this->load->view('admintestimonials/testimonial_view', $data, true);
        } else {
            redirect('admintestimonials');
        }
    }

    public function getTMdata() {
        echo $this->testimonials_model->getTMdata();
    }

    public function save_tm() {
        if ($this->formtoken->validateToken($_POST)) {

            $result = $this->testimonials_model->save_tm($_POST);
            echo $result;
        } else {
            die('The form is not valid or has expired.');
        }
    }

    public function delete_tm() {
        $iparray['id'] = $_POST['id'];
        $iparray['table'] = 'testimonials';
        $return_value = $this->common_model->delete_record($iparray);
        echo $return_value;
    }

    public function add_testimonial() {
        $this->load->view('admintestimonials/add_testimonial');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */