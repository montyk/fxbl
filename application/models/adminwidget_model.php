<?php

class Adminwidget_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function get_widgets_types(){
        $sql = 'SELECT wt.*
                        FROM widget_types AS wt
                    WHERE 1 
                    AND wt.status=1
            ';
        return $this->getDBResult($sql);
    }


    function save_widgets($post) {
        $this->load->library('widgets_lib');
        if ($post['id']) {
            return $this->saveRecord(conversion($post, 'widgets_lib'), 'widgets', array('id' => $post['id']), false);
        } else {
            return $this->saveRecord(conversion($post, 'widgets_lib'), 'widgets', array(), false);
        }
    }

    /*
     * For Image Gallery
     */
    function save_media_gallery($post = array()) {
//        $this->load->library('media_gallery_lib');
//        if ($post['id']) {
//            $post['n_id'] = $n_id = $this->saveRecord(conversion($post, 'media_gallery_lib'), 'media_gallery', array('id' => $post['id']));
//        } else {
//            $post['n_id'] = $n_id = $this->saveRecord(conversion($post, 'media_gallery_lib'), 'media_gallery');
//        }
        if (isset($post['original_file_name']) && !empty($post['original_file_name'])) {
            
            $db_file_name = ((isset($post['db_file_name'])) ? $post['db_file_name'] : '');
            $original_file_name = $post['original_file_name'];
            $url = 'uploads/' . ((isset($post['db_file_name'])) ? $post['db_file_name'] : '');
            $_POST['attachments_id'] = $this->fileupload_model->save_media_gallery($post['name'],$db_file_name, $original_file_name);
            
        }
        
    }
    
    function getGalleryImages(){
        $sql="
              SELECT * FROM media_gallery AS mg
              WHERE 1 AND mg.status=1
            ";
        return $this->getDBResult($sql);
    }
    
    function get_widgets_template(){
        $sql = 'SELECT w.*,wt.name AS widget_type_name, concat("WIDGET-",LPAD(w.id,5,0)) AS embed_code_text
                        FROM widgets AS w
                        LEFT JOIN widget_types AS wt ON wt.id=w.widget_type_id
                    WHERE 1 
                    AND w.status=1
            ';
        $widgets=$this->getDBResult($sql);
        
        $parseData=array();
        if(!empty($widgets))
        foreach ($widgets as $key => $value) {
            $parseData[$value->embed_code_text]=  filterStringDecode($value->widget_code);
        }
        return $parseData;
    }
    
    function delete_widget($id=0){
        if(!empty($id)){
            $sql = 'DELETE FROM widgets
                    WHERE 1
                    AND id='.$id.'
            ';
            return $this->db->query($sql);
        }
    }
    
    function get_widget_details($id=0){
        if(!empty($id)){
            $sql = 'SELECT w.*,wt.name AS widget_type_name, wt.view_file, concat("WIDGET-",LPAD(w.id,5,0)) AS embed_code_text
                        FROM widgets AS w
                        LEFT JOIN widget_types AS wt ON wt.id=w.widget_type_id
                    WHERE 1 
                    AND w.status=1 
                    AND w.id='.$id.'
            ';
            return $widgets=$this->getDBResult($sql);
        }
    }
    
    
    
}

?>