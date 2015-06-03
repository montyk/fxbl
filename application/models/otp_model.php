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
class Otp_model extends MY_Model {
//put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function save_pm($post) {
	 if ($post['id']) {
            return $this->saveRecord(conversion($post, 'otp_lib'), 'otp', array('id' => $post['id']),false);
        } else {
            return $this->saveRecord(conversion($post, 'otp_lib'), 'otp',array(),false);
        }
    }
	
	function is_otp($userid)
	{
		$sql = "SELECT * FROM otp as o WHERE o.user_id='" . $userid."'";
		$rs = $this->db->query($sql);
		if ($rs->num_rows() > 0) {
		$pamm_details = $rs->first_row();
		}
		else
		$pamm_details='';
		return $pamm_details;
	}
	
}