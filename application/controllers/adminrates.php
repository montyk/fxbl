<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminrates extends MY_Controller {  
    var $payment_methods = array();
	var $ecurrencies = array();
	function __construct() {
        parent::__construct();
		$this->payment_methods = $this->common_model->getTableDetails('id,name','payment_methods','status=1');
		$this->ecurrencies = $this->common_model->getTableDetails('id,name','ecurrencies','status=1');
    }

    public function index() {
		$data['payment_methods'] = $this->payment_methods;
		$data['ecurrencies'] = $this->ecurrencies;
        $this->load->view('adminrates/index',$data);
    }
	public function getratesdata($pm='',$ec='')
    {
		echo $this->rates_model->getratesdata();
    }
	public function rates_view($r_id = 0)
	{
		$data=new stdclass();
		
	   if(isset($r_id) && $r_id!=0)
	   {
			$rates_info=$this->rates_model->rates_view($r_id);
            if($rates_info) {
                $data=$rates_info[0];
				$data->label = 'Edit';
            }
	   }
	   else
	   { 
	   		$data = $this->users_model->gettabledetails(array('rates'));
			$data->id = 0;
			$data->label = 'Add';
	   } 
	   		$data->payment_methods = $this->payment_methods;
			$data->ecurrencies = $this->ecurrencies;
		echo $this->load->view('adminrates/rates_view',$data,true);
    }
	public function save_rates()
	{
		//print_r($_POST); die;
		if ($this->formtoken->validateToken($_POST))
		{
			$result = $this->rates_model->save_rates($_POST);
			echo $result;
		}
		else
		{
			die('The form is not valid or has expired.');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */