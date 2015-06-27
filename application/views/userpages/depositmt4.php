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
                <div id="main-menu" class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">Wallet:<?php echo ($wallet!='')?$wallet:'0';?></div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">Deposit</div>
						<?php if(isset($message) && $message!=''){
						if($msg=='3') $class='alert_success'; else $class='alert_error';
						?>
                          <div class="up_alert_error <?php echo $class;?>">
                          <b><?php echo $message;?></b>
                          </div>
                          <?php }?>                 
                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" action="<?php echo site_url('userpages/save_depositmt4'); ?>" class="j_general_validate">
							
                                <input type="hidden" name="id" value="<?php echo (isset($id) && $id!='')?$id:0; ?>" id="id"/>
                                <input type="hidden" class="hide" name="page" value="depositmt4" />
                                <div class="log_bankdet col_blk ">
                                    Please enter the details below:
                                </div>
								
								
								<div class="m_t_10 clearfix">
								<div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Deposit Amount:</label> </div> <div class="rgt_stflbl">
                                <input type="text" name="amount" id="amount"  class="ip r_f required number" placeholder="Deposit Amount" title="Please enter Valid Deposit Amount(Amount should be numeric only.)" />
                                </div>  </div>
                                
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Comment:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="comment" id="comment"  class="ip r_f required" placeholder="Comment" title="Please enter Comment" /></div>
                                </div>


                                <a class="button yellow m_t_20 cur_def j_general_submit">Deposit</a>
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