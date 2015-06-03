<?php $con=mysql_connect("localhost","root","123456") or die('Unable to connect Host');
	$db=mysql_select_db('stage_db',$con) or die('Unable to connect DB');
	//$sql="SELECT id, currency_from, currency_to, ask, bid, status FROM currency_converter ORDER BY id";
	$sql="SELECT * FROM currency_converter ORDER BY id";
	//echo $sql;
	$qry=mysql_query($sql);
        ?>

    <?php while($row=mysql_fetch_array($qry)){?>
            <span class="symbol"><img src="plugins/raju/img/<?php echo $row['status'];?>.gif" width="11" height="9">&nbsp;<?=$row['currency_from'].$row['currency_to']?>&nbsp;&nbsp;<?=$row['bid']?>&nbsp;&nbsp;<?=$row['ask']?></span>
    <?php } ?>
