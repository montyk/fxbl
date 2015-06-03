<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Forgot Password Edealspot.com</title>
		<meta name="description" content="Login to Edealspot.com" />
		<meta name="keywords" content="Login Liberty reserve, Login LR, login edealspot, login digital currency" />
		<meta name="author" content="edealspot"/>
		<meta name="robots" content="index, follow" />

<!--<link href="<?php echo base_url();  ?>default.css" rel="stylesheet" type="text/css" />-->
        
    
        <?php $this->load->view('common/general/links');  ?>


        <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css"/>
<link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>

<script>

$(document).ready(function() {

	// validate the comment form when it is submitted
	// validate signup form on keyup and submit

	$("#loginform").validate({
            rules: {

                login_name:{
                    required:true,
                    email:true
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

</head>

<body class="app">
    
	<?php $this->load->view('common/general/header');  ?>
	
<div id="wrapper" class="content">
    <div class="inner">

	 <?php $this->load->view('common/general/menu');  ?>
		
	<?php $this->load->view('common/general/alexa');  ?>
	<!-- end div#header -->

	<div class="contentcontainer roundbottomfour"><div class="contentelements ovrclr">
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
<div id="page" class="takecareearning fl borderradiusfour" >
                <?php $this->load->view('common/notifications');  ?>
		<div id="page-bgtop">

			<div id="content">

			<div class="post login brad8 pad10">
                                
                                <div class="h_2">Forgot Password</div>

				<form action="<?php echo base_url();  ?>login/send_password" method="post" id="loginform" name="loginform">


                                    <div class="d_fds">
                                        <div class="left_fld lft_fldsmall">
                                            <label for="user_email"><span class="validcol">*</span> Email ID:</label>
                                        </div>
                                        <div class="right_fld rgt_fldsmall">
                                            <input type='text'   name='login_name' class="ip" id='login_name' value='' autocomplete="off" />				
										<?php if(isset($reply_msg)) {?>
											<label class="error"><?php if(isset($reply_msg)) echo $reply_msg;?></label>
										<?php } ?>	
                                        </div>
                                        <div class="cb"></div>
                                    </div>

                                    <div class="d_fds">
										<div class="left_fld lft_fldsmall">
											<a class="bck_login" href="<?php echo site_url('login');  ?>">Back to Login</a>
										</div>
										<div class="right_fld rgt_fldsmall_btn">
                                            <input type='submit' name='login' value='Submit' style="width: 85px; padding: 2px;"/>
										</div>	
                                    </div>
									<div class="d_fds">
                                            
                                    </div>
<!--                                    <div class="d_fds">
                                        <a href="<?php echo site_url('login');  ?>">Back to Login</a>
                                    </div>-->
			  </form>
			  </div>

			</div>

			<!-- end div#content -->


			<!-- end div#sidebar -->

			<div style="clear: both; height: 1px"></div>

		</div>

	</div>
        </div></div>
	<!-- end div#page -->
    </div>
</div>

<!-- end div#wrapper -->

	<!--Start footer content-->
		<?php $this->load->view('common/general/footer');  ?>
	<!--end footer content-->
</body>

</html>



