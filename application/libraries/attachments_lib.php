<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Attachments_lib {
    private $id;
    private $db_file_name;
    private $original_file_name;
    private $url;
	private $reference_id;
	private $global_id;
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

    public function getDb_file_name() {
        return $this->db_file_name;
    }

    public function setDb_file_name($db_file_name) {
        $this->db_file_name = $db_file_name;
    }

    public function getOriginal_file_name() {
        return $this->original_file_name;
    }

    public function setOriginal_file_name($original_file_name) {
        $this->original_file_name = $original_file_name;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
	
	public function getReference_id() {
        return $this->reference_id;
    }

    public function setReference_id($reference_id) {
        $this->reference_id = $reference_id;
    }
	
	public function getGlobal_id() {
        return $this->global_id;
    }

    public function setGlobal_id($global_id) {
        $this->global_id = $global_id;
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
