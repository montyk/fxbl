<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class account_for_lib{
    private $id;
    private $name;
    private $status;
    private $date_added;
    private $date_modified;
	
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
	public function getDate_modified() {
        return $this->date_modified;
    }

    public function setDate_modified($date_modified) {
        $this->date_modified = $date_modified;
    }
	
	
		
		
	
	    
    
	
}
?>
