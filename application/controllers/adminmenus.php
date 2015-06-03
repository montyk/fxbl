<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminmenus extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminmenus_model');
    }

    public function index() {
        $this->load->view('adminmenus/index');
    }

    public function ajax_menu_list(){
        $post=$this->input->post();
        if(empty($post['language_id'])){
            echo '<div class="big_error">Please select a Language.</div>';
            return;
        }
        $data=$post;
        $data['menus']=$this->adminmenus_model->get_menus(FALSE,$post);
        $this->load->view('adminmenus/ajax_menu_list',$data);
    }
    
    public function get_pages() {
//        $search_term=$this->input->get('search_term'); 
        $search_term=$this->input->post('search_term'); 
        $language_id=$this->input->post('language_id'); 
        $data=$this->adminmenus_model->get_pages($search_term,$language_id);
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
            if(!empty($post['as_values_page_id'])){
                $post['page_id']=trim($post['as_values_page_id'],',');
            }
            $this->adminmenus_model->save_menus($post);
            if(!isset($post['ajax_update'])){
                redirect('adminmenus'.((!empty($post['language_id']))?'#'.$post['language_id']:''));
            }
        }else{
            redirect('adminmenus'.((!empty($post['language_id']))?'#'.$post['language_id']:''));
        }
    }
    
    public function deletemenu(){
        $post=$this->input->post(); 
        if(!empty($post)){
            $this->adminmenus_model->delete_menus($post);
        }
    }
    
    public function edit_menu($id=0){
        if(!empty($id)){
            $data=$this->adminmenus_model->get_menu_details($id);
            // echo '<pre>'; print_r($data); echo '</pre>';
            $this->load->view('adminmenus/edit_menu',$data[0]);
        }else{
            redirect('adminmenus');
        }
    }

}

?>