<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class users_logs_lib{
    private $id;
    private $users_id;
    private $os;
    private $browser;
    private $user_agent;
    private $login_time;
    private $logout_time;
    private $ip_address;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsers_id() {
        return $this->users_id;
    }

    public function setUsers_id($users_id) {
        $this->users_id = $users_id;
    }

    public function getOs() {
        return $this->os;
    }

    public function setOs($os) {
        $this->os = $os;
    }

    public function getBrowser() {
        return $this->browser;
    }

    public function setBrowser($browser) {
        $this->browser = $browser;
    }

    public function getUser_agent() {
        return $this->user_agent;
    }

    public function setUser_agent($user_agent) {
        $this->user_agent = $user_agent;
    }

    public function getLogin_time() {
        return $this->login_time;
    }

    public function setLogin_time($login_time) {
        $this->login_time = $login_time;
    }

    public function getLogout_time() {
        return $this->logout_time;
    }

    public function setLogout_time($logout_time) {
        $this->logout_time = $logout_time;
    }

    public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }
}
?>
