<?php

class internal_transfer_requests_lib {

    private $id;
    private $user_id;
    private $deposit_account_id;
    private $deposit_account_name;
    private $amount;
    private $message;
    private $status;
    private $date_added;
    private $created_by;
    private $last_modified_by;
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

    public function getDeposit_account_id() {
        return $this->deposit_account_id;
    }

    public function setDeposit_account_id($deposit_account_id) {
        $this->deposit_account_id = $deposit_account_id;
    }

    public function getDeposit_account_name() {
        return $this->deposit_account_name;
    }

    public function setDeposit_account_name($deposit_account_name) {
        $this->deposit_account_name = $deposit_account_name;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
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

    public function getCreated_by() {
        return $this->created_by;
    }

    public function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }

    public function getLast_modified_by() {
        return $this->last_modified_by;
    }

    public function setLast_modified_by($last_modified_by) {
        $this->last_modified_by = $last_modified_by;
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