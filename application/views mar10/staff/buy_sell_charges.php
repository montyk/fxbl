<?php if (!empty($charges->edeal_fee)) { ?>

<div class="amount_det">

    <div class="d_fds">
        <div class="left_fld">    
            <label for=""><b>Fee Details:</b></label>
        </div>    
        <div class="cb"></div>    
    </div>
    
    <div class="d_fds">
        <div class="left_fld">
            <?php if(!empty($charges->charge_type) && $charges->charge_type=='sell'){  ?>
            <label for="">e-Currency Amount you want to sell:</label>
            <?php }else{  ?>
            <label for="">Your e-Currency Amount:</label>
            <?php }  ?>
        </div>
        <div class="right_fld"><?php echo $charges->user_amount;  ?></div>
        <div class="cb"></div>
    </div>

    <div class="d_fds">
        <div class="left_fld">
            <label for="">EdealSpot Charges:</label>
        </div>
        <div class="right_fld"><?php echo $charges->edeal_fee;  ?></div>
        <div class="cb"></div>
    </div>

    <div class="d_fds">
        <div class="left_fld">
            <label for=""><?php echo $charges->payment_method_name;  ?> Charges:</label>
        </div>
        <div class="right_fld"><?php echo $charges->payment_method_fee;  ?></div>
        <div class="cb"></div>
    </div>
    <?php if(!empty($charges->charge_type) && $charges->charge_type=='sell'){  ?>
    <div class="d_fds">
        <div class="left_fld">
            <label for="">Wire Transfer Charges:</label>
        </div>
        <div class="right_fld"><?php echo $charges->payment_method_fee2;  ?></div>
        <div class="cb"></div>
    </div>
    <?php }  ?>

    <div class="d_fds">
        <div class="left_fld">
            <label for=""><?php echo $charges->ecurrency_name;  ?> Charges:</label>
        </div>
        <div class="right_fld"><?php echo $charges->ecurrency_fee;  ?></div>
        <div class="cb"></div>
    </div>

    <div class="d_fds">
        <div class="left_fld">
            <label for="">Total Amount Payable:</label>
        </div>
        <div class="right_fld">
            <?php echo $charges->total_amount;  ?>
            <br/>
            <p>(Please transfer <?php echo $charges->total_amount;  ?> to our account at LibertyReserve system)</p>
        </div>
        <div class="cb"></div>
    </div>

    <input type="hidden" name="user_amount" class="user_amount" value="<?php echo $charges->user_amount;  ?>" />
    <input type="hidden" name="edeal_fee" class="edeal_fee" value="<?php echo $charges->edeal_fee;  ?>" />
    <input type="hidden" name="payment_method_name" class="payment_method_name" value="<?php echo $charges->payment_method_name;  ?>" />
    <input type="hidden" name="payment_method_fee" class="payment_method_fee" value="<?php echo $charges->payment_method_fee;  ?>" />
    <input type="hidden" name="payment_method_fee2" class="payment_method_fee2" value="<?php echo $charges->payment_method_fee2;  ?>" />
    <input type="hidden" name="ecurrency_name" class="ecurrency_name" value="<?php echo $charges->ecurrency_name;  ?>" />
    <input type="hidden" name="ecurrency_fee" class="ecurrency_fee" value="<?php echo $charges->ecurrency_fee;  ?>" />
    <input type="hidden" name="total_amount" class="total_amount" value="<?php echo $charges->total_amount;  ?>" />

</div>


<?php }else if(isset($error_message)){ ?>

<div class="amount_det error">
    <p><?php echo $error_message;  ?></p>
</div>

<?php }else{  ?>

<div class="amount_det error big_info">
    <p>Your requested amount is out of range, Please review again Or Contact our Customer Care.</p>
</div>

<?php }  ?>