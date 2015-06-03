<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Form token base on Chris Shiflett's implementation
 * @see http://phpsecurity.org
 */

/**
 * Generate Form Token
 * @params
 * selectval= default value for first option
 * @access	public
 * @return	string	unique form token
 *
 * 
 */
function selectBox($seloption, $table, $fields, $condition="", $editCo=0, $selectval=0, $distinct='') {
    $CI = & get_instance();

    $arrFields = explode(",", $fields);

   // $sel_qry = "select " . $fields . " from " . $table;
   
   	if ($distinct != "")
	$sel_qry="select distinct " . $fields . " from " . $table;
	else
    $sel_qry = "select " . $fields . " from " . $table;

   
    if ($condition != "")
        $sel_qry.=" where " . $condition;

    if($table=='leverage' || $table=='deposits')   
    $sel_qry.=" order by lower($arrFields[1])='other' asc,0+$arrFields[1] asc";
    else
    $sel_qry.=" order by lower($arrFields[1])='other' asc,$arrFields[1] asc";    
    //echo $sel_qry;
    if(!empty($seloption)){
        $option = "<option value='" . $selectval . "'>" . $seloption . "</option>";
    }else{
        $option = "";
    }

    $sel_qry2 = $CI->db->query($sel_qry);
    $selFet2 = $sel_qry2->result_array();




    foreach ($selFet2 as $selFet) {

        $selected = "";
        if ($selFet[$arrFields[0]] == $editCo)
            $selected = "selected=true";
        else
            $selected="";

        $option.="<option value='" . $selFet[$arrFields[0]] . "' " . $selected . ">" . $selFet[$arrFields[1]] . "</option>";
    }

    return $option;
}

function selectBox2($seloption, $table, $fields, $condition="", $editCo=0) {
    $CI = & get_instance();

    $sel_qry = "select " . $fields . " from " . $table;
    if ($condition != "")
        $sel_qry.=" where " . $condition;
    echo $sel_qry;
}

function generalId($field, $table, $db_field, $auto_id) {
    $CI = & get_instance();
    $sel_qry = "select " . $field . " from " . $table . " where " . $db_field . "=" . $auto_id;
    $sel_qry2 = $CI->db->query($sel_qry);
    $numRows = $sel_qry2->num_rows();
    if ($numRows > 0) {
        $selFet = $sel_qry2->result_array();
        return $selFet[0][$field];
    }
    else
        return "";
}
