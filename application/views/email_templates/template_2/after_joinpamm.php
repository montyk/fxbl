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
                            <tbody>
                                <tr>
                                    <td class="w580" width="580">
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p style="padding-top:10px">Dear <?php if(!empty($name)){ echo $name; }else{ echo 'Admin'; } ?>,</p>
                                            
                                            <p><span><?php echo $subject;?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="w640" width="640" height="60" style=" font-weight:bold;border:1px solid #D8D2D2; border-radius:8px;font-size:11px;font-family:arial;color:rgb(35,35,35);background:none repeat scroll 0% 0% rgb(227,227,227); padding: 10px;">
                                        
                                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <p style="color:#000586; font-size:16px; border-bottom: 1px solid #001044; padding-bottom:6px">PAMM DETAILS</p>
                                                </tr>
                                                <tr>
                                                   <!-- <td class="w180" width="380" valign="top">
                                                        <table class="w180" width="180" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>
                                                                <tr><td class="w180" width="180" height="10"></td></tr>
                                                                <tr>
                                                                    <td class="w180" width="180">
                                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                                            <p>
                                                                                PAMM DETAILS
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                    <td width="20"></td> -->
                                                    <td class="" width="140" valign="top">
                                                        <table class="" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                                            <p>
                                                                                Program Name:
                                                                                <br/>
                                                                                PAMM Manager Name:
                                                                                <br/>
                                                                                PAMM Manager Login:
                                                                                <br/>
                                                                                PAMM Manager Email:
                                                                                <br/>
                                                                                PAMM Amount:
                                                                                <br/>
                                                                                Investor Name:
                                                                                <br/>
                                                                                Investor Login:
                                                                                <br/>
                                                                                Investor Email:
                                                                                <br/>
                                                                                Investor Amount:
                                                                                <br/>
                                                                                
                                                                                
                                                                                <i style="font-size: 11px; font-weight: normal;"></i>
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                    <td width="10"></td>
                                                    <td class="" width="400" valign="top" align="left">
                                                        <table class="" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #000; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                                                            <p>
                                                                                <?php if (!empty($trading_name)) echo $trading_name; ?>
                                                                                <br/>
                                                                                <?php if (!empty($pamm_name)) echo $pamm_name; ?>
                                                                                <br/>
                                                                                <?php if (!empty($pamm_login)) echo $pamm_login; ?>
                                                                                <br/>
                                                                                <?php if (!empty($pamm_email)) echo $pamm_email; ?>
                                                                                <br/>
                                                                                <?php if (!empty($pamm_amount)) echo $pamm_amount; ?>
                                                                                <br/>
                                                                                 <?php if (!empty($investor_name)) echo $investor_name; ?>
                                                                                <br/>
                                                                                 <?php if (!empty($investor_login)) echo $investor_login; ?>
                                                                                <br/>
                                                                                 <?php if (!empty($investor_email)) echo $investor_email; ?>
                                                                                <br/>
                                                                                 <?php if (!empty($investor_amount)) echo $investor_amount; ?>
                                                                                <br/>
                                                                                <!--
                                                                                QcgwYnzQ
                                                                                <br/>
                                                                                -->
                                                                                <?php if (!empty($registration_type) && $registration_type == 'demo') { ?>
                                                                                    <?php echo DEMO_T_MT4_HOST; ?>
                                                                                    <br/>
                                                                                <?php } ?>
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
  
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

<?php $this->load->view('email_templates/template_2/bottom-update'); ?>