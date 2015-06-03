 	 <?php $this->load->view('common/admin/main_header'); ?>
	 
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/adapters/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
    
    <script>
        var site_url = '<?php echo site_url(); ?>'
        $(document).ready(function(){
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });
            //contact us messages grid view

        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {
$('#hiddenpassword').hide();
            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });
			
			$('#show_password').click(function(){
						 
				if($('#show_password').html()=='Show Password')
                {   				
				  $('#password').hide();
                   $('#hiddenpassword').show();
					$('#show_password').html('Hide Password');
				}else{
                    //$('#password').attr('type','text');
					  $('#password').show();
                      $('#hiddenpassword').hide();

					$('#show_password').html('Show Password');    				
				}
			       
                   
			});
        });
    </script>
    <script type="text/javascript">
        $(function(){
            //$('.column').equalHeight();
            
            $('#dob').datepicker({ yearRange: "1940:2010", changeYear: true, changeMonth:true, dateFormat: "yy-mm-dd" });
            
            
            jQuery.validator.addMethod("password_format", function(value, element) {
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/.test(value);
            }, "Password must be at least 4 characters, not more than 15 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");

           $('#registration_form').validate({
               rules:{
                   password:{
                       password_format:true
                   },
                   confirm_password:{
                        equalTo: "#password"
                   }
               },
               messages:{
                   firstname:{
                       required:'Please enter your name'
                   },
                   email:{
                       required:'Please enter your email ID',
                       email:'Please enter a valid email ID',
                       remote:'This email is already registered. Please enter other email.'
                   },
                   group_id:{
                       required:'Please select your group'
                   },
                   leverage_id:{
                       required:'Please select Leverage'
                   },
                   password:{
                       required:'Please enter your password'
                   },
                   confirm_password:{
                       required:'Please enter your password',
                       equalTo:'Please enter the same password as above'
                   },
                   city:{
                       required:'Please enter your city'
                   },
                   zip:{
                       required:'Please enter your zip code'
                   },
                   state:{
                       required:'Please enter your state'
                   },
                   country_id:{
                       required:'Please select your country'
                   },
                   verification_code:{
                       required:'Please enter the verification code'
                   }
               }
           });
            
            
        });
    </script>


</head>


