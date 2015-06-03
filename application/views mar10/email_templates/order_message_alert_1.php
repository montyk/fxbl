



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Email</title>
    </head>

    <body>
        <table border="0" cellpadding="0" cellspacing="0" style="background:#f2f2f2; color:#565656;font-family:Arial, Helvetica, sans-serif" width="100%" align="center">
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="611" align="center">
                        <tr>
                            <td><img src="<?php echo base_url(); ?>public/css/images/etop.png" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="611" align="center">
                        <tr>
                            <td width="12" style="border-right:1px solid #f2f2f2"></td>
                            <td width="" style="background:#fff">
                                <table border="0" cellpadding="0" cellspacing="0" style="padding:10px; font-size:13px; color:#565656">
                                    <tr>
                                        <td><img src="<?php echo base_url(); ?>public/css/images/logo.png"   /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Dear <b><?php echo $user_name;  ?></b>, </p>
                                            <p>You have a new message regarding the order(<?php echo $mask_id;  ?>). </p>
                                            <p>Please login to the <a href="http://edealspot.com/" target="_blank" style="color:#2670d5;font-size:14px">Edeal Spot</a> Website to view your message.</p>
                                        </td>
                                    </tr>
                                    

                                    <tr bgcolor="#FF9966">
                                        <td height="2"></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div style="margin:20px 0 10px">Thanks,</div>
                                            <a href="http://edealspot.com/" target="_blank" style="color:#2670d5;font-size:14px">Edeal Spot</a>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                            <td width="21" style="border-left:1px solid #f2f2f2"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="611" align="center">
                        <tr>
                            <td><img src="<?php echo base_url(); ?>public/css/images/ebot.png" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>