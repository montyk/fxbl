<?php 

class orders_buy_details_lib{
    
    private $id;
    private $order_id;
    private $users_ecurrencies_id;
    private $lr_account;
    private $lr_account_name;
    private $status;
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getOrder_id() {
        return $this->order_id;
    }

    public function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    public function getUsers_ecurrencies_id() {
        return $this->users_ecurrencies_id;
    }

    public function setUsers_ecurrencies_id($users_ecurrencies_id) {
        $this->users_ecurrencies_id = $users_ecurrencies_id;
    }

    public function getLr_account() {
        return $this->lr_account;
    }

    public function setLr_account($lr_account) {
        $this->lr_account = $lr_account;
    }

    public function getLr_account_name() {
        return $this->lr_account_name;
    }

    public function setLr_account_name($lr_account_name) {
        $this->lr_account_name = $lr_account_name;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    
}



?>