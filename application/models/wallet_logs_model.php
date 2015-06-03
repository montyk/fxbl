<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author RAJU
 */
class Wallet_logs_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function add_log($post) {
            return $this->saveRecord(conversion($post, 'wallet_logs_lib'), 'wallet_logs',array(),false);
           }

    function get_walletlog($userid){
           $sql = 'SELECT w.id as id,w.amount,
                u.firstname,u.login,w.date_added,w.ip_address,w.message
                        FROM wallet_logs as w LEFT JOIN users as u ON w.created_by=u.id
                        WHERE w.user_id="'.$userid.'"';
       $post=$this->input->post(); 
      // echo '<pre>';
      // print_r($post);
      // exit();
       if(!empty($post['message'])){
            $sql.=' AND w.message LIKE "%'.$post['message'].'%"';
        }

        
        $sql.=' 
            GROUP BY w.id ';

          
            $data_flds = array('id','amount','message');
            //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
            echo $this->wallet_logs_model->display_grid($_POST,$sql,$data_flds);
        }
   
    function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }        
    
    
            
    function users_walletlog(){
           $sql = 'SELECT w.id as id,w.amount,
               IF(w.type="1","<span style=\'color:green\'>Added</span>","<span style=\'color:#ccc\'>Subtracted</span>") AS type_label,w.message,
               u.firstname as fname1,u.id as uId,u.login,e.firstname as fname2,w.date_added,w.ip_address
                        FROM wallet_logs as w LEFT JOIN users as u ON w.user_id=u.id
                        LEFT JOIN users as e ON w.created_by=e.id';
       $post=$this->input->post(); 
        
        if(!empty($post['fname'])){
            $sql.=' AND u.firstname LIKE "%'.$post['fname'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        $sql.=' 
            GROUP BY w.id ';

          
            $data_flds = array('id','fname1','login','amount','type_label','message', 'fname2', 'date_added', 'ip_address',"<a class='btn edit_ecur' href='".site_url('adminusers/add_wallet')."/{%uId%}' id='{%uId%}'><span class='inner-btn'><span class='label'>ADD</span></span></a>");
            //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
            echo $this->wallet_logs_model->display_grid($_POST,$sql,$data_flds);
        }
        
        function save_wallet($post){
            return $this->saveRecord(conversion($post, 'wallet_logs_lib'), 'wallet_logs',array(),false);
        }

    

}

