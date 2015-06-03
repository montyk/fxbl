<?php

class Adminsettings_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_settings($useCache = TRUE) {
        $sql = '
                SELECT * FROM settings
            ';

        /*
         * CACHE PROCESS
         */
        $this->load->driver('cache');

        $cacheData = $this->cache->file->get('settings_cache_data');
//        echo '<pre>'; print_r($cacheData); echo '</pre>';
//        echo '<pre>'; var_dump($this->cache->cache_info()); echo '</pre>';
        if ($useCache) {
            if (empty($cacheData)) {
                $result = $this->getDBResult($sql);
                $this->cache->file->save('settings_cache_data', $result, 300);
            } else {
                $result = $cacheData;
            }
        } else {
            $result = $this->getDBResult($sql);
        }

        return $result;
    }

    function save_settings($post = array()) {
        $this->load->library('settings_lib');
        if (!empty($post['id'])) {
            return $this->saveRecord(conversion($post, 'settings_lib'), 'settings', array('id' => $post['id']));
        } else {
            return $this->saveRecord(conversion($post, 'settings_lib'), 'settings');
        }
    }

    function get_dropdown_data($table=''){
        if(!empty($table)){
            $sql='
                SELECT sb.*
                    FROM '.$table.' AS sb
                
            ';
            $res=$this->db->query($sql);
            return $res->result();
        }
    }
    
    function save_dropdown($post = array(),$tableName) {
        $this->load->library('dropdown_lib');
        if (!empty($post['id'])) {
            return $this->saveRecord(conversion($post, 'dropdown_lib'), $tableName, array('id' => $post['id']));
        } else {
            return $this->saveRecord(conversion($post, 'dropdown_lib'), $tableName);
        }
    }

    
}

?>
