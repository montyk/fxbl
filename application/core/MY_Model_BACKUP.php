<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author raju
 */
class MY_Model extends CI_Model {
//put your code here
    public function __construct() {
        parent::__construct();
    }
    protected function getDBResult($sql,$type='object',$db='db') {
    //$query=$this->db->query($sql);
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
            $result=$query->result($type);
        else
            $result=0;
        return $result;
    }

    protected  function saveRecord($obj,$table,$updated_db_pair=array(),$check_unique=true) {
        $return=0;
        /*if($table == 'users_ecurrencies')
        {
        echo '<pre>';
        print_r($obj);die;
        }*/
        if(empty($updated_db_pair)) {
            if(isset($obj->id))
            {
                $updated_key_value_pair=array('id'=>$obj->id);
            }
        }else {
            $updated_key_value_pair=$updated_db_pair;
        }
        $users_id = 1;
        
        if(((array_key_exists('id',$obj) && !empty($obj->id)) || !empty($updated_db_pair)) && $obj->id !== '') {
            $data = $this->getDBResult('select * from '.$table.' where id='.$obj->id, 'object');
            $dbdata = $data[0];
            
            $exec_qry = false;
            $sql = 'INSERT INTO update_history_details_php(update_history_main_php_id, field_name, old_value,new_value) VALUES ';
            $exclude_array = array('last_modified','id','ip_address');
            $temp_var = 1;
            foreach($obj as $key=>$val)
            {
                if(!in_array($key,$exclude_array) && ($val != $dbdata->$key))
                {
                    if($temp_var == 1) // execute for first time
                    {
                        $temp_var = 2;
                        $main_tbl_sql = ' INSERT INTO update_history_main_php(modify_date, table_involved, action, users_id, ip_address) VALUES(NOW(),"'.$table.'","update",'.$users_id.',"'.ipaddress().'");';
                        $this->db->query($main_tbl_sql);
                        $main_id = $this->db->insert_id();
                    }
                    $exec_qry = true;
                    $sql .= '('.$main_id.', "'.$key.'","'.$dbdata->$key.'","'.$val.'"),';
                }
            }
            if($exec_qry)
            {
                $this->db->query(rtrim($sql,','));
            }
            if(!$check_unique || !$this->checkUnique($obj, $table,true)) {
                /*if($table == 'users_ecurrencies')
                {
                    echo '<pre>';
                    print_r($obj);
                    print_r($updated_key_value_pair);die;
                }*/
                // Added Below to prevent ID field Update.
                if(isset($obj->id) && $obj->id==0){ unset($obj->id); }
                $this->db->update($table,$obj,$updated_key_value_pair);
                $return++;
            }
        }
        else {
            $exec_qry = false;
            $sql = 'INSERT INTO update_history_details_php(update_history_main_php_id, field_name, old_value,new_value) VALUES ';
            $exclude_array = array();
            $temp_var = 1;
            foreach($obj as $key=>$val)
            {
                if($temp_var == 1) // execute for first time
                {
                    $temp_var = 2;
                    $main_tbl_sql = ' INSERT INTO update_history_main_php(modify_date, table_involved, action, users_id, ip_address) VALUES(NOW(),"'.$table.'","insert",'.$users_id.',"'.ipaddress().'");';
                    $this->db->query($main_tbl_sql);
                    $main_id = $this->db->insert_id();
                }
                $exec_qry = true;
                $sql .= '('.$main_id.', "'.$key.'","","'.$val.'"),';
            }
            if($exec_qry)
            {
                $this->db->query(rtrim($sql,','));
            }
            if(!$check_unique || !$this->checkUnique($obj, $table)) {
                $this->db->insert($table,$obj);
                $return=$this->db->insert_id();
            }
        }
        return $return;
    }
    function checkUnique($fields,$table,$is_update=false) {
    //array_walk_recursive($fields, 'arrayfilterString');
        if(array_key_exists('name',$fields)) {
            if($is_update) {
                if(array_key_exists('id',$fields)) {
                    $duplicate_check_fields="name='".$fields->name."' and id!='".$fields->id."'";
                }else {
                    return 0;
                }
            }
            else {
                $duplicate_check_fields="name='".$fields->name."' ";
            }
            $this->db->where($duplicate_check_fields,NULL,false);
            $query = $this->db->get($table);
            return $query->num_rows();
        }else {
            return 0;
        }
    }

