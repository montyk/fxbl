<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminusers extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('adminusers/index');
    }
    
    
    function get_adminusers(){
        echo $this->users_model->get_adminusers();
    }

    public function edituser($id = 0, $action = '') {
        //echo $this->session->userdata('ctz_offset');die;
        $data = new stdclass();
        if ($id) {
            $user_info = $this->users_model->user_details($id);
            if ($user_info) {
                $data = $user_info[0];
            }
            $data->id = $id;
            $data->proof_of_identity = $this->users_model->user_proof_of_identity($id);;
            $data->proof_of_residency = $this->users_model->user_proof_of_residency($id);;
            $data->additional_documents = $this->users_model->user_additional_documents($id);;
        } else {
            $data->id = 0;
        }

        $data->session_id = MD5($this->session->userdata('session_id'));
        $this->load->view('adminusers/edituser', $data);
    }
    
    function saveuser(){
        $post=$this->input->post();
        if(!empty($post) && $this->formtoken->validateToken($post)){
            $post['dob']=  dateFormat($this->input->post('dob'), 'Y-m-d h:i:s');
            $this->users_model->save_registration($post);
			if($post['acc_verification']=='0' && $post['account_verification']=='1')
			{
			    //email content
				//$email_data['login_id'] = '121211';
				//$email_data['password'] = '2342';
				//$email_data['registration_type'] = '44';
				//$email_data['phone_password'] = $post['phone_password'];
				$email_data['from'] = $this->config->item('from_mail');
				$email_data['to'] = $this->db->escape_str($post['email']);
				$email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst($post['firstname']) . '. Your Account Approved';
				$email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Approved';
				$email_data['name'] = ucfirst($post['firstname']);
				$email_data['message'] = 'Our verification team has reviewed the Identification and Proof of Address documents, your account is approved.';
				$email_data['content'] = $this->load->view('email_templates/template_2/after_acc_verification', $email_data, true);
				$result = $this->mail_model->send_mail($email_data);
			}
			//echo 'hello';
			//exit();
            redirect('adminusers');
        }else{
            redirect('adminusers');
        }
        
    }
    
    
     public function wallet() {
        $this->load->view('adminusers/wallet');
    }
    
    
    function get_wallet(){
        echo $this->wallet_logs_model->users_walletlog();
    }
    
    function add_wallet($userid,$err=0)
    {
        $data['userid']=$userid;
        $userwallet=$this->users_model->get_wallet($userid);
		//echo '<pre>';
		//print_r($userwallet);
        $data['wallet']=$userwallet->wallet;
        $data['login']=$userwallet->login;
        $data['name']=$userwallet->firstname.' '.$userwallet->lastname;
        if($err=='1')
            $msg='Please enter the amount less than the Wallet Balance.';
        else
            $msg=0;
        $data['msg']=$msg;
        $this->load->view('adminusers/add_wallet',$data); 
    }
    
       
    function savewallet(){
        $post=$this->input->post();
        if(!empty($post) && $this->formtoken->validateToken($post)){
            if($post['type']=='0' && $post['amount']>$post['balance'])
            {
                redirect('adminusers/add_wallet/'.$post['id'].'/1');
            }
            if($post['type']=='1')
                $wallet=$post['balance']+$post['amount'];
            else if($post['type']=='0')
                $wallet=$post['balance']-$post['amount'];
			$updatewallet=$this->users_model->update_wallet($post['id'],$wallet);
            
                $log['user_id']=$post['id'];
                $log['amount']=$post['amount'];
                $log['type']=$post['type'];
				$log['message']=$post['message'];
                $this->wallet_logs_model->add_log($log);
				
		/*		
			
			//deposit/withdrawal balance to wallet in MT4 Server	
			if(isset($post['balance_status']) && $post['balance_status']!='' && $post['balance_status']=='1')	
			{
				$userdata=$this->users_model->userdata($post['id']);
				$login=$userdata->login;
				if($post['type']=='0')
				{
					$value='-'.$post['amount'];
					$balancetype='Withdrawal';
				}
				else
				{
					$value=$post['amount'];
					$balancetype='Deposit';
				}
				
				$mt4request = new CMT4DataReciver;
				//$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
				$mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
				$params['login'] = $login;
				$params['value'] = $value; // above zero for deposits, below zero for withdraws
				$params['comment'] = $balancetype." Operation";
				$answerData = $mt4request->MakeRequest("changebalance", $params);
			}
			//End Of Deposit/withdrawal balance to wallet in MT4 Server		
			
		*/
				
            redirect('adminusers/wallet');
        }else{
            redirect('adminusers/wallet');
        }
        
    }
    
    public function pamm_managers($msg='0')
	{
            if($msg=='1')
            $data->message='Files have transferred to FTP Successfully.';
            else
            if($msg=='2')
            $data->message='Balance has Updated Successfully.';
            else
            $data->message='';
            $this->load->view('adminusers/pamm_managers',$data);
	}

    
    
    function get_managers(){
        echo $this->pamm_manager_model->get_managers2();
    }
    
    
     public function pamm_investors($userid)
	{
            $data['userid']=$userid;
            $this->load->view('adminusers/pamm_investors',$data);
	}
        
    function get_investors($userid){
       // echo $userid;exit();
        echo $this->pamm_relations_model->get_investors($userid);
    }
	
    public function remove_investorslist($msg=0)
	{
	if($msg=='1')
				$message='Investor removed from the PAMM Program Successfully.';
			else
	if($msg=='2')
				$message='Unable to process your request.';
			else
				$message='';
			$data['message']=$message;
            $this->load->view('adminusers/remove_investorslist',$data);
	}
        
    function get_removeinvestors(){
        echo $this->pamm_relations_model->get_removeinvestors();
    }
    
   
    
    public function remove_investor($id)
    {
		 $data->id=$id;
		 $this->load->view('adminusers/remove_investor',$data);
    }
	
	public function update_investors()
	{
			   $post=$this->input->post();
				if(!empty($post) && $this->formtoken->validateToken($post)){
				$data=$this->pamm_relations_model->pamm_investor($post['id']);
				//exit();
				$delete_investor=$this->pamm_relations_model->delete_investor($data->investor_id);
                $wallet=$data->wallet+$post['amount'];
				$updatewallet=$this->users_model->update_wallet($data->investor_id,$wallet);
                $log['user_id']=$data->investor_id;
                $log['amount']=$post['amount'];
                $log['type']='1';
				$log['message']=$post['message'];
                $this->wallet_logs_model->add_log($log);
				redirect('adminusers/remove_investorslist/1');
				}
				else
				{
				redirect('adminusers/remove_investorslist/2');
				}
	}
	

      public function investorsofusers($msg='')
	{
            if($msg=='1')
            $message='Deposit Status has Updated Successfully.';
            else
            if($msg=='2')
            $message='Unable to process your request.';
            else
            $message='';
            $data['message']=$message;
            $this->load->view('adminusers/users_investors',$data);
	}

    
    
    function get_investorsofusers(){
       echo $this->pamm_relations_model->get_investorusers();
    }
    
    public function update_depositstatus($userid,$err='')
    {
        $data=$this->users_model->userdata($userid);
        if($err=='1')
            $msg='Unable to Process your request.';
        else
            $msg=0;
        $data->msg=$msg;
        $data->userid=$userid;
        $this->load->view('adminusers/deposit_status',$data);
    }
    
    public function save_depositstatus()
    {
        $post=$this->input->post();
        $savedata=$this->users_model->save_depositstatus($post);
        redirect('adminusers/investorsofusers/1');
        
    }
	
	
	
	public function changebalance()
	{		
			$userid='225';
			$userdata=$this->users_model->userdata($userid);
			echo $userdata->login;
			echo '<pre>';
			print_r($userdata);
			exit();
			$mt4request = new CMT4DataReciver;
			//$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
			$mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
			$params['login'] = "1016";
			$params['value'] = 100; // above zero for deposits, below zero for withdraws
			$params['comment'] = "test balance operation";
			$answerData = $mt4request->MakeRequest("changebalance", $params);
			print($answerData);
			print("<br /><br />");
	}
	
	
	
	
	
	
    public function dialogbox()
    {
        $this->load->view('adminusers/dialogbox');
    }
	
	public function get_report(){
			//$this->load->model('my_model');
			$this->load->dbutil();
			//$this->load->helper('file');
			/* get the object   */
			$report = $this->users_model->useremails();
			//echo '<pre>';
			//print_r($report);
			/*  pass it to db utility function  */
			$new_report = $this->dbutil->csv_from_result($report);
			/*  Now use it to write file. write_file helper function will do it */
			//write_file('csv_file.csv',$new_report);
            force_download('csv_file.csv',$new_report);
			/*  Done    */
		}
		
    public function invoices() {
        $this->load->view('adminusers/invoices');
    }
	
    public function get_invoicelist(){
        echo $this->withdrawal_model->get_invoicelist();
    }
	
	public function getinvoice($id=0)
	{
	error_reporting(E_ALL);ini_set('display_errors','on');
	$this->load->model('withdrawal_model');
	 $userDetails = unserialize($this->session->userdata['fx_user_details']);  

   $is_pdf=true;	 
	 if(empty($id) && isset($_POST) && count($_POST)>0)
       {   	   
	     $post=$_POST;
		 $post['users_id']=$userDetails->id;
	     $id=$this->withdrawal_model->save_invoice($post);
      $is_pdf=false;	
	}
	 
	   $result=$this->withdrawal_model->getInvoice($id);
	   
	   
	
						
	    $data['name']=$userDetails->firstname.' '.$userDetails->lastname;
	   $data['login']=$userDetails->login;
	   
	   $data['bank']=isset($result[0])?$result[0]->bank:'';
	   $data['sender']=isset($result[0])?$result[0]->sender:'';
	   $data['amount']=isset($result[0])?$result[0]->amount:'';
	   $data['amounttoword']=isset($result[0])?$this->numbertoword->convertCurrencyToWords($result[0]->amount):'';
	   $data['date']=isset($result[0])?dateFormat($result[0]->date_added, 'Y/m/d'):'';
	   $data['id']=isset($result[0])?$result[0]->id:'0';
	   
	  if($is_pdf)
	  {
	      $this->load->library('html2pdf');
	    
	    //Set folder to save PDF to
		$folder=document_root() .'downloads';
	    $this->html2pdf->folder('./downloads/');
	    
	    //Set the filename to save/download as
		$invoice_no=10000+$data['id'];
		$file='Invoice-'.$invoice_no.'.pdf';
	    $this->html2pdf->filename($file);
	    $filename = $folder. "/" . $file;
	    //Set the paper defaults
	    $this->html2pdf->paper('a4', 'portrait');
	    $this->html2pdf->html($this->load->view('userpages/depositnew_form_invoice_download', $data, true));
		 if($this->html2pdf->create('save')) {
	    	//PDF was successfully saved or downloaded
	    	 header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header('Content-disposition: attachment; filename=' . basename($filename));
       
            header("Content-Type: application/pdf");
       

        header("Content-Transfer-Encoding: binary");
        header('Content-Length: ' . filesize($filename));
        readfile($filename);
	    }
	  }
	  else{
	  $this->load->view('userpages/depositnew_form_invoice_download',$data);
	  }
	}

    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */