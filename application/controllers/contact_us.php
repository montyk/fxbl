<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends MY_Controller {

    function __construct() {
        parent::__construct();
         $this->db2 = $this->load->database('ticket',true);
    }

    public function index() {
        $this->load->view('contact_us/index');
    }

    public function save_cs() {
        //print_r($_POST);die;
        if (formtoken::validateToken($_POST)){
            $user_details = unserialize($this->session->userdata['user_details']);
            if($this->input->post('page')=='support_request'){
                $_POST['name']=ucfirst($user_details->firstname);
                $_POST['email']=$user_details->email;
                $_POST['phone']=$user_details->phone;
            }
            $result = $this->contactus_model->save_cs($_POST);
            if ($result > 0) {
                $_POST['ip_address']=$this->input->ip_address();
                $_POST['ticketid']=$saveTicket=$this->ticket_model->save_ticket($_POST);
                //echo $_POST['ticketid']=$this->db2->insert_id();
                //exit();
                $update_ticket=$this->ticket_model->update_ticket($_POST);
                
                $saveTicketEvent=$this->ticket_model->ticketEventCreated($_POST);
                $saveTicketThread=$this->ticket_model->saveTicketThread($_POST);
                $this->send_mail($_POST);
                $this->session->set_flashdata('success_msg','Your request is submitted Successfully. Our representative will contact you in shortest possible time.');
                if($this->input->post('page')=='support_request'){
                    redirect('userpages/support_request');
                }else{
                    redirect('contact_us');
                }
            }else{
                $this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
                if($this->input->post('page')=='support_request'){
                    redirect('userpages/support_request');
                }else{
                    redirect('contact_us');
                }
            }
            
        }else{
            $this->session->set_flashdata('error_msg','Unable to process your request. Please try again');
            if($this->input->post('page')=='support_request'){
                redirect('userpages/support_request');
            }else{
                redirect('contact_us');
            }
        }
    }

    public function send_mail($_POST) {
        //print_r($_POST);die;
        $email_data['name'] = $_POST['name'];
        $email_data['from'] = $this->config->item('from_mail'); 
        $email_data['email'] = $_POST['email'];
        $email_data['phone'] = $_POST['phone'];
        $email_data['to'] = $this->config->item('contact_us_mail');
        $email_data['email_header']=$email_data['subject'] = 'EdealSpot Contact Us - '.$_POST['subject'];
        $email_data['message'] = $_POST['message'];
        $email_data['content'] = $this->load->view('email_templates/contactus', $email_data, true);
        $result = $this->mail_model->send_mail($email_data);
        return $result;
    }

}

?>