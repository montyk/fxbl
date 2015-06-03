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
                
                $("#forgotpassword").validate({
                    rules: {
                        
                        login_name:{
                            required:true
                        }
                    },
                    messages: {
                        login_name: "Please enter Login"
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
			<h1 class="h_1 none">Forgot Password</h1>
			<div id="content" class="pg_data none">

			<div class="post login brad8 pad10">
                            <?php $class=(($msg%2=='1')?'error_msg':'success_msg');?>
                                <div class="<?php echo $class;?>"><?php echo $message;?></div>
				<form action="<?php echo site_url('forgotpassword/send_password');  ?>" method="post" id="forgotpassword" name="forgotpassword">


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
                                            <label></label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall_btn">	
                                            <input type='submit' name='forgot_password' class="submit din_med" value='Forgot Password' style="width: 141px; padding: 2px;"/>
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



