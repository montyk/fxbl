<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends MY_Controller {

    public function index_old() {
        // $this->load->model('adminhomepage_model');

        $post = $this->input->post();
        if (!empty($post)) {
            $post['dob'] = dateFormat($this->input->post('dob'), 'Y-m-d h:i:s');
			$post['leverage_id']='11';

            if($post['is_pamm']=='no')
            {
                $post['account_for'] = '1';
            }
            
            if($post['account_for'] == '2' || $post['account_for'] == '3'){
                    if($post['account_for'] == '3')
                            $post['group_id']='9';
                    else if($post['account_for'] == '2')
                    {
                            $post['deposit_status']='N';
                            $post['group_id']='8';
                    }
                    $post['start_date'] = '';
                    $post['exp_date'] = '';
                    $post['account_base_id']='';
                    $post['leverage_id']='11';
                    $post['estimate_income_id']='';
                    $post['estimate_net_worth_id']='';
                    $post['level_of_education_id']='';
                    $post['employment_status_id']='';
                    //$post['nature_of_business_id']='';
                    $post['nature_of_business']='';	
            }

            if ($post['group_id'] == '7') {
                $post['start_date'] = dateFormat($this->input->post('start_date'), 'Y-m-d h:i:s');
                $post['exp_date'] = dateFormat($this->input->post('exp_date'), 'Y-m-d h:i:s');
            } else {
                $post['start_date'] = '';
                $post['exp_date'] = '';
            }
			if($post['registration_type'] == 'demo') $post['account_for'] == '1';
			$this->session->set_flashdata('reg_form_data', $post);

            /**
             *  START @@ Captcha Checking... 
             */
            // First, delete old captchas
            $expiration = time() - 7200;
            $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

            // Then see if a captcha exists:
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $captchaRows = $query->row();

            /**
             *  END @@ Captcha Checking... 
             */
            if ($captchaRows->count == 0) {
                $this->session->set_flashdata('error_msg', 'Please enter the correct text from the image.');
                if ($post['registration_type'] == 'demo')
                    redirect('registration/open_demo_acc');
                else
                    redirect('registration');
            }else if ($this->formtoken->validateToken($post)) {

                $post['varification_status'] = 1;

                // Save the registration form.
                $result = $this->users_model->save_registration($post);
                if ($result) {

                    if (empty($post['id'])) {
                        $info = $this->mql_model->create_account_mql($result);

                        if (!$info['error']) {
                            $loginNum = $info['response'];
                            $sql = 'update users set login="' . $loginNum . '", varification_status = "1" where id = "' . $result . '" ';
                            $this->db->query($sql);

                            /*
                             * Create t	he forum user
                             */
                           // $this->createForumUser($loginNum);


                            /*
                              $email_data['from'] = $this->config->item('from_mail');
                              $email_data['to'] = $this->db->escape_str($post['email']);
                              $email_data['subject'] = 'ForexRay Account Details';
                              $email_data['email_header'] = 'ForexRay Account Details';
                              $email_data['name'] = ucfirst($post['firstname']);
                              $emailMessage = 'Login:' . $loginNum . '<br>Password:' . $post['password']; // urlencode($email_data['to'])
                              $email_data['message'] = $emailMessage;
                              // $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);

                              $email_data['content'] = $this->load->view('email_templates/template_2/email_verification', $email_data, true);

                             */

                            //$this->users_model->activateUserID($user_id);
                            
                            //if($post['account_for'] == '2')
                            //{
                            //    $post['password']='FxRay@123';
                            //}
                            
                            $email_data['login_id'] = $loginNum;
                            $email_data['password'] = $post['password'];
                            $email_data['registration_type'] = $post['registration_type'];
                            $email_data['phone_password'] = $post['phone_password'];
                            $email_data['from'] = $this->config->item('from_mail');
                            $email_data['to'] = $this->db->escape_str($post['email']);
                            $email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst($post['firstname']) . '. Your Account Details';
                            $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
                            $email_data['name'] = ucfirst($post['firstname']);
                            $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);


                            //echo '<pre>';
                            //print_r($email_data['content']);exit();
                            $result = $this->mail_model->send_mail($email_data);
                        } else {
                            $sql = 'delete from users  where id = "' . $result . '" ';
                            $this->db->query($sql);
                            $this->session->set_flashdata('error_msg', $info['response']);
                            if ($post['registration_type'] == 'demo')
                                redirect('registration/open_demo_acc');
                            else
                                redirect('registration');
                        }
                    }
                }
                /*
                  $this->session->set_flashdata('success_msg','Thank you for registering. Please check your email for activation.');
                  // $this->session->set_flashdata('info_msg','Please check your spam mail for activation mail in case you dont find in your inbox! ');
                  $this->session->set_flashdata('info_msg','In case you did not receive the email, You can <a href="'.  site_url('login/resend_link').'">click here</a> to re-send the verification Email.');
                  redirect('login');
                 * 
                 */
                // $this->session->set_flashdata('registration_info', $post);
                // redirect('registration/success');
                $this->success($post);
            } else {
                $this->session->set_flashdata('error_msg', 'The form is not valid or has expired. Please try again.');
                redirect('registration'); // die('The form is not valid or has expired.');
            }
        } else {
            $data = array();

            /**
             * START @@ Captcha Image
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
            $data['is_pamm'] = 'no';

            $captchaDbData = array(
                'captcha_time' => $captchaData['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $captchaData['word']
            );

            $query = $this->db->insert_string('captcha', $captchaDbData);
            $this->db->query($query);
            /*
             * END @@ Captcha End
             */

//            $sidebar_news_count=$this->config->item('sidebar_news_count');
//            $sidebar_promotions_count = $this->config->item('sidebar_promotions_count');
//            $data['sidebar_news'] = $this->adminhomepage_model->getnews('', ' LIMIT  ' . $sidebar_news_count);
//            $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('', ' LIMIT ' . $sidebar_promotions_count, TRUE);
            $this->load->view('registration/index', $data);
        }
    }

    
    
      public function index() {
        // $this->load->model('adminhomepage_model');

        $post = $this->input->post();
        if (!empty($post)) {
            $post['dob'] = dateFormat($this->input->post('dob'), 'Y-m-d h:i:s');
			$post['leverage_id']='11';
			if($post['account_for'] == '2' || $post['account_for'] == '3'){
				if($post['account_for'] == '3')
					$post['group_id']='9';
				else if($post['account_for'] == '2')
				{
					$post['deposit_status']='N';
					$post['group_id']='8';
				}
				$post['start_date'] = '';
				$post['exp_date'] = '';
				$post['account_base_id']='';
				$post['leverage_id']='11';
				$post['estimate_income_id']='';
				$post['estimate_net_worth_id']='';
				$post['level_of_education_id']='';
				$post['employment_status_id']='';
				//$post['nature_of_business_id']='';
				$post['nature_of_business']='';	
			}

            if ($post['group_id'] == '7') {
                $post['start_date'] = dateFormat($this->input->post('start_date'), 'Y-m-d h:i:s');
                $post['exp_date'] = dateFormat($this->input->post('exp_date'), 'Y-m-d h:i:s');
            } else {
                $post['start_date'] = '';
                $post['exp_date'] = '';
            }
			if($post['registration_type'] == 'demo') $post['account_for'] == '1';
			$this->session->set_flashdata('reg_form_data', $post);

            /**
             *  START @@ Captcha Checking... 
             */
            // First, delete old captchas
            $expiration = time() - 7200;
            $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

            // Then see if a captcha exists:
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $captchaRows = $query->row();

            /**
             *  END @@ Captcha Checking... 
             */
            if ($captchaRows->count == 0) {
                $this->session->set_flashdata('error_msg', 'Please enter the correct text from the image.');
                if ($post['registration_type'] == 'demo')
                    redirect('registration/open_demo_acc');
                else
                    redirect('registration');
            }else if ($this->formtoken->validateToken($post)) {

                $post['varification_status'] = 1;

                // Save the registration form.
                $result = $this->users_model->save_registration($post);
                if ($result) {

                    if (empty($post['id'])) {
                        $info = $this->mql_model->create_account_mql($result);

                        if (!$info['error']) {
                            $loginNum = $info['response'];
                            $sql = 'update users set login="' . $loginNum . '", varification_status = "1" where id = "' . $result . '" ';
                            $this->db->query($sql);

                            /*
                             * Create t	he forum user
                             */
                           // $this->createForumUser($loginNum);


                            /*
                              $email_data['from'] = $this->config->item('from_mail');
                              $email_data['to'] = $this->db->escape_str($post['email']);
                              $email_data['subject'] = 'ForexRay Account Details';
                              $email_data['email_header'] = 'ForexRay Account Details';
                              $email_data['name'] = ucfirst($post['firstname']);
                              $emailMessage = 'Login:' . $loginNum . '<br>Password:' . $post['password']; // urlencode($email_data['to'])
                              $email_data['message'] = $emailMessage;
                              // $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);

                              $email_data['content'] = $this->load->view('email_templates/template_2/email_verification', $email_data, true);

                             */

                            //$this->users_model->activateUserID($user_id);
                            
                            //if($post['account_for'] == '2')
                            //{
                            //    $post['password']='FxRay@123';
                            //}
                            
                            $email_data['login_id'] = $loginNum;
                            $email_data['password'] = $post['password'];
                            $email_data['registration_type'] = $post['registration_type'];
                            $email_data['phone_password'] = $post['phone_password'];
                            $email_data['from'] = $this->config->item('from_mail');
                            $email_data['to'] = $this->db->escape_str($post['email']);
                            $email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst($post['firstname']) . '. Your Account Details';
                            $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
                            $email_data['name'] = ucfirst($post['firstname']);
                            $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);


                            //echo '<pre>';
                            //print_r($email_data['content']);exit();
                            $result = $this->mail_model->send_mail($email_data);
                        } else {
                            $sql = 'delete from users  where id = "' . $result . '" ';
                            $this->db->query($sql);
                            $this->session->set_flashdata('error_msg', $info['response']);
                            if ($post['registration_type'] == 'demo')
                                redirect('registration/open_demo_acc');
                            else
                                redirect('registration/pamm_manager');
                        }
                    }
                }
                /*
                  $this->session->set_flashdata('success_msg','Thank you for registering. Please check your email for activation.');
                  // $this->session->set_flashdata('info_msg','Please check your spam mail for activation mail in case you dont find in your inbox! ');
                  $this->session->set_flashdata('info_msg','In case you did not receive the email, You can <a href="'.  site_url('login/resend_link').'">click here</a> to re-send the verification Email.');
                  redirect('login');
                 * 
                 */
                // $this->session->set_flashdata('registration_info', $post);
                // redirect('registration/success');
                $this->success($post);
            } else {
                $this->session->set_flashdata('error_msg', 'The form is not valid or has expired. Please try again.');
                redirect('registration/pamm_manager'); // die('The form is not valid or has expired.');
            }
        } else {
            $data = array();

            /**
             * START @@ Captcha Image
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
            $data['is_pamm'] = 'yes';

            $captchaDbData = array(
                'captcha_time' => $captchaData['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $captchaData['word']
            );

            $query = $this->db->insert_string('captcha', $captchaDbData);
            $this->db->query($query);
            /*
             * END @@ Captcha End
             */

//            $sidebar_news_count=$this->config->item('sidebar_news_count');
//            $sidebar_promotions_count = $this->config->item('sidebar_promotions_count');
//            $data['sidebar_news'] = $this->adminhomepage_model->getnews('', ' LIMIT  ' . $sidebar_news_count);
//            $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('', ' LIMIT ' . $sidebar_promotions_count, TRUE);
            $this->load->view('registration/index', $data);
        }
    }

    
    
    
    function open_demo_acc() {

        $data = array();

        /**
         * START @@ Captcha Image
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
        $data['is_pamm'] = 'no';
        $captchaDbData = array(
            'captcha_time' => $captchaData['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $captchaData['word']
        );

        $query = $this->db->insert_string('captcha', $captchaDbData);
        $this->db->query($query);
        /*
         * END @@ Captcha End
         */

//            $sidebar_news_count=$this->config->item('sidebar_news_count');
//            $sidebar_promotions_count = $this->config->item('sidebar_promotions_count');
//            $data['sidebar_news'] = $this->adminhomepage_model->getnews('', ' LIMIT  ' . $sidebar_news_count);
//            $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('', ' LIMIT ' . $sidebar_promotions_count, TRUE);
        $this->load->view('registration/open_demo_acc', $data);
    }

    function success($registration_info) {
        // $this->load->model('adminhomepage_model');
        // $data['registration_info'] = $registration_info = $this->session->flashdata('registration_info');
        $data['registration_info'] = $registration_info;
        if (empty($registration_info)) {
            redirect('registration');
        } else {
            // $data['sidebar_news'] = $this->adminhomepage_model->getnews('', ' LIMIT 5 ');
            // $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('', ' LIMIT 5 ', TRUE);
            $this->load->view('registration/success', $data);
        }
    }

    public function activate($encID = '', $domain = '') {
        $user_id = 0;
        if (!empty($encID)) {
            $user_id = $this->my_encrypt->decode($encID);
        }
        if (!empty($user_id) && is_numeric($user_id)) {
            $this->users_model->activateUserID($user_id);

            // Send Trading Details Mail. ,Email to Download Metetrader
            $userDetails = $this->users_model->user_details($user_id);
            if (!empty($userDetails)) {
                $email_data['login_details'] = array(
                    'login_id' => $userDetails[0]->login,
                    'password' => $userDetails[0]->password,
                    'investor_password' => $userDetails[0]->password,
                    'login_server' => 'Real 3'
                );
                $email_data['login_id'] = $userDetails[0]->login;
                $email_data['password'] = $userDetails[0]->password;
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($userDetails[0]->email);
                $email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst($userDetails[0]->firstname) . '. Your Account Details';
                $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
                $email_data['name'] = ucfirst($userDetails[0]->firstname);
                $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);
                $result = $this->mail_model->send_mail($email_data);
            }
        } else {
            // echo 'Please contact Administrator';
            $this->session->set_flashdata('error_msg', 'Invalid activation link. Please contact Administrator.');
            redirect('login');
        }
    }

    function check_email() {
        $email = $this->input->get('email');
        if (!empty($email)) {
            $return = $this->users_model->check_email($email);
            if (!empty($return)) {
                echo 'false';
            } else {
                echo 'true';
            }
        } else {
            echo 'false'; // false triggers error msg
        }
    }

    function createForumUser($loginNum = 0) {
        $post = $this->input->post();

        if (!empty($loginNum) && !empty($post['password'])) {

            global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;

            define('IN_PHPBB', true);
            define('ROOT_PATH', "/var/www/forum/");

            $phpbb_root_path = '/var/www/forum/';
            $phpEx = "php";
            require_once( $phpbb_root_path . 'common.' . $phpEx );

            // Start session management
            $user->session_begin();
            $auth->acl($user->data);

            include_once( $phpbb_root_path . 'includes/functions_user.' . $phpEx );

            $user_row = array(
                'username' => $loginNum,
                'user_password' => phpbb_hash($post['password']),
                'user_email' => $post['email'],
                'group_id' => 2, #Not sure if this is 2 or 5. My DB says 2. Other users say 5.
                'user_timezone' => '-5.00',
                'user_dst' => 0,
                'user_lang' => 'en',
                'user_type' => 0,
                'user_actkey' => '',
                'user_dateformat' => 'D M d, Y g:i a',
                'user_style' => 1,
                'user_regdate' => time(),
            );

            // Register user...
            user_add($user_row);
            // echo 'FX- Registered';  die;
        }

        return true;
    }
	
	
	public function test()
	{
			echo 'test123';
                $log['user_id']='212';
                $log['amount']='0';
                $log['type']='0';
				$log['message']='test';
                $this->wallet_logs_model->add_log($log);
				
			echo 'test';

	}

	
	//------------------------------------------------------------------------------------------------------------------------

    function emailverification() {
        echo 'hii';
        exit;
        $email_data['from'] = 'swathiit1817@gmail.com';
        $email_data['to'] = 'swathi@gmail.com';
        $email_data['subject'] = 'ForexRay Account Details';
        $email_data['email_header'] = 'ForexRay Account Details';
        $email_data['name'] = ucfirst('swathi');
        $emailMessage = 'Login: 123456 <br>Password:123456';
        $email_data['message'] = $emailMessage;

        //$this->load->view('email_templates/template_2/email_verification', $email_data);
        $email_data['content'] = $this->load->view('email_templates/template_2/email_verification', $email_data);
        $result = $this->mail_model->send_mail($email_data);
    }

    function afterverification() {
        $email_data['login_id'] = 'swathi';
        $email_data['password'] = '123456';
        $email_data['registration_type'] = 'real';
        $email_data['phone_password'] = 'qwerty';
        $email_data['from'] = 'swathiit1817@gmail.com';
        $email_data['to'] = 'swathiit1817@gmail.com';
        $email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst('swathi') . '. Your Account Details';
        $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
        $email_data['name'] = ucfirst('swathi');
        $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data);
    }

    function email_test($emailId='mrweblogics@gmail.com') {
        $emailId=  urldecode($emailId);
        $email_data['login_id'] = '$loginNum';
        $email_data['password'] = '$post[\'password\']';
        $email_data['registration_type'] = '$post[\'registration_type\']';
        $email_data['phone_password'] = 'real123';
        $email_data['from'] = $this->config->item('from_mail');
        $email_data['to'] = $emailId;
        $email_data['subject'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
        $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
        $email_data['name'] = ucfirst('$post[\'firstname\']');
        
        echo $email_data['content'] = $this->load->view('email_templates/template_2/email_verification', $email_data, true);
        echo $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);
        if(!empty($emailId)){
            echo $result = $this->mail_model->send_mail($email_data);
        }
    }
	
	function test2()
	{
	echo 123333333;
	 	echo $result='191';//die();
                //$result='164';
		
		echo $result;
			$info = $this->mql_model->create_account_mql($result);
			echo    '         coming here';
			echo '<pre>';
			print_r($info);
			
		
	
	}
	
	function test3()
	{
	 error_reporting(E_ALL);
	 ini_set('display_errors','on');
	 $query="NEWACCOUNT MASTER=Tul!p100|IP=198.143.33.97|GROUP=1|NAME=TEST|PASSWORD=Abcd@12345|INVESTOR=|EMAIL=rajutsn@gmail.com|COUNTRY=India|STATE=AP|CITY=hyderabad|ADDRESS=ADDR|COMMENT=|PHONE=|PHONE_PASSWORD=|ST";
      echo 123;  	
	$x=$this->mql_model->MQ_Query_Register($query,'demo');
	
	 echo $x;
	}
	
	function test1()
	{
	$data = $this->mql_model->account_user_id(191);
	echo '<pre>';
	print_r($data);
	echo $data[0]['password'];
        echo $data[0]['group'];
	}
	
	public function testindex() {
        // $this->load->model('adminhomepage_model');
		
		$data = array();
		$countriesData=$this->users_model->getCountries();
		$countries_isdcodes=array();
		
		
		foreach ($countriesData->result() as $row)
		{
		
			$countries_isdcodes[$row->id]=$row->isd_code;
		}
		//print_r($countries_isdcodes);
		$data['countries_isdcodes']=$countries_isdcodes;
		
		//exit();
        $post = $this->input->post();
       

	   if (!empty($post)) {
		//echo '<pre>';
		//print_r($post);
		//exit();
		
		
            $post['dob'] = dateFormat($this->input->post('dob'), 'Y-m-d h:i:s');
			$post['leverage_id']='11';
			if($post['account_for'] == '2' || $post['account_for'] == '3'){
				if($post['account_for'] == '3')
					$post['group_id']='9';
				else if($post['account_for'] == '2')
				{
					$post['deposit_status']='N';
					$post['group_id']='8';
				}
				$post['start_date'] = '';
				$post['exp_date'] = '';
				$post['account_base_id']='';
				$post['leverage_id']='11';
				$post['estimate_income_id']='';
				$post['estimate_net_worth_id']='';
				$post['level_of_education_id']='';
				$post['employment_status_id']='';
				//$post['nature_of_business_id']='';
				$post['nature_of_business']='';	
			}

            if ($post['group_id'] == '7') {
                $post['start_date'] = dateFormat($this->input->post('start_date'), 'Y-m-d h:i:s');
                $post['exp_date'] = dateFormat($this->input->post('exp_date'), 'Y-m-d h:i:s');
            } else {
                $post['start_date'] = '';
                $post['exp_date'] = '';
            }
			if($post['registration_type'] == 'demo') $post['account_for'] == '1';
			$this->session->set_flashdata('reg_form_data', $post);

            /**
             *  START @@ Captcha Checking... 
             */
            // First, delete old captchas
            $expiration = time() - 7200;
            $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

            // Then see if a captcha exists:
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $captchaRows = $query->row();

            /**
             *  END @@ Captcha Checking... 
             */
            if ($captchaRows->count == 0) {
                $this->session->set_flashdata('error_msg', 'Please enter the correct text from the image.');
                if ($post['registration_type'] == 'demo')
                    redirect('registration/open_demo_acc');
                else
                    redirect('registration');
            }else if ($this->formtoken->validateToken($post)) {

                $post['varification_status'] = 1;

                // Save the registration form.
                $result = $this->users_model->save_registration($post);
                if ($result) {

                    if (empty($post['id'])) {
                        $info = $this->mql_model->create_account_mql($result);

                        if (!$info['error']) {
                            $loginNum = $info['response'];
                            $sql = 'update users set login="' . $loginNum . '", varification_status = "1" where id = "' . $result . '" ';
                            $this->db->query($sql);

                            /*
                             * Create t	he forum user
                             */
                           // $this->createForumUser($loginNum);


                            /*
                              $email_data['from'] = $this->config->item('from_mail');
                              $email_data['to'] = $this->db->escape_str($post['email']);
                              $email_data['subject'] = 'ForexRay Account Details';
                              $email_data['email_header'] = 'ForexRay Account Details';
                              $email_data['name'] = ucfirst($post['firstname']);
                              $emailMessage = 'Login:' . $loginNum . '<br>Password:' . $post['password']; // urlencode($email_data['to'])
                              $email_data['message'] = $emailMessage;
                              // $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);

                              $email_data['content'] = $this->load->view('email_templates/template_2/email_verification', $email_data, true);

                             */

                            //$this->users_model->activateUserID($user_id);
                            
                            //if($post['account_for'] == '2')
                            //{
                            //    $post['password']='FxRay@123';
                            //}
                            
                            $email_data['login_id'] = $loginNum;
                            $email_data['password'] = $post['password'];
                            $email_data['registration_type'] = $post['registration_type'];
                            $email_data['phone_password'] = $post['phone_password'];
                            $email_data['from'] = $this->config->item('from_mail');
                            $email_data['to'] = $this->db->escape_str($post['email']);
                            $email_data['subject'] = 'ForexRay - Welcome to ForexRay ' . ucfirst($post['firstname']) . '. Your Account Details';
                            $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
                            $email_data['name'] = ucfirst($post['firstname']);
                            $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);


                            //echo '<pre>';
                            //print_r($email_data['content']);exit();
                            $result = $this->mail_model->send_mail($email_data);
                        } else {
                            $sql = 'delete from users  where id = "' . $result . '" ';
                            $this->db->query($sql);
                            $this->session->set_flashdata('error_msg', $info['response']);
                            if ($post['registration_type'] == 'demo')
                                redirect('registration/open_demo_acc');
                            else
                                redirect('registration/pamm_manager');
                        }
                    }
                }
                /*
                  $this->session->set_flashdata('success_msg','Thank you for registering. Please check your email for activation.');
                  // $this->session->set_flashdata('info_msg','Please check your spam mail for activation mail in case you dont find in your inbox! ');
                  $this->session->set_flashdata('info_msg','In case you did not receive the email, You can <a href="'.  site_url('login/resend_link').'">click here</a> to re-send the verification Email.');
                  redirect('login');
                 * 
                 */
                // $this->session->set_flashdata('registration_info', $post);
                // redirect('registration/success');
                $this->success($post);
            } else {
                $this->session->set_flashdata('error_msg', 'The form is not valid or has expired. Please try again.');
                redirect('registration/pamm_manager'); // die('The form is not valid or has expired.');
            }
        } else {
            

            /**
             * START @@ Captcha Image
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
            $data['is_pamm'] = 'yes';

            $captchaDbData = array(
                'captcha_time' => $captchaData['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $captchaData['word']
            );

            $query = $this->db->insert_string('captcha', $captchaDbData);
            $this->db->query($query);
            /*
             * END @@ Captcha End
             */

//            $sidebar_news_count=$this->config->item('sidebar_news_count');
//            $sidebar_promotions_count = $this->config->item('sidebar_promotions_count');
//            $data['sidebar_news'] = $this->adminhomepage_model->getnews('', ' LIMIT  ' . $sidebar_news_count);
//            $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('', ' LIMIT ' . $sidebar_promotions_count, TRUE);


            $this->load->view('registration/testindex', $data);
        }
    } 
	
	public function loadData()
	{
		$country_id=$_POST['country_id'];
		$isdData=$this->users_model->getCountries($country_id);
		print_r($isData);
		exit();
		$HTML='';
		//if($isdData!='')
		//{
		//$HTML.="<option value='".$isdData->isd_code."'".if($isdData->id==$country_id) {".selected='selected'."}.">".$isdData->isd_code."</option>";
			//if(!empty($form_data['isd_code'])){ $isd_code= $form_data['isd_code']; }else{ $isd_code=0;  } 
			 echo selectBox('Select', 'countries', 'isd_code,isd_code', ' status=1 ', $country_id, ''); 
		//}
		//echo $HTML;
		//echo '<pre>';
		//print_r($isdData);
		//exit();
		//echo 'success';
		//echo $isdData->isd_code;
		//return $country_id;
		
	}



}

?>