    function jqgrid($postvals,$sql,$array_fields) {
        //array_walk_recursive($postvals, 'arrayfilterString');
        $page = isset($postvals['page'])?$postvals['page']:1; // get the requested page
        $limit =isset($postvals['rows'])?$postvals['rows']:10; // get how many rows we want to have into the grid
        $sidx = isset($postvals['sidx'])?$postvals['sidx']:'id'; // get index row - i.e. user click to sort
        $sord = isset($postvals['sord'])?$postvals['sord']:'desc'; // get the direction

        $query = $sql;
        $result = $this->db->query($query);
        $count = $result->num_rows();
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit; // do not put $limit*($page - 1)
        if ($start < 0)
            $start = 0;
        $query.= " ORDER BY `" . $sidx . "` " . $sord . " LIMIT " . $start . " , " . $limit;
        //echo $query;
        $result2 = $this->db->query($query);
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i = 0;
        $result3 = $result2->result();

        if ($result3) {
            foreach ($result3 as $row) {
                $row_info=array();
                foreach($array_fields as $k=>$v) {
                    if(array_key_exists($v,$row)) {
                        $row_info[]=$row->{$v};
                    }
                    else {
                        $matches = array();
                        $arr = preg_match_all('/(?<={%)[^%}]+(?=%})/', $v, $matches) ;
                        if($arr) {
                            foreach($matches[0] as $l=>$m) {
                                if(array_key_exists($m,$row)) {
                                    $v=str_replace('{%'.$m.'%}', $row->{$m}, $v);
                                }
                                else if($m=='enc_id'){
                                    $v=str_replace('{%'.$m.'%}', $this->my_encrypt->encode($row->id), $v);
                                }
                            }
                        }
                        $row_info[]=$v;
                    }
                }
                $responce->rows[$i]['id'] = $row->id;
                $responce->rows[$i]['cell'] = $row_info;
                $i++;
            }
        } else {
            $responce->rows[0]['id'] = 0;
            $responce->rows[0]['cell'] = array('', 'No Records', '', '');
        }
        //echo $json->encode($responce); // coment if php 5
        return json_encode($responce);
    }

    function deleteRecord($table,$where_cond)
    {
        $users_id = 1;

        $data = $this->getDBResult('select * from '.$table.' where id='.$where_cond['id'], 'object');
        $dbdata = $data[0];

        $exec_qry = false;
        $sql = 'INSERT INTO update_history_details_php(update_history_main_php_id, field_name, old_value,new_value) VALUES ';
        $exclude_array = array();
        $temp_var = 1;
        foreach($dbdata as $key=>$val)
        {
            if($temp_var == 1) // execute for first time
            {
                $temp_var = 2;
                $main_tbl_sql = ' INSERT INTO update_history_main_php(modify_date, table_involved, action, users_id, ip_address) VALUES(NOW(),"'.$table.'","delete",'.$users_id.',"'.ipaddress().'");';
                $this->db->query($main_tbl_sql);
                $main_id = $this->db->insert_id();
            }
            $exec_qry = true;
            $sql .= '('.$main_id.', "'.$key.'","'.$dbdata->$key.'",""),';
        }
        if($exec_qry)
        {
            $this->db->query(rtrim($sql,','));
        }
        $this->db->delete($table,$where_cond);
    }
//Get pagenation
    function do_upload($files)
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';

        $this->load->library('upload', $config);
        $ext = $this->upload->get_extension($files['userfile']['name']);
        $temp_name = time().$ext;
        $org_name = $files['userfile']['name'];
        $files['userfile']['name'] = $temp_name;

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('upload_data' => $this->upload->data(),'original_name'=>$org_name);
        }
        return $data;
    }
}

