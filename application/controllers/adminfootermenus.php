<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminfootermenus extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminfootermenus_model');
    }

    public function index() {
        $data['menus']=$this->adminfootermenus_model->get_menus(FALSE);
        $this->load->view('adminfootermenus/index',$data);
    }

    public function get_pages() {
//        $search_term=$this->input->get('search_term'); 
        $search_term=$this->input->post('search_term'); 
        $data=$this->adminfootermenus_model->get_pages($search_term);
        $as_data=array();
        if(!empty($data))
        foreach($data as $k=>$v){
            $json = array();
            $json['value'] = $v->id;
            $json['name'] = $v->name;
            $json['page_link'] = anchor(site_url('en/'.$v->url_key),'Check Page Link','target="_blank"');
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
            $this->adminfootermenus_model->save_menus($post);
            if(!isset($post['ajax_update'])){
                redirect('adminfootermenus');
            }
        }else{
            redirect('adminfootermenus');
        }
    }
    
    public function deletemenu(){
        $post=$this->input->post(); 
        if(!empty($post)){
            $this->adminfootermenus_model->delete_menus($post);
        }
    }
    
    public function edit_menu($id=0){
        if(!empty($id)){
            $data=$this->adminfootermenus_model->get_menu_details($id);
            // echo '<pre>'; print_r($data); echo '</pre>';
            $this->load->view('adminfootermenus/edit_menu',$data[0]);
        }else{
            redirect('adminfootermenus');
        }
    }

}

?>