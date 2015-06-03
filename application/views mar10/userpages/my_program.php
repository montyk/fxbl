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
                        
                         <?php if(isset($message) && $message!=''){
                                    if($msg=='1')
                                    $class='up_alert_error alert_success';
                                    else
                                    $class='up_alert_error alert_error';
                        ?>
                        <div class="<?php echo $class;?>"><?php echo $message;?></div>
                      <?php }?>  

                    <?php if($count>0){?>
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
				
                              
                                <?php echo formtoken::getField(); ?>
                            
                                          </div>
                        
                        <div class="hdr1 f_b m_b_10 m_t_10">General Info</div>
                         <?php
                                $beginIndex = 3;
                                $size = sizeof($info);
                                $cnt = 0;
                                for ($i = $beginIndex; $i < $size; $i++) {
                                    if ($info[$i] === '0'){
                                        break;
                                    }
                                     ++$cnt;
                                }
                                $profit_loss = $this->mql_model->MQ_GetParam($info[$i + 6]);
                                $deposit = $this->mql_model->MQ_GetParam($info[$i + 1]);
                                $credit = $this->mql_model->MQ_GetParam($info[$i + 3]);
                                $withdrawal = $this->mql_model->MQ_GetParam($info[$i + 2]);
                                $profit = $deposit + $profit_loss;
                                ?>
                         <?php 
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
                            <div class="f_l box">
                                <div class="lft_fld">Credit:</div>
                                <div class="rgt_fld"><?=$credit ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Deposit:</div>
                                <div class="rgt_fld"><?=$deposit ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Withdrawal:</div>
                                <div class="rgt_fld"><?=$withdrawal ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Profit:</div>
                                <div class="rgt_fld"><?=$profit ?></div>
                            </div>
                        </div>     
                        
                        <div class="hdr1 f_b m_b_10 m_t_10">My Trading History</div>
                        
                        
                        
                        
                                                
                        <table id="table-to-grid" class="data m_t_10" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
                            <thead>
                            <tr align="right" style="background-color: #a0a0a0;">
                                <th align="left"><b>Order</b></th>
                                <th><b>Time</b></th>
                                <th><b>Type</b></th>
                                <th><b>Lots</b></th>
                                <th><b>Symbol</b></th>
                                <th><b>Price</b></th>
                                <th><b>S/L</b></th>
                                <th><b>T/P</b></th>
                                <th><b>Time</b></th>
                                <th><b>Price</b></th>
                                <th><b>Swap</b></th>
                                <th><b>Profit</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $beginIndex = 3;
                                $size = sizeof($info);
                                $cnt = 0;
                                for ($i = $beginIndex; $i < $size; $i++) {
                                    if ($info[$i] === '0'){
                                        break;
                                    }
                                        
                                    $row = explode("\t", $info[$i]);
                                    if (strpos($row[2], 'balance') !== false) {
                                        ?>
                                        <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                            <td align="left"><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                            <td align="left" colspan="8"><nobr><?= $row[13] ?><nobr></td>
                                            <td><nobr><?= $row[12] ?><nobr></td>
                                        </tr>
                                        <?php
                                    } else {
                                            ?>
                                            <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                <td align="left"><?= $row[0] ?></td>
                                                <td><?= $row[1] ?></td>
                                                <td><?= $row[2] ?></td>
                                                <td><nobr><?= $row[3] ?></nobr></td>
                                                <td><?= strtolower($row[4]) ?></td>
                                                <td><nobr><?= $row[5] ?><nobr></td>
                                                <td><nobr><?= $row[6] ?><nobr></td>
                                                <td><nobr><?= $row[7] ?><nobr></td>
                                                <td><nobr><?= $row[8] ?><nobr></td>
                                                <td><nobr><?= $row[9] ?><nobr></td>
                                            <?php
                                            if (strpos($row[2], 'limit') !== false) {
                                                ?>
                                                <td colspan="2" align="right"><?= $row[13] ?></td>
                                                <?php
                                            } else {
                                                ?>
                                                <td><nobr><?= $row[11] ?><nobr></td>
                                                <td><nobr><?= $row[12] ?><nobr></td>
                                                <?php
                                            }
                                            ?>
                                            </tr>
                                        <?php
                                    }
                                    ++$cnt;
                                }

                                ?>
                                
                                <?php if ($info[$beginIndex] === '0'){ ?>
                                <tr>
                                    <td valign="top" colspan="12" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                </tr>
                                <?php } ?>
                            </tbody></table>
                    <?php }?>
                               </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>