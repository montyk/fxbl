<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class payment_log_lib {
    private $id;
    private $message;
    private $date_added;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    
}
?>
