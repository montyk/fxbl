<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Join Under PAMM Manager </title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app stf_joinform">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">Join Under PAMM Manager</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">Join under <?php echo $trading_name;?></div>
                        <?php if(isset($message) && $message!=''){?>
                          <div class="up_alert_error alert_error">
                                   <b><?php echo $message;?></b>
				<?php if($msg=='1')
                                   {
                                   ?>
                                   <a class="button yellow" href="<?php echo site_url('userpages/support_request');?>">How to add funds to Wallet?</a>  
                                   <?php 
                                   }?>
                          </div>
                        <?php }?>
                    
                        <div class="o_h sum_box r_f m_t_20">
                            <?php if($account_for=='2'){?>
                            <form method="post" action="<?php echo site_url('userpages/add_investors'); ?>" class="j_general_validate">
							
                                <input type="hidden" name="id" value="<?php echo (isset($id) && $id!='')?$id:0; ?>" id="id"/>
                                <input type="hidden" name="trader_id" value="<?php echo $user_id; ?>" id="trader_id"/>
                                <input type="hidden" name="trader_name" value="<?php echo ucfirst($firstname).' '.ucfirst($lastname); ?>" id="trader_name"/>
                                <input type="hidden" name="trader_email" value="<?php echo $email; ?>" id="trader_id"/>
                                <input type="hidden" class="hide" name="page" value="join_pamm" />
                                
                                
                                <!--<input type="hidden" name="wallet" id="wallet" value="<?php echo $wallet;?>" />    -->                            
                                <input type="hidden" name="minimum_deposit" id="minimum_deposit" value="<?php echo $minimum_deposit;?>" />
                                <div class="log_bankdet col_blk ">
                                  
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                   <div class="lft_stflbl">Name:</div> 
                                   <div class="rgt_stflbl"><?php echo $trading_name;  ?> </div>
                                </div>
                                <div class="m_t_10 clearfix">
                                   <div class="lft_stflbl">PAMM Manager Name:</div> 
                                   <div class="rgt_stflbl"><?php echo ucfirst($firstname).' '.ucfirst($lastname);  ?> </div>
                                </div>
                                <div class="m_t_10 clearfix">
                                   <div class="lft_stflbl">ACC. No:</div> 
                                   <div class="rgt_stflbl"><?php echo $login;  ?> </div>
                                </div>
                                <!--<div class="m_t_10 clearfix">
                                   <div class="lft_stflbl">Email Id:</div> 
                                   <div class="rgt_stflbl"><?php echo $email;  ?> </div>
                                </div>-->

                                <div class="m_t_10 clearfix">
								<div class="lft_stflbl">Min.Amount Deposit:</div> <div class="rgt_stflbl"> <?php echo $minimum_deposit;?> USD</div>
                                </div>
								
                                <div class="m_t_10 clearfix">
								<div class="lft_stflbl">Success Fee: </div> <div class="rgt_stflbl"><?php echo $success_fee;?></div>
                                </div>
								
								<div class="m_t_10 clearfix">
								<div class="lft_stflbl">Penalty Fee: </div> <div class="rgt_stflbl"><?php echo $penalty_fee;?></div>
                                </div>
								<div class="m_t_10 clearfix">
								<div class="lft_stflbl">Trading Period: </div> <div class="rgt_stflbl"><?php echo $trading_period;?></div>
                                </div>
                                <?php if($is_relation<=0){?>
                                <input type="hidden" name="trading_name" id="trading_name" value="<?php echo $trading_name;?>"/>
								<div class="m_t_10 clearfix">
								<div class="lft_stflbl">Deposit Amount: </div> <div class="rgt_stflbl">
                                <input type="text" name="amount" id="amount"  class="ip r_f required number" placeholder="Deposit Amount" title="Please enter Valid Deposit Amount(Amount should be numeric only.)" /> / Wallet: <?php echo ($wallet!='')?$wallet:'0';?>
                                </div>  </div>
								
								
                                <input type="hidden" name="trading_name" id="trading_name" value="<?php echo $trading_name;?>"/>
                                <input type="hidden" name="minimum_deposit" id="minimum_deposit" value="<?php echo $minimum_deposit;?>"/>
                                    

                                <a class="button yellow m_t_20 cur_def j_general_submit">Join Under <?php echo ucfirst($trading_name);?> </a>
                                <?php }?>
                               
                                 <?php echo formtoken::getField(); ?>
                                
                            </form>
                             <?php } else {?>
                             <div class="m_t_10">
                                    <b>To Join under PAMM Manager, Please register as Pamm Investor</b> 
                                    </div>
                                <?php }?>
                             
                        </div>


                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>