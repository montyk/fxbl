<?php
//format should be mm-dd-yyyy
function dateFormat($date,$dateFormat='Y-m-d') 
{	
    if($date){
        return date($dateFormat,strtotime($date));
    }
	
}

function localDate($offset='', $date='', $dateFormat='m-d-Y')
{
    if($offset != '')
    {
        if($date == '')
        {
            $date = date('m-d-Y h:i:s');
        }
        $dateFormat = $dateFormat.' h:i:s';
        return date($dateFormat,strtotime($date)+(-($offset*60)));
    }
}

