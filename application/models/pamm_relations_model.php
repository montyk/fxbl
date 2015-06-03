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
class Pamm_relations_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function add_investor($post) {
		 if ($post['id']) {
            return $this->saveRecord(conversion($post, 'pamm_relations_lib'), 'pamm_relations', array('id' => $post['id']),false);
        } else {
            return $this->saveRecord(conversion($post, 'pamm_relations_lib'), 'pamm_relations',array(),false);
        }
           }
		   

           
     function get_relation($userid)
	{
		$sql = "SELECT * FROM pamm_relations
		WHERE investor_id='" . $userid."' AND status='1'";
		$rs = $this->db->query($sql);
                return $rs->num_rows();
	}
        
     function list_investors($userid){
         $sql="SELECT pr.id as prId,pr.amount,pr.date_added,u.id as uId,u.login,u.firstname  FROM pamm_relations as pr LEFT JOIN users AS u ON pr.investor_id=u.id WHERE pr.trader_id='".$userid."' AND pr.status='1' AND u.status='1' ORDER BY pr.id DESC";
         $rs = $this->db->query($sql);
         return $rs->result();
     }
     
      function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }
    
    function get_investors($userid){
       $sql = "SELECT pr.id as id,pr.amount,pr.date_added,u.id as uId,u.login,u.firstname,p.minimum_deposit,p.trading_period  FROM pamm_relations as pr LEFT JOIN users AS u ON pr.investor_id=u.id 
                LEFT JOIN pamm_manager as p ON pr.program_id=p.id
                WHERE pr.trader_id='".$userid."' AND pr.status='1' AND u.status='1'";
      
        $post=$this->input->post(); 
        
        if(!empty($post['firstname'])){
            $sql.=' AND u.firstname LIKE "%'.$post['firstname'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        
        $sql.=' GROUP BY pr.id ';
        $data_flds = array('id','login','firstname', 'minimum_deposit','amount', 'trading_period');
        //exit();
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->display_grid($_POST,$sql,$data_flds);
    }
    
     function update_status($id){
          $sql = 'UPDATE pamm_relations SET status="0" where investor_id = "' . $id . '" ';
          $this->db->query($sql);
     }
     
     
     
      function get_removeinvestors(){
       $sql = "SELECT pr.id as id,pr.amount,pr.date_added,u.id as uId,u.login,u.firstname,p.minimum_deposit,p.trading_period  FROM pamm_relations as pr LEFT JOIN users AS u ON pr.investor_id=u.id 
                LEFT JOIN pamm_manager as p ON pr.program_id=p.id
                WHERE pr.status='0' AND u.status='1'";
      
        $post=$this->input->post(); 
        
        if(!empty($post['firstname'])){
            $sql.=' AND u.firstname LIKE "%'.$post['firstname'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        
        $sql.=' GROUP BY pr.id ';
        $data_flds = array('id','login','firstname', 'minimum_deposit','amount', 'trading_period',"<a class='btn edit_ecur' href='".site_url('adminusers')."/remove_investor/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Remove Investor</span></span></a>");
        //exit();
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->display_grid($_POST,$sql,$data_flds);
    }
	
	function pamm_investor($id)
	{
		$sql='SELECT *,u.wallet FROM pamm_relations as p LEFT JOIN users AS u ON p.investor_id=u.id WHERE p.id="'.$id.'"';
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}
     
	function user_pammrelations($program_id,$investor_id)
	{
		$sql='SELECT * FROM pamm_relations WHERE program_id="'.$program_id.'" AND investor_id="'.$investor_id.'"';
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}
     
     

	
 function delete_investor($userid=0){
        if(!empty($userid)){
            echo $sql = 'DELETE FROM pamm_relations
                    WHERE 1
                    AND investor_id='.$userid.'
            ';
            return $this->db->query($sql);
        }
    }
    
    
     function get_investorusers(){
       $sql = 'SELECT pr.id as id,u1.deposit_status,u1.login as investor_login,u1.firstname as investor_firstname,u1.id as uid,
               u1.lastname as investor_lastname,u1.email as investor_email,u2.firstname as trader_firstname,u2.lastname as trader_lastname,
               IF(u1.deposit_status="Y","<span style=\'color:green\'>Yes</span>","<span style=\'color:red\'>No</span>") AS deposit_status_label,
               u2.login as trader_login,u2.email as trader_email,p.trading_name  FROM pamm_relations as pr 
               LEFT JOIN users AS u ON pr.investor_id=u.id 
                LEFT JOIN pamm_manager as p ON pr.program_id=p.id
                LEFT JOIN users as u1 ON pr.investor_id=u1.id
                LEFT JOIN users as u2 ON pr.trader_id=u2.id
                WHERE u1.status="1" AND u2.status="1"';
      
        $post=$this->input->post(); 
        
        if(!empty($post['fname'])){
            $sql.=' AND (u1.firstname LIKE "%'.$post['fname'].'%" OR u2.firstname LIKE "%'.$post['fname'].'%") ';
        }
        if(!empty($post['login'])){
            $sql.='
                AND (u1.login ="'.$post['login'].'" OR u2.login ="'.$post['login'].'")
                ';
        }
        if(!empty($post['email'])){
             $sql.=' AND (u1.email LIKE "%'.$post['email'].'%" OR u2.email LIKE "%'.$post['email'].'%") ';
        }
        
        $sql.=' GROUP BY pr.id ';
        $data_flds = array('id','investor_firstname','investor_login','investor_email','trader_firstname','trader_login','trader_email','trading_name','deposit_status_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/update_depositstatus/{%uid%}' id='{%uid%}'><span class='inner-btn'><span class='label'>Update Deposit Status</span></span></a>");
        //exit();
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->display_grid($_POST,$sql,$data_flds);
    }
	
    function my_investors($userid){
         $sql="SELECT u.login,pr.amount,u.id as uId,u.login,u.firstname  FROM pamm_relations as pr LEFT JOIN users AS u ON pr.investor_id=u.id WHERE pr.trader_id='".$userid."' AND pr.status='1' AND u.status='1' ORDER BY pr.amount DESC";
         $rs = $this->db->query($sql);
         return $rs->result();
     }
     

    
    
    
}

