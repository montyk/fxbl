<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - Withdrawal</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div id="main-menu" class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Withdrawal</div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <?php if(isset($is_fund_manager) && $is_fund_manager){ ?>
                        <div class="big_error"><span><i>NOTE</i><b>:</b> 
                                This is a Fund Manger account. Account capital is locked for <?php echo $period; ?> to support long term trading strategies only partial withdrawals are allowed.
                            </span></div>
                        <?php } ?>
                        <div class="hdr1 f_b m_b_10">Withdrawal Options</div>

                        <div class="help_text">

                           <p> We strongly suggest that you submit withdrawal requests after closing your positions.
</p>
<p class="m_t_b_10">Please note that <?php echo $this->config->item('project_name') ?> accepts withdrawal requests for trading accounts with opened positions.</p>

                        </div>

                        <div class="deposit_view">

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place visa r_f f_l">
                                    Credit/Debit Cards
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/withdrawalnew_form/card'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place skrill r_f f_l">
                                    Skrill (MoneyBookers)
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/withdrawalnew_form/sk'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place neteller r_f f_l">
                                    Neteller
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/withdrawalnew_form/net'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place bankwire r_f f_l">
                                    Bank Wire Transfer
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/withdrawalnew_form/bwt'); ?>">More Info</a>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
             
        </div>    
        
    </body>
</html>