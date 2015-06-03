<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminsettings extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminsettings_model');
    }

    public function index() {
        $data['settings'] = $this->adminsettings_model->get_settings($this->config->item('cache_settings'));
        $this->load->view('adminsettings/index', $data);
    }

    public function save_settings() {
        $post = $this->input->post();
        if (!empty($post)) {
            echo '<pre>'; print_r($post); echo '</pre>';
            foreach($post['setting'] as $k=>$v){
                $savePost=$v;
                $savePost['id'] = trim($k);
                $this->adminsettings_model->save_settings($savePost);
            }
            $this->session->set_flashdata('success_msg', 'Settings updated successfully.');
            redirect('adminsettings');
        } else {
            redirect('adminsettings');
        }
    }

    public function edit_dropdowns(){
        $post=$this->input->post();
        if($post && !empty($post['dropdown'])){
            $dropdownTable= generalId('table_name', 'sb_dropdown_tables', 'id', $post['dropdown']);
            $data['dropdown_data']=$this->adminsettings_model->get_dropdown_data($dropdownTable);
            $this->load->view('adminsettings/dropdown_edit',$data);
        }else{
            $this->load->view('adminsettings/edit_dropdowns');
        }
    }
    
    public function save_dropdown(){
        $post=$this->input->post();
        if($post && !empty($post['dropdown'])){
            $tableName=  generalId('table_name', 'sb_dropdown_tables', 'id', $post['dropdown']);
            if($tableName)
            echo $this->adminsettings_model->save_dropdown($post,$tableName);
        }
    }








    /*
     * FOr Testing Email Templates
     */
    public function test_email(){
        error_reporting(E_ALL);
        $userDetails=$this->users_model->user_details(1);
        $email_data['login_details'] = array(
            'login_id'=>$userDetails[0]->login,
            'password'=>$userDetails[0]->password,
            'investor_password'=>$userDetails[0]->password,
            'login_server'=>'Real 3'
        );
        $email_data['login_id']=$userDetails[0]->login;
        $email_data['password']=$userDetails[0]->password;
        $email_data['from'] = $this->config->item('from_mail');
        $email_data['to'] = $this->db->escape_str($this->input->get('to'));
        $email_data['subject'] = 'ForexRay - Welcome to ForexRay '.ucfirst($userDetails[0]->firstname).'. Your Account Details';
        $email_data['email_header'] = 'ForexRay - Welcome to ForexRay. Your Account Details';
        $email_data['name'] = ucfirst($userDetails[0]->firstname);
        $email_data['content'] = $this->load->view('email_templates/template_2/after_verification', $email_data, true);
        $result = $this->mail_model->send_mail($email_data);
    }
    
    
}

?>