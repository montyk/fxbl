<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends MY_Controller {

    public function index() {
        $tbl_array = array('users','users_address','users_contacts','users_settings');
        $data = $this->users_model->gettabledetails($tbl_array);
        $data->ecur_details[0] = $this->users_model->gettabledetails(array('users_ecurrencies'));
        $data->id = 0;
        $data->master_data = $this->users_model->getMasterData();
        $data->session_id = MD5($this->session->userdata('session_id'));
        $this->load->view('signup/index',$data);
    }

    public function saveuser()
    {
        if (formtoken::validateToken($_POST)) {
            $userDetails=unserialize($this->session->userdata('user_details'));
            // Checking & Replacing STAFF submitted ID for his profile ID. 
            if($userDetails->user_type == 'u'){
                if(isset($_POST['id']) && $_POST['id']!=$userDetails->id){
                    $_POST['id']=$userDetails->id;
                }
                // Staff Email
                $_POST['email']=$userDetails->email;
            }

            if(isset($_POST['email'])) {
                $_POST['email']=trim($_POST['email']);
                $files = array();
                if(isset($_FILES))
                {
                    $files = $_FILES;
                }
                
                if(empty($_POST['id'])){
                    $emailCheck=$this->users_model->check_email($_POST['email']);
                    if(!empty($emailCheck)){
                        $this->session->set_flashdata('error_msg','Email ID is already registered. Please check and Sign Up again.');
                        redirect('signup');
                        return true;
                    }
                }
                
                
                
                $signup_response = $this->users_model->save_user($_POST,$files);
                
                if($signup_response)
                {
                    if(empty($_POST['id'])){
                        $email_data['from'] = $this->config->item('from_mail');
                        $email_data['to'] = $this->db->escape_str($_POST['email']);
                        $email_data['subject'] = 'EdealSpot Registration - Verify your Account with 24 hours';
                        $email_data['email_header']='EdealSpot Registration - Account Verification';
                        $email_data['name'] = ucfirst($_POST['firstname'].' '.$_POST['lastname']);
                        $email_data['message'] = 'Please <a href="'.base_url().'signup/activate/'.urlencode($email_data['to']).'" >Click Here</a> with-in 24 hours to activate your account<br/>';
                        $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);
                        $result = $this->mail_model->send_mail($email_data);
                    }else{
                        $result=1;
                    }
                    if($result){
                        if(empty($_POST['id'])){
                            $this->session->set_flashdata('success_msg','Email has been sent to your email Id, Please verify your account with-in 24 hours by clicking on the link sent to your email.');
                            redirect('login');
                        }else{
                            $this->session->set_flashdata('success_msg','Account details saved successfully.');
                            redirect('staff/profile');
                        }
                        
                    } else {
                        // echo 'Unable to send Email, Please contact Edeal Administrator';
                        $this->session->set_flashdata('error_msg','Unable to send Email, Please contact Edeal Administrator');
                        redirect('login');
                    }
                    
                }
                else
                {
                    // echo 'Unable to Process Registration';
                    $this->session->set_flashdata('error_msg','Unable to Process Registration');
                    redirect('login');
                }
				
                /*$this->email->to($_POST['email']);
                $this->email->from('Admin');
                $this->email->subject('Verify your Account with 24 hours');
                $message = 'Please <a href="'.base_url().'signup/activate/'.$uname.'/'.$domain.'" >click here</a> with in 24 hours to activate your account<br>';
                $this->email->message($message);
                $this->email->send();

                echo 'Email has been sent to your email Id, Please verify your account with in 24 hours by clicking on the link';*/
                /*$email = explode('@',$_POST['email']);
                redirect('login/index/'.$email[0].'/'.$email[1]);*/
                
                /*$data['message'] = 'Please <a href="'.base_url().'signup/activate/"'.$email[0].'/'.$email[1].' >click here</a> with in 24 hours to activate your account<br>';
                $this->load->view('login/index',$data);*/
            }
        }
        else {
            die('The form is not valid or has expired.');
        }
    }

    public function activate($uname = '',$domain = '')
    {
        if($uname != '')
        {
            //$email = $uname.'@'.$domain;
            $this->users_model->activateUser($uname);
        }
        else
        {
            echo 'Please contact Administrator';
        }
    }

    public function getEcurrencies()
    {
        header('Content-Type: application/json');
        echo json_encode($this->users_model->getEcurrencies());
    }

    public function delUserEcurrencies()
    {
        $where_cond = array('id'=>$_POST['ecur_id']);
        $this->users_model->deleteRecord('users_ecurrencies',$where_cond);
    }
}

?>