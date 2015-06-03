<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Register Edealspot.com</title>
        <meta name="description" content="Register Edealspot.com" />
        <meta name="keywords" content="Register Liberty reserve, Account Liberty reserve, New Account Liberty reserve" />
        <meta name="author" content="edealspot"
              <meta name="robots" content="index, follow" />



            <!--<link href="<?php echo base_url();  ?>default.css" rel="stylesheet" type="text/css" />-->
            
            <?php $this->load->view('common/general/links');  ?>

			<link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />
        <!--    <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />-->
			<link rel="stylesheet" href="<?php echo base_url();  ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
            <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css"/>
            <link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/layout.css?reload=true" rel="stylesheet" type="text/css" />
            <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>

            <link href="<?php echo base_url();  ?>/public/css/general/jquery.tooltip.css" type="text/css"  rel="stylesheet"/>
            <script type="text/javascript" src="<?php echo base_url();  ?>/public/js/general/jquery.cluetip.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>public/js/components/ecur_html.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>public/js/components/ecur_html.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>

            <script type="text/javascript" rel="javascript">

                $(document).ready(function() {
                    var x = new Date();
                    var timeZone = currentTimeZoneOffsetInHours = x.getTimezoneOffset();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('home/setUserTimeZone');?>',
                        data: 'tz_offset = '+timeZone,
                        beforeSend : function(){
                        },
                        success: function(){
                        },
                        complete: function(){
                        }
                    });
                    $("#registerform").validate({
                        rules: {
                            password: {
                                required: true,
                                minlength: 5
                            },
                            confirm_password: {
                                required: true,
                                minlength: 5,
                                equalTo: "#password"
                            },
                            firstname: "required",
                            lastname: "required",
                            email: {
                                required: true,
                                email: true
                            },
                            user_email2: {
                                required: true,
                                email: true,
                                equalTo: "#email"
                            },
                            mobile_phone: "required",
                            countries_id:"required",
                            state:"required",
                            city:"required",
                            address:"required",
                            zip:"required"
                        },
                        messages: {
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            confirm_password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long",
                                equalTo: "Please enter the same password as above"
                            },
                            firstname: "Please enter your first name",
                            lastname: "Please enter your last name",
                            email: {
                              required:"Please enter an email",
                              email:"Please enter a valid email"
                            },
                            user_email2:{
                              required:"Please enter an email",
                              email:"Please enter a valid email",
                              equalTo: "Please enter the same email as above"
                            },
                            mobile_phone: "Please enter a valid Phonenumber",
                            countries_id:"Please select a country ",
                            state:"Please enter a state",
                            city:"Please enter a city",
                            address:"please enter an address",
                            languages_id:"Please select a language",
                            security_questions_id:"Please select a question",
                            security_answer:"Please enter your answer",
                            dob:"Please enter your date of birth",
                            register_types_id:"Please select a registration type",
                            accept_tc:"Please accept terms and conditions",
                            accept_policy:"Please accept the policy",
                            zip:'Please enter your zip code'
                        },
                        errorPlacement: function(error, element) {
                            if (element.attr("name") == "accept_tc" || element.attr("name") == "accept_policy" )
                                error.insertAfter(element.next('.errmsg'));
                            else
                                error.insertAfter(element);
                        },
                        submitHandler: function()
                        {
                           if($('#users_exist').length() > 0)
                           {
                               alert('hi');
                               return false;
                           }
                        }
                    });


                    $('.applyCluetip').cluetip({
                        cluetipClass:'rounded',
                        dropShadow:false,
                        splitTitle: '|',
                        width: '200px',
                        //delayedClose:4000,
                        sticky: false,
                        local:true,
                        cursor:false,
                        arrows:true,
                        fx: {
                            open:       'show', // can be 'show' or 'slideDown' or 'fadeIn'
                            openSpeed:  400
                        },
                        attribute:'tip',
                        titleAttribute:'tip',
                        activation:'focus'
                    });

                    $('#addecur').click(function(){
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('signup/getEcurrencies');?>',
                            beforeSend : function(){
                            },
                            success: function(data){
                                data = eval("(function(){return " + data + ";})()");
                                $('.jecur_det').append($.eCurhtml(data));
                                $('.remecur:first').show();
                            },
                            complete: function(){
                            }
                       });

                    });
                    $('.remecur').live('click',function(){
                        var ecur_exist_var = $('.jecur_det').find('.jecur_sec:last').find('.jexist_ecur');
                        if(ecur_exist_var.length)
                        {
                            $.ajax({
                                type: "POST",
                                url: '<?php echo site_url('signup/delUserEcurrencies');?>',
                                data: 'ecur_id='+ecur_exist_var.val(),
                                beforeSend : function(){
                                },
                                success: function(){
                                },
                                complete: function(){
                                }
                            });
                        }
                        $(this).closest('.jecur_sec').remove();
                        //$('.jecur_det').find('.jecur_sec:last').remove();
                        if($('.jecur_sec').length == 1)
                        {
                            $('.remecur').hide();
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
                        <div id="page" class="takecareearning fl borderradiusfour">
                            <?php $this->load->view('common/notifications');  ?>
                            <div id="page-bgtop">

                                <div id="content">

                                    <div class="post brad8 pad10">
                                        <div style="text-align: right;">
                                            <?php  
//                                                $date = new DateTime();
//                                                echo date('Y-m-d H:i:s',$date->getTimestamp());
//                                                $next_day_of_created_time = strtotime('+1 day', strtotime('2012-11-09 19:23:17'));
//                                                echo date('Y-m-d H:i:s',$next_day_of_created_time);
                                            ?>
                                        </div>
                                        <div class="h_1">Sign Up</div>

                                        <form name="registerform" id="registerform" action="<?php echo site_url('signup/saveuser');?>" method="post" enctype="multipart/form-data" >
                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                            <div class="h_2">Account Details:</div>
                                            <?php // echo '<pre>'; print_r($values); echo '</pre>';  ?>
                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="languages_id"> Choose language:<span class="validcol">*</span> </label>
                                                </div>
                                                <div class="right_fld">
                                                    <select name="languages_id" id="languages_id" style="" class="applyCluetip required sl_bx valid" tip="Please select your prefered language.">
                                                        <option value="">Select Language</option>
                                                        <?php
                                                            foreach($master_data->languages as $langs) {
                                                            $selected = '';
                                                            if(!empty($values->languages) && $values->languages == $langs->id)
                                                            {
                                                                $selected = 'selected=selected';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $langs->id;?>" <?php echo $selected;?>><?php echo $langs->name;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <?php
                                            /*<div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="username"> <span class="validcol">*</span> User Name:</label>
                                                </div>
                                                <div class="right_fld">
                                                      <input type='text' name='username' id='username' value='<?php echo $firstname;?>' class="required ip"/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                             *
                                             */?>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="email"> Email:<span class="validcol">*</span> </label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='email' id='email' value="<?php echo $email;?>" class="applyCluetip required ip" tip="Please enter email. | This mail will be used for communication between you and edealspot. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE."/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="user_email2"> Confirm Email:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='user_email2' id='user_email2' value="<?php echo $email;?>" class="applyCluetip required ip" tip="Please enter same emial ID as entered above."/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <?php
                                            if(!isset($myprofile))
                                            {
                                            ?>
                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="password"> Password:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='password' name='password' id='password' value="<?php echo $password;?>" class="applyCluetip required ip"   tip="Please enter password. | Enter more than 6 characters for a stronger password." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="confirm_password"> Confirm Password:<span class="validcol">*</span> </label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='password' name='confirm_password' id='confirm_password' value="<?php echo $password;?>" class="applyCluetip required ip"  tip="Please enter same password as entered in previous field." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <div class="d_fds">
                                                    <span id="chpwd">Change Password</span>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="h_2">Security Details:</div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for=""> IP Security:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                      <label class="applyCluetip" tip="Selecting yes will provide you more security.">
                                                          <input style="width: 18px;" type="radio" name="ip_security" value="1" />Yes</label>
                                                      <label class="applyCluetip" tip="Selecting yes will provide you less security.">
                                                          <input style="width: 18px;" type="radio" name="ip_security" value="0" />No</label>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="security_questions_id"> Security Question:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <select name="security_questions_id" id="security_questions_id" style="" class="applyCluetip required sl_bx valid" tip="Please select your prefered question." >
                                                        <option value="">Select Question</option>
                                                        <?php
                                                            foreach($master_data->security_questions as $sec_q) {
                                                            $selected = '';
                                                            if(!empty($values->security_questions_id) && $values->security_questions_id == $sec_q->id)
                                                            {
                                                                $selected = 'selected=selected';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $sec_q->id;?>" <?php echo $selected;?>><?php echo $sec_q->name;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="security_answer"> Security Answer:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='security_answer' id='security_answer' value="<?php echo $security_answer;?>" class="applyCluetip required ip"  tip="Please enter your answer for the question choosen above." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>


                                            <div class="h_2">Personal Account Details:</div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="firstname"> First Name:<span class="validcol">*</span> </label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='firstname' id='firstname' value="<?php echo $firstname;?>" class="applyCluetip ip" tip="Please enter First Name. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE."/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="lastname"> Last Name:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='lastname' id='lastname' value="<?php echo $lastname;?>"  class="applyCluetip ip" tip="Please enter Last Name. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="dob"> Date Of Birth:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='dob' id='dob' value="<?php echo $dob;?>"  class="applyCluetip ip apply_dob_datepicker required"  tip="Please enter Date of Birth. <br/>It Should be matched to Your ID Proof for Verification" />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="register_types_id"> Register as:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <select name="register_types_id" id="register_types_id" style="" class="applyCluetip required sl_bx valid"  tip="Please select your registration type." >
                                                        <option value="">Select Registration Type</option>
                                                        <?php
                                                            foreach($master_data->register_types as $reg_types) {
                                                            $selected = '';
                                                            if(!empty($values->register_types_id) && $values->register_types_id == $reg_types->id)
                                                            {
                                                                $selected = 'selected=selected';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $reg_types->id;?>" <?php echo $selected;?>><?php echo $reg_types->name;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="company"> Company name:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='company' id='company' value="<?php echo $company;?>" class="applyCluetip ip" tip="Please enter your company name."/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="business_types_id"> Business Type:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <select name="business_types_id" id="business_types_id" style="" class="applyCluetip sl_bx valid" tip="Please select your business type.">
                                                        <option value="">Select Business Type</option>
                                                        <?php
                                                            foreach($master_data->business_types as $bus_types) {
                                                            $selected = '';
                                                            if(!empty($values->business_types_id) && $values->business_types_id == $bus_types->id)
                                                            {
                                                                $selected = 'selected=selected';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $bus_types->id;?>" <?php echo $selected;?>><?php echo $bus_types->name;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="countries_id"> Country:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">

                                                    <select name='countries_id' id='countries_id' style="" class="applyCluetip sl_bx" tip="Please select your country.">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                            foreach($master_data->countries as $cntries) {
                                                            $selected = '';
                                                            if(!empty($values->countries_id) && $values->countries_id == $cntries->id)
                                                            {
                                                                $selected = 'selected=selected';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $cntries->id;?>" <?php echo $selected;?>><?php echo $cntries->name;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="address"> Address:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <textarea name='address' id='address' class="applyCluetip t_ar" tip="Please enter your address. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE."><?php echo $address;?></textarea>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="city"> City:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='city' id='city' value="<?php echo $city;?>" class="applyCluetip ip" tip="Please enter your city." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="state"> State/Provence:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='state' id='state' value="<?php echo $state;?>" class="applyCluetip ip"  tip="Please enter your state." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                             <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="zip"> Postal Code/Zip Code:<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='zip' id='zip' value="<?php echo $zip;?>" class="applyCluetip ip"  tip="Please enter your Zip code." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>


                                            <div class="h_2">Contact Info:</div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="home_phone"> Home phone No.:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='home_phone' id='home_phone' value="<?php echo $home_phone;?>"  class="applyCluetip ip" tip="Please enter your home phone number. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="office_phone"> Business phone No.:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='office_phone' id='office_phone' value="<?php echo $office_phone;?>" class="applyCluetip ip"  tip="Please enter your Business phone number. | * PLEASE PROVIDE VALID DETAILS FOR VERIFICATION PURPOSE." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="mobile_phone">Mobile phone No :<span class="validcol">*</span></label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='mobile_phone' id='mobile_phone' value="<?php echo $mobile_phone;?>"  class="applyCluetip ip"  tip="This Mobile Number is used For Future Communication, Please Enter valid mobile Number." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="fax_no"> Fax No.:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='fax_no' id='fax_no' value="<?php echo $fax_no;?>"  class="applyCluetip ip" tip="Please enter your Fax number."/>
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="communicate_lang"> Communicative Lang.:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='communicate_lang' id='communicate_lang' class="applyCluetip ip"  tip="Please enter your prefered language." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="time_to_call"> Best Time To Call:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='time_to_call' id='time_to_call' value="<?php echo $time_to_call;?>"  class="applyCluetip ip"  tip="Please enter your prefered time to be called at." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="time_zone"> Time Zone:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <input type='text' name='time_zone' id='time_zone' value=""  class="applyCluetip ip"  tip="Please enter your Time Zone." />
                                                </div>
                                                <div class="cb"></div>
                                            </div>



                                            <div class="h_2">E-Currency Account Details:</div>
                                            <div class="jecur_det">
                                                <?php
                                                $ecur_det_cnt = 0;
                                                $style = 'display:none';
                                                if(count($ecur_details) > 1)
                                                {
                                                    $style = '';
                                                }
                                                if(!empty($ecur_details))
                                                {
                                                    foreach($ecur_details as $values)
                                                    {
                                                        $ecur_det_cnt++;
                                                        /*if($ecur_det_cnt > 1)
                                                        {
                                                            $style = '';
                                                        }*/
                                                    ?>
                                                    <div class="jecur_sec">
                                                        <!--<input type="hidden" name="ecurr_ids[]" value="<?php //echo $values->id;?>">-->
                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="ecurrencies_id"> E-Currency Account Type:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <select name="mul_ecur[ecurrencies_id][]" class="applyCluetip sl_bx valid" tip="Please select your prefered Currency type.">
                                                                    <option value="0">Select Currency Type</option>
                                                                    <?php
                                                                        foreach($master_data->ecurrencies as $ecurs) {
                                                                        $selected = '';
                                                                        if(!empty($values->ecurrencies_id) && $values->ecurrencies_id == $ecurs->id)
                                                                        {
                                                                            $selected = 'selected=selected';
                                                                        }
                                                                    ?>
                                                                        <option value="<?php echo $ecurs->id;?>" <?php echo $selected;?>><?php echo $ecurs->name;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>

                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="account_number"> E-Currency Account Number:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <input type='text' name='mul_ecur[account_number][]' value="<?php if(!empty($values->account_number)) echo $values->account_number;?>" class="applyCluetip ip"  tip="Please enter your E Currency Account number." />
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>

                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="account_name"> E-Currency Account Name:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <input type='text' name='mul_ecur[account_name][]' value="<?php if(!empty($values->account_name)) echo $values->account_name;?>" class="applyCluetip ip"  tip="Please enter your E-Currency Account Name." />
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>
                                                        <input type="button" class="remecur" value="Remove" title="remove" style="<?php echo $style;?>" />
                                                        <input type="hidden" name="mul_ecur[id][]" class="jexist_ecur" value="<?php if(!empty($values->id)) echo $values->id;?>" />
                                                    </div>
                                                    <?php
                                                    }
                                                }
                                                else
                                                {
                                                ?>
                                                    <div class="jecur_sec">
                                                        <!--<input type="hidden" name="ecurr_ids[]" value="<?php //echo $values->id;?>">-->
                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="ecurrencies_id"> E-Currency Account Type:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <select name="mul_ecur_new[ecurrencies_id][]" class="sl_bx valid" >
                                                                    <option value="">Select Currency Type</option>
                                                                    <?php
                                                                        foreach($master_data->ecurrencies as $ecurs) {
                                                                        $selected = '';

                                                                    ?>
                                                                        <option value="<?php echo $ecurs->id;?>" <?php echo $selected;?>><?php echo $ecurs->name;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>

                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="account_number"> E-Currency Account Number:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <input type='text' name='mul_ecur_new[account_number][]' class=" ip"/>
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>

                                                        <div class="d_fds">
                                                            <div class="left_fld">
                                                                <label for="account_name"> E-Currency Account Name:<span class="validcol vs_hd">*</span></label>
                                                            </div>
                                                            <div class="right_fld">
                                                                <input type='text' name='mul_ecur_new[account_name][]' class=" ip" />
                                                            </div>
                                                            <div class="cb"></div>
                                                        </div>
                                                        <input type="hidden" name="mul_ecur[id][]" />
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                            <input type="button" id="addecur" class="addecur" value="Add Ecurrency" />
                                            
                                            
                                            <!-- 
                                            
                                            <div class="d_fds">
                                               <div class="left_fld">
                                                   <label for="myfile">Photo-ID Proof:</label>
                                               </div>
                                               <div class="right_fld">
                                                    <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                                                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                                                </div>
                                                    <div class="cb"></div>
                                            </div>
                                            <div class="d_fds">
                                               <div class="left_fld">
                                                    <label for="myfile">Address Proof:</label>
                                               </div>
                                               <div class="right_fld">
                                                    <input name="files" id="myfile1" class="myfile1" value="" type="hidden"/>
                                                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                                                </div>
                                                    <div class="cb"></div>
                                            </div>
                                            <div class="d_fds">
                                               <div class="left_fld">
                                                    <label for="myfile">Bank Statement Proof:</label>
                                               </div>
                                               <div class="right_fld">
                                                    <input name="files" id="myfile2" class="myfile2" value="" type="hidden"/>
                                                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            
                                            -->
                                            
                                            <!-- <div class="left_fld">
                                                <label for="upload"> Upload File:</label>
                                            </div>
                                            <div class="right_fld">
                                                <input type="file" name="userfile" id="upload">
                                            </div>-->
                                            
                                            <hr/>

                                            <div class="d_fds">
                                                <label><input style="width: 18px;" type="checkbox" name="newsletter" value="1" <?php if($newsletter == 1){echo 'checked=checked';}?>/>
                                                I accept to receive newsletters from edealspot</label>
                                            </div>
                                            <div class="d_fds">
                                                <label><input style="width: 18px;" type="checkbox" name="accept_tc" value="1" class="required"/>
                                                    I accept Terms and Conditions <span class="errmsg"></span></label>
                                            </div>
                                            <div class="d_fds">
                                                <label><input style="width: 18px;" type="checkbox" name="accept_policy" value="1" class="required"/>
                                                I accept Policy <span class="errmsg"></span></label>
                                            </div>
                                             <div class="d_fds">
                                                 <input type='submit' name='signup' value='Submit' class="alt_btn jadd_user" style="padding:5px 20px;" />
                                             </div>
                                             <?php echo formtoken::getField(); ?>
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
       	<!--	Start footer content-->
		<?php $this->load->view('common/general/footer');  ?>
	<!--end footer content-->



    </body>
<script type="text/javascript">
  var app_name = '<?php echo $this->config->item('app_name') ?>';
  var site_url='<?php echo site_url()?>';
        $(function(){
            
            $('.myfile').uploadify({
				'uploader'  : site_url+'uploadify/uploadify.swf',
				'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo base_url('uploadify');  ?>',
				'cancelImg' : site_url+'uploadify/cancel.png',
				'folder'    : '/'+app_name+'/uploads',
				'auto'      : true,
				'multi'     : false,
				'fileExt'   : '*.jpg;*.gif;*.png',
				'fileDesc'    : 'Image Files',
				'sizeLimit'   : 1024000,
				'removeCompleted' : false,
				'onComplete'  : function(event, ID, fileObj, response, data) {
					// Any Callback Functionality goes here.
				}
		}); 
		 $('.myfile1').uploadify({
				'uploader'  : site_url+'uploadify/uploadify.swf',
				'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo base_url('uploadify');  ?>',
				'cancelImg' : site_url+'uploadify/cancel.png',
				'folder'    : '/'+app_name+'/uploads',
				'auto'      : true,
				'multi'     : false,
				'fileExt'   : '*.jpg;*.gif;*.png',
				'fileDesc'    : 'Image Files',
				'sizeLimit'   : 1024000,
				'removeCompleted' : false,
				'onComplete'  : function(event, ID, fileObj, response, data) {
					// Any Callback Functionality goes here.
				}
		}); 
		 $('.myfile2').uploadify({
				'uploader'  : site_url+'uploadify/uploadify.swf',
				'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo base_url('uploadify');  ?>',
				'cancelImg' : site_url+'uploadify/cancel.png',
				'folder'    : '/'+app_name+'/uploads',
				'auto'      : true,
				'multi'     : false,
				'fileExt'   : '*.jpg;*.gif;*.png',
				'fileDesc'    : 'Image Files',
				'sizeLimit'   : 1024000,
				'removeCompleted' : false,
				'onComplete'  : function(event, ID, fileObj, response, data) {
					// Any Callback Functionality goes here.
				}
		}); 
            
        });
</script>
</html>



