<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class pamm_manager_lib {
    private $id;
    private $user_id;
    private $trading_name;
    private $minimum_deposit;
    private $success_fee;
    private $penalty_fee;
    private $trading_period;
    private $balance;
    private $yield;
    private $accept;
    private $private;
    private $status;
    private $date_added;
    private $last_modified;
    private $ip_address;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

	public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
	
	public function getTrading_name() {
        return $this->trading_name;
    }

    public function setTrading_name($trading_name) {
        $this->trading_name = $trading_name;
    }
	
	public function getMinimum_deposit() {
        return $this->minimum_deposit;
    }

    public function setMinimum_deposit($minimum_deposit) {
        $this->minimum_deposit = $minimum_deposit;
    }
	
	public function getSuccess_fee() {
        return $this->success_fee;
    }

    public function setSuccess_fee($success_fee) {
        $this->success_fee = $success_fee;
    }
	
	public function getPenalty_fee() {
        return $this->penalty_fee;
    }

    public function setPenalty_fee($penalty_fee) {
        $this->penalty_fee = $penalty_fee;
    }
	
	public function getTrading_period() {
        return $this->trading_period;
    }

    public function setTrading_period($trading_period) {
        $this->trading_period = $trading_period;
    }
	
	public function getBalance() {
        return $this->balance;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }
	
	public function getAccept() {
        return $this->accept;
    }

    public function setAccept($accept) {
        $this->accept = $accept;
    }
	
    public function getPrivate() {
        return $this->private;
    }

    public function setPrivate($private) {
        $this->private = $private;
    }
	
	
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    public function getDate_modified() {
        return $this->date_modified;
    }

    public function setDate_modified($date_modified) {
        $this->date_modified = $date_modified;
    }

    public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }
    public function getYield() {
        return $this->yield;
    }

    public function setYield($yield) {
        $this->yield = $yield;
    }



    

}
?>
