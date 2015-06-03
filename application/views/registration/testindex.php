<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>


<div class="app outside">
<!--	PAGE content -->
            <div class="contents pg_width">
                <div class="overlay_bg rel">
                    <div class="fore_ca">
                        <div class="fore_content">
                            <div class="content_wrap fl">
                                <h1 class="h_1">Registration</h1>
							
                                <?php $this->load->view('common/notifications'); ?>
                                
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>">Forexray </a></li>
                                        <li><a class="current">Test Real Account Registration</a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        
                                            <div class="post  pad10 newsbox" style="">
                                                <div class="story bootstrap-scope">
                                                    
                                                    <div class="registration_wrapper tab_wrapper tabbable tabs-top" style="color:#333333;background-color:#ffffff;">
                                                        <?php 
                                                            $formToken=formtoken::getField();
                                                            $form_data=array(); 
                                                            if ($this->session->flashdata('reg_form_data')){
                                                                $form_data=$this->session->flashdata('reg_form_data');
                                                            }
                                                        ?>
                                                        <div class="">
                                                            <div class="tab-pane active" id="Real_Acc_Tab">
                                                                <div style="">
                                                                    
                                                                    <form id="registration_form" class="form-horizontal" method="post" action="<?php echo site_url('registration'); ?>">
                                                                        <input type='hidden' name='id' id='id' value=''/> 
                                                                        <input type="hidden" name="registration_type" id="registration_type" value="real">
                                                                        <input type="hidden" name="is_pamm" id="is_pamm" value="<?php echo $is_pamm;?>">
                                                                        <div class="control-group panel">
                                                                            <h5>Real Account Details</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname">Name<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="firstname" name="firstname" placeholder="Name" class="required" value="<?php if(!empty($form_data['firstname'])){ echo $form_data['firstname']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <?php if($is_pamm=='yes'){?>
									<div class="control-group">
                                                                            <label class="control-label" for="account_for">Account For<strong class="req">*</strong></label>
																			<div class="controls">
                                                                            <select id="account_for" name="account_for" class="required">
                                                                                    <?php if(!empty($form_data['account_for'])){ $account_for= $form_data['account_for']; }else{ $account_for=1;  } ?>
                                                                                    <?php echo selectBox('', 'account_for', 'id,name', ' status=1 ', $account_for, ''); ?>
                                                                                </select>
																			</div>
                                                                        </div>
                                                                        <?php }?>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="email">Email<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="email" name="email" placeholder="Email ID" class="required email" value="<?php if(!empty($form_data['email'])){ echo $form_data['email']; } ?>"/>
                                                                            </div>
                                                                        </div>


                                                                        
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="password">Password<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="password" id="password" placeholder="Password" class="required" name="password"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="confirm_password">Confirm Password<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="password" id="confirm_password" placeholder="Password" class="required" name="confirm_password"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="dob">Date of Birth</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="dob" name="dob" placeholder="Date of Birth" class="" value="<?php if(!empty($form_data['dob'])){ echo $form_data['dob']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="passport">Passport ID /Number</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="passport" name="passport" placeholder="Passport ID /Number" class="" value="<?php if(!empty($form_data['passport'])){ echo $form_data['passport']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        </blockquote>
                                                                        <div class="control-group panel">
                                                                            <h5>Contact Details</h5>
                                                                        </div>

                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="address">Address</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="address" name="address" placeholder="Address" class="" value="<?php if(!empty($form_data['address'])){ echo $form_data['address']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="city">City<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="city" name="city" placeholder="City" class="required" value="<?php if(!empty($form_data['city'])){ echo $form_data['city']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="zip">Zip<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="zip" name="zip" placeholder="Zip" class="required" value="<?php if(!empty($form_data['zip'])){ echo $form_data['zip']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="state">State<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="state" name="state" placeholder="State" class="required" value="<?php if(!empty($form_data['state'])){ echo $form_data['state']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="country_id">Country<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <!--<select id="country_id" name="country_id" placeholder="Country" class="required" onchange="loadData(this.options[this.selectedIndex].value)">-->
                                                                                <select id="country_id" name="country_id" placeholder="Country" class="required">
                                                                                    <?php if(!empty($form_data['country_id'])){ $country_id= $form_data['country_id']; }else{ $country_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'countries', 'id,name', ' status=1 ', $country_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="phone">Phone<strong class="req">*</strong></label>
                                                                            <div class="controls">
																				<select id="isd_code" name="isd_code" placeholder="Country" class="required">
                                                                                    <?php if(!empty($form_data['isd_code'])){ $isd_code= $form_data['isd_code']; }else{ $isd_code=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'countries', 'isd_code,isd_code', ' status=1 ', $isd_code, '', 'distinct '); ?>
																				</select>
																				<input type="text" id="address" name="phone" placeholder="Phone" class="required" value="<?php if(!empty($form_data['phone'])){ echo $form_data['phone']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="phone_password">Phone Password</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="phone_password" name="phone_password" placeholder="Phone Password" class=""/>
                                                                            </div>
                                                                        </div>
                                                                        </blockquote>
																		
																		
																		
																		
																		
																		<div id="group_accountfor">  
                                                                        <div class="control-group panel">
                                                                            <h5>Trading Details</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="group_id">Account Type<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <select id="group_id" name="group_id" placeholder="Group" class="required" >
                                                                                    <?php if(!empty($form_data['group_id'])){ $group_id= $form_data['group_id']; }else{ $group_id=0; } ?>
                                                                                    <?php echo selectBox('Select', 'groups', 'id,name', ' status=1 and id!=1 ', $group_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div id="group_date" style="display:none">   
                                                                        <div  class="control-group">
                                                                            <div>
                                                                                <label class="error-label">NOTE: This is a Fund Manger account. Account capital is locked to support long term trading strategies. </label>
                                                                            </div>
                                                                            <label class="control-label">From Date:</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="start_date" name="start_date" placeholder="From Date" class="required" value="<?php if(!empty($form_data['start_date'])){ echo $form_data['start_date']; } ?>"/>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label">To Date:</label>
                                                                            <div class="controls">
                                                                                  <input type="text" id="exp_date" name="exp_date" placeholder="To Date" class="required" value="<?php if(!empty($form_data['exp_date'])){ echo $form_data['exp_date']; } ?>"/>
                                                                            </div> 
                                                                        </div>
                                                                        </div>   
                                                       
                                                                            
                                                                       <!-- <div class="control-group">
                                                                            <label class="control-label" for="deposit_id">Investment Amount (USD)</label>
                                                                            <div class="controls">
                                                                                <select id="deposit_id" name="deposit_id" placeholder="Deposit" class="">
                                                                                    <?php //if(!empty($form_data['deposit_id'])){ $deposit_id= $form_data['deposit_id']; }else{ $deposit_id=0;  } ?>
                                                                                    <?php //echo selectBox('Select', 'deposits', 'id,name', ' status=1 ', $deposit_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="account_base_id">Account Base Currency</label>
                                                                            <div class="controls">
                                                                                <select id="account_base_id" name="account_base_id" class="">
                                                                                    <?php if(!empty($form_data['account_base_id'])){ $account_base_id= $form_data['account_base_id']; }else{ $account_base_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_account_base', 'id,name', ' status=1 ', $account_base_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="control-group">
                                                                            <label class="control-label" for="leverage_id">Leverage<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <select id="leverage_id" name="leverage_id" placeholder="Leverage" class="required" >
                                                                                    <?php if(!empty($form_data['leverage_id'])){ $leverage_id= $form_data['leverage_id']; }else{ $leverage_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'leverage', 'id,name', ' status=1 ', $leverage_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        </blockquote>

                                                                        <div class="control-group panel">
                                                                            <h5>Investment Information</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="estimate_income_id">Your total Estimated Income (USD)</label>
                                                                            <div class="controls">
                                                                                <select id="estimate_income_id" name="estimate_income_id" class="">
                                                                                    <?php if(!empty($form_data['estimate_income_id'])){ $estimate_income_id= $form_data['estimate_income_id']; }else{ $estimate_income_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_estimate_income', 'id,name', ' status=1 ', $estimate_income_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="estimate_net_worth_id">Your total Estimated Net Worth (USD)</label>
                                                                            <div class="controls">
                                                                                <select id="estimate_net_worth_id" name="estimate_net_worth_id" class="">
                                                                                    <?php if(!empty($form_data['estimate_net_worth_id'])){ $estimate_net_worth_id= $form_data['estimate_net_worth_id']; }else{ $estimate_net_worth_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_estimate_net_worth', 'id,name', ' status=1 ', $estimate_net_worth_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="level_of_education_id">Level of Education</label>
                                                                            <div class="controls">
                                                                                <select id="level_of_education_id" name="level_of_education_id" class="">
                                                                                    <?php if(!empty($form_data['level_of_education_id'])){ $level_of_education_id= $form_data['level_of_education_id']; }else{ $level_of_education_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_level_of_education', 'id,name', ' status=1 ', $level_of_education_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="employment_status_id">Employment Status</label>
                                                                            <div class="controls">
                                                                                <select id="employment_status_id" name="employment_status_id" class="">
                                                                                    <?php if(!empty($form_data['employment_status_id'])){ $employment_status_id= $form_data['employment_status_id']; }else{ $employment_status_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_employment_status', 'id,name', ' status=1 ', $employment_status_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="control-group">
                                                                            <label class="control-label" for="nature_of_business_id">Nature of Business/Employment</label>
                                                                            <div class="controls">
                                                                                <select id="nature_of_business_id" name="nature_of_business_id" class="">
                                                                                    <?php if(!empty($form_data['nature_of_business_id'])){ $nature_of_business_id= $form_data['nature_of_business_id']; }else{ $nature_of_business_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_nature_of_business', 'id,name', ' status=1 ', $nature_of_business_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="control-group" id="j_nature_of_business_other">
                                                                            <label class="control-label" for="nature_of_business">Nature of Business/Employment</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="nature_of_business" name="nature_of_business" placeholder="Nature of Business/Employment" class="" title="Please enter a Nature of Business/Employment" />
                                                                            </div>
                                                                        </div>
																		</div>
                                                                        </blockquote>
																		
																		
																		
																		
																		
																		

                                                                        <div class="control-group panel">
                                                                            <h5>Trading Knowledge</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="send_reports"><input type="checkbox" name="forex_cfds" value="1"  <?php if(!empty($form_data['forex_cfds']) && $form_data['forex_cfds']=='1'){ echo 'checked'; } ?>/></label>
                                                                            <div class="controls">
                                                                                Forex and CFDs (Contracts for Difference)
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="send_reports"><input type="checkbox" name="equities_bonus" value="1"  <?php if(!empty($form_data['equities_bonus']) && $form_data['equities_bonus']=='1'){ echo 'checked'; } ?>/></label>
                                                                            <div class="controls">
                                                                                Equities and Bonds
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="send_reports"><input type="checkbox" name="other_derivatives" value="1"  <?php if(!empty($form_data['other_derivatives']) && $form_data['other_derivatives']=='1'){ echo 'checked'; } ?>/></label>
                                                                            <div class="controls">
                                                                                Other Derivatives
                                                                            </div>
                                                                        </div>
                                                                        </blockquote>

                                                                        <div class="control-group panel">
                                                                            <h5>Accept Conditions / Confirmations</h5>
                                                                        </div>
                                                                        <blockquote>

                                                                        <div class="control-group">
                                                                            <label class="control-label" for="send_reports"><input type="checkbox" name="send_reports" value="1"  <?php if(!empty($form_data['send_reports']) && $form_data['send_reports']=='1'){ echo 'checked'; } ?>/></label>
                                                                            <div class="controls">
                                                                                I agree to receive account reports, newsletters, special offers and also agree to be contacted by ForexRay representatives via phone or e-mail.
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="t_and_c"><input type="checkbox" name="t_and_c" value="1" class="required" title="Please accept the conditions" /></label>
                                                                            <div class="controls">
                                                                                I declare that I have carefully read and fully understood the entire text of the Terms and Conditions, Privacy Policy, which I fully understand, accept and agree with.
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="risk_ack"><input type="checkbox" name="risk_ack" value="1" class="required"  title="Please accept the conditions" /></label>
                                                                            <div class="controls">
                                                                                I declare & acknowledge the risk warning of ForexRay that forex trading and trading in other products, and I accept and agree with significant level of risk and wish to proceed with my registering a Trading Account with ForexRay.
                                                                            </div>
                                                                        </div>

                                                                        </blockquote>

                                                                        <div class="control-group well">
                                                                            <label class="control-label" for="verification_code">Verification Code<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <?php if(!empty($captcha['image'])){ echo $captcha['image']; } ?> Confirm: <input type='text' name='captcha' class="required" id='captcha' value='' autocomplete="off" title="Please enter the text from the image." placeholder="Verification Code" />
                                                                            </div>
                                                                        </div>


                                                                        <div class="control-group">
                                                                            <div class="controls">
                                                                                <label class="checkbox">

                                                                                </label>
                                                                                <button type="submit" class="btn">Register</button>
                                                                            </div>
                                                                        </div>

                                                                        <div><?php echo $formToken; ?></div>
                                                                    </form>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                        
                        
                                                        <script>
                                                            $(function() {
                                                                $('#tabs_Ads a').click(function (e) {
                                                                    e.preventDefault();
                                                                    window.location.hash=$(this).attr('href');
                                                                    $(this).tab('show');
                                                                })
                                                                
                                                                if(window.location.hash!='')
                                                                    $('#tabs_Ads').find('a[href="'+window.location.hash+'"]').tab('show');
                                                                else
                                                                    $('#tabs_Ads a:first').tab('show');
                                                            })
                                                        </script>
                                                    </div>
                                                    
                                                    
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
										
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <div class="right_ca fl">
                                
                                <?php $this->load->view('common/sidebar_1'); ?>
                                
                                <?php $this->load->view('common/sidebar_terminal'); ?>
                                
                                <?php // $this->load->view('common/sidebar_news');?>
    
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<style type="text/css">
    .req{
        color:#D83B39;
    }
    .app .registration_wrapper .nav li a {
        color:#4C5463;
    }
    .bootstrap-scope .registration_wrapper .nav li.active > a{
        color: #555555;
    }
    .error-label{
        color: #ff0000;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
<?php if(isset($form_data['account_for']) && ($form_data['account_for']=='3' || $form_data['account_for']=='2')){?>
<script type="text/javascript">
     
            $('#group_accountfor').hide();
           
</script>
<?php }  //print_r($countries_isdcodes); ?>

<script type="text/javascript">
var countriesData = <?php echo json_encode($countries_isdcodes);?> ;
    $(function(){
        
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
               },
               email:{
                   /*remote:'<?php echo site_url('registration/check_email'); ?>'*/
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
               },
               start_date:{
                   required:'Please enter From Date'
               },
               exp_date:{
                   required:'Please enter To Date'
               }
                   
                
           }
       });
       
       $('#dob').datepicker({ yearRange: "1900:2010", changeYear: true, changeMonth:true, dateFormat: "yy-mm-dd" }); 
       
       
       
        $( "#start_date" ).datepicker({
                minDate: 0,
                changeMonth: true,
                dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                 $( "#exp_date" ).datepicker( "option", "minDate", selectedDate );
                }
        });
        $( "#exp_date" ).datepicker({
                changeMonth: true,
                 dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                 $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
                }
        });
        
        $('#group_id').live('change',function(){
        if($(this).val()=='7'){
            $('#group_date').show();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#group_date').hide();
            // $('#nature_of_business').remoevClass('required');
        }
       })
       
	   $('#account_for').live('change',function(){
        if($(this).val()=='3' || $(this).val()=='2'){
            $('#group_accountfor').hide();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#group_accountfor').show();
            // $('#nature_of_business').remoevClass('required');
        }
       })
	   
	   
       $('#nature_of_business_id').live('change',function(){
        if($(this).val()=='2'){
            $('#j_nature_of_business_other').show();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#j_nature_of_business_other').hide();
            // $('#nature_of_business').remoevClass('required');
        }
       })
	   
	   
	   $('#country_id').live('change',function(){ 
	    //console.log(countriesData[$('#country_id').val()])
	     $('#isd_code').val(countriesData[$('#country_id').val()])  
		})
	   
	   
		
	   
	         
    });
	
	

function loadData(country_id){
//alert(country_id);
	var dataString = 'country_id='+ country_id;
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('registration/loadData');?>",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
			$("#isd").val(result);  
		}
	});
}

	
</script>

<?php $this->load->view('common/footer');?>