<body class="app">
      
    <?php $this->load->view('common/leftnav'); ?>
             
    <div class="right_content">
        
        <?php $this->load->view('common/admin/menu_header'); ?>
             
        <section id="secondary_bar" class="section">
            
            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Edit Users</a>
                </article>
                    
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            <div class="form_prp mar20" style="padding: 20px;">
                
                
                
                
                
                
                
                
                
                
                <form name="registerform" id="registration_form" action="<?php echo site_url('adminusers/saveuser'); ?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                
                    <div class="h_2">Account Details:</div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="email"> <span class="validcol">*</span> Login:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='login' id='login' value="<?php echo $login; ?>" class=" required ip" readonly="" />
                        </div>
                        <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="email"> <span class="validcol">*</span> Email:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='email' id='email' value="<?php echo $email; ?>" class=" required ip" readonly="" />
                        </div>
                        <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="user_email2"> <span class="validcol">*</span> Confirm Email:</label> 
                        </div>
                        <div class="right_fld">
                            <input type='text' name='user_email2' id='user_email2' value="<?php echo $email; ?>" class=" required ip" readonly=""/>
                        </div>
                        <div class="cb"></div>
                    </div>

                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="password"> <span class="validcol">*</span> Password:</label>
                        </div>
                        <div class="right_fld">
                            <input type='password' name='password' id='password' value="<?php echo $password; ?>" class=" required ip"  /> 
							<input type='text' name='hiddenpassword' id='hiddenpassword' value="<?php echo $password; ?>" class=" ip"  /> 
							<span id='show_password'>Show Password</span>
                        </div>
                        <div class="cb"></div>
                    </div>

                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="confirm_password"> <span class="validcol">*</span> Confirm Password:</label> 
                        </div>
                        <div class="right_fld">
                            <input type='password' name='confirm_password' id='confirm_password' value="<?php echo $password; ?>" class=" required ip" />
                        </div>
                        <div class="cb"></div>
                    </div>

                    <div class="h_2">Personal Account Details:</div>

                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="firstname"> <span class="validcol">*</span> First Name:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='firstname' id='firstname' value="<?php echo $firstname; ?>" class=" ip"/>
                        </div>
                        <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="lastname"> <span class="validcol"> </span> Last Name:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='lastname' id='lastname' value="<?php echo $lastname; ?>"  class=" ip" />
                        </div>
                        <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="dob"> <span class="validcol">*</span> Date Of Birth:</label> 
                        </div>
                        <div class="right_fld">
                            <input type='text' name='dob' id='dob' value="<?php echo $dob; ?>"  class=" ip apply_dob_datepicker required" />
                        </div>
                        <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="register_types_id"> <span class="validcol">*</span> Register as:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="radio" name="registration_type" value="real" <?php echo $registration_type == "real"?'checked=checked':'';?> /> Real
                            <input type="radio" name="registration_type" value="demo" <?php echo $registration_type == "demo"?'checked=checked':'';?> /> Demo
                        </div>
                        <div class="cb"></div>
                    </div>
                    
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="myfile">Proof Of Identity:*</label>
                        </div>
                        <div class="right_fld">
                            <?php if(!empty($proof_of_identity)){ foreach($proof_of_identity as $k=>$v){ ?>
                            <div><a target="_blank" href="<?php echo $v->url; ?>"><?php echo $v->original_file_name; ?></a></div>
                            <?php } }else{ ?>
                            <label class="error">No documents submitted.</label>
                            <?php } ?>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="myfile">Proof Of Residency:*</label>
                        </div>
                        <div class="right_fld">
                            <?php if(!empty($proof_of_residency)){ foreach($proof_of_residency as $k=>$v){ ?>
                            <div><a target="_blank" href="<?php echo $v->url; ?>"><?php echo $v->original_file_name; ?></a></div>
                            <?php } }else{ ?>
                            <label class="error">No documents submitted.</label>
                            <?php } ?>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="myfile">Additional Documents:*</label>
                        </div>
                        <div class="right_fld">
                            <?php if(!empty($additional_documents)){ foreach($additional_documents as $k=>$v){ ?>
                            <div><a target="_blank" href="<?php echo $v->url; ?>"><?php echo $v->original_file_name; ?></a></div>
                            <?php } }else{ ?>
                            <label class="error">No documents submitted.</label>
                            <?php } ?>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="email"> <span class="validcol"></span> Account Verification :</label>
                        </div>
						<input type="hidden" name="acc_verification" id="acc_verification" value="<?php echo $account_verification;?>" />
                        <div class="right_fld">
                            <input type="radio" name="account_verification" value="1" <?php echo $account_verification == 1 ? 'checked=checked' : ''; ?> /> Active
                            <input type="radio" name="account_verification" value="0" <?php echo $account_verification == 0 ? 'checked=checked' : ''; ?> /> Inactive
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="email"> <span class="validcol"></span> Email Verification Status:</label>
                        </div>
                        <div class="right_fld">
                            <input type="radio" name="varification_status" value="1" <?php echo $varification_status == 1 ? 'checked=checked' : ''; ?> /> Active
                            <input type="radio" name="varification_status" value="0" <?php echo $varification_status == 0 ? 'checked=checked' : ''; ?> /> Inactive
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="status"> <span class="validcol"></span> Status:</label>
                        </div>
                        <div class="right_fld">
                            <input type="radio" name="status" value="1" <?php echo $status == 1 ? 'checked=checked' : ''; ?> /> Yes
                            <input type="radio" name="status" value="0" <?php echo $status == 0 ? 'checked=checked' : ''; ?> /> No
                        </div>
                        <div class="cb"></div>
                    </div>
                            
                    <hr/>
                
                    <div class="d_fds">
                        <label><input style="width: 18px;" type="checkbox" name="newsletter" value="1" <?php  if ($send_reports == '1') { echo 'checked=checked'; } ?>/>
                        I accept to receive newsletters from ForexRay</label>
                    </div>
                        
                    <div class="d_fds">
                        <input type='submit' name='signup' value='   Update User  ' class="alt_btn jadd_user" />
                    </div>
                    <?php echo formtoken::getField(); ?>
                </form>
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </section>
            
        <script>
            $(function(){
                var CKconfig = {
                    toolbar:
                        [
                        ['Bold','Italic','Underline','Strike'],
                        ['NumberedList','BulletedList','-','Outdent','Indent'],
                        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker'],
                        ['Undo','Redo'],['TextColor','BGColor','-','Format']
                    ],
                    removePlugins : 'elementspath',
                    resize_enabled : false,
                    forcePasteAsPlainText : true
                };
                $('.jquery_ckeditor').ckeditor(CKconfig);
            });
        </script>		
    </div>
</body>

</html>