<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class wire_invoice {
    private $id;
    private $users_id;
    private $amount;
    private $sender;
    private $bank;
    private $date_added;
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
   
    public function getBank() {
        return $this->bank;
    }

    public function setBank($bank) {
        $this->bank = $bank;
    }

	
	public function getSender() {
        return $this->sender;
    }

    public function setSender($sender) {
        $this->sender = $sender;
    }
	
	public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }
	
	public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }
	
	
    public function getIp_address() {
        return $this->ipaddress;
    }

    public function setIp_address($ipaddress) {
        $this->ipaddress = $ipaddress;
    }
}
?>
