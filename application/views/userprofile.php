<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>EDEALSPOT Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

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
	
	$("#registerform").validate({

                    rules: {

                        user_name:"required",
                        user_password: {

                            required: true,

                            minlength: 5

                        },

                        confirm_password: {

                            required: true,

                            minlength: 5,

                            equalTo: "#user_password"

                        },

                        user_fname: "required",

                        user_lname: "required",

                        user_email: {

                            required: true,

                            email: true

                        },

                        user_email2: {

                            required: true,

                            email: true,

                            equalTo: "#user_email"

                        },
                        user_phone: "required",

                        user_phone2:"required",

                        user_country:"required",

                        user_state:"required",

                        user_city:"required",

                        user_address:"required"

                    },

                    messages: {

                        user_name: "Please enter username",

                        user_password: {

                            required: "Please provide a password",

                            minlength: "Your password must be at least 5 characters long"

                        },

                        confirm_password: {

                            required: "Please provide a password",

                            minlength: "Your password must be at least 5 characters long",

                            equalTo: "Please enter the same password as above"

                        },

                        user_fname: "Please enter your first name",

                        user_lname: "Please enter your last name",

                        user_email: {
                          required:"Please enter a email ID",
                          email:"Please enter a valid email ID"
                        },

                        user_email2:{
                          required:"Please enter a email ID",
                          email:"Please enter a valid email ID",
                          equalTo: "Please enter the same email ID as above"
                        },

                        user_phone: "Please enter a valid Phonenumber",

                        user_phone2:"Please enter a valid alternate Phonenumber",

                        user_country:"Please select country ",

                        user_state:"Please enter state",

                        user_city:"Please enter city",

                        user_address:"please enter address",
                        languages_id:"Please select a language",
                        security_questions_id:"Please select a question",
                        security_answer:"Please enter your answer",
                        dob:"Please enter your Date of birth",
                        register_types_id:"Please select a registration type",
                        accept_tc:"Please accept terms and conditions",
                        accept_policy:"Please accept the Policy"

                    },
                      errorPlacement: function(error, element) {
                         if (element.attr("name") == "accept_tc"
                                     || element.attr("name") == "accept_policy" )
                           error.insertAfter("#accept_errors");
                         else
                           error.insertAfter(element);
                       }

                });
	
	

});
    </script>
    <script type="text/javascript">
    $(function(){
        //$('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="dashboard.php">FOREXRAY Admin</a></h1>
			<h2 class="section_title">My Profile</h2><div class="btn_view_site"><a href="#">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">					 <img src="<?php echo base_url();  ?>misc/css/images/fav.png" class="fl bread_logo" /> <div class="breadcrumb_divider"></div> <a class="current">My Profile</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php include 'includes/leftnav.php'; ?>
	
	<section id="main" class="column">
    
        <div class="form_prp">
        
            <form name="" action="" id="registerform">
        
            <div class="h_2">Account Details:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="languages_id"> <span class="validcol">*</span> Choose language:</label> 
                </div>
                <div class="right_fld">
                    <select name="languages_id" id="languages_id" style="" class=" required sl_bx valid">
                        <option value="">Select Language</option>
                        <option value="1" selected="">English</option>
                        <option value="2">French</option>       
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_name"> <span class="validcol">*</span> User Name:</label> 
                </div>
                <div class="right_fld">
                      <input type='text' name='user_name' id='user_name' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_email"> <span class="validcol">*</span> Email:</label> 
                </div>
                <div class="right_fld">
                      <input type='text' name='user_email' id='user_email' class=" required ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_email2"> <span class="validcol">*</span> Confirm Email:</label> 
                </div>
                <div class="right_fld">
                      <input type='text' name='user_email2' id='user_email2' class=" required ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_password"> <span class="validcol">*</span> Password:</label> 
                </div>
                <div class="right_fld">
                      <input type='password' name='user_password' id='user_password' class=" required ip"  />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="confirm_password"> <span class="validcol">*</span> Confirm Password:</label> 
                </div>
                <div class="right_fld">
                      <input type='password' name='confirm_password' id='confirm_password' class=" required ip" />
                </div>
                <div class="cb"></div>
            </div>
        
        
            <div class="h_2">Security Details:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for=""> <span class="validcol">*</span> IP Security:</label> 
                </div>
                <div class="right_fld">
                      <label class="" tip="Selecting yes will provide you more security.">
                      <input style="width: 18px;" type="radio" name="ip_security" />Yes</label>
                      <label class="" tip="Selecting yes will provide you less security.">
                      <input style="width: 18px;" type="radio" name="ip_security" />No</label>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="security_questions_id"> <span class="validcol">*</span> Security Question:</label> 
                </div>
                <div class="right_fld">
                    <select name="security_questions_id" id="security_questions_id" style="" class=" required sl_bx valid">
                        <option value="">Select Question</option>
                        <option value="1" selected="">What is your first pet name</option> 
                    </select>
                </div>
                <div class="cb"></div>
            </div>
             
            <div class="d_fds">
                <div class="left_fld">
                    <label for="security_answer"> <span class="validcol">*</span> Security Answer:</label> 
                </div>
                <div class="right_fld">
                     <input type='text' name='security_answer' id='security_answer' class=" required ip"/>
                </div>
                <div class="cb"></div>
            </div>   
        
        
            <div class="h_2">Personal Account Details:</div>
                
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_fname"> <span class="validcol">*</span> First Name:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_fname' id='user_fname' class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_lname"> <span class="validcol">*</span> Last Name:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_lname' id='user_lname'  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="dob"> <span class="validcol">*</span> D.O.B:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='dob' id='dob'  class=" ip apply_dob_datepicker required" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="register_types_id"> <span class="validcol">*</span> Register as:</label> 
                </div>
                <div class="right_fld">
                    <select name="register_types_id" id="register_types_id" style="" class="required sl_bx valid" >
                        <option value="">Select Registration Type</option>
                        <option value="1" selected="">Individual Person</option>
                        <option value="2">Forex Broker</option>
                        <option value="3">E-Currency merchant</option>
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="company_name"><span class="validcol vs_hd">*</span> Company name:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='company_name' id='company_name' class="ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="business_types_id"> <span class="validcol">*</span> Business Type:</label> 
                </div>
                <div class="right_fld">
                    <select name="business_types_id" id="business_types_id" style="" class="sl_bx valid">
                        <option value="">Select Business Type</option>
                        <option value="1" selected="">Brokerage</option>
                        <option value="2">Forex Exchange</option>
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_country"> <span class="validcol">*</span> Country:</label> 
                </div>
                <div class="right_fld">
                    
                    <select name='user_country' id='user_country' style="" class=" sl_bx">
                        <option value="">Select Country</option>
                        <option value="1" selected="">Afghanistan</option
                        ><option value="2">Aland (Aland) Islands </option>
                        <option value="3">Albania </option>
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_address"> <span class="validcol">*</span> Address:</label> 
                </div>
                <div class="right_fld">
                    <textarea name='user_address' id='user_address' class=" t_ar"></textarea>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_city"> <span class="validcol">*</span> City:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_city' id='user_city' class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_state"> <span class="validcol">*</span> State/Provence:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_state' id='user_state' class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
             <div class="d_fds">
                <div class="left_fld">
                    <label for="zipcode"> <span class="validcol">*</span> Postal Code/Zip Code:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='zipcode' id='zipcode' class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
                
        
            <div class="h_2">Contact Info:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="home_phone"> <span class="validcol vs_hd">*</span> Home phone No.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='home_phone' id='home_phone'  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="business_phone"> <span class="validcol vs_hd">*</span> Business phone No.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='business_phone' id='business_phone' class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_phone"><span class="validcol">*</span> Mobile phone No.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_phone' id='user_phone'  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="fax"> <span class="validcol vs_hd">*</span> Fax No.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='fax' id='fax'  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="communicate_lang"> <span class="validcol vs_hd">*</span> Communicative Lang.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='communicate_lang' id='communicate_lang' class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="call_time"> <span class="validcol vs_hd">*</span> Best Time To Call:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='call_time' id='call_time'  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="time_zone"> <span class="validcol vs_hd">*</span> Time Zone:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='time_zone' id='time_zone'  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
        
        
            <div class="h_2">E-Currency Account Details:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="currency_types_id"> <span class="validcol vs_hd">*</span> E-Currency Account Type:</label> 
                </div>
                <div class="right_fld">
                    <select name="currency_types_id" id="currency_types_id"  class="sl_bx valid" >
                              <option value="">Select Currency Type</option>
                              <option value="1" selected="">Liberty Reserve-USD </option>
                              <option value="2">Liberty Reserve-EURO </option>                                               
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="ecurrency_number"> <span class="validcol vs_hd">*</span> E-Currency Account Number:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='ecurrency_number' id='ecurrency_number' class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="ecurrency_name"> <span class="validcol vs_hd">*</span> E-Currency Account Name:</label> 
                </div>
                <div class="right_fld">
                   <input type='text' name='ecurrency_name' id='ecurrency_name' class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
        
        
            <hr/>
            
            <div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="receive_newsletters" value="1"/>
                I ACCEPT TO RECEIVE newsletters from e-dealspot</label>
            </div>
            <div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="accept_tc" value="1" class="required"/>
                I accept Terms and Conditions </label>
            </div>
            <div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="accept_policy" value="1" class="required"/>
                I accept Policy</label>
            </div>
             <div class="d_fds">
             	<input type='submit' name='signup' value='Add User' class="alt_btn" />
             </div>
            
        </form>
        
        
        </div>
    
		
	</section>


</body>

</html>