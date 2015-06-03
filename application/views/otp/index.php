<? $data['active_link'] = "active"; 
   $data['active'] ="0";	
?>
<?php $this->load->view('common/header', $data);?>



        <link rel="stylesheet" href="<?php echo base_url();  ?>public/css/general/screen.css" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
        <link rel="stylesheet" href="<?php echo base_url();  ?>public/css/general/resets.css" />
        <!--<link rel="stylesheet" href="<?php echo base_url();  ?>public/css/general/layout.css?reload=true" />-->


        <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css"/>
        <link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
		
		<link rel="stylesheet" href="<?php echo base_url();  ?>misc/css/style.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url();  ?>misc/css/pages.css" type="text/css"/>
		
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>



        <style type="text/css">
            .app .right_fld.rgt_fldsmall,.app .rgt_fldsmall_btn {
                margin-left: 0;
                width: 208px;
            }
            .app .content .contentcontainer {
                min-height: 380px;
            }
            .hdr_links {
                margin-top: 0px;
            }
            .app .login_page {
                padding-top: 40px;
            }
            .app .normal_a{
                color: #0000ff;
            }
        </style>
    
<div class="app outside">

    
    
<div id="wrapper" class="content">
    <div class="inner">

	 
		
	<?php $this->load->view('common/general/alexa');  ?>
	<!-- end div#header -->

	<div class="contentcontainer roundbottomfour outside" style="background-color: #fff;border: none;">
            <div class="contentelements ovrclr">
                
               

<!--    <div class="headblue">Convertor</div>    <div style="padding:10px;">        <table>           <tr><td height="3"></td></tr>           <tr><td><input type="text" id="currency" name="currency" value="" /></td></tr>           <tr><td height="3"></td></tr>           <tr><td>Currency From</td></tr>           <tr><td height="3"></td></tr>           <tr><td>                <select name='currency_from' id='currency_from'>                <option value=''>Select</option>                <option value='1'>INR</option>                <option value='2'>USD</option>                </select>           </td></tr>           <tr><td height="3"></td></tr>           <tr><td>Currency To</td></tr>           <tr><td height="3"></td></tr>           <tr><td>                <select name='currency_to' id='currency_to'>                <option value=''>Select</option>                <option value='1'>INR</option>                <option value='2'>USD</option>                </select>           </td></tr>           <tr><td height="3"></td></tr>           <tr><td><input type="submit" name="submit" id="submit" value="Convert" onclick="display_data();" /></td></tr>           <tr><td height="3"></td></tr>           <tr><td height="3"><div id="state_data" class="elem">Result will Appear Here...</div></td></tr>        </table>    </div>-->
<!--<div class="headblue">Customer Support</div>
<p style="padding:10px 0;">
  <a href="javascript:void(0)" onClick="javascript:chatWith('admin')" class="profile-page-link"><img src='<?php echo base_url();  ?>images/chat.gif' border="0" width="205"/></a>
