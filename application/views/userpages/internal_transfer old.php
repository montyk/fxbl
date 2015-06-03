<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Inter-Account Transfer</title>
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
                    <div class="rightNav_head">Inter-Account Transfer</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">Transfer Money Between Own Accounts</div>

                        <p  class="help_text">Please complete the below form to request a transfer. ForexRay will contact you if any further information is required. Kindly note that this is not an automated function. The transfer will be completed within 24 hours.</p>
                        <p  class="help_text m_t_20"><i>*NOTE: Internal transfers are available only between accounts belonging to the same client.</i></p>

                        <div class="o_h sum_box r_f m_t_20">
                            <form method="post" action="<?php echo site_url('userpages/internal_transfer'); ?>" class="internal_transfer_form j_general_validate" >
                           <!-- <div class="log_bankdet">
                                <label>ForexRay Account ID:</label> <b class="col_blk">12345</b>
                                <br/>
                                <label>ForexRay Account Name:</label> <b class="col_blk">User Name</b>
                            </div> -->
                            <div class=" col_blk f_14 f_b  m_t_20">Deposit To:</div>
                            <input type="text" class="ip r_f m_t_20 required" name="deposit_account_id" placeholder="Deposit Account ID" title="Please enter Deposit Account ID" />
                            <br/>
                            
                            <input type="text" class="ip r_f m_t_20 required" name="deposit_account_name" placeholder="Deposit Account Name" title="Please enter Deposit Account Name" />
                            <br/>
                            
                            <input type="text" class="ip r_f m_t_20 required" name="amount" placeholder="Amount (USD)" title="Please enter Amount (USD)" />
                            <br/>
                            
                            <a class="button yellow m_t_20 cur_def j_general_submit">Send Request</a>
                            </form>
                        </div>

                        <div class="hdr2 f_b m_b_10 m_t_40">PAYMENT PROTECTION AND DATA SECURITY</div>
                        <p  class="help_text">Please note that ForexRay does not receive and/or store any personal credit card or payment information. All transactions are processed and protected by Level 1 PCI-DSS Certified Independent International Payment Gateways.</p>
                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
               
        </div>    
        
    </body>
</html>