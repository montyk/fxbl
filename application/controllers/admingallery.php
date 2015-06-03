<?php 



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admingallery extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminwidget_model');
    }
    
    function index() {
        $viewData['images']=$this->adminwidget_model->getGalleryImages();
        $this->load->view("admingallery/index",$viewData);
    }
    
    function save_media_gallery(){
        $post=$this->input->post();
        if(empty($post['original_file_name'])){
            $this->session->set_flashdata('error_msg','Please upload a file. Please try again.');
            redirect('admingallery');
        }else if($this->formtoken->validateToken($_POST)) {
            $files = array();
            if (isset($_FILES) && !empty($_FILES)) {
                $files = $_FILES;
            }
            $return_id = $this->adminwidget_model->save_media_gallery($post);
            
            $this->session->set_flashdata('success_msg','Image added to gallery successfully.');
            redirect('admingallery');
        } else {
            die('The form is not valid or has expired.');
        }
    }
    
    
    
}

?>