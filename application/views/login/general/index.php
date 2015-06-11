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

        <script type="text/javascript">
            
            $(document).ready(function() {
                
                // validate the comment form when it is submitted
                
                
                
                
                
                // validate signup form on keyup and submit
                
                $("#loginform").validate({
                    rules: {
                        
                        login_name:{
                            required:true
                        },
                        user_password: {
                            required: true,
                            minlength: 5
                        }
                    },
                    messages: {
                        login_name: "Please enter Email ID",
                        user_password: {
                            required: "Please enter password",
                            minlength: "Your password must be at least 5 characters long"
                        }
                    }
                });
                
            });
            
        </script>

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
                
                <script language="javascript" type="text/javascript">
                    function display_data(){
                        var currency = document.getElementById("currency").value;
                        var currency_from = document.getElementById("currency_from").value;
                        var currency_to = document.getElementById("currency_to").value;
                        if(currency==""){
                            alert("Please enter currency");
                            document.getElementById("currency").focus;
                            return true;
                        }
                        if(currency_from==""){
                            alert("Please enter currency from");
                            document.getElementById("currency_from").focus;
                            return true;
                        }
                        if(currency_to==""){
                            alert("Please enter currency to");
                            document.getElementById("currency_to").focus;
                            return true;
                        }
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url();  ?>converter",
                            data: "currency="+currency+"&currency_from="+currency_from+"&currency_to="+currency_to,
                            success: function(msg){
                                $("#state_data").html('<h2><b>'+msg+'</b></h2>');
                            }
                        });
                    }

                </script>

                <script language="javascript" type="text/javascript">
                    $(document).ready(function(){
                        $("#loginform").validate({
                        rules: {
                            currency: {
                            required: true,
                            number: true
                            },
                            currency_from: "required",
                            currency_to: "required"
                        },
                        messages: {
                            currency: "Please enter valid number only",
                            currency_from: "Please select currency from",
                            currency_to: "Please select currency to"
                        }
                        });
                    });
                </script>
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
			<h1 class="h_1 none">Login</h1>
			<div id="content" class="pg_data none">

			<div class="post login brad8 pad10">
                                <div class="error_msg"><?php echo $message;?></div>
				<form action="<?php echo site_url('login/loginUser');  ?>" method="post" id="loginform" name="loginform">


                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="login_name"> Login<span class="validcol">*</span>:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
                                            <input type='text'   name='login_name' class="ip" id='login_name' value='' autocomplete="off" />
                                        </div>
                                        <div class="cb"></div>
                                    </div>

                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="user_password"> Password<span class="validcol">*</span>:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
                                            <input type='password' name='user_password' class="ip" id='user_password' autocomplete="off" />
                                             <input type='hidden' name='token_login' value='a740827067b8572a5ec73f1d957947b7'/>
                                        </div>
                                        <div class="cb"></div>
                                    </div>
                                    <div class="d_fds forgt">
                                        <div class="left_fld lft_fldsmall">
                                            <label> <a class="normal_a" href="<?php echo site_url('forgotpassword'); ?>">Forgot Password?</a></label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall_btn">	
                                            <input type='submit' name='login' class="submit din_med" value='Login' style="width: 85px; padding: 2px;"/>
                                        </div>
                                        <div class="cb"></div>	
                                        
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
    
    
    
    
      


<!-- end div#wrapper -->
<!--	Start footer content-->
<?php  $this->load->view('common/footer');?>
<!--end footer content-->

</div>

</body>

</html>



