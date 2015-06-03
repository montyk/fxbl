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
class Common_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function delete_record($iparray) {
        $sql = $this->db->delete($iparray['table'], array('id' => $iparray['id']));
        if ($sql)
            return true;
        else
            return false;
    }

    function getTableDetails($sel_items = 'id', $table = 'users', $where = 1) {
        $sql = 'SELECT ' . $sel_items . ' FROM ' . $table . ' where ' . $where;
        return $this->getDBResult($sql, 'object');
    }

    function delete_attachments($global_id, $ref_id) {
        $sql = 'DELETE 
				FROM attachments 
				WHERE global_id=' . $global_id . ' and reference_id=' . $ref_id;
        $qry = $this->db->query($sql);
    }

    function getReferenceID($reference_name) {
        $query = $this->db->select('id');
        $query = $this->db->where('name', $reference_name);
        $query = $this->db->get('references');
        $res = $query->first_row();
        return $res->id;
    }

}