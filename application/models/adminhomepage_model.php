<?php

class Adminhomepage_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_home_page_sections($useCache=TRUE,$post=array()) {
        $sqlWhere='';
        if(!empty($post['language_id'])){
            $sqlWhere=' AND h.language_id='.$post['language_id'].' ';
        }
        $sql = '
                SELECT h.*, p.title, p.url_key, p.meta_keywords, p.content, p.name AS page_name, lang.abbr
                    FROM home_page AS h
                    LEFT JOIN pages AS p ON p.id=h.page_id
                    LEFT JOIN languages AS lang ON lang.id=p.language_id
                    WHERE 1 AND h.status=1 '.$sqlWhere.' 
                    ORDER BY parent_id, order_num ASC
            ';
        
        /*
         * CACHE PROCESS
         */
        $this->load->driver('cache');
        
        $cacheData = $this->cache->file->get('home_page_cache_data');
//        echo '<pre>'; print_r($menuCacheData); echo '</pre>';
//        echo '<pre>'; var_dump($this->cache->cache_info()); echo '</pre>';
        if ($useCache){
            if(empty($cacheData)) {
                $result = $this->getDBResult($sql);
                if(!empty($result))
                foreach($result as $k=>$v){
                    $result[$k]->href=((!empty($v->url_key))?site_url($v->abbr.'/'.$v->url_key):((!empty($v->custom_url))?$v->custom_url:''));
                }
                $this->cache->file->save('home_page_cache_data',$result , 300);
            }else{
                $result = $cacheData;
            }
        }else{
            $result = $this->getDBResult($sql);
            if(!empty($result))
            foreach($result as $k=>$v){
                $result[$k]->href=((!empty($v->url_key))?site_url($v->abbr.'/'.$v->url_key):((!empty($v->custom_url))?$v->custom_url:''));
            }
        }
        
        return $result;
    }
    
    function save_menus($post = array()) {
        $this->load->library('adminhomepage_lib');
        if (!empty($post['id'])) {
            return $this->saveRecord(conversion($post, 'adminhomepage_lib'), 'home_page', array('id' => $post['id']),FALSE);
        } else {
            return $this->saveRecord(conversion($post, 'adminhomepage_lib'), 'home_page',array(),FALSE);
        }
    }
    
    function delete_menus($post = array()) {
        $this->load->library('adminhomepage_lib');
        if (!empty($post['id'])) {
            $post['status']='0';
            return $this->saveRecord(conversion($post, 'adminhomepage_lib'), 'home_page', array('id' => $post['id']));
        } else {
            return false;
        }
    }
    
    function get_pages($search_term, $language_id=1){
        $sql = '
                SELECT p.* , lang.abbr
                FROM pages AS p
                LEFT JOIN languages AS lang ON lang.id=p.language_id
                WHERE 1 AND (p.name LIKE "%'.$search_term.'%" OR p.url_key LIKE "%'.$search_term.'%") AND  p.language_id='.$language_id.' AND p.status=1
                LIMIT 50
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }

    
    function get_home_page_details($id){
        $sql = '
                SELECT h.*, p.title, p.url_key, p.meta_keywords, p.content, p.name AS page_name
                    FROM home_page AS h
                    LEFT JOIN pages AS p ON p.id=h.page_id
                    WHERE 1 AND h.id='.$id.'
            '; // ORDER BY name ASC
        return $res = $this->getDBResult($sql);
    }

    function get_language_details($id=0){
        $sql = '
                SELECT * 
                FROM languages AS l
                WHERE 1 AND
                l.id='.$id.'
            ';
        return $res = $this->getDBResult($sql);
    }
    
    
    function getnews($where_id = '', $limit = '',$is_promotion=FALSE,$only_banners=FALSE) {
        $ref_id = $this->common_model->getReferenceID('news');
        $userLangID=$this->session->userdata('user_language_id');
        if(!empty($userLangID)){
            $where_id.= " AND n.language_id='$userLangID'  ";
        }
        if($only_banners){
            $where_id.= " AND n.is_banner='1' ";
        }
        $sql = 'select n.id,n.heading,n.description,DATE_FORMAT(n.date_added, "%b %d %Y") as date_added,meta_description, DATE_FORMAT(n.last_modified, "%b %d %Y") as last_modified, 
                    nc.name as cat_name,a.url as attachment, IF(n.is_promotion=1,"Event","News") AS type, DATE_FORMAT(n.from, "%Y-%m-%d") AS `from`, DATE_FORMAT(n.to, "%Y-%m-%d") AS `to`
                    from news n
                    LEFT JOIN news_categories nc on n.news_categories_id=nc.id
                    LEFT JOIN attachments a on a.global_id = n.id and a.reference_id = ' . $ref_id . ' 
                    where n.status=1 ' . $where_id . ' '.(($is_promotion)?' AND is_promotion="1" ':' AND is_promotion="0" ').'
                    order by  '.($only_banners?'n.banner_order_num ASC':'n.last_modified DESC').'    ' . $limit;
        
        $data = $this->getDBResult($sql, 'object');

        return $data;
    }
}

?>
