<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forgotpassword extends MY_Controller {

    public function index($msg = '') {
        $data['message'] = '';
		if($msg=='1')
		{
			$data['message'] = 'Invalid Login.';
		}
		else if($msg=='2')
		{
			$data['message'] = 'An email was sent that will allow you to reset your password. Please check your email for further instructions.';
		}
		else if($msg=='3')
		{
			$data['message'] = 'Unable to process your request. Please try again.';
		}
                
        $data['msg']=$msg;
        $page[0]->title='ForexRay - Forgot Password';
        $data['pages'] = $page;
        $this->load->view('login/general/forgotpassword', $data);
    }
	
    public function send_password() {

        if (isset($_POST) && !empty($_POST) && is_numeric($_POST['login_name'])) {
            /**
             * MQL Login
             */

            $mt4request = new CMT4DataReciver;
            //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
            $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

            $params['login'] = $_POST['login_name'];
            $answerData = $mt4request->MakeRequest("getaccountinfo", $params);

            if($answerData['result']=='1')
            {
                $email_data['login'] = $_POST['login_name'];
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($answerData['email']);
                $email_data['subject'] = 'ForexRay - Reset your Password';
                $email_data['email_header'] = 'ForexRay - Reset your Password';
                $email_data['name'] = ucfirst($answerData['name']);
                $email_data['content'] = $this->load->view('email_templates/template_2/reset_password', $email_data, true);
                //echo '<pre>';
                //print_r($email_data['content']);exit();
                $result = $this->mail_model->send_mail($email_data);
                redirect('forgotpassword/index/2');

            } else if($answerData['result']=='-4')
            {
                            redirect('forgotpassword/index/1');
            }

            }
            else
            {
                    redirect('forgotpassword/index/1');
            }
    }
	
	public function resetpassword($enclogin,$msg='')
	{
		$data['enclogin']=$enclogin;
		$data['message']='';
		if($msg=='1')
		{
			$data['message']='Your Password has been changed.';
		}
		$this->load->view('login/general/resetpassword', $data);		
	}
	
	
    public function change_password() {
        if (isset($_POST) && !empty($_POST)) {

                $mt4request = new CMT4DataReciver;
                //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

                $is_user_exists=$this->users_model->is_user_exists(base64_decode($_POST['enclogin']));
                $account_for=$is_user_exists->account_for;
                $updatepwd=$this->users_model->save_password(base64_decode($_POST['enclogin']),$_POST['password']);
                if($account_for!='2'){
                        $params['investor'] = 0;
                }
                $params['login'] = base64_decode($_POST['enclogin']);
                $params['pass'] = $_POST['password'];
                $answerData = $mt4request->MakeRequest("changepassword", $params);

                $params2['login'] = base64_decode($_POST['enclogin']);
                $answerData2 = $mt4request->MakeRequest("getaccountinfo", $params2);


                $email_data['login'] = $params2['login'];
                $email_data['password'] = $_POST['password'];
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($answerData2['email']);
                $email_data['subject'] = 'Forexray - Password Reset';
                $email_data['email_header'] = 'Forexray - Password Reset';
                $email_data['name'] = ucfirst($answerData2['name']);
                $email_data['content'] = $this->load->view('email_templates/template_2/after_resetpwd', $email_data, true);
                $result = $this->mail_model->send_mail($email_data);
                redirect('forgotpassword/resetpassword/'.$_POST['enclogin'].'/1');
        }else
        {
                redirect('forgotpassword/index/3');
        }
    }
    
    
    


}

?>