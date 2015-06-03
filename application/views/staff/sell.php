<?php $current = "Sell";
include 'header.php'; ?>

<section id="main" class="column section">

    <div class="form_prp">
        <div class="notofication_wrapper">
            <?php
                if($this->session->flashdata('error_msg')){     echo '<div class="big_error"><span>'.$this->session->flashdata('error_msg').'</span></div>';      }
                if($this->session->flashdata('info_msg')){      echo '<div class="big_info"><span>'.$this->session->flashdata('info_msg').'</span></div>';        }
                if($this->session->flashdata('success_msg')){   echo '<div class="big_success"><span>'.$this->session->flashdata('success_msg').'</span></div>';  }
            ?>
            <?php 
                if(isset($verification_message) && !empty($verification_message)){
                    echo '<div class="big_error"><span>'.$verification_message.'</span></div>';
                }
            ?>
        </div>
        <div class="post">

            <div class="h_1">Sell to Edealspot.com </div>
            <div class="fr validcol">* Mandataory</div>
            <form name="sellform" id="sellform" method="post" action="#review">
                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_currency"> Please choose e-currency you wish to sell:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select class="sl_bx" id="lr_currency" name="lr_currency" title="Please choose e-currency you wish to buy">
                            <?php echo selectBox('Select Currency Type','ecurrencies','id,name',' status=1 ','');  ?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_bank"> Please choose payment method:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select class="sl_bx" id="lr_bank" name="lr_bank" title="Please choose payment method">
                            <?php echo selectBox('Select Payment Method','payment_methods','id,name',' status=1 ','');  ?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="amount"> Amount:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type="text" value="" id="amount" class="ip" name="amount" class="ip" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds " id="amount_calculations">
                    <div class="cb"></div>
                </div>

                <div class="h_2 adj">Account Details</div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="beneficiary_name"> Beneficiary's name:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type="text" class="required ip" value="" id="beneficiary_name" name="beneficiary_name" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="beneficiary_addr"> Beneficiary's address:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <textarea class="required t_ar" id="beneficiary_addr" name="beneficiary_addr"></textarea>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="sell_lr_account">Bank Account No. or IBAN:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type="text" class="required ip" value="" id="sell_lr_account" name="sell_lr_account" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="bank_name_addr">Bank name and address:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <textarea class="required t_ar" id="bank_name_addr" name="bank_name_addr"></textarea>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="bank_swift">Bank SWIFT or ABA:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type="text" class="required ip" value="" id="bank_swift" name="bank_swift" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <?php if(isset($verification_message) && !empty($verification_message)){ /* Donot Show the Submit */ }else{  ?>
                    <input type="submit" style="width: 85px;" class="alt_btn" value="Sell" name="sell" />
                    <?php }  ?>
                </div>
            </form>
        </div>
    </div>

</section>

<script type="text/javascript">
    var amountTimer;
    $(function(){
        $('#sellform').validate({
            rules:{
                lr_currency:{
                    min:1
                },
                lr_bank:{
                    min:1
                },
                amount:{
                    required:true,
                    number:true
                },
                beneficiary_name:{
                    required:true
                },
                beneficiary_addr:{
                    required:true
                },
                sell_lr_account:{
                    required:true
                },
                bank_name_addr:{
                    required:true
                },
                bank_swift:{
                    required:true
                }
            },
            messages:{
                lr_currency:{
                    min:'Please select a E-currency'
                },
                lr_bank:{
                    min:'Please select Payment method'
                },
                amount:{
                    required:'Please enter a Amount',
                    number:'Please enter a valid amount'
                },
                beneficiary_name:{
                    required:'Please enter Beneficiary\'s name '
                },
                beneficiary_addr:{
                    required:'Please enter Beneficiary\'s address '
                },
                sell_lr_account:{
                    required:'Please Enter Bank Account No. or IBAN'
                },
                bank_name_addr:{
                    required:'Please Enter Bank name and address'
                },
                bank_swift:{
                    required:'Please Enter Bank SWIFT or ABA'
                }
            },
            errorPlacement:function(element,error){
                if($(error).attr('name')=='terms'){
                    element.insertAfter($('#terms_links'));
                }else{
                    element.insertAfter(error);
                }
            }
        });

        $('#amount').live('keyup',function(event){
            // console.log(event.keyCode);
            thisKeyCode=event.keyCode;
            ignoreKeyCodes=[9,16,17,18,20,27,32,91];
            if($.inArray(thisKeyCode,ignoreKeyCodes)>=0){
                // Ignore Case
            }else if($('#amount').val()!=''){
                $('#amount_calculations').html('<p><img src="'+base_url+'public/images/loader.gif" /></p>');
                clearTimeout(amountTimer);
                amountTimer=setTimeout(calculateAmount, 800);
            }
        });

        $('#lr_currency,#lr_bank').live('change',function(){
            $('#amount').trigger('keyup');
            if($(this).attr('id')=='lr_currency'){
                load_user_account_details();
            }
        });


    });

    function calculateAmount(){
        dataP='type=sell&lr_currency='+$('#lr_currency').val()+'&lr_bank='+$('#lr_bank').val()+'&amount='+$('#amount').val();
        $.ajax({
            url:site_url+'staff/buy_sell_charges',
            data:dataP,
            type:'POST',
            beforeSend:function(){

            },
            success:function(dataR){
                $('#amount_calculations').html(dataR);
            }
        });
    }

    function load_user_account_details(){
        $('#lr_account,#lr_account_name').val(''); // ,#users_ecurrencies_id

        dataP='lr_currency='+$('#lr_currency').val();
        $.ajax({
            url:site_url+'staff/user_account_details',
            data:dataP,
            type:'POST',
            beforeSend:function(){

            },
            success:function(dataR){
                $('#user_account_details').html(dataR);
            }
        });
    }

    $('#user_account_details .box_select').live('click',function(){
        $('#user_account_details .box_select').not(this).removeClass('selected');
        $(this).toggleClass('selected');
        thisObj=$(this);
        if(thisObj.hasClass('selected')){
            $('#lr_account').val(thisObj.find('.select_account_number').val());
            $('#lr_account_name').val(thisObj.find('.select_account_name').val());
            // $('#users_ecurrencies_id').val(thisObj.find('.select_id').val());
        }else{
            $('#lr_account,#lr_account_name').val(''); // ,#users_ecurrencies_id
        }

    });

    $('#lr_account,#lr_account_name').live('keyup',function(event){
        // console.log(event.keyCode);
        thisKeyCode=event.keyCode;
        ignoreKeyCodes=[9,13,16,17,18,20,27,32,37,38,39,40,44,91];
        if($.inArray(thisKeyCode,ignoreKeyCodes)>=0){
            // Ignore Case
            // console.log('>>> IGNORED Key Code: '+thisKeyCode);
        }else{
            // $('#users_ecurrencies_id').val('');
            $('#user_account_details .box_select').removeClass('selected');
        }
    });



</script>

</body>
</html>











