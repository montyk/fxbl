<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author ENTERPI
 */
class users_lib {
    //put your code here
    private $id;
    private $languages_id;
    private $user_name;
    private $user_email;
    private $user_password;
    private $ip_security;
    private $security_questions_id;
    private $security_answer;
    private $user_fname;
    private $user_lname;
    private $dob;
    private $register_types_id;
    private $company_name;
    private $business_types_id;
    private $user_country;
    private $user_address;
    private $user_city;
    private $user_state;
    private $zipcode;
    private $home_phone;
    private $business_phone;
    private $user_phone;
    private $fax;
    private $communicate_lang;
    private $call_time;
    private $time_zone;
    private $currency_types_id;
    private $ecurrency_number;
    private $ecurrency_name;

    public function get_id() {
        return $this->id;
    }

    public function set_id($languages_id) {
        $this->id = $id;
    }

   public function getLanguages_id() {
        return $this->languages_id;
    }

    public function setLanguages_id($languages_id) {
        $this->languages_id = $languages_id;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    public function getUser_email() {
        return $this->user_email;
    }

    public function setUser_email($user_email) {
        $this->user_email = $user_email;
    }

    public function getUser_password() {
        return $this->user_password;
    }

    public function setUser_password($user_password) {
        $this->user_password = $user_password;
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

    public function getUser_fname() {
        return $this->user_fname;
    }

    public function setUser_fname($user_fname) {
        $this->user_fname = $user_fname;
    }

    public function getUser_lname() {
        return $this->user_lname;
    }

    public function setUser_lname($user_lname) {
        $this->user_lname = $user_lname;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getRegister_types_id() {
        return $this->register_types_id;
    }

    public function setRegister_types_id($register_types_id) {
        $this->register_types_id = $register_types_id;
    }

    public function getCompany_name() {
        return $this->company_name;
    }

    public function setCompany_name($company_name) {
        $this->company_name = $company_name;
    }

    public function getBusiness_types_id() {
        return $this->business_types_id;
    }

    public function setBusiness_types_id($business_types_id) {
        $this->business_types_id = $business_types_id;
    }

    public function getUser_country() {
        return $this->user_country;
    }

    public function setUser_country($user_country) {
        $this->user_country = $user_country;
    }

    public function getUser_address() {
        return $this->user_address;
    }

    public function setUser_address($user_address) {
        $this->user_address = $user_address;
    }

    public function getUser_city() {
        return $this->user_city;
    }

    public function setUser_city($user_city) {
        $this->user_city = $user_city;
    }

    public function getUser_state() {
        return $this->user_state;
    }

    public function setUser_state($user_state) {
        $this->user_state = $user_state;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

    public function getHome_phone() {
        return $this->home_phone;
    }

    public function setHome_phone($home_phone) {
        $this->home_phone = $home_phone;
    }

    public function getBusiness_phone() {
        return $this->business_phone;
    }

    public function setBusiness_phone($business_phone) {
        $this->business_phone = $business_phone;
    }

    public function getUser_phone() {
        return $this->user_phone;
    }

    public function setUser_phone($user_phone) {
        $this->user_phone = $user_phone;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function getCommunicate_lang() {
        return $this->communicate_lang;
    }

    public function setCommunicate_lang($communicate_lang) {
        $this->communicate_lang = $communicate_lang;
    }

    public function getCall_time() {
        return $this->call_time;
    }

    public function setCall_time($call_time) {
        $this->call_time = $call_time;
    }

    public function getTime_zone() {
        return $this->time_zone;
    }

    public function setTime_zone($time_zone) {
        $this->time_zone = $time_zone;
    }

    public function getCurrency_types_id() {
        return $this->currency_types_id;
    }

    public function setCurrency_types_id($currency_types_id) {
        $this->currency_types_id = $currency_types_id;
    }

    public function getEcurrency_number() {
        return $this->ecurrency_number;
    }

    public function setEcurrency_number($ecurrency_number) {
        $this->ecurrency_number = $ecurrency_number;
    }

    public function getEcurrency_name() {
        return $this->ecurrency_name;
    }

    public function setEcurrency_name($ecurrency_name) {
        $this->ecurrency_name = $ecurrency_name;
    }
}
?>
