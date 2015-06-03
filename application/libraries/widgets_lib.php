<?php


class Widgets_lib{
    
    private $id;
    private $widget_type_id;
    private $name;
    private $form_data;
    private $widget_code;
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

    public function getWidget_type_id() {
        return $this->widget_type_id;
    }

    public function setWidget_type_id($widget_type_id) {
        $this->widget_type_id = $widget_type_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getForm_data() {
        return $this->form_data;
    }

    public function setForm_data($form_data) {
        $this->form_data = $form_data;
    }

    public function getWidget_code() {
        return $this->widget_code;
    }

    public function setWidget_code($widget_code) {
        $this->widget_code = $widget_code;
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