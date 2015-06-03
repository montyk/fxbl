<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userpages extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('userpages_model');     
        $user_details = unserialize($this->session->userdata['user_details']);
        $this->userpages_model->fx_user_details($user_details->login);
    }

    public function index() {
        redirect('userpages/homenew');
    }
    
//    public function trade() {
//        $this->load->view('userpages/trade');
//    }
    
    public function trade() {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password']);
        if (!$data['error']) {
            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);
            
            $this->load->view('userpages/trade', $var);
        } else {
            redirect('login/logout');
        }
    }
    
//    public function account_history() {
//        $this->load->view('userpages/account_history');
//    }
    
    public function account_history() {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_History($post['login_name'], $post['user_password']);
        if (!$data['error']) {

            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);
            
            $this->load->view('userpages/account_history', $var);
        } else {
            redirect('login/logout');
        }
    }
    
    /*
     * NEW START
     */
    
    
    public function design() {
        $this->load->view('userpages/design');
    }
    
    public function homenew_mql() {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password']);
        // echo '<pre>'; print_r($data); echo '</pre>';
        if (!$data['error']) {
            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);
            $this->load->view('userpages/homenew', $var);
        } else {
            redirect('login/logout');
        }
    }
    public function homenew() {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password']);
        // echo '<pre>'; print_r($data); echo '</pre>';
        if (!$data['error']) {
            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);
            $mt4request = new CMT4DataReciver;
            //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
            
            $params['login'] = $post['login_name'];
            $answerData = $mt4request->MakeRequest("getmargininfoex",$params);
            $var->balance=$balance=$answerData['balance'];
            $var->margin=$answerData['margin'];
            $var->free_margin=$answerData['freeMargin'];
            $var->equity=$answerData['equity'];
            
            $startTS = strtotime($data->dateadded); 
            $endTS = strtotime(date('Y-m-d H:i:s')); 
            $params['from'] = $startTS;
            $params['to'] = $endTS;
            $answerData2 = $mt4request->MakeRequest("gethistory", $params);        
            $var->xaxissize = $size = sizeof($answerData2['csv']);
            $profit_loss=0;
            for($i = 0; $i < $size; $i++)
            {
                //echo $answerData2['csv'][$i];echo '<br/>';
                $values = explode(";", $answerData2['csv'][$i]);
                if($values[12]=='1' || $values[12]=='0')
                    {
                            $profit_loss=$profit_loss+($values[5])+($values[15]);
                    }
                //print_r($values);
            }
            $var->profit_loss=$profit_loss;
            $xaxis='';
            for($i = 0; $i <= $size; $i++)
            {
                if($i==0)
                    $balance=$balance;
                else
                $balance=$bal[$i-1];
                $answerData2['csv'][$i];
                $values = explode(";", $answerData2['csv'][$i]);
                //echo '<pre>';
                //print_r($values);
                //echo $values[15];
               $xaxis[$i]=$values[5]+$values[14]+$values[15];//echo '<br/>';
               if($i==0)
                    $bal[$i]=$balance;
               else
                    $bal[$i]=$balance-($xaxis[$i-1]);//echo '<br/>';
            }
            //print_r($xaxis);
            //print_r($bal);
            $var->bal=$bal;                         
            $this->load->view('userpages/homenew', $var);
        } else {
            redirect('login/logout');
        }
    }

    public function depositnew() {
        $this->load->view('userpages/depositnew');
    }

    public function depositnew_form($page_id = 0) {
        if(isset($page_id) && $page_id=='chcard'){
            $page='Chinese Debit/Credit Cards';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='card'){
            $page='Credit/Debit Cards';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='sk'){
            $page='Skrill (MoneyBookers)';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='net'){
            $page='Neteller';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='bwt'){
            $page='Bank Wire Transfer';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='chcard'){
            $page='Chinese Debit/Credit Cards Instant';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='mg'){
            $page='MoneyGram';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='wu'){
            $page='Western Union';
            $email_id='finance@forexray.com';
        }else {
            $page='';
            $email_id='finance@forexray.com';
        }
        $data['page']=$page;
        $data['email_id']=$email_id;
        $this->load->view('userpages/depositnew_form',$data);
    }

    public function withdrawalnew() {
        $user_details = unserialize($this->session->userdata['fx_user_details']);
        if($user_details->group_id=='7'){
            $data['is_fund_manager']=TRUE;
            $data['period']=  dateFormat($user_details->start_date, 'Y-M-d').' to '.dateFormat($user_details->exp_date, 'Y-M-d');
        }  else {
            $data['is_fund_manager']=FALSE;
        }
        $this->load->view('userpages/withdrawalnew',$data);
    }
    
    public function withdrawalnew_form($page_id = 0) {
        if(isset($page_id) && $page_id=='card'){
            $page='Credit/Debit Cards';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='sk'){
            $page='Skrill (MoneyBookers)';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='net'){
            $page='Neteller';
            $email_id='finance@forexray.com';
        }else if(isset($page_id) && $page_id=='bwt'){
            $page='Bank Wire Transfer';
            $email_id='finance@forexray.com';
        }else {
            $page='Credit/Debit Cards';
            $email_id='finance@forexray.com';
        }
        $data['page']=$page;
        $data['email_id']=$email_id;
        
        $post=$this->input->post();
        if($post && !empty($post['amount'])){
            $this->load->library('withdrawal_requests_lib');
            $this->userpages_model->save_withdrawal_requests($post);
            
            // $this->session->set_flashdata('success_msg','Your request is successful our representative will get in touch.');
            // redirect('userpages/withdrawalnew');
            $data['success_msg']='Your request is successful our representative will get in touch.';
            $this->load->view('userpages/withdrawalnew_form',$data);
        }else{
            $this->load->view('userpages/withdrawalnew_form',$data);
        }
    }

    public function open_positions() {
        $post = $this->session->userdata('mql_login');
        // $data = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password'],$this->input->post('from'),$this->input->post('to'));
        $data = $this->mql_model->MQ_Get_Open_Positions($post['login_name'], $post['user_password'],$this->input->post('from'),$this->input->post('to'));
        if (!$data['error']) {
            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);

            $this->load->view('userpages/open_positions', $var);
        } else {
            redirect('login/logout');
        }
        // $this->load->view('userpages/open_positions');
    }
    
    public function trading_history($msg='') {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_Get_Trading_History($post['login_name'], $post['user_password'],$this->input->post('from'),$this->input->post('to'));
        $var = new stdclass();
        if(isset($msg) && $msg!='') 
        {
        $var->msg=$msg;
        $var->message='Deposited to the PAMM Program Successfully.';
        }
        else
        {
        $var->msg='';
        $var->message='';
        }
        if (!$data['error']) {
            $time=mktime(23,59,59,date('n'),date('j'),date('Y'));
            $time2=$time-2592000;
            $from=($this->input->post('from')=='')?gmdate("Y-m-d", $time2):$this->input->post('from');
            $to=($this->input->post('to')=='')?gmdate("Y-m-d", $time):$this->input->post('to');
            $var->info = explode("\r\n", $data['response']);
            $mt4request = new CMT4DataReciver;
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
            $params['login'] = $post['login_name'];
            $answerDataa = $mt4request->MakeRequest("getmargininfoex",$params);
            $balance=$answerDataa['balance'];
            $startTS = strtotime(date($from)); 
            $endTS = strtotime(date($to)); 
            $params['from'] = $startTS;
            $params['to'] = $endTS;
            $answerData2 = $mt4request->MakeRequest("gethistory", $params);   
            $var->size = $size = sizeof($answerData2['csv']);
                    //$profit_loss=0;
            $xaxis='';
            $sum=0;
            for($i = 0; $i <= $size; $i++)
            {
                if($i==0)
                    $balance=$balance;
                else
                $balance=$bal[$i-1];
                $answerData2['csv'][$i];
                $values = explode(";", $answerData2['csv'][$i]);
                //echo '<pre>';
                //print_r($values);
                //echo $values[15];
               $xaxis[$i]=$values[5]+$values[14]+$values[15];//echo '<br/>';
               if($i==0)
                    $bal[$i]=$balance;
               else
                    $bal[$i]=$balance-($xaxis[$i-1]);//echo '<br/>';
            }
            //print_r($xaxis);
            //print_r($bal);
            $var->bal=$bal;


            $this->load->view('userpages/trading_history', $var);
        } else {
            redirect('login/logout');
        }
    }
    
    public function deposits_withdrawls() {
        $post = $this->session->userdata('mql_login');
        $data = $this->mql_model->MQ_Get_Trading_History($post['login_name'], $post['user_password'],$this->input->post('from'),$this->input->post('to'));
        if (!$data['error']) {
            $var = new stdclass();
            $var->info = explode("\r\n", $data['response']);

            $this->load->view('userpages/deposits_withdrawls', $var);
        } else {
            redirect('login/logout');
        }
    }
    
    public function change_leverage() {
        $this->load->view('userpages/change_leverage');
    }
    
    /*public function internal_transfer() {
        $post=$this->input->post();
        $userDetails=unserialize($this->session->userdata('fx_user_details')); 
        if($post && !empty($post['amount'])){
            $this->load->library('internal_transfer_requests_lib');
            $post['user_id']=$userDetails->id;
            $this->userpages_model->save_internal_transfer_requests($post);
            
            // $this->session->set_flashdata('success_msg','Your Internal Transfer Request is submitted Successfully.');
            // redirect('userpages/internal_transfer');
            $data['success_msg']='Your Internal Transfer Request is submitted Successfully.';
            $this->load->view('userpages/internal_transfer',$data);
        }else{
            $this->load->view('userpages/internal_transfer');
        }
    }
*/
    public function validation_documents($msg=0) {
        $post=$this->input->post();
		if($msg=='1')
		{
			$data->msg=$msg;
			$data->message='Thank you for uploading vadidation documents, our verification team will review the documents and update verification status.  ';
			}
			else
			{
			$data->msg='';
			$data->message='';
			}
        if($post && !empty($post['proof_of_identity']) && !empty($post['proof_of_residence'])){
            $user_details = unserialize($this->session->userdata['fx_user_details']);
            $this->load->library(array('proof_of_identity_lib','proof_of_residency_lib'));
            // echo '<pre>'; print_r($user_details); echo '</pre>'; die;
            foreach ($post['proof_of_identity'] as $key => $value) {
                $attachmentPost['db_file_name'] = $value;
                $attachmentPost['original_file_name'] = $value;
                $attachmentPost['url'] = $post['proof_of_identity_full_path'][$key];
                $attachment_id=$this->users_model->save_attachments($attachmentPost);
                $proofOfIdentityPost=array();
                $proofOfIdentityPost['user_id']=$user_details->id;
                $proofOfIdentityPost['attachments_id']=$attachment_id;
                $this->users_model->save_proof_of_identity($proofOfIdentityPost);
            }
            foreach ($post['proof_of_residence'] as $key => $value) {
                $attachmentPost['db_file_name'] = $value;
                $attachmentPost['original_file_name'] = $value;
                $attachmentPost['url'] = $post['proof_of_residence_full_path'][$key];
                $attachment_id=$this->users_model->save_attachments($attachmentPost);
                $proofOfIdentityPost=array();
                $proofOfIdentityPost['user_id']=$user_details->id;
                $proofOfIdentityPost['attachments_id']=$attachment_id;
                $this->users_model->save_proof_of_residency($proofOfIdentityPost);
            }
			
			$email_data['from'] = $this->config->item('from_mail');
			$email_data['to'] = $this->db->escape_str($user_details->email);
			$email_data['subject'] = 'Account Verification';
			$email_data['email_header'] = 'ForexRay - Account Verification';
			$email_data['name'] = ucfirst($user_details->firstname);
			$email_data['content'] = $this->load->view('email_templates/template_2/verification_documents', $email_data, true);
			$result = $this->mail_model->send_mail($email_data);
            
            $this->session->set_flashdata('success_msg','Thank you for uploading vadidation documents, our verification team will review the document and update verification status. ');
            redirect('userpages/validation_documents/1');
        }else{
            $this->load->view('userpages/validation_documents',$data);
        }
    }

    public function additional_documents() {
        $post=$this->input->post();
        if($post && !empty($post['additional_documents'])){
            $user_details = unserialize($this->session->userdata['fx_user_details']);
            $this->load->library('additional_documents_lib');
            // echo '<pre>'; print_r($user_details); echo '</pre>'; die;
            foreach ($post['additional_documents'] as $key => $value) {
                $attachmentPost['db_file_name'] = $value;
                $attachmentPost['original_file_name'] = $value;
                $attachmentPost['url'] = $post['additional_documents_full_path'][$key];
                $attachment_id=$this->users_model->save_attachments($attachmentPost);
                $additionDocsPost=array();
                $additionDocsPost['user_id']=$user_details->id;
                $additionDocsPost['attachments_id']=$attachment_id;
                $this->users_model->save_additional_documents($additionDocsPost);
            }
            
            $this->session->set_flashdata('success_msg','Your Documents Were Uploaded Successfully.');
            redirect('userpages/additional_documents');
        }else{
            $this->load->view('userpages/additional_documents');
        }
    }
    
    public function trading_signals() {
        $this->load->view('userpages/trading_signals');
    }
    
    public function support_request() {
        $this->load->view('userpages/support_request');
    }
    
    
    
    public function upload_documents_handler(){
        // error_reporting(E_ALL | E_STRICT);
        $uploadOptions=array(
            'max_file_size'=>(2 * 1024 * 1024),
            'accept_file_types'=>'/.(gif|jpe?g|png|pdf|doc|docx|ppt|pptx|xls|xlsx|csv|zip)$/i'
        );
        $this->load->library('JQ_UploadHandler',$uploadOptions);
        // $upload_handler = new UploadHandler();
    }
		
    public function pamm_manager() {
        $data='';
        $user_details = unserialize($this->session->userdata['user_details']);
        $user_id=$user_details->id;
        $data=$this->pamm_manager_model->is_pamm($user_id);
        $data->count=$this->pamm_manager_model->is_pamm_count($user_details->id);
        $this->load->view('userpages/pamm_manager',$data);
    }
	
    public function save_pm() { 
	if (formtoken::validateToken($_POST)){
            $user_details = unserialize($this->session->userdata['user_details']);
            if($this->input->post('page')=='pamm_manager'){
                $_POST['user_id']=$user_details->id;
            }
            $result = $this->pamm_manager_model->save_pm($_POST);
            if ($result > 0) {
                //$this->send_mail($_POST);
                //$this->session->set_flashdata('success_msg','You have added the PAMM Program Successfully.');
                if($this->input->post('page')=='pamm_manager'){
                    redirect('userpages/my_program/1');
                }else{
                    redirect('userpages/homenew');
                }
            }else{
                //$this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
                if($this->input->post('page')=='pamm_manager'){
                    redirect('userpages/my_program/2');
                }else{
                    redirect('userpages/homenew');
                }
            }
            
        }else{
            //$this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
            if($this->input->post('page')=='pamm_manager'){
                redirect('userpages/my_program/2');
            }else{
                redirect('userpages/homenew');
            }
        }
		
    }
    
    public function view_program($pammId)
    {
         $user_details = unserialize($this->session->userdata['user_details']);
          $is_relation=$this->pamm_relations_model->get_relation($user_details->id);
          //$is_relation=0;
         $data=$this->pamm_manager_model->view_manager($pammId);
        $userwallet=$this->users_model->get_wallet($user_details->id);
        $data->wallet=$userwallet->wallet;
        $from=$user_details->date_added;
        $to=date("Y-m-d");
        $var = $this->mql_model->MQ_Get_Trading_History($data->login, $data->password,$from,$to);
        if (!$var['error']) {
             $data->info = explode("\r\n", $var['response']);
        } else {
            redirect('login/logout');
        } 
        $var2 = $this->mql_model->MQ_Login_Account($data->login, $data->password);
         if (!$var2['error']) {
            $data->info2 = explode("\r\n", $var2['response']);
         }
         $data->is_relation=$is_relation;
         
         
            $mt4request = new CMT4DataReciver;
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
            $params['login'] = $data->login;
            $answerDataa = $mt4request->MakeRequest("getmargininfoex",$params);
            $balance=$answerDataa['balance'];
            $startTS = strtotime(date($from)); 
            $endTS = strtotime(date($to)); 
            $params['from'] = $startTS;
            $params['to'] = $endTS;
            $answerData2 = $mt4request->MakeRequest("gethistory", $params);   
            $data->xaxissize = $size = sizeof($answerData2['csv']);
                    //$profit_loss=0;
            $xaxis='';
            $sum=0;
            for($i = 0; $i <= $size; $i++)
            {
                if($i==0)
                    $balance=$balance;
                else
                $balance=$bal[$i-1];
                $answerData2['csv'][$i];
                $values = explode(";", $answerData2['csv'][$i]);
                //echo '<pre>';
                //print_r($values);
                //echo $values[15];
               $xaxis[$i]=$values[5]+$values[14]+$values[15];//echo '<br/>';
               if($i==0)
                    $bal[$i]=$balance;
               else
                    $bal[$i]=$balance-($xaxis[$i-1]);//echo '<br/>';
            }
            //print_r($xaxis);
            //print_r($bal);
            $data->bal=$bal;         
         
         
         
         
         $this->load->view('userpages/view_program',$data);  

    }
    
    public function my_program($msg=0)
    {
        $user_details = unserialize($this->session->userdata['user_details']);
        $data=$this->pamm_manager_model->is_pamm($user_details->id);
        $data->count=$this->pamm_manager_model->is_pamm_count($user_details->id);
        $post = $this->session->userdata('mql_login');
        $from=$user_details->date_added;
        $to=date("Y-m-d");
        $var = $this->mql_model->MQ_Get_Trading_History($post['login_name'], $post['user_password'],$from,$to);
        if (!$var['error']) {
             $data->info = explode("\r\n", $var['response']);
        } else {
            redirect('login/logout');
        } 
        $var2 = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password']);
         if (!$var2['error']) {
            $data->info2 = explode("\r\n", $var2['response']);
         }
         if($msg==1)
         {
             $data->message='You have added the PAMM Program Successfully.';
         }
         else if($msg==2)
         {
             $data->message='Unable to process your request. Please try again.';
         }
         else if($data->count=='0')
         {
          $data->message='You are not part of PAMM Program, Please <a href="'.site_url('userpages/pamm_manager').'">Click Here</a> to Create the PAMM Program.';   
         }
         else
             $data->message='';
         $data->msg=$msg;

         $this->load->view('userpages/my_program',$data);
    }
    
    
    public function my_fundprogram($msg=0)
    {
        $user_details = unserialize($this->session->userdata['user_details']);
        $data=$this->pamm_manager_model->my_pamm($user_details->id);
        $inactiverows=$this->pamm_manager_model->pamm_count($user_details->id,'0');
        $activerows=$this->pamm_manager_model->pamm_count($user_details->id,'1');
        if($activerows=='0' && $inactiverows=='0')
        {
            $data = new StdClass;
        }
        $post = $this->session->userdata('mql_login');
        $from=$user_details->date_added;
        $to=date("Y-m-d");
        $var = $this->mql_model->MQ_Get_Trading_History($post['login_name'], $post['user_password'],$from,$to);
        if (!$var['error']) {
             $data->info = explode("\r\n", $var['response']);
        } else {
            redirect('login/logout');
        } 
        $var2 = $this->mql_model->MQ_Login_Account($post['login_name'], $post['user_password']);
         if (!$var2['error']) {
            $data->info2 = explode("\r\n", $var2['response']);
         }
         if($msg=='1')
         {
             $data->message='You have joined the PAMM Program Successfully.';
         }
         else if($msg=='2')
         {
             $data->message='Unable to process your request. Please try again.';
         }
         else if($msg=='3' || $inactiverows=='1')
         {
              $data->message='Your request to remove the PAMM Program has sent to the Admin.';
         }
        
        else if($activerows=='0' && $inactiverows=='0')
         {
             $data->message='You are not part of PAMM Program, Please <a href="'.site_url('userpages/get_managers').'">Click Here</a> to Join the PAMM Program.';
         }
          else
             $data->message='';
         $data->msg=$msg; 
         $data->activerows=$activerows;
         $data->inactiverows=$inactiverows;

         
         $this->load->view('userpages/my_fundprogram',$data);
    }
	
    public function join_pamm($pammId,$msg=0)
        {
            $user_details = unserialize($this->session->userdata['user_details']);
            $is_relation=$this->pamm_relations_model->get_relation($user_details->id);
            $userwallet=$this->users_model->get_wallet($user_details->id);
            $data='';
            $data=$this->pamm_manager_model->view_manager($pammId);
            $data->account_for=$user_details->account_for;
            $data->wallet=$userwallet->wallet;
            if($msg=='1')
            {
                $message='Please enter the amount equal or below the Wallet amount.';
            }else
            if($msg=='2')
            {
                $message='Please enter the amount equal or above the Minimum deposit.';
            }
            else
            if($msg=='3')
            {
                $message='Your Account is not validated, Please <a href="'.site_url('userpages/validation_documents').'">Click Here</a> to upload your documents.';
            }
            else $message='';
            $data->msg=$msg;
            $data->message=$message;
            $data->is_relation=$is_relation;
            $this->load->view('userpages/join_pamm',$data);
        }
        
    public function add_investors() {

        if (formtoken::validateToken($_POST)){
         $user_details = unserialize($this->session->userdata['user_details']);
                     //$user_details->login;exit();
         $userwallet=$this->users_model->get_wallet($user_details->id);
         $wallet=$userwallet->wallet;
         $account_verification=$userwallet->account_verification;;
         if($this->input->post('page')=='join_pamm'){
             if($account_verification!='1')
             {
                 redirect('userpages/join_pamm/'.$_POST['id'].'/3');
             }
             if($_POST['amount']>$wallet)
             {
                 redirect('userpages/join_pamm/'.$_POST['id'].'/1');
             }
             if($_POST['minimum_deposit']>$_POST['amount'])
             {
                redirect('userpages/join_pamm/'.$_POST['id'].'/2');
             }
             $post['program_id']=$_POST['id'];
             $post['trader_id']=$_POST['trader_id'];
             $post['investor_id']=$user_details->id;
             $post['amount']=$_POST['amount'];
             $post['trader_email']=$_POST['trader_email'];
             $post['trader_name']=$_POST['trader_name'];
             $result = $this->pamm_relations_model->add_investor($post);
             $bal=$wallet-$post['amount'];
             $updatewallet=$this->users_model->update_wallet($post['investor_id'],$bal);
             $log['user_id']=$post['investor_id'];
             $log['amount']=$post['amount'];
             $log['type']='0';
             $log['message']='PAMM Deposit from '.$userwallet->login;
             $this->wallet_logs_model->add_log($log);

            //deposit/withdrawal balance to wallet in MT4 Server	

            $mt4request = new CMT4DataReciver;
            //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

            //Withdrawing the balance from PAMM investor wallet and deposited to MT4 Account
            $userdata=$this->users_model->userdata($post['investor_id']);
            $investor_login=$userdata->login;
            $params['login'] = $investor_login;
            $params['value'] = $post['amount']; // above zero for deposits, below zero for withdraws
            $params['comment'] = "Your PAMM Deposit";
            $answerData = $mt4request->MakeRequest("changebalance", $params);

            //Depositing the balance into PAMM Trader MT4 Account
            $userdata=$this->users_model->userdata($post['trader_id']);
            $trader_login=$userdata->login;
            $params['login'] = $trader_login;
            $params['value'] = $post['amount']; // above zero for deposits, below zero for withdraws
            $params['comment'] =  $log['message'];
            $answerData = $mt4request->MakeRequest("changebalance", $params);

            //End Of Deposit/withdrawal balance to wallet in MT4 Server	        

            //MAM Properties

            $pamm=$this->pamm_manager_model->get_pammmanagers();
            $File = $this->config->config['document_root_text']."misc/pammfiles/MAM".time().".properties"; 
            $Handle = fopen($File, 'w') or die('Unable to open File');
            foreach($pamm as $k)
            {
            $Data = "1,"; 
            fwrite($Handle, $Data); 
            $Data = $k->login.","; 
            $pammrelations=$this->pamm_manager_model->get_relations($k->id);
            foreach($pammrelations as $p)
            {
            $Data.=$p->login.',';
            }
            $Data=rtrim($Data,',');
            fwrite($Handle, $Data); 
                        //echo $Data;
            $Data="\r\n";
            fwrite($Handle,$Data);
            }
             fclose($Handle); 

             $this->load->library('ftp');
            $config['hostname'] = MAM_HOST;
            $config['username'] = MAM_USERNAME;
            $config['password'] = MAM_PASSWORD;
            $config['debug'] = TRUE;

            $this->ftp->connect($config);

            $this->ftp->upload($File, 'MAM.properties', 'ascii');

            $this->ftp->close(); 

            //End Of MAM Properties

            //Sending mail to finance@forexray.com
            $email_data['investor_login'] =  $user_details->login;
            $email_data['investor_email']=$user_details->email;
            $email_data['investor_name']=ucfirst($user_details->firstname).' '.ucfirst($user_details->lastname);
            $email_data['investor_amount']=$post['amount'];
            $email_data['pamm_login']=$post['trader_id'];
            $email_data['pamm_email']=$post['trader_email'];
            $email_data['pamm_name']=$post['trader_name'];
            $email_data['trading_name'] = $post['trading_name'];
            $email_data['from'] = $this->db->escape_str($this->config->item('from_mail'));
            $email_data['to'] = 'finance@forexray.com';
            $email_data['subject'] = 'ForexRay - '. $email_data['investor_login'].' deposited '.$email_data['investor_amount'].'USD into '.$email_data['trading_name'];
            $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
            $email_data['content'] = $this->load->view('email_templates/template_2/after_joinpamm', $email_data, true);
            $result = $this->mail_model->send_mail($email_data);             

            if ($result > 0) {
                //$this->session->set_flashdata('success_msg','You have added Successfully.');
                if($this->input->post('page')=='join_pamm'){
                    redirect('userpages/my_fundprogram/1');
                }else{
                    redirect('userpages/homenew');
                }
            }else{
                //$this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
                if($this->input->post('page')=='join_pamm'){
                    redirect('userpages/my_fundprogram/2');
                }else{
                    redirect('userpages/homenew');
                }
            }

        }
    }else{
        // $this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
         if($this->input->post('page')=='join_pamm'){
             redirect('userpages/join_pamm/'.$_POST['id']);
         }else{
             redirect('userpages/homenew');
         }
     }

     }      
            
    public function view_investors()
    {
        $user_details = unserialize($this->session->userdata['user_details']);
        $data['result']=$this->pamm_relations_model->list_investors($user_details->id);
        $this->load->view('userpages/view_investors',$data);
    }
              
    public function mywallet()
    {
            $user_details = unserialize($this->session->userdata['user_details']);  
            $mywallet=$this->users_model->get_wallet($user_details->id);
            $data['mywallet']=$mywallet->wallet;
            $data['account_for']=$mywallet->account_for;
            $this->load->view('userpages/wallet',$data);
    }

    public function get_walletlog(){
            $user_details = unserialize($this->session->userdata['user_details']);  
            echo $this->wallet_logs_model->get_walletlog($user_details->id);
    }

    public function get_managers()
    {
            $this->load->view('userpages/get_managers');
    }

    public function get_managersdata()
    {
            echo $this->pamm_manager_model->get_managersdata();
    }
        
    public function remove_pamm()
    {
       $user_details = unserialize($this->session->userdata['user_details']);
        $data=$this->pamm_manager_model->view_pamm($user_details->id);
        $update=$this->pamm_relations_model->update_status($user_details->id);

        //MAM Properties

        $pamm=$this->pamm_manager_model->get_pammmanagers();
        $File = $this->config->config['document_root_text']."misc/pammfiles/MAM".time().".properties"; 
        $Handle = fopen($File, 'w') or die('Unable to open File');
        foreach($pamm as $k)
        {
        $Data = "1,"; 
        fwrite($Handle, $Data); 
        $Data = $k->login.","; 
        $pammrelations=$this->pamm_manager_model->get_relations($k->id);
        foreach($pammrelations as $p)
        {
        $Data.=$p->login.',';
        }
        $Data=rtrim($Data,',');
        fwrite($Handle, $Data); 
                    //echo $Data;
        $Data="\r\n";
        fwrite($Handle,$Data);
        }
         fclose($Handle); 

         $this->load->library('ftp');
        $config['hostname'] = MAM_HOST;
        $config['username'] = MAM_USERNAME;
        $config['password'] = MAM_PASSWORD;
        $config['debug'] = TRUE;

        $this->ftp->connect($config);

        $this->ftp->upload($File, 'MAM.properties', 'ascii');

        $this->ftp->close(); 

        //End Of MAM Properties

        //Sending mail to finance@forexray.com
        $email_data['investor_login'] =  $user_details->login;
        $email_data['investor_email']=$user_details->email;
        $email_data['investor_name']=ucfirst($user_details->firstname).' '.ucfirst($user_details->lastname);
        $email_data['investor_amount']=$data->amount;
        $email_data['pamm_login']=$data->user_id;
        $email_data['pamm_email']=$data->email;
        $email_data['pamm_name']=ucfirst($data->firstname).' '.ucfirst($data->lastname);
        $email_data['pamm_amount']=$data->minimum_deposit;
        $email_data['trading_name'] = $data->trading_name;
        $email_data['from'] = $this->db->escape_str($this->config->item('from_mail'));
        $email_data['to'] = 'finance@forexray.com';
        $email_data['subject'] = 'ForexRay - '. $email_data['investor_login'].' has requested to remove  the PAMM Program from his/her PAMM Programs.';
        $email_data['email_header'] = 'ForexRay - Request to Remove the PAMM Program';
        $email_data['content'] = $this->load->view('email_templates/template_2/after_joinpamm', $email_data, true);
        //echo '<pre>';
        //print_r($email_data['content']);
        $result = $this->mail_model->send_mail($email_data);             
        redirect('userpages/my_fundprogram/3');
    }
        
    public function depositmt4($msg=''){
            $data='';
            $user_details = unserialize($this->session->userdata['user_details']);
            $user_id=$user_details->id;
            $userwallet=$this->users_model->get_wallet($user_details->id);
            $data->wallet=$userwallet->wallet;
            if($msg=='1')
            {
                $message='Please enter the amount equal or below the Wallet amount.';
            }else
            if($msg=='2')
            {
                $message='Your Account is not validated, Please <a href="'.site_url('userpages/validation_documents').'">Click Here</a> to upload your documents.';
            }
			else
            if($msg=='3')
            {
                $message='Deposited Successfully.';
            }
            else $message='';
            $data->msg=$msg;
            $data->message=$message;
            $this->load->view('userpages/depositmt4',$data);
        }
        
    public function save_depositmt4() {
           if (formtoken::validateToken($_POST)){
            $user_details = unserialize($this->session->userdata['user_details']);
            $userwallet=$this->users_model->get_wallet($user_details->id);
            $wallet=$userwallet->wallet;
            $account_verification=$userwallet->account_verification;;
            if($this->input->post('page')=='depositmt4'){
                if($account_verification!='1')
                {
                    redirect('userpages/depositmt4/2');
                }
                if($_POST['amount']>$wallet)
                {
                    redirect('userpages/depositmt4/1');
                }
                $bal=$wallet-$_POST['amount'];
                $updatewallet=$this->users_model->update_wallet($user_details->id,$bal);
                $log['user_id']=$user_details->id;
                $log['amount']=$_POST['amount'];
                $log['type']='0';
				$log['message']=$_POST['comment'];
                $this->wallet_logs_model->add_log($log);
				
                //deposit/withdrawal balance to wallet in MT4 Server	
			
                $mt4request = new CMT4DataReciver;
                //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

                //Depositing the balance to MT4 Account
                $params['login'] = $userwallet->login;
                $params['value'] = $_POST['amount']; // above zero for deposits, below zero for withdraws
                $params['comment'] = $_POST['comment'];
                $answerData = $mt4request->MakeRequest("changebalance", $params);

                //End Of Deposit/withdrawal balance to wallet in MT4 Server	        

                redirect('userpages/depositmt4/3');
        }else redirect('userpages/homenew');
		}else redirect('userpages/homenew');
	}
        
        
         
         
    public function maintanance()
    {
        $this->load->view('userpages/maintanance');
    }

        public function testmail()
        {
               $email_data['investor_login'] =  '10032';
               $email_data['investor_email']='swathiit1817@gmail.com';
               $email_data['investor_name']=ucfirst('firstname').' '.ucfirst('lastname');
               $email_data['investor_amount']='1600';
               $email_data['pamm_login']='10031';
               $email_data['pamm_email']='SWATHI@GMAIL.COM';
               $email_data['pamm_name']='Sam';
               $email_data['pamm_amount']='1000';
               $email_data['trading_name'] = 'USD BUGS';
              // $email_data['registration_type'] = $post['registration_type'];
               $email_data['from'] = $this->db->escape_str($this->config->item('from_mail'));
               $email_data['to'] = 'swathiit1817@gmail.com';
               $email_data['subject'] = 'The user '. $email_data['investor_login'].' deposited '.$email_data['investor_amount'].'USD into the PAMM program "'.$email_data['trading_name'].'"';
               $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. PAMM Details';
              // $email_data['name'] = ucfirst($post['firstname']);
               $email_data['content'] = $this->load->view('email_templates/template_2/after_joinpamm', $email_data, true);


               echo '<pre>';
               print_r($email_data['content']);exit();
              // $result = $this->mail_model->send_mail($email_data);             
        }
		 
		
		
		
    public function add_funds($pid,$msg='')
    {
        $data='';
        $user_details = unserialize($this->session->userdata['user_details']);
        $user_id=$user_details->id;
        $userwallet=$this->users_model->get_wallet($user_details->id);
        $data->wallet=$userwallet->wallet;
        if($msg=='1')
        {
            $message='Please enter the amount equal or below the Wallet amount.';
        }
        else $message='';
        $data->msg=$msg;
        $data->message=$message;
                    $data->program_id=$pid;
                    $this->load->view('userpages/add_funds',$data);
    }
        

	public function save_addfunds() 
	{
           if (formtoken::validateToken($_POST)){
            $post=$this->input->post();
            $user_details = unserialize($this->session->userdata['user_details']);
            $pamm_relations=$this->pamm_relations_model->user_pammrelations($post['program_id'],$user_details->id);
            $pamm_relations_id=$pamm_relations->id;
		   
            $userwallet=$this->users_model->get_wallet($user_details->id);
            $wallet=$userwallet->wallet;
            if($this->input->post('page')=='add_funds'){
                if($_POST['amount']>$wallet){
                    redirect('userpages/add_funds/1');
                }
				
                $send['id']=$pamm_relations->id;
                $send['amount']=($pamm_relations->amount)+($post['amount']);
                $result = $this->pamm_relations_model->add_investor($send);
				
                $bal=$wallet-$post['amount'];
                $updatewallet=$this->users_model->update_wallet($user_details->id,$bal);
				
                $log['user_id']=$user_details->id;
                $log['amount']=$post['amount'];
                $log['type']='0';
		$log['message']='PAMM Deposit from '.$userwallet->login;
                $this->wallet_logs_model->add_log($log);
								
                $funds['pamm_relations_id']=$post['program_id'];
                $funds['comment']=$post['comment'];
                $funds['amount']=$post['amount'];
                $addfunds=$this->pamm_funds_history_model->add_funds($funds);
				
                //deposit/withdrawal balance to wallet in MT4 Server	
			
                $mt4request = new CMT4DataReciver;
                //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

                //Withdrawing the balance from PAMM investor wallet and deposited to MT4 Account
                $userdata=$this->users_model->userdata($user_details->id);
                $investor_login=$userdata->login;
                $params['login'] = $investor_login;
                $params['value'] = $post['amount']; // above zero for deposits, below zero for withdraws
                $params['comment'] = "Your PAMM Deposit";
                $answerData = $mt4request->MakeRequest("changebalance", $params);

                //Depositing the balance into PAMM Trader MT4 Account
                $userdata=$this->users_model->userdata($pamm_relations->trader_id);
                $trader_login=$userdata->login;
                $params['login'] = $trader_login;
                $params['value'] = $post['amount']; // above zero for deposits, below zero for withdraws
                $params['comment'] =  $log['message'];
                $answerData = $mt4request->MakeRequest("changebalance", $params);
				
                //End Of Deposit/withdrawal balance to wallet in MT4 Server	        
			
                //MAM Properties
			
                $pamm=$this->pamm_manager_model->get_pammmanagers();
                $File = $this->config->config['document_root_text']."misc/pammfiles/MAM".time().".properties"; 
                $Handle = fopen($File, 'w') or die('Unable to open File');
                foreach($pamm as $k)
                {
                $Data = "1,"; 
                fwrite($Handle, $Data); 
                $Data = $k->login.","; 
                $pammrelations=$this->pamm_manager_model->get_relations($k->id);
                foreach($pammrelations as $p)
                {
                $Data.=$p->login.',';
                }
                $Data=rtrim($Data,',');
                fwrite($Handle, $Data); 
                            //echo $Data;
                $Data="\r\n";
                fwrite($Handle,$Data);
                }
                 fclose($Handle); 

                 $this->load->library('ftp');
                $config['hostname'] = MAM_HOST;
                $config['username'] = MAM_USERNAME;
                $config['password'] = MAM_PASSWORD;
                $config['debug'] = TRUE;

                $this->ftp->connect($config);

                $this->ftp->upload($File, 'MAM.properties', 'ascii');

                $this->ftp->close(); 
			
                //End Of MAM Properties
				
                redirect('userpages/trading_history/1');
        }
        else redirect('userpages/homenew');
        }else redirect('userpages/homenew');
        }
		
		
    public function internal_transfer($msg=''){
        $data='';
        $user_details = unserialize($this->session->userdata['user_details']);
        $user_id=$user_details->id;
        $userwallet=$this->users_model->get_wallet($user_details->id);
        $data->wallet=$userwallet->wallet;

        if($msg=='1')
        {
            $message='Please enter the amount equal or below the Wallet amount.';
        }
        else if($msg=='2')
        {
                $message='Unable to process your request. Please try again.';
        }
        else if($msg=='3')
        {
                $message='You have transfered the amount Successfully.';
        }
        else if($msg=='4')
        {
                $message='The Account Number have not existed.';
        }

        else $message='';
        $data->msg=$msg;
        $data->message=$message;
        $this->load->view('userpages/internal_transfer',$data);
    }
		
    public function save_it()
    {
            if (formtoken::validateToken($_POST)){
                $user_details = unserialize($this->session->userdata['user_details']);
                if($this->input->post('page')=='internal_transfer'){
                $post=$this->input->post();
                $userwallet=$this->users_model->get_wallet($user_details->id);
                $wallet=$userwallet->wallet;
                $is_user_exists=$this->users_model->is_user_exists($post['acount_no']);
                $towallet=$is_user_exists->wallet;
                if($is_user_exists=='')
                {
                redirect('userpages/internal_transfer/4');
                }
                if($wallet<$post['amount'])
                {
                redirect('userpages/internal_transfer/1');
                }

                //transferred from From account
                $mybal=$wallet-$post['amount'];
                $updatewallet=$this->users_model->update_wallet($user_details->id,$mybal);

                $log['user_id']=$user_details->id;
                $log['amount']=$post['amount'];
                $log['type']='0';
                $log['message']='Transfered to '.$post['acount_no'];
                $this->wallet_logs_model->add_log($log);
                //end of transferred From account

                //transferred to To account
                $bal=$towallet+$post['amount'];
                $updatewallet=$this->users_model->update_wallet($is_user_exists->id,$bal);

                $log['user_id']=$is_user_exists->id;
                $log['amount']=$post['amount'];
                $log['type']='0';
                $log['message']='Deposited from '.$user_details->login;
                $this->wallet_logs_model->add_log($log);
                //End of transferred to To account
                redirect('userpages/internal_transfer/3');
                }
        }else{
                //$this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
                if($this->input->post('page')=='internal_transfer'){
                        redirect('userpages/internal_transfer/2');
                }else{
                        redirect('userpages/homenew');
                }
        }
    }
    
    public function change_password($msg=''){
        $data='';
        $user_details = unserialize($this->session->userdata['user_details']);
        $user_id=$user_details->id;
        $userwallet=$this->users_model->get_wallet($user_details->id);
        $data->wallet=$userwallet->wallet;

        if($msg=='1')
        {
                $message='Please enter the correct password.';
        }
        else if($msg=='2')
        {
                $message='Unable to process your request. Please try again.';
        }
        else if($msg=='3')
        {
                $message='Password has changed successfully.';
        }
        else $message='';
        $data->msg=$msg;
        $data->message=$message;
        $this->load->view('userpages/change_password',$data);
       // $response = $this->mql_model->MQ_Login($_POST['login_name'], $_POST['user_password']);
            
         //   if ($response == 'Success') {
    }


    public function update_password()
    {
        if (formtoken::validateToken($_POST)){
            $user_details = unserialize($this->session->userdata['user_details']);
            if($this->input->post('page')=='change_password'){
            $post=$this->input->post();
            $response = $this->mql_model->MQ_Login($user_details->login, $_POST['current_password']);
            $mt4request = new CMT4DataReciver;
            //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

            if($response=='Success')
            {
                $account_for=$user_details->account_for;
                $updatepwd=$this->users_model->save_password($user_details->login,$_POST['new_password']);
                if($account_for!='2'){
                        $params['investor'] = 0;
                }
                $params['login'] = $user_details->login;
                $params['pass'] = $_POST['new_password'];
                $answerData = $mt4request->MakeRequest("changepassword", $params);
                redirect('userpages/change_password/3');
            }
            else {
                redirect('userpages/change_password/1');
            }
            }
        }
        else{
            redirect('userpages/change_password/2');
        }
    }

    public function my_profile($msg=''){
        $data='';
        $user_details = unserialize($this->session->userdata['user_details']);
        $data=$this->users_model->mydata($user_details->id);
        
        $mt4request = new CMT4DataReciver;
        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
        
        //$params['login'] = "101081";
        $params['login'] = $user_details->login;
        
        $answerData = $mt4request->MakeRequest("getaccountinfo", $params);

        if($msg=='1')
        {
                $message='Please enter the correct password.';
        }
        else if($msg=='2')
        {
                $message='Unable to process your request. Please try again.';
        }
        else if($msg=='3')
        {
                $message='Your profile has updated successfully.';
        }
        else $message='';
        $data->msg=$msg;
        $data->message=$message;
        $this->load->view('userpages/my_profile',$data);
    }
    
    public function update_profile()
    {
        if (formtoken::validateToken($_POST)){
            $user_details = unserialize($this->session->userdata['user_details']);
            if($this->input->post('page')=='my_profile'){
            $post=$this->input->post();
            $user_id=$user_details->id;
           // echo '<pre>';
            //print_r($post);
            //echo $post['firstname'];
            
           // exit();
            
           $result = $this->users_model->save_registration($post);
                if($result)
                {
                     $mt4request = new CMT4DataReciver;
                     //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                     $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
                     
                     $data = $this->webapi_model->account_user_id($user_id);

                     $answerData = $mt4request->MakeRequest("modifyaccount", $data[0]); 
                     redirect('userpages/my_profile/3');
                }else{
                     redirect('userpages/my_profile/2');
                }
           }
        }
        else{
            redirect('userpages/my_profile/2');
        }
    }
    
    
    public function test()
    {
        $user_details = unserialize($this->session->userdata['user_details']);
        $mt4request = new CMT4DataReciver;
        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

        //echo '<pre>';
       // print_r($user_details);
        //echo $user_details['date_added'];
        //echo 'coming';
        //echo $user_details->date_added;
        //echo $user_details->id;
        //exit();
    }

    
    
    
    
    

}