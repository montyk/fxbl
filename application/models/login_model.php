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
class Login_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function save_login($post) {
        return $this->saveRecord(conversion($post, 'login_lib'), 'login');
    }

    function display_grid($postvals, $sql, $array_fields) {
        return $this->jqgrid($postvals, $sql, $array_fields);
    }

    function select_login($id) {
        $sql = "select * from login where id='" . $id . "' ";
        return $this->getDBResult($sql, 'object');
    }

    function login($post) {
        $sql = "select * from users
                where email='" . $this->db->escape_str($post['login_name']) . "'
                and password = '" . $this->db->escape_str($post['user_password']) . "'
                and varification_status = '1' ";
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            $user_details = $rs->first_row();
            $user_details_serialized = serialize($user_details);
            $this->session->set_userdata('user_details', $user_details_serialized);
            $browser = new Browser();
            $data['users_id'] = $user_details->id;
            $data['login_time'] = gmdate("Y-m-d H:i:s", time());
            $data['browser'] = $browser->getBrowser();
            $data['version'] = $browser->getVersion();
            $data['os'] = $browser->getPlatform();
            $data['is_robot'] = $browser->isRobot() ? 'Y' : 'N';
            $data['user_agent'] = $browser->getUserAgent();
            $data['is_chrome_frame'] = $browser->isChromeFrame() ? 'Y' : 'N';
            $login_trace_id = $this->saveRecord(conversion($data, 'login_trace'), 'login_trace');
            $this->session->set_userdata('login_trace_id', $login_trace_id);
            return true;
        } else {
            return false;
        }
    }
    function login_web($post) {
       $sql = "select * from users
                where login='" . $this->db->escape_str($post['login_name']) . "'
                ";
        $rs = $this->db->query($sql);
		
        if ($rs->num_rows() > 0) {
            $user_details = $rs->first_row();
            $user_details_serialized = serialize($user_details);
            $this->session->set_userdata('user_details', $user_details_serialized);
			$this->session->set_userdata('mql_login', $post);
            $browser = new Browser();
            $data['users_id'] = $user_details->id;
            $data['login_time'] = gmdate("Y-m-d H:i:s", time());
            $data['browser'] = $browser->getBrowser();
            $data['version'] = $browser->getVersion();
            $data['os'] = $browser->getPlatform();
            $data['is_robot'] = $browser->isRobot() ? 'Y' : 'N';
            $data['user_agent'] = $browser->getUserAgent();
            $data['is_chrome_frame'] = $browser->isChromeFrame() ? 'Y' : 'N';
            $login_trace_id = $this->saveRecord(conversion($data, 'login_trace'), 'login_trace');
            $this->session->set_userdata('login_trace_id', $login_trace_id);
            return true;
        } else {

            $user_details->id = 999999;


            $info = explode("\r\n", $res);
            $user_details->login = $post['login_name'];
            $user_details->password = $post['user_password'];
            $user_details->firstname = 'Username';
            $user_details->lastname = 'Account';

            $user_details_serialized = serialize($user_details);
            $this->session->set_userdata('user_details', $user_details_serialized);
            $this->session->set_userdata('mql_login', $post);
            $browser = new Browser();
            $data['users_id'] = $user_details->id;
            $data['login_time'] = gmdate("Y-m-d H:i:s", time());
            $data['browser'] = $browser->getBrowser();
            $data['version'] = $browser->getVersion();
            $data['os'] = $browser->getPlatform();
            $data['is_robot'] = $browser->isRobot() ? 'Y' : 'N';
            $data['user_agent'] = $browser->getUserAgent();
            $data['is_chrome_frame'] = $browser->isChromeFrame() ? 'Y' : 'N';
            $login_trace_id = $this->saveRecord(conversion($data, 'login_trace'), 'login_trace');
            $this->session->set_userdata('login_trace_id', $login_trace_id);
            return false;
        }
    } 
    function is_user_unverified($post){
        $sql = "select * from users
                where email='" . $this->db->escape_str($post['login_name']) . "'
                and password = '" . $this->db->escape_str($post['user_password']) . "'
                and varification_status = '0' ";
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    
    public function send_password($post) {
        $sql = 'select id,concat(firstname," ",lastname)as name,password from users where email="' . $this->db->escape_str($post['login_name']) . '"';
        $pwd_data = $this->getDBResult($sql, 'object');
        return $pwd_data;
    }

    public function logout() {
//        $login_trace_id = $this->session->userdata['login_trace_id'];
        $login_trace_id = $this->session->userdata('login_trace_id');
        if ($login_trace_id) {
            $sql = 'UPDATE `login_trace` SET `logout_time`="' . gmdate("Y-m-d H:i:s", time()) . '" WHERE  `id`=' . $login_trace_id . ' LIMIT 1';
            $this->db->query($sql);
        }
        $this->session->sess_destroy();
    }

}

