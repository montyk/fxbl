<?php 

class orders_charges_lib{
    
    private $id;
    private $orders_id;
    private $user_id;
    private $amount;
    private $rate;
    private $payment_method_charges;
    private $payment_method_charges2;
    private $account_charges;
    private $total;
    private $type;
    private $payment_date;
    private $last_modified_by;
    private $status;
    private $ip_address;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getOrders_id() {
        return $this->orders_id;
    }

    public function setOrders_id($orders_id) {
        $this->orders_id = $orders_id;
    }
    
    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
    
    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getRate() {
        return $this->rate;
    }

    public function setRate($rate) {
        $this->rate = $rate;
    }

    public function getPayment_method_charges() {
        return $this->payment_method_charges;
    }

    public function setPayment_method_charges($payment_method_charges) {
        $this->payment_method_charges = $payment_method_charges;
    }

    public function getPayment_method_charges2() {
        return $this->payment_method_charges2;
    }

    public function setPayment_method_charges2($payment_method_charges2) {
        $this->payment_method_charges2 = $payment_method_charges2;
    }

    public function getAccount_charges() {
        return $this->account_charges;
    }

    public function setAccount_charges($account_charges) {
        $this->account_charges = $account_charges;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    
    public function getPayment_date() {
        return $this->payment_date;
    }

    public function setPayment_date($payment_date) {
        $this->payment_date = $payment_date;
    }
    
    public function getLast_modified_by() {
        return $this->last_modified_by;
    }

    public function setLast_modified_by($last_modified_by) {
        $this->last_modified_by = $last_modified_by;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }



}


?>