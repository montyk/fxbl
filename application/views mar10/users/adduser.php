 	 <?php $this->load->view('common/admin/main_header'); ?>
   
	<script type="text/javascript" src="<?php echo base_url();?>public/js/components/ecur_html.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>

    <script type="text/javascript">
$(document).ready(function(){
    var x = new Date()
        var timeZone = currentTimeZoneOffsetInHours = x.getTimezoneOffset();
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/setUserTimeZone');?>',
            data: 'tz_offset = '+timeZone,
            beforeSend : function(){
            },
            success: function(){
            },
            complete: function(){
            }
       });
    $('#chpwd').click(function(){
        $('#old_pwd').val('');
        $('#new_pwd').val('');
        $('#cnf_pwd').val('');
        $('.jmsg').html('');
        $.blockUI({ message: $('.jchpwd') });
    });

    $('.j_u_m').live('click',function(){
        $.unblockUI();
    });
    $("#chpwd_form").validate({
        rules: {
            old_pwd: {
                required: true,
                minlength: 5
            },
            new_pwd: {
                required: true,
                minlength: 5
            },
            cnf_pwd: {
                required: true,
                minlength: 5,
                equalTo: "#new_pwd"
            }
        },
        messages: {
            old_pwd: {
                required: "Please provide old password",
                minlength: "Your password must be at least 5 characters long"
            },
            new_pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            cnf_pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            }
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function()
        {
           var chpwd_data = $('#chpwd_form').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo site_url();?>users/changePassword',
                data: chpwd_data,
                beforeSend : function(){
                },
                success: function(res){
                    if(res == 'success')
                    {
                        $('.jmsg').html('Password Changed Successfully');
                        setTimeout($.unblockUI, 2000);
                    }
                    else if(res == 'invalid')
                    {
                        $('.jmsg').html('Incorrect old password').show();
                        $('#old_pwd').focus();
                        $('.jmsg').fadeOut(5000, function() {
                            // Animation complete.
                        });
                    }
                },
                complete: function(){
                }
           });
        }
    });
    $('.jsave_chpwd').live('click',function(){
        $("#chpwd_form").submit();
    });
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
            address:"required"
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
            accept_policy:"Please accept the policy"
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

    var users_id = '<?php echo $id;?>';
    if(users_id != '0') // select options if edit mode
    {
        $('#languages_id').val('<?php echo $languages_id;?>');
        $('#security_questions_id').val('<?php echo $security_questions_id;?>');
        $('#register_types_id').val('<?php echo $register_types_id;?>');
        $('#business_types_id').val('<?php echo $business_types_id;?>');
        $('#countries_id').val('<?php echo $countries_id;?>');
        //$('#ecurrencies_id').val('<?php //echo $ecurrencies_id;?>');
        if('<?php echo $ip_security;?>' == '1') //if yes select yes
        {
            $('input[name=ip_security]:eq(0)').attr('checked', 'checked');
        }
        else
        {
            $('input[name=ip_security]:eq(1)').attr('checked', 'checked');
        }
    }
    $('#email').blur(function(){
        var qry_str = 'email='+$(this).val()+'&users_id='+users_id;
        $.ajax({
            type: "POST",
            url: '<?php echo site_url();?>users/check_ifexist',
            data: qry_str,
            beforeSend : function(){
            },
            success: function(res){
                if(res != '0')
                {
                    if(!$('#email').next('#user_exist').length)
                    {
                        $('#email').after('<label id="user_exist" class="error">This Email-id is already used</label>');
                    }
                    $('#email').focus();
                }
                else
                {
                    $('#user_exist').remove();
                }
            },
            complete: function(){

            }
       });
    });

    $('#addecur').click(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('users/getEcurrencies');?>',
            beforeSend : function(){
            },
            success: function(data){
                $('.jecur_det').append($.eCurhtml(data));
                $('.remecur').show();
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
                url: '<?php echo site_url();?>users/delUserEcurrencies',
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
	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>

	
	<section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article"><a href="#">FOREXRAY Admin</a> <div class="breadcrumb_divider"></div> <a class="current">User</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp w850">
        
            <form name="registerform" id="registerform" action="<?php echo site_url('users/saveuser');?>" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $id;?>">
            
            
            <div class="h_2">Account Details:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="languages_id"> <span class="validcol">*</span> Choose language:</label> 
                </div>
                <div class="right_fld">
                    <select name="languages_id" id="languages_id" style="" class=" required sl_bx valid">
                        <option value="">Select Language</option>
                        <?php
                            foreach($master_data->languages as $langs) {
                            $selected = '';
                            if($values->languages == $langs->id)
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
                    <label for="email"> <span class="validcol">*</span> Email:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='email' id='email' value="<?php echo $email;?>" class=" required ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="user_email2"> <span class="validcol">*</span> Confirm Email:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='user_email2' id='user_email2' value="<?php echo $email;?>" class=" required ip"/>
                </div>
                <div class="cb"></div>
            </div>
            <?php
            if(!isset($myprofile))
            {
            ?>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="password"> <span class="validcol">*</span> Password:</label>
                </div>
                <div class="right_fld">
                    <input type='password' name='password' id='password' value="<?php echo $password;?>" class=" required ip"  />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="confirm_password"> <span class="validcol">*</span> Confirm Password:</label> 
                </div>
                <div class="right_fld">
                    <input type='password' name='confirm_password' id='confirm_password' value="<?php echo $password;?>" class=" required ip" />
                </div>
                <div class="cb"></div>
            </div>
            <?php
            }
            else
            {
            ?>
                <div class="d_fds">
                    <span id="chpwd" style="font-weight:bold">Change Password</span>
                </div>
            <?php
            }
            ?>
            <div class="h_2">Security Details:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for=""> <span class="validcol">*</span> IP Security:</label> 
                </div>
                <div class="right_fld">
                      <label class="" tip="Selecting yes will provide you more security.">
                          <input style="width: 18px;" type="radio" name="ip_security" value="1" />Yes</label>
                      <label class="" tip="Selecting yes will provide you less security.">
                          <input style="width: 18px;" type="radio" name="ip_security" value="0" />No</label>
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
                        <?php
                            foreach($master_data->security_questions as $sec_q) {
                            $selected = '';
                            if($values->security_questions_id == $sec_q->id)
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
                    <label for="security_answer"> <span class="validcol">*</span> Security Answer:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='security_answer' id='security_answer' value="<?php echo $security_answer;?>" class=" required ip"/>
                </div>
                <div class="cb"></div>
            </div>   
        
        
            <div class="h_2">Personal Account Details:</div>
                
            <div class="d_fds">
                <div class="left_fld">
                    <label for="firstname"> <span class="validcol">*</span> First Name:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='firstname' id='firstname' value="<?php echo $firstname;?>" class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="lastname"> <span class="validcol">*</span> Last Name:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='lastname' id='lastname' value="<?php echo $lastname;?>"  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="dob"> <span class="validcol">*</span> Date Of Birth:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='dob' id='dob' value="<?php echo $dob;?>"  class=" ip apply_dob_datepicker required" />
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
                        <?php
                            foreach($master_data->register_types as $reg_types) {
                            $selected = '';
                            if($values->register_types_id == $reg_types->id)
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
                    <label for="company"><span class="validcol vs_hd">*</span> Company name:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='company' id='company' value="<?php echo $company;?>" class="ip"/>
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
                        <?php
                            foreach($master_data->business_types as $bus_types) {
                            $selected = '';
                            if($values->business_types_id == $bus_types->id)
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
                    <label for="countries_id"> <span class="validcol">*</span> Country:</label>
                </div>
                <div class="right_fld">
                    
                    <select name='countries_id' id='countries_id' style="" class=" sl_bx">
                        <option value="">Select Country</option>
                        <?php
                            foreach($master_data->countries as $cntries) {
                            $selected = '';
                            if($values->countries_id == $cntries->id)
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
                    <label for="address"> <span class="validcol">*</span> Address:</label>
                </div>
                <div class="right_fld">
                    <textarea name='address' id='address' class=" t_ar"><?php echo $address;?></textarea>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="city"> <span class="validcol">*</span> City:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='city' id='city' value="<?php echo $city;?>" class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="state"> <span class="validcol">*</span> State/Provence:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='state' id='state' value="<?php echo $state;?>" class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
             <div class="d_fds">
                <div class="left_fld">
                    <label for="zip"> <span class="validcol">*</span> Postal Code/Zip Code:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='zip' id='zip' value="<?php echo $zip;?>" class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
                
        
            <div class="h_2">Contact Info:</div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="home_phone"> <span class="validcol vs_hd">*</span> Home phone No.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='home_phone' id='home_phone' value="<?php echo $home_phone;?>"  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="office_phone"> <span class="validcol vs_hd">*</span> Business phone No.:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='office_phone' id='office_phone' value="<?php echo $office_phone;?>" class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="mobile_phone"><span class="validcol">*</span> Mobile phone No.:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='mobile_phone' id='mobile_phone' value="<?php echo $mobile_phone;?>"  class=" ip" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="fax_no"> <span class="validcol vs_hd">*</span> Fax No.:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='fax_no' id='fax_no' value="<?php echo $fax_no;?>"  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="communicate_lang"> <span class="validcol vs_hd">*</span> Communicative Lang.:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='communicate_lang' id='communicate_lang' class=" ip" value="<?php if(isset($communicate_lang)) echo $communicate_lang;?>" />
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="time_to_call"> <span class="validcol vs_hd">*</span> Best Time To Call:</label>
                </div>
                <div class="right_fld">
                    <input type='text' name='time_to_call' id='time_to_call' value="<?php echo $time_to_call;?>"  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
            <div class="d_fds">
                <div class="left_fld">
                    <label for="time_zone"> <span class="validcol vs_hd">*</span> Time Zone:</label> 
                </div>
                <div class="right_fld">
                    <input type='text' name='time_zone' id='time_zone' value="<?php if(isset($time_zone)) echo $time_zone;?>"  class=" ip"/>
                </div>
                <div class="cb"></div>
            </div>
            
        
        
            <div class="h_2">E-Currency Account Details:</div>
            <div class="jecur_det">
                <?php
                $ecur_det_cnt = 0;
                $style = 'display:none';
                if(count($ecur_details))
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
                                <label for="ecurrencies_id"> <span class="validcol vs_hd">*</span> E-Currency Account Type:</label>
                            </div>
                            <div class="right_fld">
                                <select name="mul_ecur[ecurrencies_id][]" class="sl_bx valid" >
                                    <option value="0">Select Currency Type</option>
                                    <?php
                                        foreach($master_data->ecurrencies as $ecurs) {
                                        $selected = '';
                                        if($values->ecurrencies_id == $ecurs->id)
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
                                <label for="account_number"> <span class="validcol vs_hd">*</span> E-Currency Account Number:</label>
                            </div>
                            <div class="right_fld">
                                <input type='text' name='mul_ecur[account_number][]' value="<?php echo $values->account_number;?>" class=" ip"/>
                            </div>
                            <div class="cb"></div>
                        </div>

                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="account_name"> <span class="validcol vs_hd">*</span> E-Currency Account Name:</label>
                            </div>
                            <div class="right_fld">
                                <input type='text' name='mul_ecur[account_name][]' value="<?php echo $values->account_name;?>" class=" ip" />
                            </div>
                            <div class="cb"></div>
                        </div>
                        <div class="d_fds"><input type="button" class="remecur" value="Remove" style="<?php echo $style;?>"></div>
                        <input type="hidden" name="mul_ecur[id][]" class="jexist_ecur" value="<?php echo $values->id;?>">
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
                                <label for="ecurrencies_id"> <span class="validcol vs_hd">*</span> E-Currency Account Type:</label>
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
                                <label for="account_number"> <span class="validcol vs_hd">*</span> E-Currency Account Number:</label>
                            </div>
                            <div class="right_fld">
                                <input type='text' name='mul_ecur_new[account_number][]' class=" ip"/>
                            </div>
                            <div class="cb"></div>
                        </div>

                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="account_name"> <span class="validcol vs_hd">*</span> E-Currency Account Name:</label>
                            </div>
                            <div class="right_fld">
                                <input type='text' name='mul_ecur_new[account_name][]' class=" ip" />
                            </div>
                            <div class="cb"></div>
                        </div>
                        <input type="hidden" name="mul_ecur[id][]">
                    </div>
                <?php
                }
            ?>
            </div>
            <input type="button" id="addecur" value="Add Ecurrency" />
            <!-- <input type="button" class="remecur" value="Remove" style="<?php //echo $style;?>">-->
            
            <div class="d_fds">
               <!-- <div class="left_fld">
                    <label for="upload"> Upload File:</label>
                </div>
                <div class="right_fld">
                    <input type="file" name="userfile" id="upload">
                </div>-->
               <div class="left_fld">
                    <label for="myfile">Photo-ID Proof:*</label>
                </div>
               <div class="right_fld">
                    <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
		   <?php if(isset($attach_details[0]->url) &&  $attach_details[0]->url != '')
				 { 	?>
					<!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
					<span><?php echo attachment($attach_details[0]->db_file_name,$attach_details[0]->original_file_name);?></span>
			<?php
				 }?>
                </div>
                <div class="cb"></div>
            </div>
			<div class="d_fds">
               <!-- <div class="left_fld">
                    <label for="upload"> Upload File:</label>
                </div>
                <div class="right_fld">
                    <input type="file" name="userfile" id="upload">
                </div>-->
               <div class="left_fld">
                    <label for="myfile">Address Proof:*</label>
                </div>
               <div class="right_fld">
                    <input name="files" id="myfile1" class="myfile1" value="" type="hidden"/>
                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
		   <?php if(isset($attach_details[1]->url) &&  $attach_details[1]->url != '')
				 { 	?>
					<!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
					<span><?php echo attachment($attach_details[1]->db_file_name,$attach_details[1]->original_file_name);?></span>
			<?php
				 }?>
                </div>
                <div class="cb"></div>
            </div>
			<div class="d_fds">
               <!-- <div class="left_fld">
                    <label for="upload"> Upload File:</label>
                </div>
                <div class="right_fld">
                    <input type="file" name="userfile" id="upload">
                </div>-->
               <div class="left_fld">
                    <label for="myfile">Bank Statement Proof:*</label>
               </div>
               <div class="right_fld">
                    <input name="files" id="myfile2" class="myfile2" value="" type="hidden"/>
                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
		   <?php if(isset($attach_details[2]->url) &&  $attach_details[2]->url != '')
				 { 	?>
					<!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
					<span><?php echo attachment($attach_details[2]->db_file_name,$attach_details[2]->original_file_name);?></span>
			<?php
				 }?>
                </div>
                <div class="cb"></div>
            </div>
			<?php  if(!isset($myprofile)) { ?>
			<div class="d_fds">
                <div class="left_fld">
                    <label for="email"> <span class="validcol"></span> Account Verification :</label>
                </div>
                <div class="right_fld">
                    <input type="radio" name="account_verification" value="1" <?php echo $account_verification == 1?'checked=checked':'';?> /> Active
                    <input type="radio" name="account_verification" value="0" <?php echo $account_verification == 0?'checked=checked':'';?> /> Inactive
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="email"> <span class="validcol"></span> Email Verification Status:</label>
                </div>
                <div class="right_fld">
                    <input type="radio" name="varification_status" value="1" <?php echo $varification_status == 1?'checked=checked':'';?> /> Active
                    <input type="radio" name="varification_status" value="0" <?php echo $varification_status == 0?'checked=checked':'';?> /> Inactive
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="status"> <span class="validcol"></span> Status:</label>
                </div>
                <div class="right_fld">
                    <input type="radio" name="status" value="1" <?php echo $status == 1?'checked=checked':'';?> /> Yes
                    <input type="radio" name="status" value="0" <?php echo $status == 0?'checked=checked':'';?> /> No
                </div>
                <div class="cb"></div>
            </div>
			<?php } ?>
			
            <hr/>
            
            <div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="newsletter" value="1" <?php if($newsletter == 1){echo 'checked=checked';}?>/>
                I accept to receive newsletters from edealspot</label>
            </div>
            <?php  if(!isset($myprofile)) { ?>
			<div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="accept_tc" value="1" class="required"/>
                    I accept Terms and Conditions <span class="errmsg"></span></label>
            </div>
            <div class="d_fds">
                <label><input style="width: 18px;" type="checkbox" name="accept_policy" value="1" class="required"/>
                I accept Policy <span class="errmsg"></span></label>
            </div>
			<?php } ?>
             <div class="d_fds">
             	<input type='submit' name='signup' value='Add User' class="alt_btn jadd_user" />
             </div>
             <?php echo formtoken::getField(); ?>
        </form>
    </div>
</section>
    

    <div class="jchpwd m_w" style="display:none">
        <form name="chpwd_form" id="chpwd_form">
            <input type="hidden" name="users_id" value="<?php echo $id;?>">
    	<div class="m_h ed_img">
        	<div class="h_t fl j_ae_ecur_txt">Change Password</div>
            <div class="j_u_m icon ed_img fr c_i c_i_h"></div>
            <div class="cb"></div>
        </div>
        <div class="m_c">
            <div class="d_fds">
                <div class="left_fld">
                    <label for="old_pwd">Old Password:</label>
                </div>
                <div class="right_fld">
                      <input type='password' name='old_pwd' id='old_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">
                <div class="left_fld">
                    <label for="new_pwd">Password:</label>
                </div>
                <div class="right_fld">
                    <input style="display:block" type='password' name='new_pwd' id='new_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">
                <div class="left_fld">
                    <label for="cnf_pwd"> Confirm Password:</label>
                </div>
                <div class="right_fld">
                    <input style="display:block" type='password' name='cnf_pwd' id='cnf_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>
        </div>
        <div class="m_f ed_img">
        	<a class="prybtn fl jsave_chpwd">
            	<span class="inner-btn">
            		<span class="label">Save</span>
                </span>
            </a>
            <a class="secbtn fl j_u_m">
            	<span class="inner-btn">
            		<span class="label">Cancel</span>
                </span>
            </a>
            <span class="jmsg"></span>
        </div>
        </form>
    </div>
	</div>
<script type="text/javascript">
var site_url='<?php echo site_url()?>';
var app_name = '<?php echo $this->config->item('app_name') ?>';
	$(function(){
		
	   $('.myfile').uploadify({
				'uploader'  : site_url+'uploadify/uploadify.swf',
				'script'    : '<?php echo site_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo site_url('uploadify');  ?>',
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
				'script'    : '<?php echo site_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo site_url('uploadify');  ?>',
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
				'script'    : '<?php echo site_url();  ?>uploadify/uploadify.php',
				//'script'    : '<?php //echo site_url('uploadify');  ?>',
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
</body>
</html>