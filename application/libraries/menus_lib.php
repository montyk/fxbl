<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class menus_lib{
    private $id;
    private $page_id;
    private $language_id;
    private $parent_id;
    private $show_in_main_menu;
    private $show_in_footer_menu;
    private $custom_url;
    private $order_num;
    private $footer_order_num;
    private $name;
    private $date_added;
    private $status;
    private $created_by;
    private $ip_address;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPage_id() {
        return $this->page_id;
    }

    public function setPage_id($page_id) {
        $this->page_id = $page_id;
    }

    public function getLanguage_id() {
        return $this->language_id;
    }

    public function setLanguage_id($language_id) {
        $this->language_id = $language_id;
    }

    public function getParent_id() {
        return $this->parent_id;
    }

    public function setParent_id($parent_id) {
        $this->parent_id = $parent_id;
    }
    
    public function getShow_in_main_menu() {
        return $this->show_in_main_menu;
    }

    public function setShow_in_main_menu($show_in_main_menu) {
        $this->show_in_main_menu = $show_in_main_menu;
    }

    public function getShow_in_footer_menu() {
        return $this->show_in_footer_menu;
    }

    public function setShow_in_footer_menu($show_in_footer_menu) {
        $this->show_in_footer_menu = $show_in_footer_menu;
    }

    public function getCustom_url() {
        return $this->custom_url;
    }

    public function setCustom_url($custom_url) {
        $this->custom_url = $custom_url;
    }

    public function getOrder_num() {
        return $this->order_num;
    }

    public function setOrder_num($order_num) {
        $this->order_num = $order_num;
    }

    public function getFooter_order_num() {
        return $this->footer_order_num;
    }

    public function setFooter_order_num($footer_order_num) {
        $this->footer_order_num = $footer_order_num;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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
