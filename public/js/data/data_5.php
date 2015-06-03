<?php
	//$arr = array('result' => "user", 'status' => 0);
	
	$a1 = array("amount"=>2520,"tax"=>462,"total"=>2984,"name"=>"Totals:");
	
	
	$r1 = array("id"=>1, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r2 = array("id"=>2, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r3 = array("id"=>3, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r4 = array("id"=>4, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r5 = array("id"=>5, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r6 = array("id"=>6, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r7 = array("id"=>7, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r8 = array("id"=>8, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r9 = array("id"=>9, "cell"=>array("satish", "satish@gmail.com", "123456", "9-120","India","AP","<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));

	
	$b = array($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9);
	
	$arr = array("page"=>"1","total"=>2,"records"=>"13", "userdata"=>$a1, "rows"=>$b);
	
	//echo "<pre>" ;
	//print_r( $arr );
	echo json_encode($arr);
?>