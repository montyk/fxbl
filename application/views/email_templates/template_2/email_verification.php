<?php $this->load->view('email_templates/template_2/top'); ?>

<!-- #CONTENT
        ================================================== -->
<tr id="simple-content-row">
    <td class="w640" width="640" bgcolor="#ffffff">
        <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
            <tbody><tr>
                    <td class="w30" width="30"></td>
                    <td class="w580" width="580" id="content-column">
                        <!-- #TEXT ONLY
                        ================================================== -->
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                    <td class="w580" width="580">
                                        <p align="left" class="article-title" style="font-size: 18px; line-height:24px; color: #b0b0b0; font-weight:bold; margin-top:0px; margin-bottom:18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">ForexRay Account Details</p>
                                        <div align="left" class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif;">
                                            <p>Dear <?php echo $name;  ?>,</p>
                                            <p>Thank you for registering with <a href="<?php echo base_url();  ?>" class="article-content-a" style="color: #2f82de; font-weight:bold; text-decoration:none;"><b style='color: #FCA810;'>ForexRay</b></a>.</p>
                                            <p><?php if(!empty($message)){ echo $message; }  ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td class="w580" width="580" height="10"></td></tr>
                            </tbody></table>
                    </td>
                    <td class="w30" width="30"></td>
                </tr>
            </tbody></table>
    </td>
</tr>

<?php $this->load->view('email_templates/template_2/bottom'); ?>
<style type="text/css">
    
    table{
        border-spacing:0px;
        border-color: gray;
        
    }
</style>
