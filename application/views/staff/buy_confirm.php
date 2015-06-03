<?php $current="Buy"; include 'header.php'; ?>

<section id="main" class="column section">

    <div class="form_prp">
        <div class="post">

            <h2 class="title"><a href="#">Buy from Edealspot.com </a></h2>

            <form action="<?php echo site_url('staff/buy_confirm');  ?>" method="post" id="buyform" name="buyform">

                <table cellpadding="10" cellspacing="10">
                    <tbody>
                        <tr>
                            <td>eCurrency Type </td>
                            <td></td>
                            <td><?php echo $ecurrency_name;  ?> </td>
                        </tr>

                        <tr>
                            <td>Payment Method </td>
                            <td></td>
                            <td><?php echo $payment_method_name;  ?></td>
                        </tr>

                        <tr>
                            <td><strong>Your Account Details </strong></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><?php echo $ecurrency_name;  ?> A/C No </td>
                            <td></td>
                            <td><?php echo $lr_account;  ?></td>
                        </tr>


                        <tr>
                            <td><?php echo $ecurrency_name;  ?> A/C Name </td>
                            <td></td>
                            <td><?php echo $lr_account_name;  ?></td>
                        </tr>

                        <tr>
                            <td><strong>Fee Details </strong></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td width="212">Amount</td>
                            <td width="24"></td>
                            <td width="278"><?php echo $amount;  ?>  </td>
                        </tr>

                        <tr>
                            <td>EdealSpot Charges</td>
                            <td></td>
                            <td><?php echo $edeal_fee;  ?></td>
                        </tr>

                        <tr>
                            <td><?php echo $payment_method_name;  ?> Charges  </td>
                            <td></td>
                            <td><?php echo $payment_method_fee;  ?></td>
                        </tr>

                        <tr>
                            <td><?php  echo $ecurrency_name; ?>  Charges  </td>
                            <td></td>
                            <td><?php echo $ecurrency_fee;  ?></td>
                        </tr>

                        <tr>
                            <td><strong>Total Amount </strong></td>
                            <td></td>
                            <td><strong><?php echo $total_amount;  ?></strong></td>
                        </tr>


                        <tr>
                            <td colspan="3">
                                <br/>
                                <p>Please send payment <?php echo $total_amount;  ?> to our bank account. Intermediary or Corresponding Banks might charge extra fees for international bank wires. We recommend you to pay all bank charges when you fill in the wire details at your bank. If you don't pay the charges we have to use the amount we receive to fund your e-currency account. Please find our bank details below:</p>
                                <br/>
                                <?php if(!empty($payment_method_details)){ ?>
                                <table cellpadding="5" cellspacing="5">
                                    <tbody>
                                        <tr>
                                            <td><strong>Beneficiary's name</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $payment_method_details[0]->account_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Beneficiary's address</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $payment_method_details[0]->address; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bank Account No. or IBAN</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $payment_method_details[0]->account_number; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bank name and address</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $payment_method_details[0]->name,', ',$payment_method_details[0]->bank_address; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bank SWIFT or ABA</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $payment_method_details[0]->ifsc_code; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php }  ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <br/>
                                
                                
                                <?php // echo '<pre>'; print_r($payment_method_details); echo '</pre>';  ?>
                                <?php if(!empty($payment_method_details)){  ?>
                                <div class="note">
                                    <p style="color:#0000ff; font-weight: bold;"><?php echo $payment_method_details[0]->description;  ?></p>
                                </div>
                                <?php }  ?>
                                <p>
                                    At 'MESSAGE TO THE BENEFICIARY' or 'DETAILS OF PAYMENT' You MUST include the message below:
                                    " EDEALSPOT.COM No. EDS-B-XXXXXXX "
                                    Where EDS-B-XXXXXXX is your order number. We will send the order details to you after click 'Confirm' button, including the order number and instruction.
                                    Don't change this message, it must be whole. Transfers that arrive without the message will be returned to the sender, minus fees!
                                    Please ensure the payment is sent by yourself in person in the bank for your FIRST order on Edealspot.com. We do not accept online banking wire transfer for the FIRST order.
                                    Please ensure that funds originate from your individual bank account only and not somebody else's on your behalf. We don't accept corporation bank wire unless you can provide us all corporation documents and indicate you are the authorized user of the bank account.
                                    Please make sure you registered with correct phone number, address and name, phone confirmation is required if necessary. Edealspot.com reserves the right to reject or cancel the order if the users' register information is not real.
                                </p>
                                <p style="color:red">
                                    Our system will send you email with this order details and transfer instruction after click "Confirm". Please read the email carefully before sending the payment!
                                    Please click "Confirm" button to finalize your order.
                                </p>										</td>
                        </tr>

                        <tr>
                            <td align="right" valign="middle">

                                <input type="hidden" name="amount" class="amount" value="<?php echo $amount;  ?>" />
                                <input type="hidden" name="lr_currency" class="lr_currency" value="<?php echo $lr_currency;  ?>" />
                                <input type="hidden" name="lr_bank" class="lr_bank" value="<?php echo $lr_bank;  ?>" />
                                <input type="hidden" name="edeal_fee" class="edeal_fee" value="<?php echo $edeal_fee;  ?>" />
                                <input type="hidden" name="payment_method_name" class="payment_method_name" value="<?php echo $payment_method_name;  ?>" />
                                <input type="hidden" name="payment_method_fee" class="payment_method_fee" value="<?php echo $payment_method_fee;  ?>" />
                                <input type="hidden" name="payment_method_fee2" class="payment_method_fee2" value="<?php echo $payment_method_fee2;  ?>" />
                                <input type="hidden" name="ecurrency_name" class="ecurrency_name" value="<?php echo $ecurrency_name;  ?>" />
                                <input type="hidden" name="ecurrency_fee" class="ecurrency_fee" value="<?php echo $ecurrency_fee;  ?>" />
                                <input type="hidden" name="total_amount" class="total_amount" value="<?php echo $total_amount;  ?>" />
                                <input type="hidden" name="lr_account" class="lr_account" value="<?php echo $lr_account;  ?>" />
                                <input type="hidden" name="lr_account_name" class="lr_account_name" value="<?php echo $lr_account_name;  ?>" />

                                <input type="submit" name="buy-confirm" class="alt_btn" value=" Confirm ">
                            </td>
                            <td></td>
                            <td><input type="button" name="cancel" id="cancel" value=" Cancel " onclick="javascript:window.location='<?php echo site_url('staff/buy');  ?>'" style="padding: 2px 10px;" /></td>
                        </tr>

                    </tbody>
                </table>
                
            </form>
        </div>
    </div>

</section> <!--end of section-->

</body>
</html>

