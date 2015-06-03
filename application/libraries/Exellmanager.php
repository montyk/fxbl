<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

		require_once('excel/Worksheet.php');
		require_once('excel/Workbook.php');
			
	class Exellmanager {
    static function getInstance()
    {
		static $excellInstance = false;
		if (!$excellInstance){		
		$excellInstance = new Workbook("-");
		return $excellInstance;
		}else
    	return $excellInstance;
	}
} 
?>