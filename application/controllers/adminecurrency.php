<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminecurrency extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('adminecurrency/index');
    }

    public function getecdata() {
        echo $drid_data = $this->ecurrency_model->get_griddata();
    }

    public function ecurrency_view($ec_id = 0) {
        $data = new stdclass();
        if (isset($ec_id) && $ec_id != 0) {
            $ecurrency_info = $this->ecurrency_model->ecurrency_view($ec_id);
            if ($ecurrency_info) {
                $data = $ecurrency_info[0];
                $data->label = 'Edit';
            }
        } else {
            $data = $this->users_model->gettabledetails(array('ecurrencies'));
            $data->id = 0;
            $data->label = 'Add';
        }
        echo $this->load->view('adminecurrency/ecurrency_view', $data, true);
    }

    public function save_ec() {
        if ($this->formtoken->validateToken($_POST)) {
            $files = array();
            if (isset($_FILES) && !empty($_FILES)) {
                $files = $_FILES;
            }
            $return_id = $this->ecurrency_model->save_ec($_POST, $files);
            echo $return_id;
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */