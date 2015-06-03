<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class order_messages_lib {
    
    private $id;
    private $user_id;
    private $order_id;
    private $message;
    private $admin_read;
    private $customer_read;
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

    public function getOrder_id() {
        return $this->order_id;
    }

    public function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getAdmin_read() {
        return $this->admin_read;
    }

    public function setAdmin_read($admin_read) {
        $this->admin_read = $admin_read;
    }

    public function getCustomer_read() {
        return $this->customer_read;
    }

    public function setCustomer_read($customer_read) {
        $this->customer_read = $customer_read;
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
