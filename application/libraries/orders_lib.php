<?php

class orders_lib{

    private $id;
    private $mask_id;
    private $user_id;
    private $orders_type;
    private $ecurrencies_id;
    private $payment_methods_id;
    private $orders_status_id;
    private $orders_flags_id;
    
//    private $rate;
//    private $payment_method_charges;
//    private $account_charges;
//    private $total;
//    private $actual_amount_received;
    
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

    public function getMask_id() {
        return $this->mask_id;
    }

    public function setMask_id($mask_id) {
        $this->mask_id = $mask_id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getOrders_type() {
        return $this->orders_type;
    }

    public function setOrders_type($orders_type) {
        $this->orders_type = $orders_type;
    }

    public function getEcurrencies_id() {
        return $this->ecurrencies_id;
    }

    public function setEcurrencies_id($ecurrencies_id) {
        $this->ecurrencies_id = $ecurrencies_id;
    }

    public function getPayment_methods_id() {
        return $this->payment_methods_id;
    }

    public function setPayment_methods_id($payment_methods_id) {
        $this->payment_methods_id = $payment_methods_id;
    }

    public function getOrders_status_id() {
        return $this->orders_status_id;
    }

    public function setOrders_status_id($orders_status_id) {
        $this->orders_status_id = $orders_status_id;
    }

    public function getOrders_flags_id() {
        return $this->orders_flags_id;
    }

    public function setOrders_flags_id($orders_flags_id) {
        $this->orders_flags_id = $orders_flags_id;
    }

//    public function getRate() {
//        return $this->rate;
//    }
//
//    public function setRate($rate) {
//        $this->rate = $rate;
//    }
//
//    public function getPayment_method_charges() {
//        return $this->payment_method_charges;
//    }
//
//    public function setPayment_method_charges($payment_method_charges) {
//        $this->payment_method_charges = $payment_method_charges;
//    }
//
//    public function getAccount_charges() {
//        return $this->account_charges;
//    }
//
//    public function setAccount_charges($account_charges) {
//        $this->account_charges = $account_charges;
//    }
//
//    public function getTotal() {
//        return $this->total;
//    }
//
//    public function setTotal($total) {
//        $this->total = $total;
//    }
//
//    public function getActual_amount_received() {
//        return $this->actual_amount_received;
//    }
//
//    public function setActual_amount_received($actual_amount_received) {
//        $this->actual_amount_received = $actual_amount_received;
//    }

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

}



?>