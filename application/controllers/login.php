<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function index($uname = '', $domain = '') {
        $data['message'] = '';
        $email = explode('@', 'user8@gmail.com');
        if ($uname != '') {
            $data['message'] = 'Please <a href="' . base_url() . 'signup/activate/' . $uname . '/' . $domain . '" >click here</a> with in 24 hours to activate your account<br>';
        }
        $page[0]->title='ForexBull - Login';
        $data['pages'] = $page;
		if($uname=='1')
		{
			$data['message'] = 'Your OTP Session has expired.Please Try to Login After some time.';
		}
        $this->load->view('login/general/index', $data);
    }

    public function loginUser() {
 
        if (isset($_POST) && !empty($_POST) && is_numeric($_POST['login_name'])) {
            
            /**
             * MQL Login
             */
           // $response = $this->mql_model->MQ_Login($_POST['login_name'], $_POST['user_password']);
            $response='Success';
            if ($response == 'Success') {
                 // redirect('login/maintanance
                
                $this->login_model->login_web($_POST);
               //echo 1665;
               // 
                //$this->loginForum();
               // print_r($_POST['login_name']);die;
				$user_details = unserialize($this->session->userdata['user_details']);
                                  //print_r($user_details);
				if($user_details->otp == '1')
				{
                                   // echo 111;die;
					redirect('otp');
				}
				else{
                                   // echo 22;
                                    //print_r($user_details);die;
					redirect('userpages');
				}
            } else {
                $this->session->set_flashdata('error_msg',$response);
                redirect('login');
                // $data['message'] = $response;
                // $this->load->view('login/general/index', $data);
            }
        } else if(!empty($_POST)){
            /*
             * Normal Login
             */
            if ($this->login_model->is_user_unverified($_POST)) {
                $this->session->set_userdata('login_but_verify', TRUE);
                $this->session->set_flashdata('error_msg', 'Please verify your email.'); //  In case you did not receive the email, You can <a href="'.  site_url('login/resend_verification_link/'.urlencode($this->db->escape_str($post['login_name']))).'" target="_blank">click here</a> to re-send the verification Email.
                redirect('login');
            } else if ($this->login_model->login($_POST)) {
                $user_details = unserialize($this->session->userdata['user_details']);
                
                if ($user_details->user_type == 'a') {
					 
                    redirect('adminpages');
                } else {
                    redirect('userpages');
                }
            } else {
                $data['message'] = 'Invalid Username or Password';
                $this->load->view('login/general/index', $data);
            }
        }else{
            redirect('login');
        }
    }

    public function logout($msg='') {
		if($msg=='')
		$msg='';
        $this->login_model->logout();
      //  $this->logoutForum();
        redirect('login/index/'.$msg);
    }

    public function forgot_password() {
        $this->load->view('login/general/forgot_password');
    }

    public function send_password() {
        $pwd_details = $this->login_model->send_password($_POST);
        if ($pwd_details) {
            $email_data['from'] = $this->config->item('from_mail');
            $email_data['to'] = $this->db->escape_str($_POST['login_name']);
            $email_data['subject'] = 'ForexBull Login Details';
            $email_data['name'] = ucfirst($pwd_details[0]->name);
            $email_data['password'] = $pwd_details[0]->password;
            $email_data['content'] = $this->load->view('email_templates/send_password', $email_data, true);
            // echo '<pre>';print_r($email_data);die;
            $result = $this->mail_model->send_mail($email_data);
            if ($result) {
                // $data['reply_msg'] = 'Password Mail has been send to your email.. ';
                $this->session->set_flashdata('success_msg', 'Password Mail has been send to your email.. ');
                redirect('login');
            } else {
                $data['reply_msg'] = 'Unable to send Password email.. Please try again. ';
            }
            $this->load->view('login/general/forgot_password', $data);
        } else {
            // $data['reply_msg'] = 'User Name does not exist';
            // $this->load->view('login/general/forgot_password',$data);
            $this->session->set_flashdata('error_msg', 'Email does not exist. Please check your email id and try again. ');
            redirect('login/forgot_password');
        }

        /* $this->email->to($_POST['login_name']);
          $this->email->from('Admin');
          $this->email->subject('Your Edeal Password');
          $this->email->message('Password :'.$password);
          $this->email->send(); */
    }

    public function add($id = 0) {
        $data = new stdclass();
        $user_info = $this->login_model->select_login($id);

        if ($user_info) {
            $data = $user_info[0];
        }
        $data->id = $id;
        $data->session_id = MD5($this->session->userdata('session_id'));


        if (isset($_POST['submit'])) {

            $this->login_model->save_login($_POST);
            redirect('login/display');
        }

        $this->load->view('login/add', $data);
    }

    public function display() {
        $post = $this->input->post();
        if ($post) {
            // Sedn grid Data
            $sql = "select * from login ";
            $edit = "<div><a href='" . site_url('login/add/{%id%}') . "'>Edit</div>";
            $info = "<div>{%id%}-{%name%}-{%email%}-{%company%}</div>";
            $array_fields = array('id', 'name', 'email', 'company', $info, $edit);
            echo $this->login_model->display_grid($post, $sql, $array_fields);
        } else {
            $this->load->view('login/display');
        }
    }

    public function test() {

        /* $fields="id!=0";
          $fields=array('id!='=>3);
          $this->db->where($fields,NULL,false);
          $query = $this->db->get('login');
          echo "<pre>";
          print_r($query->result_object());
         */
        $string = "{%id%}{%name%}{%email%}";
        print_r($x);
    }

    public function resend_link() {

        $data = array();
        /**
         * Captcha Image
         */
        $this->load->helper('captcha');

        $vals = array(
            'word' => '',
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => '',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 7200
        );

        $data['captcha'] = $captchaData = create_captcha($vals);

        $captchaDbData = array(
            'captcha_time' => $captchaData['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $captchaData['word']
        );

        $query = $this->db->insert_string('captcha', $captchaDbData);
        $this->db->query($query);
        /*
         * Captcha End
         */

        $this->load->view('login/general/resend_link', $data);
    }

    public function resend_verification_link($email = '') {
        if ($this->session->userdata('login_but_verify') && !empty($email)) {
            $post = array();
            $post['login_name'] = urldecode($this->db->escape_str($email));
            $pwd_details = $this->login_model->send_password($post);
            if (!empty($pwd_details)) {
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($post['login_name']);
                $email_data['subject'] = 'ForexBull Registration - Verify your Account with 24 hours';
                $email_data['email_header'] = 'ForexBull Registration - Account Verification';
                $email_data['name'] = ucfirst($pwd_details[0]->name);
                $email_data['message'] = 'Please <a href="' . base_url() . 'signup/activate/' . urlencode($email_data['to']) . '" >Click Here</a> with-in 24 hours to activate your account<br/>';
                $email_data['content'] = $this->load->view('email_templates/user_reg', $email_data, true);
                $result = $this->mail_model->send_mail($email_data);

                $this->users_model->update_user_email_validate_date($pwd_details[0]->id);

                if ($result) {
                    $this->session->set_flashdata('success_msg', 'Email has been sent to your email Id, Please verify your account with-in 24 hours by clicking on the link sent to your email.');
                    // $this->session->set_userdata('login_but_verify',FALSE);
                    redirect('login');
                } else {
                    $this->session->set_flashdata('error_msg', 'Unable to send Email, Please contact Edeal Administrator');
                    redirect('login/resend_link');
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Email does not exist. Please check your email id and try again. ');
                redirect('login/resend_link');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Email does not exist. Please check your email id and try again. ');
            redirect('login/resend_link');
        }
    }

    public function send_link() {
        /**
         *  Captcha Checking... 
         */
        // First, delete old captchas
        $expiration = time() - 7200;
        $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0) {
            $this->session->set_flashdata('error_msg', 'Please enter the correct text from the image.');
            redirect('login/resend_link');
            return true;
        }

        $pwd_details = $this->login_model->send_password($_POST);
        if ($pwd_details) {
            $email_data['from'] = $this->config->item('from_mail');
            $email_data['to'] = $this->db->escape_str($_POST['login_name']);
            $email_data['subject'] = 'ForexBull Registration - Verify your Account with 24 hours';
            $email_data['email_header'] = 'ForexBull Registration - Account Verification';
            $email_data['name'] = ucfirst($pwd_details['name']);
            $emailMessage = '<p>Please <a href="' . site_url('registration/activate') . '/' . $this->my_encrypt->encode($pwd_details[0]->id) . '" >Click Here</a> with-in 24 hours to activate your account</p><br/>'; // urlencode($email_data['to'])
            $email_data['message'] = $emailMessage;
            $email_data['content'] = $this->load->view('email_templates/user_reg', $email_data, true);
            $result = $this->mail_model->send_mail($email_data);

            if ($result) {
                $this->session->set_flashdata('success_msg', 'Email has been sent to your email Id, Please verify your account with-in 24 hours by clicking on the link sent to your email.');
                redirect('login/resend_link');
            } else {
                $this->session->set_flashdata('error_msg', 'Unable to send Email, Please contact Edeal Administrator');
                redirect('login/resend_link');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Email does not exist. Please check your email id and try again. ');
            redirect('login/resend_link');
        }
    }
    
    /*
     * @@ START: Forum Auth functions.
     */
    
    function loginForum() {
        // error_reporting(E_ALL);
        
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        
        $post=$this->input->post();
        define('IN_PHPBB', true);
        define('ROOT_PATH', "/var/www/forum");

        if (!defined('IN_PHPBB') || !defined('ROOT_PATH')) {
            exit();
        }

        $phpEx = "php";
        $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : ROOT_PATH . '/';
        include($phpbb_root_path . 'common.' . $phpEx);

        $user->session_begin();
        $auth->acl($user->data);
        $auth->login($post['login_name'], $post['user_password'], FALSE, 1, 0);
        
        // echo 'LoggedIn'; die;
        
        return true;
    }
    
    function logoutForum(){
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        
        $post=$this->input->post();
        define('IN_PHPBB', true);
        define('ROOT_PATH', "/var/www/forum");

        if (!defined('IN_PHPBB') || !defined('ROOT_PATH')) {
            exit();
        }

        $phpEx = "php";
        $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : ROOT_PATH . '/';
        include($phpbb_root_path . 'common.' . $phpEx);
        
        $user->session_kill();
        $user->session_begin();
        
        return true;
    }
    
    
      public function maintanance()
         {
             $this->load->view('userpages/maintanance');
         }
		 
    /*
     * @@ END: Forum Auth functions.
     */

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
