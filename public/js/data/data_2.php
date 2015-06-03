<?php
	//$arr = array('result' => "user", 'status' => 0);
	
	$a1 = array("amount"=>2520,"tax"=>462,"total"=>2984,"name"=>"Totals:");
	
	
	$r1 = array("id"=>1, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r2 = array("id"=>2, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r3 = array("id"=>3, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r4 = array("id"=>4, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r5 = array("id"=>5, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r6 = array("id"=>6, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r7 = array("id"=>7, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r8 = array("id"=>8, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));
	$r9 = array("id"=>9, "cell"=>array("<select class='sl_bx'><option>Select</option></select>", "EDS-S-70", "ravi", "Bank Ware", "1", "39 Days","14-May-2012 06:45:pm", "4722.92","<div>Not Confirmed</div><select class='sl_bx'><option>Select Status</option></select><input type='button' value='Update'/>","<a href='#'>More...</a>"));

	
	$b = array($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9);
	
	$arr = array("page"=>"1","total"=>2,"records"=>"13", "userdata"=>$a1, "rows"=>$b);
	
	//echo "<pre>" ;
	//print_r( $arr );
	echo json_encode($arr);
?>