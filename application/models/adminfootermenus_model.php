<?php

class Adminfootermenus_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_menus($useCache=TRUE) {
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords
                FROM footer_menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                WHERE 1 AND m.status=1
                ORDER BY parent_id, order_num ASC
            ';
        
        
        /*
         * CACHE PROCESS
         */
        $this->load->driver('cache');
        
        $menuCacheData = $this->cache->file->get('footer_menu_cache_data');
//        echo '<pre>'; print_r($menuCacheData); echo '</pre>';
//        echo '<pre>'; var_dump($this->cache->cache_info()); echo '</pre>';
        if ($useCache){
            if(empty($menuCacheData)) {
                $result = $this->getDBResult($sql);
                $this->cache->file->save('footer_menu_cache_data',$result , 300);
//                echo 'FROM DB';
            }else{
                $result = $menuCacheData;
//                echo 'FROM CACHE';
            }
        }else{
            $result = $this->getDBResult($sql);
        }
        
        
        $menuData=array();
        // echo '<pre>'; print_r($result); echo '</pre>';
        if(!empty($result))
        foreach($result as $k=>$v){
            if(!empty($v->parent_id)){
                $insertMenu=array('href'=>((empty($v->url_key))?$v->custom_url:site_url('en/'.$v->url_key)),'label'=>$v->name,'show_in_main_menu'=>$v->show_in_main_menu);
//                findParent($menuData,$v->parent_id,$insertMenu,$v->id);
            }else{
                $menuData[$v->id]=array('href'=>((empty($v->url_key))?$v->custom_url:site_url('en/'.$v->url_key)),'label'=>$v->name,'show_in_main_menu'=>$v->show_in_main_menu);
            }
        }
        return $menuData;
    }
    
    function save_menus($post = array()) {
        $this->load->library('footer_menus_lib');
        if (!empty($post['id'])) {
            return $this->saveRecord(conversion($post, 'footer_menus_lib'), 'footer_menus', array('id' => $post['id']),FALSE);
        } else {
            return $this->saveRecord(conversion($post, 'footer_menus_lib'), 'footer_menus',array(),FALSE);
        }
    }
    
    function delete_menus($post = array()) {
        $this->load->library('footer_menus_lib');
        if (!empty($post['id'])) {
            $post['status']='0';
            return $this->saveRecord(conversion($post, 'footer_menus_lib'), 'footer_menus', array('id' => $post['id']));
        } else {
            return false;
        }
    }
    
    function get_pages($search_term){
        $sql = '
                SELECT p.* 
                FROM pages AS p
                WHERE 1 AND p.name LIKE "%'.$search_term.'%" OR p.url_key LIKE "%'.$search_term.'%" AND p.status=1
                
                LIMIT 50
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }
    
    function get_page_menus($page_id){
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords
                FROM footer_menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                WHERE 1 AND m.status=1 AND m.parent_id IN ( SELECT max(parent_id) FROM footer_menus AS m2 WHERE m2.page_id='.$page_id.' ) AND m.parent_id!=0 
                ORDER BY parent_id ASC
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }
    
    function get_menu_details($id){
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords
                FROM footer_menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                WHERE 1 AND m.id='.$id.'
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }

}

?>
