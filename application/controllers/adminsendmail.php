<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminsendmail extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('adminsendmail/index');
    }

    public function send_mail() {
        if ($this->formtoken->validateToken($_POST)) {
            /*
            $email_data['from'] = $this->config->item('from_mail');
            $email_data['to'] = $_POST['email'];
            $email_data['subject'] = $_POST['subject'];
            $email_data['message'] = $_POST['content'];
            $email_data['content'] = $this->load->view('templates/send_mail', $email_data, true);

            $result = $this->mail_model->send_mail($email_data);
            $this->contactus_model->save_sent_mail($_POST);
            echo $result;
            */
            
            $this->contactus_model->save_sent_mail($_POST);
            
            $post=$this->input->post();
            
            $emailDetails['from']=$this->config->item('from_mail');
            $emailDetails['to']=$post['email'];
            $emailDetails['subject']=((!empty($post['subject']))?$post['subject']:'Edealspot.com');

            $emailViewData=$post;
            // $emailViewData['message']=$post['content'];
            $emailDetails['message']=$this->load->view('email_templates/send_mail',$emailViewData,TRUE);

            // $this->mail_model->sendMail($emailDetails);
            $this->mail_model->send_mail($emailDetails);
            echo 1;
            
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */