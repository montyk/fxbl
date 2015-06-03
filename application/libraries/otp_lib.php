<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class otp_lib {
    private $id;
    private $date_added;
    private $user_id;
    private $otp;
    private $time_added;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }
    public function getOtp() {
        return $this->otp;
    }

    public function setOtp($otp) {
        $this->otp = $otp;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
	
    public function getTime_added() {
        return $this->time_added;
    }

    public function setTime_added($time_added) {
        $this->time_added = $time_added;
    }
	
}
?>
