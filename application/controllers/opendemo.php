<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	
class Opendemo extends CI_Controller {

	 public function index() {
		$this->load->view("opendemo");
	}

}
?>
