<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class users_ecurrencies_lib{
    private $id;
    private $users_id;
    private $ecurrencies_id;
    private $account_name;
    private $account_number;
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

    public function getEcurrencies_id() {
        return $this->ecurrencies_id;
    }

    public function setEcurrencies_id($ecurrencies_id) {
        $this->ecurrencies_id = $ecurrencies_id;
    }

    public function getAccount_name() {
        return $this->account_name;
    }

    public function setAccount_name($account_name) {
        $this->account_name = $account_name;
    }

    public function getAccount_number() {
        return $this->account_number;
    }

    public function setAccount_number($account_number) {
        $this->account_number = $account_number;
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
