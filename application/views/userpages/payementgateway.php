<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Payment Gateway</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>


    <body class="app pamm_man_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">Payment Gateway</div>
                    <div class="rightNav_cnt">
            <script type="text/javascript">
            
            $(document).ready(function() {
			
                jQuery.validator.addMethod("password_format", function(value, element) {
                        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/.test(value);
                }, "Password must be at least 4 characters, not more than 15 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");
                
                $("#changepassword").validate({
                    rules: {  
					   current_password:{
						   required:true
					   },
                                           new_password:{
						   password_format:true
					   },
					   confirm_password:{
							equalTo: "#new_password"
					   }
                    },
                    messages: {
					   current_password:{
						   required:'Please enter current password'
					   },
                                           new_password:{
						   required:'Please enter new password'
					   },
					   confirm_password:{
						   required:'Please enter confirm password',
						   equalTo:'Please enter the same password as above'
					   } 
					}
                });
                
            });
            
        </script>                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        <?php $userDetails=unserialize($this->session->userdata('fx_user_details')); ?>
                        <?php //echo $userDetails->login;?>
                        <div class="hdr1 f_b m_b_10">Change Password</div>
                        <?php if(isset($message) && $message!=''){
                        if($msg=='3') $class='alert_success'; else $class='alert_error';
                        ?>
                          <div class="up_alert_error <?php echo $class;?>">
                          <b><?php echo $message;?></b>
                          </div>
                          <?php }?>                 
                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" name="changepassword" id="changepassword" action="https://www.onlinedengi.ru/wmpaycheck.php" class="j_general_validate">
							
                               <input type="hidden" name="project" value="6792" id="project"/>
                                <input type="hidden" name="order_id" value="<?php echo $userDetails->login; ?>" />
                                <!--
                                
                                <div class="m_t_10 clearfix">
                                <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Your nickname:</label> </div> 
                                <div class="rgt_stflbl"><input type="text" name="nickname" id="nickname"  value="<?php echo $userDetails->id; ?>" class="ip r_f required" placeholder="Nick Name"/> 
                                    <label for="nickname" class="error clearfix"></label>
                                </div>  </div>
                                
                                 <div class="m_t_10 clearfix">
                                <div class="lft_stflbl"><label for="amount"><span class="star">*</span>Payment amount in payment system’s currency:</label> </div> 
                                <div class="rgt_stflbl"><input type="text" name="amount" id="amount"  class="ip r_f required" placeholder="Amount"/> 
                                    <label for="amount" class="error clearfix"></label>
                                </div>  </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="mode_type"><span class="star">*</span>Mode Type:</label></div>
                                    <div class="rgt_stflbl">
                                        <select name="mode_type">
										<option value="">Select</option>
										  <option value="1">WebMoney WMZ</option>
                                            <option value="4">WebMoney WMB</option>
                                            <option value="3">WebMoney WME</option>
                                        </select>	
                                        <label for="mode_type" class="error clearfix"></label>
                                    </div>
                                </div>
                             
							<input type='submit' name='test' value='Pay'>-->
                               
                                   <a class="button yellow m_t_20 cur_def j_general_submit" href="https://paymentgateway.ru/?project=6792&nickname=<?php echo $userDetails->id; ?>&lang=en">Pay Now</a>
                                <?php echo formtoken::getField(); ?>
                            </form>
                        </div>


                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>