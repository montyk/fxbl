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
class Liberty_account_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function save_la($post) {
        if ($post['id']) {
            return $this->saveRecord(conversion($post, 'accounts_lib'), 'accounts', array('id' => $post['id']));
        } else {
            return $this->saveRecord(conversion($post, 'accounts_lib'), 'accounts');
        }
    }

    function account_view($id = 0) {
        $sql = 'SELECT * FROM accounts where id=' . $id;
        return $this->getDBResult($sql, 'object');
    }

    function getLAdata() {
        $sql = 'SELECT id,name,account_number,
				CASE WHEN status =1 THEN "Active" ELSE "Inactive" END as status 
				FROM accounts';
        $data_flds = array('name', 'account_number', 'status', "<a class='btn edit_ecur' href='" . site_url() . "adminlibaccount/account_view/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
        return $this->users_model->display_grid($_POST, $sql, $data_flds);
    }

}