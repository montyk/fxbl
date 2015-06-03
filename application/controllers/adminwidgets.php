<?php 



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminwidgets extends MY_Controller {

    function __construct() {
        parent::__construct();
        
    }
    
    function index() {
        $viewData['widgets_types']=$this->adminwidget_model->get_widgets_types();
        // echo '<pre>'; print_r($viewData); echo '</pre>';
        $this->load->view("adminwidgets/index",$viewData);
    }
    
    function generate_widget($widget_type=''){
        $post=$this->input->post();
        if(!empty($widget_type) && !empty($post)){
            $viewData=$post;
            if(!empty($post['preview'])){
                $this->load->view("adminwidgets/generate_widget/$widget_type",$viewData);
            }else {
                /*
                 * Save the Widget
                 */
                
                $savePost=$viewData=$post;
                $savePost['form_data'] = base64_encode(serialize($post));
                $savePost['widget_code'] = $this->load->view("adminwidgets/generate_widget/$widget_type", $viewData, TRUE);
                $this->adminwidget_model->save_widgets($savePost);
                
                $this->session->set_flashdata('success_msg', 'Widget Saved Successfully.');
                redirect('adminwidgets/widget_gallery');
            }
        }
    }
    
    
    function widget_gallery(){
        $this->load->view("adminwidgets/widget_gallery");
    }
    
    function widgets_grid(){
        $sql = 'SELECT w.*,wt.name AS widget_type_name, concat("{WIDGET-",LPAD(w.id,5,0),"}") AS embed_code
                        FROM widgets AS w
                        LEFT JOIN widget_types AS wt ON wt.id=w.widget_type_id
                    WHERE 1 
                    AND w.status=1
            ';
        $data_flds = array('name', 'widget_type_name','embed_code', 'status', "<a class='btn edit_ecur ' href='" . site_url() . "adminwidgets/edit_widget_gallery/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>", "<a class='btn edit_ecur jdelete_widget' id='{%id%}'><span class='inner-btn'><span class='label'>Delete</span></span></a>");
//        $data_flds = array('name', 'widget_type_name','embed_code', 'status', "Edit", "Delete");
        echo $this->users_model->display_grid($_POST, $sql, $data_flds);
    }
    
    
    function delete_widget($id=0){
        if(!empty($id)){
            $this->adminwidget_model->delete_widget($id);
            $this->session->set_flashdata('success_msg', 'Widget Deleted.');
            redirect('adminwidgets/widget_gallery');
        }else{
            $this->session->set_flashdata('error_msg', 'Widget Not Found, Please try again.');
            redirect('adminwidgets/widget_gallery');
        }
    }
    
    function edit_widget_gallery($id=0){
        if(!empty($id)){
            $widget_data=$this->adminwidget_model->get_widget_details($id);
//            echo '<pre>'; print_r($widget_data); echo '</pre>';
            if(!empty($widget_data)){
                $viewData['widget_data']=$widget_data[0];
                // echo $widget_data[0]->form_data;
                $form_data = base64_decode($widget_data[0]->form_data);
                $form_data = preg_replace ( '!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'",$form_data );
                $viewData['form_data'] = unserialize($form_data);
                // echo '<pre>'; print_r($viewData['form_data']); echo '</pre>';
                
                $this->load->view("adminwidgets/edit_widget_gallery",$viewData);
            }else{
                $this->session->set_flashdata('error_msg', 'Widget Not Found, Please try again.');
                redirect('adminwidgets/widget_gallery');
            }
        }
    }
    
    
}

?>