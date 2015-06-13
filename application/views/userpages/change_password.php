<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - Change Password</title>
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
                    <div class="rightNav_head">Change Password</div>
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
                        
                        <div class="hdr1 f_b m_b_10">Change Password</div>
                        <?php if(isset($message) && $message!=''){
                        if($msg=='3') $class='alert_success'; else $class='alert_error';
                        ?>
                          <div class="up_alert_error <?php echo $class;?>">
                          <b><?php echo $message;?></b>
                          </div>
                          <?php }?>                 
                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" name="changepassword" id="changepassword" action="<?php echo site_url('userpages/update_password'); ?>" class="j_general_validate">
							
                                <input type="hidden" name="id" value="<?php echo (isset($id) && $id!='')?$id:0; ?>" id="id"/>
                                <input type="hidden" class="hide" name="page" value="change_password" />
                                <div class="log_bankdet col_blk ">
                                    Please enter the details below:
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Current Password:</label></div>
                                    <div class="rgt_stflbl"><input type="password" name="current_password" id="current_password"  class="ip r_f required" placeholder="Current Password" title=""/>
                                        <label for="current_password" class="error clearfix"></label>
                                    </div>
                                </div>
								
                                <div class="m_t_10 clearfix">
                                <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>New Password:</label> </div> 
                                <div class="rgt_stflbl"><input type="password" name="new_password" id="new_password"  class="ip r_f required" placeholder="New Password"/> 
                                    <label for="new_password" class="error clearfix"></label>
                                </div>  </div>
                                
                                <div class="m_t_10 clearfix">
                                <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Confirm New password:</label> </div> 
                                <div class="rgt_stflbl"><input type="password" name="confirm_password" id="confirm_password"  class="ip r_f required" placeholder="Confirm New Password"/> 
                                    <label for="confirm_password" class="error clearfix"></label>
                                </div>  </div>
                                
                                    <a class="button yellow m_t_20 cur_def j_general_submit">Change Password</a>
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