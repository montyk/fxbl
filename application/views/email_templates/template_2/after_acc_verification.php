<?php $this->load->view('email_templates/template_2/top'); ?>

<!-- #CONTENT
        ================================================== -->
<tr><td class="w640" width="640" bgcolor="#ffffff"><table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="border-left: 1px solid #d8d2d2;border-right: 1px solid #d8d2d2;"></table></td></tr>
<tr id="simple-content-row">
    <td class="w640" width="640" bgcolor="#ffffff">
        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 0px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
        <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="border-left: 1px solid #d8d2d2;border-right: 1px solid #d8d2d2;">
            <tbody><tr>
                    <td class="w30" width="30"></td>
                    <td class="w580" width="580" id="content-column">
                        <!-- #TEXT ONLY
                        ================================================== -->
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                    <td class="w580" width="580">
                                        <p align="left" class="article-title" style="font-size: 18px; line-height:24px; color: #b0b0b0; font-weight:bold; margin-top:0px; margin-bottom:18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">Welcome to <span class="cm-singleline" label="Title"><span style="color:#5599d6;">Forex</span><span style="color:#f0893a;">Ray</span></span></p>
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p>Dear <?php if(!empty($name)){ echo $name; }else{ echo 'Customer'; } ?>,</p>
                                            <!--<p>Thank you for choosing <a href="<?php echo site_url(); ?>" target="_blank"><b style="color:#FCA810;">ForexRay</b></a> to access the financial markets real-time and practice your trading skills with a risk-free demo account.</p>-->
                                            <p><span><?php echo $message;?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                                  
                                <tr>
                                    <td class="w580" width="580">
                                        <p>
                                            You can download the <a href="<?php echo site_url('home/metatrader'); ?>"><span class="cm-singleline" label="Title"><span style="color:#5599d6;">Forex</span><span style="color:#f0893a;">Ray</span></span> MT4 Desktop platform here.</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w580" width="580">
                                        <p>
                                            Different payment methods exist to enable you to fund your account. <a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>">Please find the available options here.</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w580" width="580">
                                        <p>
                                            Through <span class="cm-singleline" label="Title"><span style="color:#5599d6;">Forex</span><span style="color:#f0893a;">Ray</span></span> client portal, you also have access to useful features such as  <a href="<?php echo site_url('login'); ?>">Company Dashboard</a>, <a href="<?php echo site_url('login'); ?>">Analytics</a> and <a href="<?php echo site_url('login'); ?>">Research and Analysis</a>.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w580" width="580">
                                        <p>
                                            We wish you successful trading!
                                        </p>
                                    </td>
                                </tr>
                                <!--
                                <tr>
                                    <td class="w580" width="580">
                                        <p>
                                            <i style="font-size: 11px;">*The Investor Password is a read-only password in case you wish to grant access to a third party to observe your trades but without the permission to influence them. The Investor Password does not allow trading operations execution.</i>
                                        </p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="w580" width="580">
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 5px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p style="margin-top: 0;">You can use the above Login and Password to login to any of our Trading Platforms which you can access any time from our platforms section.</p>
                                        </div>
                                    </td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                        <!--
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="w580" width="580">
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p>You can use the above Login and Password to login to any of our Trading Platforms which you can access any time from our platforms section.</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td class="w580" width="580" height="10"></td></tr>
                            </tbody>
                        </table>
                        -->
                        
                        
                        
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="w580" width="580">
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p>
                                                Kind Regards,
                                            </p>
                                            <p>
                                               FOREXRAY Customer Support
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td class="w580" width="580" height="10"></td></tr>
                            </tbody>
                        </table>
                        
                        
                        
                        <!-- #ADDITIONAL IMAGE GALLERY ROW WITH NO TITLE
                        ================================================== -->
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                    <td class="w180" width="180" valign="top">
                                        <table class="w180" width="180" cellpadding="0" cellspacing="0" border="0">
                                            <tbody><tr>
                                                    <td class="w180" width="180"><img editable="true" label="Image" src="<?php echo base_url(); ?>misc/css/images/banner1.png" class="w180" width="180" border="0"></td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                                <tr>
                                                    <td class="w180" width="180">
                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                            <p>For Help Center <a href="<?php echo site_url('en/Contact-Us'); ?>" class="article-content-a" style="color: #2f82de; font-weight:bold; text-decoration:none;">Click Here</a> and submit your query.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                            </tbody></table>
                                    </td>
                                    <td width="20"></td>
                                    <td class="w180" width="180" valign="top">
                                        <table class="w180" width="180" cellpadding="0" cellspacing="0" border="0">
                                            <tbody><tr>
                                                    <td class="w180" width="180"><img editable="true" label="Image" src="<?php echo base_url(); ?>misc/css/images/banner2.png" class="w180" width="180" border="0"></td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                                <tr>
                                                    <td class="w180" width="180">
                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                            <p>Download our metatrader software <a href="<?php echo site_url('home/metatrader'); ?>" class="article-content-a" style="color: #2f82de; font-weight:bold; text-decoration:none;">here</a> and leverage your trading experience.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                            </tbody></table>
                                    </td>
                                    <td width="20"></td>
                                    <td class="w180" width="180" valign="top">
                                        <table class="w180" width="180" cellpadding="0" cellspacing="0" border="0">
                                            <tbody><tr>
                                                    <td class="w180" width="180"><img editable="true" label="Image" src="<?php echo base_url(); ?>misc/css/images/banner3.png" class="w180" width="180" border="0"></td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                                <tr>
                                                    <td class="w180" width="180">
                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                            <p>View our trading conditions <a href="<?php echo site_url('home'); ?>" class="article-content-a" style="color: #2f82de; font-weight:bold; text-decoration:none;">here</a> to make your trading experience better and safer.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        <!-- #TEXT ONLY
                        ================================================== -->
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="w580" width="580">
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p>
                                                <a href="<?php echo site_url('home/metatrader'); ?>" target="_blank" style="display: block; color: #986a39; border: 1px solid #e6b650; outline: none; font-size: 18px; padding: 20px 10px; text-align: center; text-decoration: none!important; border-radius: 3px; -moz-border-radius: 3px; box-shadow: inset 0px 0px 2px #fff; -o-box-shadow: inset 0px 0px 2px #fff; -webkit-box-shadow: inset 0px 0px 2px #fff; -moz-box-shadow: inset 0px 0px 2px #fff; background-image: -moz-linear-gradient(#ffd974, #febf4d); background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#febf4d), to(#ffd974)); background-image: -webkit-linear-gradient(#ffd974, #febf4d); background-image: -o-linear-gradient(#ffd974, #febf4d); text-shadow: 1px 1px 1px #fbe5ac; background-color: #febf4d;">
                                                    Download ForexRay Trading Platform
                                                </a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td class="w580" width="580" height="10"></td></tr>
                            </tbody>
                        </table>
                        
                        
                    </td>
                    <td class="w30" width="30"></td>
                </tr>
            </tbody></table>
            </div>
    </td>
</tr>
<tr><td class="w640" width="640" bgcolor="#ffffff"><table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="border-left: 1px solid #d8d2d2;border-right: 1px solid #d8d2d2;"><tr><td>&nbsp;</td></tr></table></td></tr>

<?php $this->load->view('email_templates/template_2/bottom'); ?>