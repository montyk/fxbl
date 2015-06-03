<?php

class Adminmenus_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_menus($useCache=TRUE,$post=array(),$userLanguageABBR='en',$orderBy='order_num') {
        $sqlWhere='';
        if(!empty($post['language_id'])){
            $sqlWhere=' AND m.language_id='.$post['language_id'].' ';
        }
        
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords, lang.abbr
                FROM menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                LEFT JOIN languages AS lang ON lang.id=m.language_id
                WHERE 1 AND m.status=1 '.$sqlWhere.' 
                ORDER BY parent_id, '.$orderBy.' ASC
            ';
        
        if(!function_exists('findParent')){
            function findParent(&$array,$parent_id,$insertMenu,$insertKey){
                if(!empty($array[$parent_id])){
                    $array[$parent_id]['submenu'][$insertKey]=$insertMenu;
                }else{
                    foreach($array as $k=>$v){
                        if(!empty($array[$k]['submenu']))
                        findParent($array[$k]['submenu'],$parent_id,$insertMenu,$insertKey);
                    }
                }
            }
        }
        
        /*
         * CACHE PROCESS
         */
        $this->load->driver('cache');
        
        $menuCacheData = $this->cache->file->get('menu_cache_data');
//        echo '<pre>'; print_r($menuCacheData); echo '</pre>';
//        echo '<pre>'; var_dump($this->cache->cache_info()); echo '</pre>';
        if ($useCache){
            if(empty($menuCacheData)) {
                $result = $this->getDBResult($sql);
                $this->cache->file->save('menu_cache_data',$result , 300);
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
                $insertMenu=array('href'=>((empty($v->url_key))?$v->custom_url:site_url($v->abbr.'/'.$v->url_key)),'label'=>$v->name,'show_in_main_menu'=>$v->show_in_main_menu,'show_in_footer_menu'=>$v->show_in_footer_menu);
                findParent($menuData,$v->parent_id,$insertMenu,$v->id);
            }else{
                $menuData[$v->id]=array('href'=>((empty($v->url_key))?$v->custom_url:site_url($v->abbr.'/'.$v->url_key)),'label'=>$v->name,'show_in_main_menu'=>$v->show_in_main_menu,'show_in_footer_menu'=>$v->show_in_footer_menu);
            }
        }
        return $menuData;
    }
    
    function save_menus($post = array()) {
        $this->load->library('menus_lib');
        if (!empty($post['id'])) {
            return $this->saveRecord(conversion($post, 'menus_lib'), 'menus', array('id' => $post['id']),FALSE);
        } else {
            return $this->saveRecord(conversion($post, 'menus_lib'), 'menus',array(),FALSE);
        }
    }
    
    function delete_menus($post = array()) {
        $this->load->library('menus_lib');
        if (!empty($post['id'])) {
            $post['status']='0';
            return $this->saveRecord(conversion($post, 'menus_lib'), 'menus', array('id' => $post['id']));
        } else {
            return false;
        }
    }
    
    function get_pages($search_term='', $language_id=1){
        $sql = '
                SELECT p.*, lang.abbr
                FROM pages AS p
                LEFT JOIN languages AS lang ON lang.id=p.language_id
                WHERE 1 AND (p.name LIKE "%'.$search_term.'%" OR p.url_key LIKE "%'.$search_term.'%") AND  p.language_id='.$language_id.' AND p.status=1
                
                LIMIT 50
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }
    
    function get_page_menus($page_id=0,$language_id=1){
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords, lang.abbr
                FROM menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                LEFT JOIN languages AS lang ON lang.id=p.language_id
                WHERE 1 
                    AND m.status=1 AND m.parent_id IN ( SELECT max(parent_id) FROM menus AS m2 WHERE m2.page_id='.$page_id.'  AND m2.language_id='.$language_id.'  ) 
                    AND m.parent_id!=0 AND m.language_id='.$language_id.' 
                ORDER BY parent_id, order_num ASC
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }
    
    function get_menu_details($id){
        $sql = '
                SELECT m.*,p.title,p.url_key,p.meta_keywords, lang.abbr
                FROM menus AS m
                LEFT JOIN pages AS p ON p.id=m.page_id
                LEFT JOIN languages AS lang ON lang.id=p.language_id
                WHERE 1 AND m.id='.$id.'
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }

}

?>
