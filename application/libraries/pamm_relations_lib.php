<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class pamm_relations_lib{
    private $id;
    private $program_id;
    private $trader_id;
    private $investor_id;
    private $amount;
    private $status;
    private $ip_address;
    private $date_added;
    private $last_modified;
	
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getProgram_id() {
        return $this->program_id;
    }

    public function setProgram_id($program_id) {
        $this->program_id = $program_id;
    }

    public function getTrader_id() {
        return $this->trader_id;
    }

    public function getInvestor_id() {
        return $this->investor_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getStatus() {
        return $this->status;
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

    public function setTrader_id($trader_id) {
        $this->trader_id = $trader_id;
    }

    public function setInvestor_id($investor_id) {
        $this->investor_id = $investor_id;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setStatus($status) {
        $this->status = $status;
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


    
    
		
		
	
	    
    
	
}
?>
