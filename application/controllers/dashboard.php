<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    public function dashboard_ctlr()
    {
        $this->load->view('dashboard/dashboard');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
