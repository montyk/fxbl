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
                                        <li><a href="<?php echo site_url('/'); ?>"><?php echo $this->config->item('project_name') ?> </a></li>
                                        <li><a class="current">Demo Account Registration</a></li>
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
                                                            <div class="tab-pane " id="Demo_Acc_Tab">
                                                                <div style="">
                                                                    
                                                                    <form id="registration_form_2" class="form-horizontal" method="post" action="<?php echo site_url('registration'); ?>">
                                                                        <input type='hidden' name='id' id='id_2' value=''/> 
                                                                        <input type='hidden' name='registration_type' id='id_3' value='demo'/> 
																		<input type="hidden" id="account_for" name="account_for" value="1"/>
                                                                        <div class="control-group panel">
                                                                            <h5>Demo Account Details</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname_2">Name<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="firstname_2" name="firstname" placeholder="Name" class="required" value="<?php if(!empty($form_data['firstname'])){ echo $form_data['firstname']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="email_2">Email<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="email_2" name="email" placeholder="Email ID" class="required email" value="<?php if(!empty($form_data['email'])){ echo $form_data['email']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <input type='hidden' name='group_id' value='1'>

                                                                        
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
                                                                            <label class="control-label" for="dob_2">Date of Birth</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="dob_2" name="dob" placeholder="Date of Birth" class="" value="<?php if(!empty($form_data['dob'])){ echo $form_data['dob']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="passport_2">Passport ID /Number</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="passport_2" name="passport" placeholder="Passport ID /Number" class="" value="<?php if(!empty($form_data['passport'])){ echo $form_data['passport']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        </blockquote>
                                                                        <div class="control-group panel">
                                                                            <h5>Contact Details</h5>
                                                                        </div>

                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="address_2">Address</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="address_2" name="address" placeholder="Address" class="" value="<?php if(!empty($form_data['address'])){ echo $form_data['address']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="city_2">City<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="city_2" name="city" placeholder="City" class="required" value="<?php if(!empty($form_data['city'])){ echo $form_data['city']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="zip_2">Zip<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="zip_2" name="zip" placeholder="Zip" class="required" value="<?php if(!empty($form_data['zip'])){ echo $form_data['zip']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="state_2">State<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <input type="text" id="state_2" name="state" placeholder="State" class="required" value="<?php if(!empty($form_data['state'])){ echo $form_data['state']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="country_id_2">Country<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <select id="country_id_2" name="country_id" placeholder="Country" class="required">
                                                                                    <?php if(!empty($form_data['country_id'])){ $country_id= $form_data['country_id']; }else{ $country_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'countries', 'id,name', ' status=1 ', $country_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="phone_2">Phone</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="phone_2" name="phone" placeholder="Phone" class="" value="<?php if(!empty($form_data['phone'])){ echo $form_data['phone']; } ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        </blockquote>
                                                                        <div class="control-group panel">
                                                                            <h5>Trading Details</h5>
                                                                        </div>
                                                                        <blockquote>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="deposit_id_2">Deposit(for demo only)</label>
                                                                            <div class="controls">
                                                                                <select id="deposit_id_2" name="deposit_id" placeholder="Deposit" class="">
                                                                                    <?php if(!empty($form_data['deposit_id'])){ $deposit_id= $form_data['deposit_id']; }else{ $deposit_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'deposits', 'id,name', ' status=1 ', $deposit_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="account_base_id_2">Account Base Currency</label>
                                                                            <div class="controls">
                                                                                <select id="account_base_id_2" name="account_base_id" class="">
                                                                                    <?php if(!empty($form_data['account_base_id'])){ $account_base_id= $form_data['account_base_id']; }else{ $account_base_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'sb_account_base', 'id,name', ' status=1 ', $account_base_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="control-group">
                                                                            <label class="control-label" for="leverage_id_2">Leverage<strong class="req">*</strong></label>
                                                                            <div class="controls">
                                                                                <select id="leverage_id_2" name="leverage_id" placeholder="Leverage" class="required" >
                                                                                    <?php if(!empty($form_data['leverage_id'])){ $leverage_id= $form_data['leverage_id']; }else{ $leverage_id=0;  } ?>
                                                                                    <?php echo selectBox('Select', 'leverage', 'id,name', ' status=1 ', $leverage_id, ''); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        </blockquote>

                                                                        <div class="control-group panel">
                                                                            <h5>Accept Conditions / Confirmations</h5>
                                                                        </div>
                                                                        <blockquote>

                                                                        <div class="control-group">
                                                                            <label class="control-label" for="send_reports"><input type="checkbox" name="send_reports" value="1"  <?php if(!empty($form_data['send_reports']) && $form_data['send_reports']=='1'){ echo 'checked'; } ?>/></label>
                                                                            <div class="controls">
                                                                                I agree to receive account reports, newsletters, special offers and also agree to be contacted by <?php echo $this->config->item('project_name') ?> representatives via phone or e-mail.
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
                                                                                I declare & acknowledge the risk warning of <?php echo $this->config->item('project_name') ?> that forex trading and trading in other products, and I accept and agree with significant level of risk and wish to proceed with my registering a Trading Account with <?php echo $this->config->item('project_name') ?>.
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
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>

<script type="text/javascript">
    $(function(){
        
        jQuery.validator.addMethod("password_format", function(value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/.test(value);
        }, "Password must be at least 4 characters, not more than 15 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");
        
       
       $('#dob_2').datepicker({ yearRange: "1900:2010", changeYear: true, changeMonth:true, dateFormat: "yy-mm-dd" });
       
       $('#registration_form_2').validate({
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
               }
           }
       });
       
       $('#nature_of_business_id').live('change',function(){
        if($(this).val()=='2'){
            $('#j_nature_of_business_other').show();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#j_nature_of_business_other').hide();
            // $('#nature_of_business').remoevClass('required');
        }
       })
       
    });
</script>

<?php $this->load->view('common/footer');?>




