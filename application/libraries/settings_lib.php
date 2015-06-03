<?php 

class settings_lib{
    
    private $id;
    private $name;
    private $title;
    private $validation_classes;
    private $type;
    private $select_table;
    private $select_fields;
    private $value;
    private $status;
    
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

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getValidation_classes() {
        return $this->validation_classes;
    }

    public function setValidation_classes($validation_classes) {
        $this->validation_classes = $validation_classes;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getSelect_table() {
        return $this->select_table;
    }

    public function setSelect_table($select_table) {
        $this->select_table = $select_table;
    }

    public function getSelect_fields() {
        return $this->select_fields;
    }

    public function setSelect_fields($select_fields) {
        $this->select_fields = $select_fields;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}


?>