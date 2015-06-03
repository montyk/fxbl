<?php set_time_limit(0);ini_set('memory_limit','-1');
$invoice_number=date('dmY')."/WDP".$id."/".$login;
?>
<html lang="en">
<head>

<title>Invoice</title>

</head>

<!-- Background pattern courtesy of http://subtlepatterns.com/grey-washed-wall/ -->
<body >


<table cellpadding='10px' cellspacing ='10px'>
<tr>
 <td width="55%" style="border:0 none;" >
 <?php if(count($_POST)>0){?>
  
  <?php } else { ?>
  <img src='./misc/css/images/small_logo.png'/> 

  <?php } ?>
 </td>
 <td width="45%" style="border:0 none;" >
   Swear Capital OU.<br>22 Hanover Square<br>W1S1JB, London, United Kingdom.
 </td>
</tr>

<tr>
 <td style="border:0 none;" >
  
 </td>
 <td style="border:0 none;" >
  Invoice No: <?php echo $invoice_number;?><br> Acc: <?php echo $login;?><br> Date: <?php echo $date;?> </td>
</tr>


<tr>
 
 <td style="border:0 none;"  colspan='2' align='center'>
 <b>INVOICE</b></td>
</tr>

<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
 In accordance with the agreement between Swear Capital OU and <?php echo trim($name);?>, the payment for the replenishment of account <?php echo $login;?>, is paid at rate <?php echo $amount;?> USD (<?php echo $this->numbertoword->convertCurrencyToWords($amount);?>). 
 </td>
 
</tr>

<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
 This payment should be transferred to the following bank account: 
 </td>
 
</tr>
</table>
<table cellpadding='10px' cellspacing ='10px' border="2px" bordercolor="#707070 ">

<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
Beneficiary Name:  SWEAR CAPITAL OU<br/>
 Beneficiary Address: Roosikrantsi 2-K205, Tallinn city, Harju county, 10119, Estonia.<br/>
 Beneficiary Account: EE701010220227284220<br/>
 </td>
 
</tr>

<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
Beneficiary Bank Name: SEB Bank <br/>
Beneficiary Bank Address: Tornimae 2, Tallinn, Estonia<br/>
SWIFT CODE: EEUHEE2X<br/>
 </td>
 
</tr>


<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
     Details of payment: The payment for the replenishment of account (<?php echo $login;?>), invoice  <?php echo $amount?>/USD, <?php echo $invoice_number;?>.
 </td>
 
</tr>
<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
Correspondent Bank Details <br><br>
 
 Bank: Deutsche Bank Trust Company Americas  <br/>
ABA: 021001033<br/>
City: New York<br/>
SWIFT Address: BKTRUS33<br/>
 </td>
 
</tr>
</table>
<table cellpadding='10px' cellspacing ='10px' >

<tr >
 <td style="border:0 none;"   colspan='2' align='left'>
Invoice is valid within 5 (Five) business days.<br><br>
 </td>
</tr>
 <?php if(count($_POST)>0){?>
  
  <?php } else { ?>

<tr>
 <td style="border:0 none;" width="650px"  colspan='2' align="right">
<img src='./misc/css/images/s2.gif'  /> 
 </td>
 
</tr>
  <?php } ?>


<?php if(isset($_POST) && count($_POST)>0){?>
<tr>
 <td style="border:0 none;" >
  <a class="button yellow m_t_20 cur_def j_general_cancel">Cancel</a>
 </td>
 <td style="border:0 none;" >
  <a class="button yellow m_t_20 cur_def j_general_download" href="<?php echo site_url('userpages/invoice/'.$id)?>">Download Invoice </a>
  </td>
</tr>
				
				
<?php } ?>



</table>


</body>
</html>
