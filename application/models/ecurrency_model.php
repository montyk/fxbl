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
class Ecurrency_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function ecurrency_view($id = 0) {
        $ref_id = $this->common_model->getReferenceID('ecurrency');
        $sql = 'SELECT ec.*,a.url,a.original_file_name,a.db_file_name,a.id as att_id FROM ecurrencies ec
				LEFT JOIN attachments a on a.global_id = ec.id and a.reference_id = ' . $ref_id . ' 
				where ec.id=' . $id;
        return $this->getDBResult($sql, 'object');
    }

    function save_ec($post = array(), $files = array()) {
        if ($post['id']) {
            $post['ec_id'] = $ec_id = $this->saveRecord(conversion($post, 'ecurrencies_lib'), 'ecurrencies', array('id' => $post['id']));
        } else {
            $post['ec_id'] = $ec_id = $this->saveRecord(conversion($post, 'ecurrencies_lib'), 'ecurrencies');
        }
        if (isset($post['original_file_name']) && !empty($post['original_file_name']) && $post['ec_id'] != 0) {
            $ref_id = $this->common_model->getReferenceID('ecurrency');
            if ($post['id'] != 0) {
                $ec_id = $post['id'];
                $this->common_model->delete_attachments($post['id'], $ref_id);
            }
            $db_file_name = $post['db_file_name'];
            $original_file_name = $post['original_file_name'];
            $url = 'uploads/' . $post['db_file_name'];
            $global_id = $ec_id;
            $reference_id = $ref_id;
            $_POST['attachments_id'] = $this->fileupload_model->save_attachment($db_file_name, $original_file_name, $global_id, $reference_id);
        }
        return $post['ec_id'];
    }

    function get_griddata() {
        $ref_id = $this->common_model->getReferenceID('ecurrency');
        $sql = 'SELECT ec.id,ec.name,
                    CASE WHEN ec.`mode` =1 THEN "USD" WHEN ec.`mode` =2 THEN "EURO" WHEN ec.`mode` =3 THEN "GOLD" END as ec_mode,
                    CASE WHEN att.db_file_name <> "" THEN att.db_file_name ELSE "noimage.jpg" END as logo_image
                    FROM ecurrencies ec
                    LEFT JOIN attachments att ON att.global_id = ec.id and att.reference_id=' . $ref_id;
        
        $data_flds = array('name', "<img  src='" . site_url('uploads') . "/{%logo_image%}' width=30 height=30>", 'ec_mode', "<a class='btn edit_ecur' href='" . site_url('adminecurrency/ecurrency_view') . "/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
        return $this->users_model->display_grid($_POST, $sql, $data_flds);
    }

}