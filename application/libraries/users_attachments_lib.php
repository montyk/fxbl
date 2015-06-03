<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Users_attachments_lib{
    private $id;
    private $attachments_id;
    private $users_id;
    private $last_modified;
    private $ip_address;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAttachments_id() {
        return $this->attachments_id;
    }

    public function setAttachments_id($attachments_id) {
        $this->attachments_id = $attachments_id;
    }

    public function getUsers_id() {
        return $this->users_id;
    }

    public function setUsers_id($users_id) {
        $this->users_id = $users_id;
    }

    public function getLast_modified() {
        return $this->last_modified;
    }

    public function setLast_modified($last_modified) {
        $this->last_modified = $last_modified;
    }

    public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }
}
?>
