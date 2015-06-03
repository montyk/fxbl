<?php $current = "Buy";
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
            <div class="h_1">Buy From Edealspot.com </div>
            <div class="fr validcol">* Mandataory</div>
            <form name="buyform" id="buyform" method="post" action="#review">

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_currency"> Please choose e-currency you wish to buy:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select id="lr_currency" class="sl_bx required" name="lr_currency" title="Please choose e-currency you wish to buy">
                            <?php echo selectBox('Select Currency Type','ecurrencies','id,name',' status=1 ','');  ?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_bank">Please choose payment method:<span class="validcol">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <select id="lr_bank" class="sl_bx required" name="lr_bank" title="Please choose payment method">
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
                        <input type="text" value="" id="amount" name="amount" class="ip" />
                    </div>

                    <div class="cb"></div>
                </div>

                <div class="d_fds " id="amount_calculations">
                    <div class="cb"></div>
                </div>

                <div class="h_2 adj">Your Account Details </div>

                <div id="user_account_details">
                    
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_account"> Your LR A/C No:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld"><input type="text" value="" id="lr_account" class="ip" name="lr_account"></div>

                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lr_account_name"> Your LR A/C Name:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld"><input type="text" value="" id="lr_account_name" class="ip" name="lr_account_name"/></div>
                    
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div>
                        <label><input type="checkbox" id="terms" name="terms"> I have read and agree with </label>
                        <a class="anc_col" target="_blank" href="#" id="terms_links">Terms of Service</a>.
                    </div>
                    <div id="accept_errors"></div>
                </div>
                <div>
                    <?php if(isset($verification_message) && !empty($verification_message)){ /* Donot Show the Submit */ }else{  ?>
                    <input type="submit" style="width: 85px;" class="alt_btn" value="Buy" name="buy"/>
                    <?php }  ?>
                </div>
            </form>
        </div>
    </div>

</section>
<script type="text/javascript">
    var amountTimer;
    $(function(){
        $('#buyform').validate({
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
                lr_account:{
                    required:true
                },
                lr_account_name:{
                    required:true
                },
                terms:{
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
                lr_account:{
                    required:'Please enter Your LR A/C No '
                },
                lr_account_name:{
                    required:'Please enter Your LR A/C Name '
                },
                terms:{
                    required:'Please Accept the Terms and Conditions'
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
        dataP='lr_currency='+$('#lr_currency').val()+'&lr_bank='+$('#lr_bank').val()+'&amount='+$('#amount').val();
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
                if($('#user_account_details .box_select').length>0){
                    $('#user_account_details .box_select:first').trigger('click');
                }
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








