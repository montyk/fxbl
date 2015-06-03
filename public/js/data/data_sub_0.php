<?php
	//$arr = array('result' => "Bogi", 'status' => 0);
	
	
	//{"id":"1","cell":["1","2007-10-01","Client 1","100.00","20.00","120.00",{text: "Note 1", val: 1}]},
	$r1 = array("id"=>1, "cell"=>array("52", "Social Work Order", "90", "A"));
	$r2 = array("id"=>2, "cell"=>array("26", "Social", "12", "C"));
	$r3 = array("id"=>3, "cell"=>array("46", "Work Order", "23", "B"));
	$r4 = array("id"=>4, "cell"=>array("49", "Social Order", "67", "S"));
	$r5 = array("id"=>5, "cell"=>array("10", "Social Work", "56", "G"));	
	
	
	
	$b = array($r1, $r2, $r3, $r4, $r5);
	
	$arr = array("rows"=>$b);
	
	//echo "<pre>" ;
	//print_r( $arr );
	echo json_encode($arr);
?>