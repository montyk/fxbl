<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay Home</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Home</div>
                    <div class="rightNav_cnt">
                         
                         <div class="hdr1 f_b m_b_10">Account Verification</div>
                         <?php $fx_user_details = unserialize($this->session->userdata['fx_user_details']); ?>
                         <?php // echo '<pre>'; print_r($fx_user_details); echo '</pre>'; ?>
                         <div class="m_b_10 reset_alert">
                            <?php if(isset($fx_user_details->account_verification) && $fx_user_details->account_verification=='1'){ ?>
                            <div class="alert_success">Your Account is validated</div>
                            <?php }else if(!empty($fx_user_details->pi_attachments_id) || !empty($fx_user_details->pr_attachments_id)){ ?>
                            <div class="alert_info">Your documents are being validated by admin.</div>
                            <?php } else { ?>
                            <div class="alert_error">Your Account is not validated, Please <a href="<?php echo base_url(); ?>userpages/validation_documents">Click Here</a> to upload your documents.</div>
                            <?php } ?>
                         </div>
                        
                         <div class="hdr1 f_b m_b_10">Account Summary (USD)</div>
                         <?php 
                            $size = sizeof($info);
                            $beginIndex = 3;
                            
                            if (isset($info[$beginIndex]))
                                $balance = $this->mql_model->MQ_GetParam($info[$beginIndex]);
                            else
                                $balance=0;
                            if (isset($info[$beginIndex + 1]))
                                $equity = $this->mql_model->MQ_GetParam($info[$beginIndex + 1]);
                            else
                                $equity=0;
                            if (isset($info[$beginIndex + 2]))
                                $margin = $this->mql_model->MQ_GetParam($info[$beginIndex + 2]);
                            else
                                $margin=0;
                            if (isset($info[$beginIndex + 3]))
                                $free_margin = $this->mql_model->MQ_GetParam($info[$beginIndex + 3]);
                            else
                                $free_margin=0;

                            $margin_level= $margin!=0 ? number_format(100*($equity/$margin),2,'.','').'%' : '0%';
                            
                            $cnt = 0;
                            for ($i = $beginIndex + 4; $i < $size; $i++) {
                                if ($info[$i] === '0')
                                    break;
                                $row = explode("\t", $info[$i]);
                                ++$cnt;
                            }

                            if(isset($info[$i+3]) && isset($info[$i+1]) && isset($info[$i+2]))
                                $profit = $this->mql_model->MQ_GetParam($info[$i+3])+$this->mql_model->MQ_GetParam($info[$i+1])+$this->mql_model->MQ_GetParam($info[$i+2]);
                         ?>
                         <div class="o_h sum_box r_f">
                            <div class="f_l box">
                                <div class="lft_fld">Account Balance</div>
                                <div class="rgt_fld"><?php if(!empty($balance)) echo $balance; else echo '0.00'; ?></div>
                            </div>
                           <!-- <div class="f_l box">
                                <div class="lft_fld">Margin</div>
                                <div class="rgt_fld"><?php if(!empty($margin)) echo $margin; else echo '0.00';  ?></div>
                            </div>-->
                            <div class="f_l box">
                                <div class="lft_fld">Equity</div>
                                <div class="rgt_fld"><?php if(!empty($equity)) echo $equity; else echo '0.00';  ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin</div>
                                <div class="rgt_fld"><?php if(!empty($free_margin)) echo $free_margin; else echo '0.00';  ?></div>
                            </div>
                          <!--  <div class="f_l box">
                                <div class="lft_fld">Unrealized P/L</div>
                                <div class="rgt_fld"><?php if(!empty($profit)) echo $profit; else echo '0.00';  ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Margin Level</div>
                                <div class="rgt_fld"><?php if(!empty($margin_level)) echo $margin_level; else echo '0.00';  ?>%</div>
                            </div>-->

                         </div>

                         <!--
                         
                         <div class="hdr2 f_b m_t_40 m_b_10">OPEN POSITIONS</div>

                         <table class="data">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Open Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                    <th>P/L</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Type</td>
                                    <td>Symbol</td>
                                    <td>Lots</td>
                                    <td>Open Price</td>
                                    <td>SL</td>
                                    <td>TP</td>
                                    <td>P/L</td>
                                </tr>
                               
                            </tbody>
                        </table>

                        <div class="hdr2 f_b m_b_10 m_t_40">PENDING ORDERS</div>

                        <table class="data">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <td valign="top" colspan="7" class="dataTables_empty"><div class="grid-msg">No Pending Orders</div></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        -->
                    </div>
                </div>
            </div> 
            
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
            
        </div>    
        
    </body>
</html>