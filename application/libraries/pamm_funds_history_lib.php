<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class pamm_funds_history_lib{
    private $id;
    private $pamm_relations_id;
    private $amount;
    private $comment;
    private $ip_address;
    private $date_added;
    private $last_modified;
	
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getPamm_relations_id() {
        return $this->pamm_relations_id;
    }

    public function setPamm_relations_id($pamm_relations_id) {
        $this->pamm_relations_id = $pamm_relations_id;
    }

    public function getIp_address() {
        return $this->ip_address;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function getLast_modified() {
        return $this->last_modified;
    }
	
    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    public function setLast_modified($last_modified) {
        $this->last_modified = $last_modified;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }
    
    
		
		
	
	    
    
	
}
?>
