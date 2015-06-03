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
class Contactus_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function save_cs($post) {
        if ($post['id']) {
            return $this->saveRecord(conversion($post, 'contactus_lib'), 'contactus', array('id' => $post['id']),false);
        } else {
            return $this->saveRecord(conversion($post, 'contactus_lib'), 'contactus',array(),false);
        }
    }

    function contactus_details($id = 0) {
        $sql = "select * from contactus where id='" . $id . "'";
        return $this->getDBResult($sql, 'object');
    }

    function getcontactusdata() {
        $sql = 'select id,name,subject,email,DATE_FORMAT(date_added, "%m/%d/%y") as date_added from contactus';
        $data_flds = array('email', 'name', 'date_added', "<a class='btn edit_ecur jview'  id='{%id%}'><span class='inner-btn'><span class='label'>View</span></span></a>", "<a class='btn edit_ecur' href='" . site_url() . "admincontactus/reply_mail/{%id%}'  id='{%id%}' email='{%email%}' subject = '{%subject%}'><span class='inner-btn'><span class='label'>Reply</span></span></a>");
        return $this->users_model->display_grid($_POST, $sql, $data_flds);
    }

    function save_sent_mail($post) {
        return $this->saveRecord(conversion($post, 'sent_mails_lib'), 'sent_mails');
    }

}