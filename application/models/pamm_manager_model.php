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
class Pamm_manager_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function save_pm($post) {
	 if ($post['id']) {
            return $this->saveRecord(conversion($post, 'pamm_manager_lib'), 'pamm_manager', array('id' => $post['id']),false);
        } else {
            return $this->saveRecord(conversion($post, 'pamm_manager_lib'), 'pamm_manager',array(),false);
        }
    }
	
	function is_pamm($userid)
	{
		$sql = "SELECT p.*,u.login,u.password,u.firstname,u.lastname,u.email FROM pamm_manager as p
                        LEFT JOIN users as u ON p.user_id=u.id
                        WHERE p.user_id='" . $userid."'";
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}
        
        function is_pamm_count($userid)
	{
		$sql = "SELECT p.*,u.login,u.password,u.firstname,u.lastname,u.email FROM pamm_manager as p
                        LEFT JOIN users as u ON p.user_id=u.id
                        WHERE p.user_id='" . $userid."'";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}
        
        function my_pamm($userid)
	{
		$sql = "SELECT p.*,pr.amount,pr.status,u.login,u.firstname,u.lastname,u.email FROM pamm_manager as p 
                        LEFT JOIN pamm_relations as pr ON p.id=pr.program_id
                        LEFT JOIN users as u ON p.user_id=u.id
                        WHERE investor_id='" . $userid."'";
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}
        
         function pamm_count($userid,$status)
	{
		$sql = "SELECT * FROM pamm_manager as p LEFT JOIN pamm_relations as pr ON p.id=pr.program_id
		WHERE investor_id='" . $userid."' AND pr.status='".$status."'";
		$rs = $this->db->query($sql);
                if ($rs->num_rows() > 0) {
		$pamm_details = $rs->num_rows();
		}
		else
		$pamm_details='0';
		return $pamm_details;
	}
        
        function view_pamm($userid)
	{
		$sql = "SELECT p.*,pr.amount,u.firstname,p.user_id,u.lastname,u.login,pr.amount,u.email FROM pamm_manager as p 
                    LEFT JOIN pamm_relations as pr ON p.id=pr.program_id 
                    LEFT JOIN users as u ON p.user_id=u.id
		WHERE investor_id='" . $userid."'";
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}

	function view_manager($pammId)
	{
		$sql="SELECT p.*,p.id as pammId,u.login,u.password,u.firstname,u.lastname,u.email,u.date_added as dateadded  FROM pamm_manager as p 
                        LEFT JOIN users as u ON p.user_id=u.id
			WHERE p.id='".$pammId."'";
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;

	}	
	
	function get_managers(){
       $sql = 'SELECT p.id as id,p.user_id as userId,p.balance,ROUND(p.yield,2) as yield,p.trading_name,p.penalty_fee,p.minimum_deposit,p.success_fee,p.trading_period,u.id as uId,u.login as login
                    FROM pamm_manager p
                    LEFT JOIN users u ON p.user_id = u.id
                    WHERE u.account_for="3" AND u.status="1" AND p.status="1"  AND p.private!="Y"
                ';
        $post=$this->input->post(); 
        if(!empty($post['trading_name'])){
            $sql.=' AND p.trading_name LIKE "%'.$post['trading_name'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        $sql.=' 
            GROUP BY p.id ';
        
        //echo $sql;exit();
        $data_flds = array('yield','login','balance',"<a style='text-decoration:underline' href='".site_url('pamm_manager')."/view_manager/{%id%}' id='{%id%}'><span class=''><span class=''>{%trading_name%}</span></span></a>", 'minimum_deposit','success_fee', 'penalty_fee', 'trading_period');
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	//echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);
	echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);

    }
    
   function get_managersdata(){
       $sql = 'SELECT p.id as id,p.user_id as userId,p.balance,ROUND(p.yield,2) as yield,p.trading_name,p.penalty_fee,p.minimum_deposit,p.success_fee,p.trading_period,u.id as uId,u.login as login
                    FROM pamm_manager p
                    LEFT JOIN users u ON p.user_id = u.id
                    WHERE u.account_for="3" AND u.status="1" AND p.status="1"  
                ';
        $post=$this->input->post(); 
        
        if(!empty($post['trading_name'])){
            $sql.=' AND p.trading_name LIKE "%'.$post['trading_name'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        $sql.=' 
            GROUP BY p.id ';
        
        
        $data_flds = array('yield','login','balance',"<a style='text-decoration:underline' href='".site_url('userpages')."/view_program/{%id%}' id='{%id%}'><span class=''><span class=''>{%trading_name%}</span></span></a>", 'minimum_deposit','success_fee', 'penalty_fee', 'trading_period');
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	//echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);
	echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);

    }
   
    function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }

    function display_grid1($postvals,$sql,$array_fields,$orderby,$ascdesc) {
        return $this->jqgrid($postvals,$sql,$array_fields,$orderby,$ascdesc);
    }

    
    function get_managers2(){
       $sql = 'SELECT p.id as id,p.user_id as userId,p.trading_name,p.balance,p.yield,p.penalty_fee,p.minimum_deposit,p.success_fee,p.trading_period,u.id as uId,u.login as login
                    FROM pamm_manager p
                    LEFT JOIN users u ON p.user_id = u.id
                    WHERE u.account_for="3" AND u.status="1" AND p.status="1"  
                ';
        $post=$this->input->post(); 
        
        if(!empty($post['trading_name'])){
            $sql.=' AND p.trading_name LIKE "%'.$post['trading_name'].'%"';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        $sql.=' 
            GROUP BY p.id ';
        
        
        $data_flds = array('yield','login','balance','trading_name', 'minimum_deposit','success_fee', 'penalty_fee', 'trading_period',"<a class='btn edit_ecur' href='".site_url('adminusers')."/pamm_investors/{%userId%}' id='{%userId%}'><span class='inner-btn'><span class='label'>VIEW Investors</span></span></a>");
        //$data_flds = array('firstname','email','login','mobile_phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	//echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);
			echo $this->pamm_manager_model->display_grid($_POST,$sql,$data_flds);

    }
	
	function get_pammmanagers()
	{
		$sql="SELECT p.id as id,u.id as uId,u.login,u.password,p.date_added,u.date_added as fromdate FROM pamm_manager as p LEFT JOIN users as u ON p.user_id=u.id";
		$res=$this->db->query($sql);
		return $res->result();
	}

	function get_relations($program_id)
	{
		$sql='SELECT u.login FROM pamm_relations as pr LEFT JOIN users as u ON pr.investor_id=u.id WHERE pr.program_id="'.$program_id.'" AND pr.status="1"';
		$res=$this->db->query($sql);
		return $res->result();
	}
	
	function update_balance($id,$balance,$yield)
	{
		$sql='UPDATE pamm_manager SET balance="'.$balance.'", yield="'.$yield.'" WHERE id="'.$id.'"';
		$res=$this->db->query($sql);
	}
	
	function update_rank()
	{
	/* $sql="SELECT trading_name,
          balance,
          @curRank := @curRank + 1 AS rank
			FROM      pamm_manager p, (SELECT @curRank := 0) r
			ORDER BY  balance;";
		$res=$this->db->query($sql);
        
         */
            
            $sql="SET @rank := 0;
            INSERT INTO user_bal_ranks (rank,user_id)
            SELECT @rank := @rank + 1 AS rank,user_id
            FROM pamm_manager a
            LEFT JOIN users u ON a.user_id = u.id

            ORDER BY a.balance DESC
            ON DUPLICATE KEY UPDATE rank = VALUES(rank)";
            $res=$this->db->query($sql);
	}


}

