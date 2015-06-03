<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class wallet_logs_lib{
    private $id;
    private $user_id;
    private $amount;
	private $message;
    private $type;
    private $date_added;
    private $created_by;
    private $ip_address;
	
		
		
    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getType() {
        return $this->type;
    }
	
	public function getMessage() {
        return $this->message;
    }



    public function getDate_added() {
        return $this->date_added;
    }

    public function getCreated_by() {
        return $this->created_by;
    }

    public function getIp_address() {
        return $this->ip_address;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    public function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }


	    
    
	
}
?>
