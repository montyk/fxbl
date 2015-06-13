<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - Withdrawal Form</title>
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
                    <div class="rightNav_head">Withdrawal Form</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">Withdraw Funds - <?php echo $page;?></div>

                        <?php $fx_user_details = unserialize($this->session->userdata['fx_user_details']); ?>
                        <?php if(isset($fx_user_details->account_verification) && $fx_user_details->account_verification=='1'){ ?>
                        <div class="hdr2 f_b m_b_10 m_t_40"><?php echo $page;?> WITHDRAWAL</div>
                        <p  class="help_text">To withdrawal funds using <?php echo $page; ?>  please send a mail to <a href="mailto:<?php echo $email_id;?>" target="_blank"><?php echo $email_id;?></a></p>
                        <p  class="help_text">Please complete the form below to request a withdrawal. <?php echo $this->config->item('project_name') ?> will contact you if any further information is required. Kindly note that this is a request for withdrawal and not an automated function. The payment will be completed within 2 - 5 working days.</p>

                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" action="<?php echo site_url('userpages/withdrawalnew_form'); ?>" class="withdrawal_form j_general_validate" >
<!--                            <div class="log_bankdet">
                                <label>ForexRay Account ID:</label> <b class="col_blk">XYZ</b>
                                <br/>
                                <label>ForexRay Account Name:</label> <b class="col_blk">12345</b>
                            </div>-->
                            <input type="text" class="ip r_f m_t_20 required" name="amount" title="Please enter your amount" placeholder="Please enter your amount"/>
                            <br/>
                            <textarea class="t_ar m_t_10 r_f" name="message" title="Please enter a message" placeholder="Please enter a message"></textarea>
                            <br/>
                            
                            <a class="button yellow m_t_20 cur_def j_general_submit">Request</a>
                            </form>
                        </div>

                        <div class="hdr2 f_b m_b_10 m_t_40">PAYMENT PROTECTION AND DATA SECURITY</div>
                        <p  class="help_text">Please note that <?php echo $this->config->item('project_name') ?> does not receive and/or store any personal credit card or payment information. All transactions are processed and protected by Level 1 PCI-DSS Certified Independent International Payment Gateways.</p>
                        
                        <?php }else{ ?>
                        
                        <div class="alert_info"><span>Withdrawal Requests are not available for non-validated users. Please upload your documents to validate your account.</span></div>
                        
                        <?php } ?>
                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
               
        </div>    
        
    </body>
</html>