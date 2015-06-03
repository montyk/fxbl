<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Withdrawal_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_withdrawal_requests() {
        $sql = 'SELECT w.*,DATE_FORMAT(w.date_added, "%m/%d/%y") as date_added_label, u.firstname, u.email, u.phone,
                CASE WHEN w.status =1 THEN "Active" ELSE "Inactive" END as status_name 
                FROM withdrawal_requests AS w
                LEFT JOIN users AS u ON u.id=w.user_id
                WHERE 1
        ';
        $post=$this->input->post();
        
        
        $data_flds = array('firstname','email','phone', 'amount','message', 'date_added_label', 'status_name');
        return $this->users_model->display_grid($_POST, $sql, $data_flds);
    }

	
	 function save_invoice($post){
            return $this->saveRecord(conversion($post, 'wire_invoice'), 'wire_invoice',array(),false);
        }
	 
	 
	 function getInvoice($id){
		$sql="select * from wire_invoice where id='".$id."'";
		 return $result=$this->getDBResult($sql,'object');
	}
	
	    function get_invoicelist(){
        $sql = 'SELECT w.id as id,u.id as uId,u.firstname,u.login,w.amount,w.sender,w.bank,w.date_added,w.users_id
                    FROM wire_invoice w
                    LEFT JOIN users u ON w.users_id = u.id
                    WHERE 1 
                ';
        
        $post=$this->input->post(); 
        
        if(!empty($post['name'])){
            $sql.=' AND (u.firstname LIKE "%'.$post['name'].'%" OR w.sender LIKE "%'.$post['name'].'%")';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        if(!empty($post['bank'])){
            $sql.='
                AND w.bank ="'.$post['bank'].'"
                ';
        }
        $sql.=' 
            GROUP BY w.id ';
        
        
        
        $data_flds = array('firstname','login','amount','sender','bank','date_added',"<a class='btn edit_ecur' href='".site_url('adminusers')."/getinvoice/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Download</span></span></a>");
		echo $this->users_model->display_grid($_POST,$sql,$data_flds);
    }

	function get_myinvoicelist($id){
        $sql = 'SELECT w.id as id,u.id as uId,u.firstname,u.login,w.amount,w.sender,w.bank,w.date_added,w.users_id
                    FROM wire_invoice w
                    LEFT JOIN users u ON w.users_id = u.id
                    WHERE w.users_id="'.$id.'" 
                ';
        
        $post=$this->input->post(); 
        
        if(!empty($post['name'])){
            $sql.=' AND (u.firstname LIKE "%'.$post['name'].'%" OR w.sender LIKE "%'.$post['name'].'%")';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        if(!empty($post['bank'])){
            $sql.='
                AND w.bank ="'.$post['bank'].'"
                ';
        }
        $sql.=' 
            GROUP BY w.id ';
        
        
        
        $data_flds = array('id','firstname','login','amount','sender','bank','date_added',"<a class='btn edit_ecur' href='".site_url('userpages')."/invoice/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Download</span></span></a>");
		echo $this->users_model->display_grid($_POST,$sql,$data_flds);
    }

		
		
}

?>