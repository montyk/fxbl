<?php $this->load->view('email_templates/email_template_top');  ?>

<tr>
    <td colspan='2' style="border-top:solid #999ba0 1px;border-left:0 none;border-right: 0 none;background:#fefefe;padding:11.25pt 11.25pt 11.25pt 15.0pt;min-height:45.0pt">
        <span style="font-size:10.0pt;font-family:Arial, Helvetica, sans-serif;color:#565656"><?php echo html_entity_decode($content);  ?></span>
    </td>
</tr>
<tr>
    <td colspan='2' style="border-top: 1px solid #DAD5D5; background: #F3F3F3;padding:0in 0in 0in 0in;min-height:75.0pt">
        <table width="599" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="595" style="padding:.75pt .75pt .75pt .75pt">
                        <table width="550" border="0" cellpadding="0" style="margin-left:15.0pt">
                            <tbody>
                                
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"> </span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a">   </span></b>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
                                                    
<?php $this->load->view('email_templates/email_template_bottom');  ?>
