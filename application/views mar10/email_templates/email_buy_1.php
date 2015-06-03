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
                                        <td><p>Dear <b><?php echo $user_name;  ?></b>, Thank you for placing order at EBG. Please find your order details below:</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="200" style="padding:10px 10px 5px 0">eCurrency Type</td>	
                                                    <td width="300" style="color:#010101;padding:10px 0 5px 0"><?php echo $ecurrency_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px 10px 5px 0">Payment Method</td>
                                                    <td style="color:#010101;padding:10px 0 5px 0"><?php echo $payment_method_name; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div style="padding:8px 5px;background:#eff6f9;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Your Account Details</div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="200" style="padding:10px 10px 5px 0">LR A/C No</td>	
                                                    <td width="300" style="color:#010101;padding:10px 0 5px 0"><?php echo $lr_account; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px 10px 5px 0">LR A/C Name</td>
                                                    <td style="color:#010101;padding:10px 0 5px 0"><?php echo $lr_account_name; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div style="padding:8px 5px;background:#eff6f9;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Fee Details</div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="200" style="padding:10px 10px 5px 0">Amount</td>	
                                                    <td width="300" style="color:#010101;padding:10px 0 5px 0"><?php echo $amount; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px 10px 5px 0">EdealSpot Charges</td>
                                                    <td style="color:#010101;padding:10px 0 5px 0"><?php echo $edeal_fee; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px 10px 5px 0"><?php echo $payment_method_name;  ?> Charges</td>
                                                    <td style="color:#010101;padding:10px 0 5px 0"><?php echo $payment_method_fee; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px 10px 5px 0"><?php  echo $ecurrency_name; ?>  Charges</td>
                                                    <td style="color:#010101;padding:10px 0 5px 0"><?php echo $ecurrency_fee; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><div style="margin-top:10px;background:#f4fff7;padding:10px 10px 10px 8px;font-weight:bold;">Total Amount:</div></td>
                                                    <td style="color:#010101"><div style="margin-top:10px;padding:10px 0 10px 0;font-weight:bold; background:#f4fff7"><?php echo $total_amount; ?></div></td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p style="line-height:20px">Please send payment <?php echo $total_amount; ?> to our bank account. Intermediary or Corresponding Banks might charge extra fees for international bank wires. We recommend you to pay all bank charges when you fill in the wire details at your bank. If you don't pay the charges we have to use the amount we receive to fund your e-currency account. Please find our bank details below:</p></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><div style="padding:8px 5px;background:#eff6f9;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Note:</div></td>
                                    </tr>
                                    <tr>
                                        <td><p style="line-height:20px">At 'MESSAGE TO THE BENEFICIARY' or 'DETAILS OF PAYMENT' You MUST include the message below: " EDEALSPOT.COM No. EDS-B-XXXXXXX " Where EDS-B-XXXXXXX is your order number. We will send the order details to you after click 'Confirm' button, including the order number and instruction. Don't change this message, it must be whole. Transfers that arrive without the message will be returned to the sender, minus fees! Please ensure the payment is sent by yourself in person in the bank for your FIRST order on Edealspot.com. We do not accept online banking wire transfer for the FIRST order. Please ensure that funds originate from your individual bank account only and not somebody else's on your behalf. We don't accept corporation bank wire unless you can provide us all corporation documents and indicate you are the authorized user of the bank account. Please make sure you registered with correct phone number, address and name, phone confirmation is required if necessary. Edealspot.com reserves the right to reject or cancel the order if the users' register information is not real.</p></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div style="color:#111;margin:10px 0">Please update your order status to 'Pending' after sending the bank wire.</div>
                                            <div style="line-height:22px;margin-bottom:10px">
                                                <div>1) login our website and click the "Buy", In Buy tab click buy orders.</div>
                                                <div>2) Choose the Order Number you placed and click More.</div>
                                                <div>3) Enter exact amount you sent to us.</div>
                                                <div>4) Click confirm button.</div>
                                            </div>
                                            <div style="margin-bottom:20px">Now,the order status will be renews soon.</div>
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