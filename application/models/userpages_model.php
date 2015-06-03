<?php 

class Userpages_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function fx_user_details($login=''){
        $sql = "
            SELECT u.*,pi.attachments_id AS pi_attachments_id, pr.attachments_id AS pr_attachments_id
                FROM users AS u
                LEFT JOIN proof_of_identity AS pi ON pi.user_id=u.id
                LEFT JOIN proof_of_residency AS pr ON pr.user_id=u.id
                WHERE login='" . $this->db->escape_str($login) . "'
            ";
        $rs = $this->db->query($sql);
        $user_details = $rs->first_row();
        $user_details_serialized = serialize($user_details);
        $this->session->set_userdata('fx_user_details', $user_details_serialized);
        return $user_details;
    }

    function save_withdrawal_requests($post){
        return $this->saveRecord(conversion($post,'withdrawal_requests_lib'),'withdrawal_requests');
    }

    function save_internal_transfer_requests($post){
        return $this->saveRecord(conversion($post,'internal_transfer_requests_lib'),'internal_transfer_requests');
    }

    
    
}


?>