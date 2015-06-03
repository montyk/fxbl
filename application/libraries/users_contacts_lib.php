<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class users_contacts_lib{
    private $id;
    private $users_id;
    private $home_phone;
    private $mobile_phone;
    private $office_phone;
    private $fax_no;
    private $date_added;
    private $last_modified;
	private $last_modified_by;
	private $created_by;
	private $ip_address;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsers_id() {
        return $this->users_id;
    }

    public function setUsers_id($users_id) {
        $this->users_id = $users_id;
    }

    public function getHome_phone() {
        return $this->home_phone;
    }

    public function setHome_phone($home_phone) {
        $this->home_phone = $home_phone;
    }

    public function getMobile_phone() {
        return $this->mobile_phone;
    }

    public function setMobile_phone($mobile_phone) {
        $this->mobile_phone = $mobile_phone;
    }

    public function getOffice_phone() {
        return $this->office_phone;
    }

    public function setOffice_phone($office_phone) {
        $this->office_phone = $office_phone;
    }

    public function getFax_no() {
        return $this->fax_no;
    }

    public function setFax_no($fax_no) {
        $this->fax_no = $fax_no;
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
	
	public function getIp_address() {
        return $this->ip_address;
    }

    public function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }
}
?>
