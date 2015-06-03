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
class Pamm_funds_history_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function add_funds($post) {
            return $this->saveRecord(conversion($post, 'pamm_funds_history_lib'), 'pamm_funds_history',array(),false);
           }
           
    
}

