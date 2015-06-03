<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - My Profile</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app pamm_man_update">
         <?php $this->load->view('common/analyticstracking');?>  
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">My Profile</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">My Profile</div>
                        <?php if(isset($message) && $message!=''){
                        if($msg=='3') $class='alert_success'; else $class='alert_error';
                        ?>
                          <div class="up_alert_error <?php echo $class;?>">
                          <b><?php echo $message;?></b>
                          </div>
                          <?php }?>                 
                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" action="<?php echo site_url('userpages/update_profile'); ?>" class="j_general_validate">
							
                                <input type="hidden" name="id" value="<?php echo (isset($id) && $id!='')?$id:0; ?>" id="id"/>
                                <input type="hidden" name="login" value="<?php if(!empty($login)) echo $login;?>" id="login"/>
                                <input type="hidden" class="hide" name="page" value="my_profile" />
                                <div class="log_bankdet col_blk ">
                                   
                                </div>
								
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Name:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="firstname" id="firstname"  class="ip r_f required" placeholder="Name" title="Please enter your name" value="<?php if(!empty($firstname)) echo $firstname;?>" /></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Email:</label></div>
                                    <div class="rgt_stflbl"><input readonly type="text" name="email" id="email"  class="ip r_f required email" placeholder="Email ID" title="Please enter your email ID" value="<?php if(!empty($email)) echo $email;?>" /></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Address:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="address" id="address"  class="ip r_f" placeholder="Address" value="<?php if(!empty($address)) echo $address;?>" /></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>City:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="city" id="city"  class="ip r_f required" placeholder="City" title="Please enter your city" value="<?php if(!empty($city)) echo $city;?>" /></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Zip:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="zip" id="zip"  class="ip r_f required" placeholder="Zip" title="Please enter your zip code"  value="<?php if(!empty($zip)) echo $zip;?>"/></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>State:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="state" id="state"  class="ip r_f required" placeholder="State" title="Please enter your state" value="<?php if(!empty($state)) echo $state;?>" /></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Country:</label></div>
                                    <div class="rgt_stflbl">
                                        <select id="country_id" name="country_id" placeholder="Country" class="ip r_f required">
                                            <?php if(!empty($country_id)){ $country_id= $country_id; }else{ $country_id=0;  } ?>
                                            <?php echo selectBox('Select', 'countries', 'id,name', ' status=1 ', $country_id, ''); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Phone:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="phone" id="phone"  class="ip r_f" placeholder="Phone" value="<?php if(!empty($phone)) echo $phone;?>"/></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Phone Password:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="phone_password" id="phone_password"  class="ip r_f" placeholder="Phone Password" value="<?php if(!empty($phone_password)) echo $phone_password;?>"/></div>
                                </div>
                                <a class="button yellow m_t_20 cur_def j_general_submit">Update</a>
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