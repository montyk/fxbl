<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    var $user_details;
    
    private $arrSessionLess = array(
                                    'signup','testimonials','contact_us',
                                    'uploadify','pages','en','home','fn','ru','welcome','news','registration','fileupload','pamm_manager','forgotpassword','register','createaccountform','updatebalance','payment',
                                    );
    
    private $staffUrls=array('staff','userpages','otp','otpmessage');
    
    private $adminUrls=array(
        'orders','users','adminpages','admincontactus','adminsendmail','admintestimonials',
        'adminnews','adminecurrency','adminpayment','adminrates','adminlibaccount','adminmenus','adminfootermenus','adminhomepage',
        'adminsettings','adminwidgets','admingallery','adminusers','adminwithdrawal_requests'
    );

    function __construct() {
	set_time_limit(60); 
        parent::__construct();
        
        $userLangID=$this->session->userdata('user_language_id');
        $userLanguageABBR=$this->session->userdata('user_language_abbr');
        if(empty($userLangID)){ $this->session->set_userdata('user_language_id', 1); }
        if(empty($userLanguageABBR)){ $this->session->set_userdata('user_language_abbr', 'en'); }
        
        $this->user_details = unserialize($this->session->userdata('user_details'));

        $userDetails = unserialize($this->session->userdata('user_details'));
        // echo '<pre>'; print_r($userDetails); echo '</pre>'; die;
        
        $controllerUrlSegment=$this->uri->segment(1);
        $controllerUrlSegment2=$this->uri->segment(2);
        
        
        if(!empty($controllerUrlSegment) && !in_array($controllerUrlSegment, $this->arrSessionLess)){
            if($controllerUrlSegment=='login' || $controllerUrlSegment2=='logout'){
                // Continue; 
            }else if(empty($this->user_details)){
                redirect('login');
            }else if (!empty($userDetails->user_type) && $userDetails->user_type == 'a') {
                if (in_array($controllerUrlSegment, $this->staffUrls) || !in_array($controllerUrlSegment, $this->adminUrls)) {
                    redirect('adminpages');
                }
            } else if (!empty($userDetails->user_type) && $userDetails->user_type == 'u') {
                if (in_array($controllerUrlSegment, $this->adminUrls) || !in_array($controllerUrlSegment, $this->staffUrls)) {
                    redirect('userpages');
                }
            }
        }
        
        /*
        if(!empty($controllerUrlSegment) && !in_array($controllerUrlSegment, $this->arrSessionLess)){
            if(empty($this->user_details)){
                redirect('login');
            }else if (!empty($userDetails->user_type) && $userDetails->user_type == 'a') {
                if (in_array($controllerUrlSegment, $this->staffUrls) || !in_array($controllerUrlSegment, $this->adminUrls)) {
                    redirect('users/usersgrid');
                }
            } else if (!empty($userDetails->user_type) && $userDetails->user_type == 'u') {
                if (in_array($controllerUrlSegment, $this->adminUrls) || !in_array($controllerUrlSegment, $this->staffUrls)) {
                    redirect('staff/index');
                }
            }
        }
        */

        /* if (!$this->db_session->userdata('userObj') and !in_array($this->uri->segment(1),$this->arrSessionLess))
          {
          redirect('login');
          }

          $this->output->enable_profiler(false); */
    }

    function do_upload() {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';


        $this->load->library('upload', $config);
        $ext = $this->upload->get_extension($_FILES['userfile']['name']);
        $temp_name = time() . $ext;
        $org_name = $_FILES['userfile']['name'];
        $_FILES['userfile']['name'] = $temp_name;

        if (!$this->upload->do_upload('userfile')) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data(), 'original_name' => $org_name);
        }
        /* echo '<pre>';
          print_r($data);die; */
        return $data;
    }

    function fileDownload($attach_id) {
        $result = $this->db->query("select id,db_file_name,original_file_name from attachments where id='" . $attach_id . "'");

        $dir = 'uploads/';
        if (is_numeric($attach_id)) {
            if ($result->num_rows() > 0) {
                $row = $result->row();
                $file = $dir . $row->db_file_name;
                header("Content-type: application/force-download");
                header("Content-Transfer-Encoding: Binary");
                header("Content-length: " . filesize($file));
                header("Content-disposition: attachment; filename=" . html_entity_decode(str_replace(' ', '_', $row->original_file_name)));
                readfile("$file");
            }
        } else {
            echo "No file selected";
        }
    }

}

