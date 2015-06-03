<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Rates_lib{
    private $id;
    private $paymentg_methods_id;
    private $ecurrencies_id;
    private $from;
    private $to;
    private $amount;
	private $type;
	private $fee_type;
    private $date_added;
    private $last_modified;
    private $ip_address;
	private $last_modified_by;
	private $created_by;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPaymentg_methods_id() {
        return $this->paymentg_methods_id;
    }

    public function setPaymentg_methods_id($paymentg_methods_id) {
        $this->paymentg_methods_id = $paymentg_methods_id;
    }

    public function getEcurrencies_id() {
        return $this->ecurrencies_id;
    }

    public function setEcurrencies_id($ecurrencies_id) {
        $this->ecurrencies_id = $ecurrencies_id;
    }

    public function getFrom() {
        return $this->from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }
	
	public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
	
	public function getFee_type() {
        return $this->fee_type;
    }

    public function setFee_type($fee_type) {
        $this->fee_type = $fee_type;
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

    public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
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
}
?>
