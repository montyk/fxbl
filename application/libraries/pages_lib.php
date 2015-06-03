<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class pages_lib {

    private $id;
    private $language_id;
    private $name;
    private $title;
    private $url_key;
    private $meta_keywords;
    private $meta_description;
    private $content;
    private $plaintext;
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

    public function getLanguage_id() {
        return $this->language_id;
    }

    public function setLanguage_id($language_id) {
        $this->language_id = $language_id;
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

    public function getUrl_key() {
        return $this->url_key;
    }

    public function setUrl_key($url_key) {
        $this->url_key = $url_key;
    }

    public function getMeta_keywords() {
        return $this->meta_keywords;
    }

    public function setMeta_keywords($meta_keywords) {
        $this->meta_keywords = $meta_keywords;
    }

    public function getMeta_description() {
        return $this->meta_description;
    }

    public function setMeta_description($meta_description) {
        $this->meta_description = $meta_description;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getPlaintext() {
        return $this->plaintext;
    }

    public function setPlaintext($plaintext) {
        $this->plaintext = $plaintext;
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
