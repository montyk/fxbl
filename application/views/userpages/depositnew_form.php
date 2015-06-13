<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Deposit Funds</title>
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
                    <div class="rightNav_head">Deposit Funds</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10"><?php echo $page;?></div>
                        <div class="help_text">
                            <!--<b>How do I deposit by <?php echo $page;?>?</b>-->
                            <?php // if($page=='MoneyGram' || $page=='Western Union'){?>
                            <!--<p class="m_t_b_10">To deposit funds using <?php echo $page;?> please send a mail to <a href="mailto:<?php echo $email_id;?>" target="_blank"><?php echo $email_id;?></a>.</p>-->


                    
                            <p class="m_t_b_10"><b>In order to fund your account via  <?php echo $page;?></b></p>
                           
                            <p class="m_t_b_10">Please Contact <?php echo $this->config->item('project_name') ?> Finance Department Email: <span style="color: #0066FF;"><?php echo $this->config->item('finance_email') ?></span></p>
                           


                            <!--<p>To locate the nearest <?php //echo $page;?> offices please click on "Find <?php //echo $page;?> Agent". In some countries it is possible to transfer the funds online.</p>-->
                            <?php // }?>
                        </div>

                                          
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
             
        </div>    
        
    </body>
</html>