<?php
	//$arr = array('result' => "user", 'status' => 0);
	
	$a1 = array("amount"=>2520,"tax"=>462,"total"=>2984,"name"=>"Totals:");
	
	
	$r1 = array("id"=>1, "cell"=>array("NewBankName", "join_me.png", "icici user", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r2 = array("id"=>2, "cell"=>array("Bank Ware", "photo.JPG", "axis", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r3 = array("id"=>3, "cell"=>array("NewBankName", "join_me.png", "icici user", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r4 = array("id"=>4, "cell"=>array("Bank Ware", "photo.JPG", "axis", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r5 = array("id"=>5, "cell"=>array("NewBankName", "join_me.png", "icici user", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r6 = array("id"=>6, "cell"=>array("Bank Ware", "photo.JPG", "axis", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r7 = array("id"=>7, "cell"=>array("NewBankName", "join_me.png", "icici user", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r8 = array("id"=>8, "cell"=>array("Bank Ware", "photo.JPG", "axis", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	$r9 = array("id"=>9, "cell"=>array("NewBankName", "join_me.png", "icici user", "<a class='btn edit_ecur'><span class='inner-btn'><span class='label'>Edit</span></span></a>"));
	/*$r2 = array("id"=>2, "cell"=>array("12305B", "Mar 31 - Apr 25, 2012", "BSG", "$1300", "rows"=>array(array("1","234", "234", "234"),array("1","234", "234", "234"),array("1","234", "234", "234"))));
	$r3 = array("id"=>3, "cell"=>array("12305G", "Mar 31 - Apr 25, 2012", "WWW", "$1050", "rows"=>array(array("1","234", "234", "234"),array("1","234", "234", "234"),array("1","234", "234", "234"),array("1","234", "234", "234"))));
	$r4 = array("id"=>4, "cell"=>array("12305J", "Mar 31 - Apr 25, 2012", "QQQ", "$2040", "rows"=>array(array("1","234", "", "234"),array("1","234", "", "234"),array("1","234", "234", "234"))));
	$r5 = array("id"=>5, "cell"=>array("12305H", "Mar 31 - Apr 25, 2012", "YYY", "$1400", "rows"=>array(array("1","234", "234", "234"))));
	$r6 = array("id"=>6, "cell"=>array("12305K", "Mar 31 - Apr 25, 2012", "OOO", "$1000", "rows"=>array(array("1","234", "234", "234"),array("1","234", "234", "234"))));
	$r7 = array("id"=>7, "cell"=>array("12305P", "Mar 31 - Apr 25, 2012", "GNC", "$4300", "rows"=>array(array("1","234", "234", "234"),array("1","234", "234", "234"),array("1","234", "234", "234"))));
	$r8 = array("id"=>8, "cell"=>array("12305U", "Mar 31 - Apr 25, 2012", "MMM", "$1500", "rows"=>array(array("1","234", "234", "234"))));
	$r9 = array("id"=>9, "cell"=>array("12305W", "Mar 31 - Apr 25, 2012", "GNC", "$1070", "rows"=>array(array("1","234", "234", "234"),array("1","234", "234", "234"),array("1","234", "234", "234"))));
	
	
	$b = array($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9);
	
	$arr = array("page"=>"1","total"=>2,"records"=>"13", "userdata"=>$a1, "rows"=>$b);*/
	
	$b = array($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9);
	
	$arr = array("page"=>"1","total"=>2,"records"=>"13", "userdata"=>$a1, "rows"=>$b);
	
	//echo "<pre>" ;
	//print_r( $arr );
	echo json_encode($arr);
?>