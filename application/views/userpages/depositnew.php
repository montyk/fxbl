<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - Deposit</title>
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
                    <div class="rightNav_head">Deposit</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">Deposit Options</div>

                        <div class="deposit_view">
                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place chn_img r_f f_l">
                                    Chinese Debit/Credit Cards 
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/chcard'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place visa r_f f_l">
                                    Credit/Debit Cards
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/card'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place skrill r_f f_l">
                                    Skrill (MoneyBookers)
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/sk'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place neteller r_f f_l">
                                    Neteller
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/net'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place bankwire r_f f_l">
                                    Bank Wire Transfer
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/bwt2'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place moneygram r_f f_l">
                                    MoneyGram
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/mg'); ?>">More Info</a>
                            </div>

                            <div class="box_placeholder o_h m_t_20">
                                <div class="box_place wstun r_f f_l">
                                    Western Union
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/wu'); ?>">More Info</a>
                            </div>
                          <div class="box_placeholder o_h m_t_20">
                                <div class="box_place exchanger r_f f_l">
                                    Local Ex-Changer
                                </div>
                                <a class="button yellow f_l m_l_10" href="<?php echo site_url('userpages/depositnew_form/bwt3'); ?>">More Info</a>
                            </div>     
                        </div>
                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
            
        </div>    
        
    </body>
</html>