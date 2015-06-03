<?php $this->load->view('email_templates/email_template_top');  ?>


<tr>
    <td colspan='2' style="border-top:solid #999ba0 1px;border-left:0 none;border-right: 0 none;background:#fefefe;padding:11.25pt 11.25pt 11.25pt 15.0pt;min-height:45.0pt">
        <p><span style="font-size:10.0pt;font-family:Arial, Helvetica, sans-serif;color:#565656">Dear <?php echo $user_name; ?>,</span></p>
        <p><span style="font-size:10.0pt;font-family:Arial, Helvetica, sans-serif;color:#565656">Thank you for placing your order at <a href="<?php echo base_url();  ?>" style="text-decoration: none;"><b style='color: #FCA810;'>Edeal</b><b style='color:#3CC2E7;'>spot</b></a>. Please find your order details below.</span></p>
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
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right">eCurrency Type:</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $ecurrency_name; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right">Payment Method :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_name; ?> </span></b>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <div style="padding:8px 5px;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Your Account Details</div>								  
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><?php echo $ecurrency_name;  ?> A/C No :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $lr_account; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><?php echo $ecurrency_name;  ?> A/C Name :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $lr_account_name; ?> </span></b>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <div style="padding:8px 5px;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Fee Details</div>								  
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right">Amount :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $amount; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right">EdealSpot Charges :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $edeal_fee; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><?php echo $payment_method_name;  ?> Charges :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_fee; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><?php  echo $ecurrency_name; ?>  Charges :</span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $ecurrency_fee; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Total Amount :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $total_amount; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <p style="line-height:20px">Please send payment <?php echo $total_amount; ?> to our bank account. Intermediary or Corresponding Banks might charge extra fees for international bank wires. We recommend you to pay all bank charges when you fill in the wire details at your bank. If you don't pay the charges we have to use the amount we receive to fund your e-currency account. Please find our bank details below:</p>								  
                                    </td>
                                </tr>
                                
                                <?php if(!empty($payment_method_details)){ ?>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Beneficiary's name :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_details[0]->account_name; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Beneficiary's address :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_details[0]->address; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Bank Account No. or IBAN :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_details[0]->account_number; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Bank name and address :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_details[0]->name,', ',$payment_method_details[0]->bank_address; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a; text-align:right"><b>Bank SWIFT or ABA :</b></span>								  
                                    </td>
                                    <td width="138"  height="20" style="padding:.75pt .75pt .75pt .75pt; height:20px; ">
                                        <b><span style="font-size:9.0pt;font-family:Arial, Helvetica, sans-serif;color:#5a5a5a"><?php echo $payment_method_details[0]->ifsc_code; ?> </span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <div style="padding:8px 5px;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Note:</div>								  
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <p style="color:#0000ff; font-weight: bold;"><?php echo $payment_method_details[0]->description;  ?></p>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!--
                                <tr style="display: none;">
                                    <td width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <div style="padding:8px 5px;margin:20px 0 0;font-size:14px;font-weight:bold;color:#1d4877">Note:</div>								  
                                    </td>
                                </tr>
                                
                                <tr style="display: none;">
                                    <td colspan="2" width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <p style="line-height:20px">
                                            At 'MESSAGE TO THE BENEFICIARY' or 'DETAILS OF PAYMENT' You MUST include the message below: " EDEALSPOT.COM No. EDS-B-XXXXXXX " Where EDS-B-XXXXXXX is your order number. We will send the order details to you after click 'Confirm' button, including the order number and instruction. Don't change this message, it must be whole. Transfers that arrive without the message will be returned to the sender, minus fees! Please ensure the payment is sent by yourself in person in the bank for your FIRST order on Edealspot.com. We do not accept online banking wire transfer for the FIRST order. Please ensure that funds originate from your individual bank account only and not somebody else's on your behalf. We don't accept corporation bank wire unless you can provide us all corporation documents and indicate you are the authorized user of the bank account. Please make sure you registered with correct phone number, address and name, phone confirmation is required if necessary. Edealspot.com reserves the right to reject or cancel the order if the users' register information is not real.
                                        </p>
                                    </td>
                                </tr>
                                -->
                                <tr>
                                    <td colspan="2" width="80" style="padding:.75pt .75pt .75pt .75pt; height:30px; ">
                                        <p style="line-height:20px">
                                            <div style="color:#111;margin:10px 0">Please update your order status to 'Pending' after sending the bank wire.</div>
                                            <div style="line-height:22px;margin-bottom:10px">
                                                <div>1) login to our website and click the "Buy", In Buy tab click buy orders.</div>
                                                <div>2) Choose the Order Number you placed and click More.</div>
                                                <div>3) Enter exact amount you sent to us.</div>
                                                <div>4) Click confirm button.</div>
                                            </div>
                                            <div style="margin-bottom:20px">Now,the order status will be renewed soon.</div>
                                        </p>
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
