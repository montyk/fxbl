<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fileupload_model
 *
 * @author Sandeep
 */
class Fileupload_model extends MY_Model {

    //put your code here
    private $saved_folder = 'attachments';
    private $temp_folder = 'temp_attach';

    public function __construct() {
        parent::__construct();
    }

    function save_attachment($new_file_names, $orig_file_names, $global_id, $reference_id) {
        $qry = "INSERT INTO attachments (db_file_name,original_file_name,url,reference_id, global_id, date_added, last_modified, ip_address) values";
        if (is_array($new_file_names) && is_array($orig_file_names)) {
            foreach ($new_file_names as $k => $v) {
                $url = 'uploads/' . $new_file_names[$k];
                $qry.=" ('" . $new_file_names[$k] . "','" . $orig_file_names[$k] . "','" . $url . "','" . $reference_id . "','" . $global_id . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . ipaddress() . "'),";
            }
        } else {
            $url = 'uploads/' . $new_file_names;
            $qry.=" ('" . $new_file_names . "','" . $orig_file_names . "','" . $url . "','" . $reference_id . "','" . $global_id . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . ipaddress() . "')";
        }
        $qry = trim($qry, ",");
        $this->db->query($qry);
    }

    function move_uploded_files($new_file_names, $orig_file_names) {
        //echo $this->input->post('new_file_names');

        if (!empty($new_file_names) && !empty($orig_file_names)) {

            if (is_array($new_file_names) && is_array($orig_file_names)) {

                foreach ($new_file_names as $k => $v) {
                    if (file_exists($this->temp_folder . "/" . $v))
                        copy($this->temp_folder . "/" . $v, $this->saved_folder . "/" . $v);
                }
            }
            else {
                if (file_exists($this->temp_folder . "/" . $new_file_names))
                    copy($this->temp_folder . "/" . $new_file_names, $this->saved_folder . "/" . $new_file_names);
            }
        }
    }

    //multiple file uploading
    function multiple_file_upload($files) {
        $post = array();
        //$temp_file_error=0;
        for ($i = 0; $i < count($files['name']); $i++) {
            if (!empty($files['name'][$i])) {
                $org_names[] = $files['name'][$i];
                $uploaddir = "temp_attach/";
                $ori_name = explode(".", $files['name'][$i]);
                $timeName = time() . $i . "." . $ori_name[count($ori_name) - 1];
                $uploadfile = $uploaddir . $timeName;

                $fsize = $files['size'][$i];
                $er = $files['error'][$i];
                if ($er == 1 || $fsize > 2097152) {
                    //echo "Error File upload";
                } else {
                    $post['orig_file_names'][] = $files['name'][$i];
                    $post['new_file_names'][] = $timeName;
                    move_uploaded_file($files['tmp_name'][$i], $uploadfile);
                }
            }
        }
        /*
          if($temp_file_error==1)
          {
          $post["file_error"]=1;
          } */
        return $post;
    }

    
    
    function save_media_gallery($name,$new_file_names, $orig_file_names) {
        $qry = "INSERT INTO media_gallery (name,db_file_name,original_file_name,url, date_added, last_modified, ip_address) values";
        if (is_array($new_file_names) && is_array($orig_file_names)) {
            foreach ($new_file_names as $k => $v) {
                $url = 'uploads/' . $new_file_names[$k];
                $qry.=" ('" . $name . "','" . $new_file_names[$k] . "','" . $orig_file_names[$k] . "','" . $url . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . ipaddress() . "'),";
            }
        } else {
            $url = 'uploads/' . $new_file_names;
            $qry.=" ('" . $name . "','" . $new_file_names . "','" . $orig_file_names . "','" . $url . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . gmdate("Y-m-d H:i:s", time()) . "','" . ipaddress() . "')";
        }
        $qry = trim($qry, ",");
        $this->db->query($qry);
    }

    
}

