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


                           
                           <!--  <p class="m_t_b_10">In order to fund your account via Wire Transfer, please download Fund Transfer Form, complete the necessary details, and email  it back to us along with the SWIFT confirmation document(TT Receipt) .</p><br/>
  <p class="m_t_b_10"><b>Please download the form below:</b></p>
  <p><span style="BORDER: #C0C0C0 1px solid;BORDER-BOTTOM:#C0C0C0 2px solid;padding:5px 10px 5px 10px;">Fund Transfer to SEB Bank Estonia (Remittance) Notice in US$  &nbsp;&nbsp;&nbsp;&nbsp;    <a href="http://www.forexray.com/downloads/Fund_Transfer_to_SEB_en.Docx"><span style="text-decoration: underline;
    font-size: 12px;color: #0066FF;">Download</span><img src="https://www.forexray.com/public/images/down.png"></a></span></p><br>-->
                            <p class="m_t_b_10"><b>In order to fund your account via  <?php echo $page;?></b></p>
                           <!-- <p class="m_t_b_10">Please Contact Forexray Finance Department Email: </p>-->
                            <p class="m_t_b_10">Please Contact Forexray Finance Department Email: <span style="color: #0066FF;">finance@forexray.com</span></p>
                           


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