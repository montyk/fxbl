<?php $current = "Home";
include 'header.php'; ?>

<section id="main" class="column section">

    <div class="form_prp">

        <div class="post">
            <h2 class="title"><a href="#">Sell to Edealspot.com</a></h2>
            <form action="<?php echo site_url('staff/sell_confirm');  ?>" method="post" id="sellform" name="sellform">				                     
                <table cellpadding="4" cellspacing="6">
                    <tbody>
                        <tr>
                            <td>eCurrency Type </td>
                            <td>:</td>
                            <td><?php echo $ecurrency_name;  ?> </td>
                        </tr>

                        <tr>
                            <td>Payment Method </td>
                            <td>:</td>
                            <td><?php echo $payment_method_name;  ?></td>
                        </tr>

                        <tr>
                            <td><strong>Account Details </strong></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td width="291">Beneficiary's name *</td>
                            <td width="1">:</td>
                            <td width="331"><?php echo $beneficiary_name;  ?></td>
                        </tr>
                        <tr>
                            <td width="291">Beneficiary's address *</td>
                            <td width="1">:</td>
                            <td width="331"><?php echo $beneficiary_addr;  ?></td>
                        </tr>
                        <tr>
                            <td width="291">Bank Account No. or IBAN *</td>
                            <td width="1">:</td>
                            <td width="331"><?php echo $sell_lr_account;  ?></td>
                        </tr>
                        <tr>
                            <td width="291">Bank name and address *</td>
                            <td width="1">:</td>
                            <td width="331"><?php echo $bank_name_addr;  ?></td>
                        </tr>
                        <tr>
                            <td width="291">Bank SWIFT or ABA *</td>
                            <td width="1">:</td>
                            <td width="331"><?php echo $bank_swift;  ?></td>
                        </tr>

                        <tr>
                            <td><strong>Fee Details </strong></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>e-currency you wish to sell</td>
                            <td>:</td>
                            <td><?php echo $amount;  ?> </td>
                        </tr>
                        <tr>
                            <td>EdealSpot Charges</td>
                            <td>:</td>
                            <td><?php echo $edeal_fee;  ?></td>
                        </tr>

                        <tr>
                            <td><?php echo $payment_method_name;  ?> Charges  </td>
                            <td>:</td>
                            <td><?php echo $payment_method_fee;  ?></td>
                        </tr>
                        <tr>
                            <td>Wire Transfer Charges   </td>
                            <td>:</td>
                            <td><?php echo $payment_method_fee2;  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $ecurrency_name;  ?> Charges  </td>
                            <td>:</td>
                            <td><?php echo $ecurrency_fee;  ?></td>
                        </tr>

                        <tr>
                            <td>Total Amount </td>
                            <td>:</td>
                            <td><?php echo $total_amount;  ?> </td>
                        </tr>
                        <tr>
                            <td>&nbsp; </td>
                            <td></td>
                            <td>(Please transfer <?php echo $total_amount;  ?> to our account at LibertyReserve system) </td>
                        </tr>
                        
                        <tr>
                            <td colspan="3">
                                <br/>
                                <p>Please send payment <?php echo $total_amount;  ?> to our bank account. Intermediary or Corresponding Banks might charge extra fees for international bank wires. We recommend you to pay all bank charges when you fill in the wire details at your bank. If you don't pay the charges we have to use the amount we receive to fund your e-currency account. Please find our bank details below:</p>
                                <br/>
                                <?php if(!empty($ecurrency_account_details)){                                    
                                    foreach ($ecurrency_account_details as $key => $value) {
                                ?>
                                <table cellpadding="5" cellspacing="5">
                                    <tbody>
                                        <tr>
                                            <td><strong>Account Name</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $value->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Account Number</strong> </td>
                                            <td><strong>:</strong></td>
                                            <td><?php echo $value->account_number; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } }  ?>
                            </td>
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
                                
                                <input type="hidden" name="beneficiary_name" class="beneficiary_name" value="<?php echo $beneficiary_name;  ?>" />
                                <input type="hidden" name="beneficiary_addr" class="beneficiary_addr" value="<?php echo $beneficiary_addr;  ?>" />
                                <input type="hidden" name="sell_lr_account" class="sell_lr_account" value="<?php echo $sell_lr_account;  ?>" />
                                <input type="hidden" name="bank_name_addr" class="bank_name_addr" value="<?php echo $bank_name_addr;  ?>" />
                                <input type="hidden" name="bank_swift" class="bank_swift" value="<?php echo $bank_swift;  ?>" />
                                
                                <input type="submit" name="sell-confirm" class="alt_btn" value=" Confirm " />
                            </td>
                            <td></td>
                            <td>
                                <input type="button" name="cancel" id="cancel" value=" Cancel " onclick="javascript:window.location='<?php echo site_url('staff/sell');  ?>'" style="padding: 2px 10px;" />
                            </td>
                        </tr>

                    </tbody>
                </table>
                
                <br/>
                
            </form>
        </div>

    </div>

</section> <!--end of section-->

</body>
</html>