</p>-->
<!--    <div class="headblue">PAYMENT SYSTEM</div>    <a href="#">        <img src="public/css/general/images/pamentsystem1.png" alt="liberty" width="66" height="27" class="margin10"/>    </a>    <a href="#">        <img src="public/css/general/images/pamentsystem4.png" alt="gdp" width="69" height="26" class="margin10"/>    </a>    <a href="#">        <img src="public/css/general/images/pamentsystem2.png" alt="pecunix" width="66" height="27" class="margin10"/>    </a>    <a href="#">        <img src="public/css/general/images/pamentsystem5.png" alt="cgold" width="69" height="29" class="margin10"/>    </a>    <a href="#">        <img src="public/css/general/images/pamentsystem3.png" alt="paypal" width="66" height="27" class="margin10"/>    </a>    <a href="#">        <img src="public/css/general/images/pamentsystem6.png" alt="hoopay" width="69" height="29" class="margin10"/>    </a>    <div class="headblue">PARTERNS</div>    <a href="#">       <img src="public/css/general/images/star.png" width="147" height="52" alt="partnerone"  class="block marginauto margtb10" />    </a>    <a href="#">       <img src="public/css/general/images/shopextreme.png" width="160" height="61" alt="partnerone"  class="block marginauto margtb10" />    </a>-->
            </div>	
            <div id="page" class="takecareearning borderradiusfour login_page">
                <div style="width:800px; margin: 0 auto">
                <?php $this->load->view('common/notifications');  ?>
                </div>
		<div id="page-bgtop" class="pgtop">
			<h1 class="h_1 none">OTP Verification</h1>
			<div id="content" class="pg_data none">

			<div class="post login brad8 pad10">
                                <div class="error_msg"><?php echo $message;?></div>
				<form method="post" id="otpform" name="otpform">

                                    <div class="d_fds" id="otpmsg">
                                        <div class="error_msg">
                                            <label id="otp_message"> </label>
                                        </div>
									</div>
									<input type='hidden'   name='otp_id' class="ip" id='otp_id' value='<?php if(isset($id) && $id!=0) echo $id;?>' />
									<input type='hidden'   name='otp_count' class="ip" id='otp_count' value='0' />

                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="login_name"> Please Enter OTP<span class="validcol">*</span>:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
                                            <input type='text'   name='otp' class="ip" id='otp' value='' autocomplete="off" />
                                        </div>
                                        <div class="cb"></div>
                                    </div>

                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label></label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall_btn">	
                                            <input type='submit' name='submit' id="submit" class="submit din_med" value='Submit' style="width: 85px; padding: 2px;"/>
                                        </div>
                                        <div class="cb"></div>	
                                        <div id="resend">
                                         <a id="resendotp" class="normal_a" onclick="resend_otp()">Resend OTP</a>
                                        </div>
                                    </div>
			  </form>
			  </div>

			</div>

			<!-- end div#content -->


			<!-- end div#sidebar -->

			<div style="clear: both; height: 1px"></div>

		</div>

	</div>
        </div>
    </div>
	<!-- end div#page -->
    </div>
</div>
    
<script type="text/javascript">
	
$(document).ready(function() {

	//var otp_count=$('#otp_count').val();
	//console.log(parseInt($('#otp_count').val()));
		
	//When page loads...
	$("#resend").hide(); //Hide all content
	$("#otpmsg").hide(); //Hide all content
    //show a div after 59 seconds
    setTimeout( "jQuery('#resend').show();",59000 );

	// validate signup form on keyup and submit

	$("#otpform").validate({
		rules: {
			
			otp:{
				required:true
			}
		},
		messages: {
			otp: "Please enter OTP"
		},
		
		submitHandler:function(form){
		 check_otp()
		} 
	});

});

function check_otp(){
	var otp = $('#otp').val();
	var otp_count = parseInt($('#otp_count').val());
	qry_str = 'otp='+otp+'&otp_count='+otp_count;
	$.ajax({
		type: "POST",	
		data: qry_str,
		url: '<?php echo site_url();?>otp/otp_verification', 
		beforeSend : function(){
		},
		success: function(data)
		{
		//console.log(data);
		if(data=='success')
		{
			window.location = '<?php echo site_url();?>userpages';
		}
		else
		if(data=='failure')
		{
			  $("#otpmsg").show(); //Hide all content
			  $("#otp_message").html("Incorrect OTP.");
				//console.log('n');
		}
		else
		if(data=='timeup')
		{
			  $("#otpmsg").show(); //Hide all content
			  $("#otp_message").html("OTP has expired.");
			  //console.log('ny');
		}
		else
		if(data=='login')
		{
			  //$("#otpmsg").show(); //Hide all content
			 // $("#otp_message").html("OTP has expired.");
			  //console.log('ny');
			  window.location = '<?php echo site_url();?>login/logout/1';
		}
		
		//window.location = '<?php echo site_url();?>userpages';
		}
	});
}	

function resend_otp(){
	var otp_id = $('#otp_id').val();
	var otp_count = parseInt($('#otp_count').val());
	if(parseInt($('#otp_count').val())>=2)
	{
			$("#resend").hide(); //Hide all content
	}
	qry_str = 'otp_id='+otp_id;	
	$.ajax({
		type: "POST",	
		data: qry_str,
		url: '<?php echo site_url();?>otp/resend_otp', 
		beforeSend : function(){
		},
		success: function(data)
		{
		//console.log(data);
		if(data=='success')
		{
			 var count=1;
			 var t=otp_count+count;
			$('#otp_count').val(t);
			$("#otpmsg").hide(); //Hide all content
			//console.log(data);
			//console.log($('#otp_count').val());
		}
		}
	});

}
	
</script>

    
      


<!-- end div#wrapper -->
<!--	Start footer content-->
<?php  $this->load->view('common/footer');?>
<!--end footer content-->

</div>

</body>

</html>



