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
			
				jQuery.validator.addMethod("password_format", function(value, element) {
					return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/.test(value);
				}, "Password must be at least 4 characters, not more than 15 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");
                
                $("#resetpassword").validate({
                    rules: {  
					   password:{
						   password_format:true
					   },
					   confirm_password:{
							equalTo: "#password"
					   }
                    },
                    messages: {
					   password:{
						   required:'Please enter your password'
					   },
					   confirm_password:{
						   required:'Please enter your password',
						   equalTo:'Please enter the same password as above'
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
                

            </div>	
            <div id="page" class="takecareearning borderradiusfour login_page">
                <div style="width:800px; margin: 0 auto">
                <?php $this->load->view('common/notifications');  ?>
                </div>
		<div id="page-bgtop" class="pgtop">
			<h1 class="h_1 none">Reset Password</h1>
			<div id="content" class="pg_data none">

			<div class="post login brad8 pad10">
                                <div class="success_msg"><?php echo $message;?></div>
				<form action="<?php echo site_url('forgotpassword/change_password');  ?>" method="post" id="resetpassword" name="resetpassword">

                                    <input type="hidden" id="enclogin" placeholder="enclogin" class="ip" name="enclogin" value="<?php echo $enclogin;?>"/>  
                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="login_name"> New Password<span class="validcol">*</span>:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
					<input type="password" id="password" placeholder="Password" class="ip required" name="password"/>  
					</div>
                                        <div class="cb"></div>
                                    </div>

                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="login_name"> Confirm Password<span class="validcol">*</span>:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
					<input type="password" id="confirm_password" placeholder="Password" class="ip required" name="confirm_password"/>
                                        </div>
                                        <div class="cb"></div>
                                    </div>

                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label></label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall_btn">	
                                            <input type='submit' name='reset_password' class="submit din_med" value='Reset Password' style="width: 141px; padding: 2px;"/>
                                        </div>
                                        <div class="cb"></div>	
                                        <div>
                                            <!--<a class="normal_a" href="<?php echo site_url('login/resend_link'); ?>">Resend Activation Link</a>-->
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
    
    
    
    
      


<!-- end div#wrapper -->
<!--	Start footer content-->
<?php  $this->load->view('common/footer');?>
<!--end footer content-->

</div>

</body>

</html>



