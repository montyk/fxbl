<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminhomepage extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminhomepage_model');
    }

    public function index() {
        $this->load->view('adminhomepage/index');
    }
    
    public function ajax_homepage_list(){
        $post=$this->input->post();
        if(empty($post['language_id'])){
            echo '<div class="big_error">Please select a Language.</div>';
            return;
        }
        $data=$post;
        $data['menus']=$this->adminhomepage_model->get_home_page_sections($this->config->item('cache_page'),$post);
        $this->load->view('adminhomepage/ajax_homepage_list',$data);
    }

    public function get_pages() {
//        $search_term=$this->input->get('search_term'); 
        $search_term=$this->input->post('search_term'); 
        $language_id=$this->input->post('language_id'); 
        $data=$this->adminhomepage_model->get_pages($search_term,$language_id);
        $as_data=array();
        if(!empty($data))
        foreach($data as $k=>$v){
            $json = array();
            $json['value'] = $v->id;
            $json['name'] = $v->name;
            $json['page_link'] = anchor(site_url($v->abbr.'/'.$v->url_key),'Check Page Link','target="_blank"');
            $as_data[] = $json;
        }
        header("Content-type: application/json");
        echo json_encode($as_data);
    }
    
    public function add_menu(){
        $post=$this->input->post(); 
        // echo '<pre>'; print_r($post); echo '</pre>'; die;
        if(!empty($post)){
            if(!empty($post['page_id'])){
                $post['page_id']=trim($post['page_id'],',');
            }
            $this->adminhomepage_model->save_menus($post);
            if(!isset($post['show_in_main_menu'])){
                $this->session->set_flashdata('success_msg','Home page updated successfully.');
                redirect('adminhomepage'.((!empty($post['language_id']))?'#'.$post['language_id']:''));
            }
        }else{
            redirect('adminhomepage'.((!empty($post['language_id']))?'#'.$post['language_id']:''));
        }
    }
    
    public function deletemenu(){
        $post=$this->input->post(); 
        if(!empty($post)){
            $this->adminhomepage_model->delete_menus($post);
        }
    }
    

}

?>