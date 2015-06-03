<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class login_trace {
    private $id;
    private $users_id;
    private $login_time;
    private $logout_time;
    private $browser;
    private $version;
    private $os;
    private $is_robot;
    private $user_agent;
    private $is_chrome_frame;
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

    public function getBrowser() {
        return $this->browser;
    }

    public function setBrowser($browser) {
        $this->browser = $browser;
    }

    public function getVersion() {
        return $this->version;
    }

    public function setVersion($version) {
        $this->version = $version;
    }

    public function getOs() {
        return $this->os;
    }

    public function setOs($os) {
        $this->os = $os;
    }

    public function getIs_robot() {
        return $this->is_robot;
    }

    public function setIs_robot($is_robot) {
        $this->is_robot = $is_robot;
    }

    public function getUser_agent() {
        return $this->user_agent;
    }

    public function setUser_agent($user_agent) {
        $this->user_agent = $user_agent;
    }

    public function getIs_chrome_frame() {
        return $this->is_chrome_frame;
    }

    public function setIs_chrome_frame($is_chrome_frame) {
        $this->is_chrome_frame = $is_chrome_frame;
    }

    public function getIp_address() {
        return $this->ipaddress;
    }

    public function setIp_address($ipaddress) {
        $this->ipaddress = $ipaddress;
    }
}
?>
