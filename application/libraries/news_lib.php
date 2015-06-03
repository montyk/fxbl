<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class News_lib{
    private $id;
    private $language_id;
    private $meta_description;
    private $news_categories_id;
    private $heading;
    private $description;
    private $is_promotion;
    private $from;
    private $to;
    private $status;
    private $is_banner;
    private $banner_order_num;
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

    public function getNews_categories_id() {
        return $this->news_categories_id;
    }

    public function setNews_categories_id($news_categories_id) {
        $this->news_categories_id = $news_categories_id;
    }

    public function getHeading() {
        return $this->heading;
    }

    public function setHeading($heading) {
        $this->heading = $heading;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getIs_promotion() {
        return $this->is_promotion;
    }

    public function setIs_promotion($is_promotion) {
        $this->is_promotion = $is_promotion;
    }

    public function getFrom() {
        return $this->from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

        
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getIs_banner() {
        return $this->is_banner;
    }

    public function setIs_banner($is_banner) {
        $this->is_banner = $is_banner;
    }

    public function getBanner_order_num() {
        return $this->banner_order_num;
    }

    public function setBanner_order_num($banner_order_num) {
        $this->banner_order_num = $banner_order_num;
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
    
    public function getMeta_description() {
        return $this->meta_description;
    }

    public function setMeta_description($meta_description) {
        $this->meta_description = $meta_description;
    }

    
}
?>
