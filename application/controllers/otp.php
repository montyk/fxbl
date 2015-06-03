<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Otp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('userpages_model');     
        $user_details = unserialize($this->session->userdata['user_details']);
        $this->userpages_model->fx_user_details($user_details->login);
    }

    public function index() {
		$data=array();
		
	   if ($word == '')
	   {
			$pool = 'ABCDEFGHJKMNQRSTUVWXYZ234567';

			$str = '';
			for ($i = 0; $i < 8; $i++)
			{
				$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
			}

			$word = $str;
	   }
	   
		//echo $word;
		$user_details = unserialize($this->session->userdata['user_details']);
		
        $user_id=$user_details->id;
        $otp_data=$this->otp_model->is_otp($user_id);
		if($otp_data!='')
		{
			$data['id']=$otp_data->id;
		}
		
		$data['user_id']=$user_id;
		$data['otp']=$word;
		$data['time_added']=time();
        $result = $this->otp_model->save_pm($data);
		
		//need to send an sms here
	   
	   
	   
	   
	   //end of sending sms
	   
		$this->load->view('otp/index', $data);
    }
	
	
	public function otp_verification()
	{
	
	//echo 'coming here';
	//exit();
		$user_details = unserialize($this->session->userdata['user_details']);
		$otp=$_POST['otp'];
		$otp_count=$_POST['otp_count'];
		//exit();
		$otp_data=$this->otp_model->is_otp($user_details->id);
		//print_r($otp_data);
		//exit();
		$now=time();//exit();
		if($otp_data->user_id==$user_details->id && $otp_data->otp==$otp && ($now-$otp_data->time_added<70))
		{
			echo 'success'; 
		}
		else if($otp_count>=2)
		{
			echo 'login';
		}
		else if($otp_data->otp!=$otp)
		{
			echo 'failure'; 
		}
		else if($now-$otp_data->time_added>70)
		{
			echo 'timeup'; 
		}
	}
	
	public function resend_otp()
	{
	
		$data=array();
		
	   if ($word == '')
	   {
			$pool = 'ABCDEFGHJKMNQRSTUVWXYZ234567';

			$str = '';
			for ($i = 0; $i < 8; $i++)
			{
				$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
			}

			$word = $str;
	   }
	   
		//echo $word;
		$user_details = unserialize($this->session->userdata['user_details']);
		
        $user_id=$user_details->id;
    	$data['id']=$_POST['otp_id'];
		$data['user_id']=$user_id;
		$data['otp']=$word;
		$data['time_added']=time();
        $result = $this->otp_model->save_pm($data);
		
		echo 'success';
	}
	
	
	
	
    
    
    
    

}