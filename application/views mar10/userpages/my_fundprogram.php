<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - PAMM Manager Account</title>
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
                    <div class="rightNav_head">PAMM Manager </div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">My PAMM Program</div>

                        
                        
                        
                        
<script type="text/javascript">

    $(document).ready(function() {
		

                
        $('.remove_pamm').live('click',function(){
            if(confirm('Do you want to delete this item')){
                dataP='id='+$(this).attr('rel');
                $.ajax({
                    url:'<?php echo site_url('adminmenus/deletemenu');  ?>',
                    data:dataP,
                    type:'POST',
                    beforeSend:function(){
                        
                    },
                    success:function(){
                        window.location.reload();
                    }
                })
            }
        });
                                
});
</script>
                        
                        
                     
                        
                      <?php if(isset($message) && $message!=''){
					  if($msg=='1' || $msg=='3')
					  $class='up_alert_error alert_success';
					  else
					  $class='up_alert_error alert_error';
					  
					  ?>
                        <div class="<?php echo $class;?>"><?php echo $message;?></div>
                      <?php }?>  
                         <?php  if($activerows=='0' && $inactiverows=='0'){?>  
                        
                         <?php }else{?>
                        <div class="o_h sum_box r_f m_t_20">
                           
							
                                <div class="log_bankdet col_blk ">
                              
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Trading Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($trading_name) && $trading_name!=''){ echo $trading_name; } ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="firstname">PAMM Manager Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($firstname) && $firstname!=''){   echo ucfirst($firstname).' '.ucfirst($lastname);} ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="acc_no">Acc. NO</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($login) && $login!=''){ echo $login; } ?></div>
                                </div>
                                <!--<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="email">Email Id</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($email) && $email!=''){ echo $email; } ?></div>
                                </div>-->

                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="minimum_deposit">Minimum Deposit </label></div>
                                    <div class="rgt_stflbl"><?php echo $minimum_deposit;?> USD 
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="success_fee">Success Fee</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $success_fee;?>%
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="penalty_fee">Penalty Fee </label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $penalty_fee; ?>% of Deposited Capital
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_period">Trading Period</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $trading_period;?>
                                    </div>
                                </div>
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="my_funds">My Funds</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $amount;?>USD
                                    </div>
                                </div>
				
                              
                                <?php echo formtoken::getField(); ?>
                                          </div>
                        
                        
                        
                        
                        
                       
                            <?php 
                                
                                $beginIndex = 3;
								$size = sizeof($info);
                                for ($i = $beginIndex; $i < $size; $i++) {
                                    if ($info[$i] === '0'){
                                        break;
                                    }
								}
                                $profit_loss = $this->mql_model->MQ_GetParam($info[$i + 6]);
                                
                                
                            $size = sizeof($info2);
                            $beginIndex = 3;
                            
                            if (isset($info2[$beginIndex]))
                                $balance = $this->mql_model->MQ_GetParam($info2[$beginIndex]);
                            else
                                $balance=0;
                            if (isset($info2[$beginIndex + 1]))
                                $equity = $this->mql_model->MQ_GetParam($info2[$beginIndex + 1]);
                            else
                                $equity=0;
                            
                            if (isset($info2[$beginIndex + 3]))
                                $free_margin = $this->mql_model->MQ_GetParam($info2[$beginIndex + 3]);
                            else
                                $free_margin=0;
                            ?>
                            
                        <?php // echo '<pre>'; print_r($info); echo '</pre>'; ?>
                        <div class="o_h sum_box r_f m_t_10">
                            <div class="f_l box">
                                <div class="lft_fld">Profit/Loss:</div>
                                <div class="rgt_fld"><?=$profit_loss ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Balance:</div>
                                <div class="rgt_fld">  <?php echo $balance;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity:</div>
                                <div class="rgt_fld">  <?php echo $equity;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin:</div>
                                <div class="rgt_fld">  <?php echo $free_margin;?></div>
                            </div>
                           
                        </div>
                        
                        
                    <!--    <span class="button yellow m_t_20 cur_def j_general_submit remove_pamm">Remove Fund Investor Account</span>    -->   
                        <?php if(isset($inactiverows) && $inactiverows=='0'){?>
                        <a class="button yellow m_t_20 cur_def j_general_submit" href="<?php echo site_url('userpages/remove_pamm/'.$id);?>" >Remove Funds</a>
                        
                        <?php }?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="button yellow m_t_20 cur_def j_general_submit" href="<?php echo site_url('userpages/add_funds/'.$id);?>" >Add Funds</a>
                         <?php }?>


                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>