<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment_methods_lib {

    private $id;
    private $name;
    private $bank_address;
    private $account_name;
    private $account_number;
    private $ifsc_code;
    private $flat_fee;
    private $flat_fee2;
    private $address;
    private $description;
    private $status;
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

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getBank_address() {
        return $this->bank_address;
    }

    public function setBank_address($bank_address) {
        $this->bank_address = $bank_address;
    }

    public function getAccount_name() {
        return $this->account_name;
    }

    public function setAccount_name($account_name) {
        $this->account_name = $account_name;
    }

    public function getAccount_number() {
        return $this->account_number;
    }

    public function setAccount_number($account_number) {
        $this->account_number = $account_number;
    }

    public function getIfsc_code() {
        return $this->ifsc_code;
    }

    public function setIfsc_code($ifsc_code) {
        $this->ifsc_code = $ifsc_code;
    }

    public function getFlat_fee() {
        return $this->flat_fee;
    }

    public function setFlat_fee($flat_fee) {
        $this->flat_fee = $flat_fee;
    }

    public function getFlat_fee2() {
        return $this->flat_fee2;
    }

    public function setFlat_fee2($flat_fee2) {
        $this->flat_fee2 = $flat_fee2;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
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
