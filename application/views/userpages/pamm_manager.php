<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - PAMM Manager Account</title>
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
                    <div class="rightNav_head">PAMM Manager Account</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10"><?php if($count>0) echo 'Edit'; else echo 'Create';?> PAMM Manager Account</div>

                    
                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" action="<?php echo site_url('userpages/save_pm'); ?>" class="j_general_validate">
							
                                <input type="hidden" name="id" value="<?php echo (isset($id) && $id!='')?$id:0; ?>" id="id"/>
                                <input type="hidden" class="hide" name="page" value="pamm_manager" />
                                <div class="log_bankdet col_blk ">
                                    Please enter the details below:
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Trading Name</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="trading_name" id="trading_name" value="<?php if(isset($trading_name) && $trading_name!=''){ echo $trading_name; } ?>" class="ip r_f required" placeholder="Trading Name" title="Please enter Trading Name" /></div>
                                </div>

                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="minimum_deposit"><span class="star">*</span>Minimum Deposit <br /> (The required Manager Capital will equal this amount)</label></div>
                                    <div class="rgt_stflbl">
    									<select name="minimum_deposit" id="minimum_deposit" class="sl_bx r_f required" title="Please select Minimum Deposit">
    										<?php //echo selectBox('', 'departments', 'id,name', '', 0, ''); ?>
    										<option value="">Select</option>
    										<option value="500" <?php echo (isset($minimum_deposit) && $minimum_deposit=='500')?'selected="selected"':'';?>>500</option>
    										<option value="1000" <?php echo (isset($minimum_deposit) && $minimum_deposit=='1000')?'selected="selected"':'';?>>1000</option>
    										<option value="1500" <?php echo (isset($minimum_deposit) && $minimum_deposit=='1500')?'selected="selected"':'';?>>1500</option>
                                        </select> USD 
                                    </div>
                                </div>
								
								<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="success_fee"><span class="star">*</span>Success Fee</label></div>
                                    <div class="rgt_stflbl">
    									<select name="success_fee" id="success_fee" class="sl_bx r_f required" title="Please select Success Fee">
    									<option value="">Select</option>
    									<?php 
    									for ($x=5; $x<=90; $x=$x+5)
    									{
    									?>
    									<option value="<?php echo $x;?>"  <?php echo (isset($success_fee) && $success_fee==$x)?'selected="selected"':'';?>><?php echo $x;?></option>
    									<?php }?>
    										<?php //echo selectBox('', 'departments', 'id,name', '', 0, ''); ?>
                                        </select> % / month
                                    </div>
                                </div>
								
								<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="penalty_fee"><span class="star">*</span>Penalty Fee <br /> (Paid by investor for early withdrawals)</label></div>
                                    <div class="rgt_stflbl">
    									<select name="penalty_fee" id="penalty_fee" class="sl_bx r_f required" title="Please select Penalty Fee">
    									<option value="">Select</option>
    									<?php 
    									for ($x=0; $x<=20; $x++)
    									{
    									?>
    									<option value="<?php echo $x;?>"  <?php echo (isset($penalty_fee) && $penalty_fee==$x)?'selected="selected"':'';?>><?php echo $x;?></option>
    									<?php }?>
                                        </select> % / withdrawal amount  
                                    </div>
                                </div>
								
								<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_period"><span class="star">*</span>Trading Period</label></div>
                                    <div class="rgt_stflbl">
    									<select name="trading_period" id="trading_period" class="sl_bx r_f required" title="Please select Trading Period">
    									<option value="">Select</option>
    										<option value="3 Months" <?php echo (isset($trading_period) && $trading_period=='3 Months')?'selected="selected"':'';?>>3 Months</option>
                                            <option value="4 Months" <?php echo (isset($trading_period) && $trading_period=='4 Months')?'selected="selected"':'';?>>4 Months</option>
                                            <option value="5 Months" <?php echo (isset($trading_period) && $trading_period=='5 Months')?'selected="selected"':'';?>>5 Months</option>
    										<option value="6 Months" <?php echo (isset($trading_period) && $trading_period=='6 Months')?'selected="selected"':'';?>>6 Months</option>
    										<option value="1 Year" <?php echo (isset($trading_period) && $trading_period=='1 Year')?'selected="selected"':'';?>>1 Year</option>
                                        </select>
                                    </div>
                                </div>
								<div class="m_t_10">
									<input type="checkbox" value="Y" <?php echo (isset($private) && $private=='Y')?'checked="checked"':'';?> name="private" id="private" > Private Program
		
                                </div>
								<div class="m_t_10">
									<input type="checkbox" value="Y" <?php echo (isset($accept) && $accept=='Y')?'checked="checked"':'';?> name="accept" id="accept" class="required" title="Please accept the Terms and Conditions">* By checking this box I am stating that I have read and agree to all Terms and Conditions and am at least 18 years of age or older.
		
                                </div>
								
								

                                <a class="button yellow m_t_20 cur_def j_general_submit">Open Fund Manager Account</a>
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