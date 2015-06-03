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
class Test_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function test_saveRecord($post,$table,$lib){
        if (!empty($post['id'])) {
            echo 1;
            
            return $this->saveRecord(conversion($post, $lib), $table, array('id' => $post['id']));
        } else {
            // echo '<pre>'; print_r(conversion($post, $lib)); echo '</pre>';
            echo 2;
            return $this->saveRecord(conversion($post, $lib), $table);
        }
    }
    
    function test_getDBResult($sql,$objArr) {
        $data = $this->getDBResult($sql, $objArr);
        return $data;
    }
    
    function save($post,$table){
        $this->db->insert($table,$post);
        // echo $SQL='INSERT INTO test (content) VALUES ("'.$post['content'].'")';
        // $this->db->query($SQL);
    }

}