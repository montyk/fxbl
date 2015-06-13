<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

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
                    redirect('register/open_demo_acc');
                else
                    redirect('register');
            }else if ($this->formtoken->validateToken($post)) {

                $post['varification_status'] = 1;
                
               // echo '<pre>';
             //   print_r($post);
                //exit();

                // Save the registration form.
                $result = $this->users_model->save_registration($post);
                //echo $result;
                if ($result) {

                    if (empty($post['id'])) {
                        //$info = $this->mql_model->create_account_mql($result);
                        $data = $this->webapi_model->getUser($result);
                        
                        if($data[0]['account_for']=='2')
			{
			$data[0]['deposit']='0';
			$data[0]['password_investor']=$data[0]['password'];
			$data[0]['password']='FxRay@123';
			}
			if($data[0]['account_for']=='3')
			{
			$data[0]['deposit']='0';
			}
                        
                        $mt4request = new CMT4DataReciver;
                        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
                        
                        $answer = $mt4request->MakeRequest("createaccount", $data[0]);
                        
                        
                        //echo '<pre>';
                       // print_r($answer);
                       // exit();
	
                        if($answer['result']==1){
                            $loginNum = $answer['login'];
                            $sql = 'update users set login="' . $loginNum . '", varification_status = "1" where id = "' . $result . '" ';
                            $this->db->query($sql);
                            $email_data['login_id'] = $loginNum;
                            $email_data['password'] = $post['password'];
                            $email_data['registration_type'] = $post['registration_type'];
                            $email_data['phone_password'] = $post['phone_password'];
                            $email_data['from'] = $this->config->item('from_mail');
                            $email_data['to'] = $this->db->escape_str($post['email']);
                            $email_data['subject'] = $this->config->item('project_name').'- Welcome to'.$this->config->item('project_name'). ucfirst($post['firstname']) . '. Your Account Details';
                            $email_data['email_header'] = $this->config->item('project_name').'- Welcome to '.$this->config->item('project_name').' Your Account Details';
                            $email_data['name'] = ucfirst($post['firstname']);
                            $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);


                            //echo '<pre>';
                            //print_r($email_data['content']);exit();
                            $result = $this->mail_model->send_mail($email_data);
                        } else {
                            $sql = 'delete from users  where id = "' . $result . '" ';
                            $this->db->query($sql);
                            $this->session->set_flashdata('error_msg', $answer['reason']);
                            if ($post['registration_type'] == 'demo')
                                redirect('register/open_demo_acc');
                            else
                                redirect('register/pamm_manager');
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
                redirect('register/pamm_manager'); // die('The form is not valid or has expired.');
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
            $this->load->view('register/index', $data);
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
        $this->load->view('register/open_demo_acc', $data);
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
    
    
    
    
    
    
    
    
    
    public function test()
    {
        $user_id='193';
        $data = $this->webapi_model->getUser($user_id);
        echo '<pre>';
        print_r($data);
        echo $data[0]['name'];
        //echo $params['password'] = ($data[0]['account_for']=='2')?'FxRay@123':$data[0]['password'];
        //exit();
        $mt4request = new CMT4DataReciver;
        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
        
        $params['group'] = $data[0]['group'];
	$params['agent'] = isset($data[0]['agent'])?$data[0]['agent']:'0';
	$params['login'] = 0;
	$params['country'] = $data[0]['country'];
	$params['state'] = $data[0]['state'];
	$params['city'] = $data[0]['city'];
	$params['address'] = $data[0]['address'];
	$params['name'] = $data[0]['name'];
	$params['email'] = $data[0]['email'];
	$params['password'] = ($data[0]['account_for']=='2')?'FxRay@123':$data[0]['password'];
	$params['password_investor'] = ($data[0]['account_for']=='2')?$data[0]['password']:'';
	$params['password_phone'] = $data[0]['phone_password'];
	$params['leverage'] = $data[0]['leverage'];
	$params['zipcode'] = $data[0]['zipcode'];
	$params['phone'] = $data[0]['phone'];
	$params['id'] = '';
	$params['comment'] = 'NO COMMENT';
	//$params['send_reports'] = rawurlencode($data[0]['send_reports']);
        
        //echo '<pre>';
        //print_r($params);
	//exit();
	$answer = $mt4request->MakeRequest("createaccount", $data[0]);
	
	if($answer['result']!=1)
	{
		print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
	}
	else
	{	
		print "<p style='background-color:#EEFFEE'>Account No. <b>".$answer["login"]."</b> has just been created.</p>";
	}


    }
    
    
    public function charts2()
    {
        $this->load->view('register/charts');
    }
    
    public function piechart()
    {
        $this->load->view('register/piechart');
    }
    
    public function piewithlegendchart()
    {
        $this->load->view('register/piewithlegendchart');
    }
    
    public function charts()
    {
        $mt4request = new CMT4DataReciver;
        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
        $params['login'] = '101463';

        $startTS = strtotime(date('2014-04-07')); //echo '</br>';
        $startTS = strtotime(date('2014-03-28')); //echo '</br>';

        //echo $startTS = strtotime('2014-03-05');
        //echo $startTS = '2013-02-18';
        //$time    =mktime(23,59,59,date('n'),date('j'),date('Y'));
	//$time2=$time-2592000;
        
        $params['login'] = '101463';
        $answerDataa = $mt4request->MakeRequest("getmargininfoex",$params);
        $balance=$answerDataa['balance'];
        $endTS = strtotime(date('2014-04-03')); 
        $params['from'] = $startTS;
        $params['to'] = $endTS;

        $answerData2 = $mt4request->MakeRequest("gethistory", $params);   
        $data['size'] = $size = sizeof($answerData2['csv']);
                //$profit_loss=0;
        $xaxis='';
        $sum=0;
        for($i = 0; $i < $size; $i++)
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
        $data['bal']=$bal;
        //exit();
        $this->load->view('register/charts',$data);
    }

}

?>