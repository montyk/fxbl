<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class users_settings_lib{
    private $id;
    private $users_id;
    private $languages_id;
    private $time_zones_id;
    private $communicate_lang;
    private $time_zone;
    private $time_to_call;
    private $newsletter;
    private $ip_security;
    private $security_questions_id;
    private $security_answer;
    private $date_added;
    private $last_modified;
	private $last_modified_by;
	private $created_by;
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

    public function getLanguages_id() {
        return $this->languages_id;
    }

    public function setLanguages_id($languages_id) {
        $this->languages_id = $languages_id;
    }
    
    public function getCommunicate_lang() {
        return $this->communicate_lang;
    }

    public function setCommunicate_lang($communicate_lang) {
        $this->communicate_lang = $communicate_lang;
    }
    
    public function getTime_zones_id() {
        return $this->time_zones_id;
    }

    public function setTime_zones_id($time_zones_id) {
        $this->time_zones_id = $time_zones_id;
    }

    public function getTime_zone() {
        return $this->time_zone;
    }

    public function setTime_zone($time_zone) {
        $this->time_zone = $time_zone;
    }
    
    public function getTime_to_call() {
        return $this->time_to_call;
    }

    public function setTime_to_call($time_to_call) {
        $this->time_to_call = $time_to_call;
    }

    public function getNewsletter() {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;
    }

    public function getIp_security() {
        return $this->ip_security;
    }

    public function setIp_security($ip_security) {
        $this->ip_security = $ip_security;
    }

    public function getSecurity_questions_id() {
        return $this->security_questions_id;
    }

    public function setSecurity_questions_id($security_questions_id) {
        $this->security_questions_id = $security_questions_id;
    }

    public function getSecurity_answer() {
        return $this->security_answer;
    }

    public function setSecurity_answer($security_answer) {
        $this->security_answer = $security_answer;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    public function getLast_modified() {
        return $this->last_modified;
    }

    public function setLast_modified($last_modified) {
        $this->last_modified = $last_modified;
    }
	
	public function getLast_modified_by() {
        return $this->last_modified_by;
    }

    public function setLast_modified_by($last_modified_by) {
        $this->last_modified_by = $last_modified_by;
    }
	
	public function getCreated_by() {
        return $this->created_by;
    }

    public function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }
	
	public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }
}
?>
