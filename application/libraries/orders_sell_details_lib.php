<?php 

class orders_sell_details_lib{
    
    private $id;
    private $order_id;
    private $beneficiary_name;
    private $beneficiary_addr;
    private $sell_lr_account;
    private $bank_name_addr;
    private $bank_swift;
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

    public function getBeneficiary_name() {
        return $this->beneficiary_name;
    }

    public function setBeneficiary_name($beneficiary_name) {
        $this->beneficiary_name = $beneficiary_name;
    }

    public function getBeneficiary_addr() {
        return $this->beneficiary_addr;
    }

    public function setBeneficiary_addr($beneficiary_addr) {
        $this->beneficiary_addr = $beneficiary_addr;
    }

    public function getSell_lr_account() {
        return $this->sell_lr_account;
    }

    public function setSell_lr_account($sell_lr_account) {
        $this->sell_lr_account = $sell_lr_account;
    }

    public function getBank_name_addr() {
        return $this->bank_name_addr;
    }

    public function setBank_name_addr($bank_name_addr) {
        $this->bank_name_addr = $bank_name_addr;
    }

    public function getBank_swift() {
        return $this->bank_swift;
    }

    public function setBank_swift($bank_swift) {
        $this->bank_swift = $bank_swift;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

   
    
}


?>