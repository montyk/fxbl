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
class Payment_log_model extends MY_Model { 
//put your code here
    public function __construct() {
        parent::__construct();
    }

       function save_log($post=array()) {
        if($post['id'] != 0)
        {
            $log_id = $this->saveRecord(conversion($post,'payment_log_lib'),'payment_log',array('id'=>$post['id']));
        }
        else
        {
            $post['log_id'] = $log_id = $this->saveRecord(conversion($post,'payment_log_lib'),'payment_log');
        }
         return $log_id;
    }
 
    
}