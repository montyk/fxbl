<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author RAJU
 */
class Pages_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function save_page($post = array()) {
        //preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower($post['name']));
        $checkPageUnique = $this->checkPageUnique($post);
        if (!empty($checkPageUnique)) {
            return '0';
        }

        $post['url_key'] = str_replace(' ', '-', preg_replace('!\s+!', ' ', preg_replace("/[^a-zA-Z0-9\s]/", "", trim($post['name']))));

        if ($post['id']) {
            $pages_id=$this->saveRecord(conversion($post, 'pages_lib'), 'pages', array('id' => $post['id']), FALSE);
              if (isset($post['original_file_name']) && !empty($post['original_file_name']) && $post['id'] != 0) {
                  $this->common_model->delete_pages_attachnments($post['id']);
                 $attachments_id = $this->fileupload_model->save_pages_attachnments($post['id'], $post['db_file_name'], $post['original_file_name']); 
                  
              }
            
            return $pages_id;
        } else {
            $pages_id = $this->saveRecord(conversion($post, 'pages_lib'), 'pages', array(), FALSE);
            if (isset($post['db_file_name']) && !empty($post['db_file_name'])) {
                $attachments_id = $this->fileupload_model->save_pages_attachnments($pages_id, $post['db_file_name'], $post['original_file_name']);
            }
            return $pages_id;
        }
    }

    function checkPageUnique($post) {
        $sql = "SELECT * FROM pages WHERE language_id=" . $post['language_id'] . " AND name='" . $post['name'] . "' AND id!=" . $post['id'] . " ";
        return $this->getDBResult($sql, 'object');
    }

    function page_details($pageid = 0) {
        $sql = "select * from pages where id='" . $pageid . "'";
        return $this->getDBResult($sql, 'object');
    }

    function getpagesdata() {
        $sql = 'select p.id as id,p.name as name,p.url_key as url_key,
                    l.name AS language_name, l.abbr,plaintext, 
                    CASE WHEN p.status =1 THEN "Active" ELSE "Inactive" END as status_name 
                    FROM pages AS p 
                    LEFT JOIN languages AS l ON l.id=p.language_id
                    WHERE 1 ';

        if (!empty($_POST['name'])) {
            $sql.=' AND p.name LIKE "%' . $_POST['name'] . '%"';
        }
        if (!empty($_POST['title'])) {
            $sql.=' AND p.title LIKE "%' . $_POST['title'] . '%"';
        }
        if (!empty($_POST['url_key'])) {
            $sql.=' AND p.url_key LIKE "%' . $_POST['url_key'] . '%"';
        }
        if (!empty($_POST['language_id'])) {
            $sql.=' AND p.language_id=' . $_POST['language_id'] . ' ';
        }

        $data_flds = array('name', 'language_name', 'status_name', "<a class='btn edit_ecur' href='" . site_url() . "adminpages/add_page/{%id%}' page_id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>", "<a class='btn edit_ecur' href='" . site_url() . "{%abbr%}/{%url_key%}' page_id='{%id%}'><span class='inner-btn'><span class='label'>Link</span></span></a>");
        return $this->users_model->display_grid($_POST, $sql, $data_flds);
    }

    function getpagedet($url_key = '', $language_id = 1) {
        $sql = 'select id, name, title, url_key, meta_keywords, meta_description, content,url_key,plaintext
                    from pages 
                    where url_key = "' . $url_key . '" AND language_id = "' . $language_id . '" ';
        $data = $this->getDBResult($sql, 'object');

        return $data;
    }
     function getpagedet_atta($url_key = '', $language_id = 1) {
                 $sql = 'select p.id, p.name, p.title, p.url_key, p.meta_keywords, p.meta_description, p.content,p.url_key,p.plaintext,patt.url
                    from pages as p left join pages_attachnments as patt on p.id=patt.pages_id
                    where p.status="1" and p.url_key = "' . $url_key . '" AND p.language_id = "' . $language_id . '" ';
        $data = $this->getDBResult($sql, 'object');

        return $data;
    }

}
