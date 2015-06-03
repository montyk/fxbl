
<?php $current = "Order Details"; include 'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<link href="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />

<!--<script src="<?php echo base_url(); ?>public/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.jqGrid.min.js" type="text/javascript"></script>-->


<script src="<?php echo base_url(); ?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>

<script type="text/javascript" src="<?php echo base_url();  ?>public/js/validate.js"></script>
    

        <section id="main" class="column tab_grid section">

            <ul class="tab_navgts ul_reset">
                <li>
                    <div class=""><b><?php echo $mask_id;  ?></b></div>
                </li>
                <li class="fr">
                    <a class="btn edit_ecur" href="<?php if($orders_type=='sell'){ $backto='selloffers'; }else{ $backto='buyoffers'; } echo site_url('staff/'.$backto);  ?>" id="2">
                        <span class="inner-btn">
                            <span class="label">Back </span>
                        </span>
                    </a>
                </li>
                <li class="fr">
                    <a class="btn edit_ecur" href="<?php echo site_url('staff/order_messages/'.$this->my_encrypt->encode($id));  ?>" id="2">
                        <span class="inner-btn">
                            <span class="label">Messages </span>
                        </span>
                    </a>
                </li>
            </ul>

            <div id="tabs-1" class="grd_pn b_t_0 form_prp">

                <div class="notofication_wrapper">
                    <?php
                        if($this->session->flashdata('error_msg')){     echo '<div class="big_error"><span>'.$this->session->flashdata('error_msg').'</span></div>';      }
                        if($this->session->flashdata('info_msg')){      echo '<div class="big_info"><span>'.$this->session->flashdata('info_msg').'</span></div>';        }
                        if($this->session->flashdata('success_msg')){   echo '<div class="big_success"><span>'.$this->session->flashdata('success_msg').'</span></div>';  }
                    ?>
                </div>
                <div class="panels_wrapper">
                    
                    <div class="panel_header">
                        <h2>Order Details</h2>
                    </div>
                    <div class="panel_contents">
                        <table cellpadding="4" cellspacing="6">
                            <tbody>
                                <tr>
                                    <td>eCurrency Type </td>
                                    <td>:</td>
                                    <td><?php echo $ecurrency_name; ?> </td>
                                </tr>

                                <tr>
                                    <td>Payment Method </td>
                                    <td>:</td>
                                    <td><?php echo $payment_method_name; ?></td>
                                </tr>

                            <?php if($orders_type=='sell'){  ?>
                                <tr>
                                    <td><strong>Account Details </strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td width="291">Beneficiary's name *</td>
                                    <td width="1">:</td>
                                    <td width="331"><?php echo $beneficiary_name; ?></td>
                                </tr>
                                <tr>
                                    <td width="291">Beneficiary's address *</td>
                                    <td width="1">:</td>
                                    <td width="331"><?php echo $beneficiary_addr; ?></td>
                                </tr>
                                <tr>
                                    <td width="291">Bank Account No. or IBAN *</td>
                                    <td width="1">:</td>
                                    <td width="331"><?php echo $sell_lr_account; ?></td>
                                </tr>
                                <tr>
                                    <td width="291">Bank name and address *</td>
                                    <td width="1">:</td>
                                    <td width="331"><?php echo $bank_name_addr; ?></td>
                                </tr>
                                <tr>
                                    <td width="291">Bank SWIFT or ABA *</td>
                                    <td width="1">:</td>
                                    <td width="331"><?php echo $bank_swift; ?></td>
                                </tr>
                            <?php } else if($orders_type=='buy'){ ?>

                                <tr>
                                    <td><strong>Your Account Details </strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>LR A/C No </td>
                                    <td>:</td>
                                    <td><?php echo $lr_account;  ?></td>
                                </tr>


                                <tr>
                                    <td>LR A/C Name </td>
                                    <td>:</td>
                                    <td><?php echo $lr_account_name;  ?></td>
                                </tr>

                            <?php }  ?>
                                <tr>
                                    <td><strong>Fee Details </strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>e-currency you wish to sell</td>
                                    <td>:</td>
                                    <td><?php echo $amount; ?> </td>
                                </tr>
                                <tr>
                                    <td>EdealSpot Charges</td>
                                    <td>:</td>
                                    <td><?php echo $edeal_fee; ?></td>
                                </tr>

                                <tr>
                                    <td><?php echo $payment_method_name; ?> Charges  </td>
                                    <td>:</td>
                                    <td><?php echo $payment_method_fee; ?></td>
                                </tr>
                            <?php if($orders_type=='sell'){  ?>
                                <tr>
                                    <td>Wire Transfer Charges   </td>
                                    <td>:</td>
                                    <td><?php echo $payment_method_fee2; ?></td>
                                </tr>
                            <?php }  ?>
                                <tr>
                                    <td><?php echo $ecurrency_name; ?> Charges  </td>
                                    <td>:</td>
                                    <td><?php echo $ecurrency_fee; ?></td>
                                </tr>

                                <tr>
                                    <td>Total Amount </td>
                                    <td>:</td>
                                    <td><?php echo $total_amount; ?> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td>(Please transfer <?php echo $total_amount; ?> to our account at LibertyReserve system) </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    
                    <?php  if($orders_status_id=='1'){  ?>
                    <div class="panel_header">
                        <h2>Transaction details </h2>
                    </div>
                    <div class="panel_contents">
                        <form name="reverse_calculation_form" id="reverse_calculation_form" method="POST"> 
                        <table cellpadding="4" cellspacing="6">
                            <tbody>
                                <tr>
                                    <td><label for="amount">Enter exact amount you sent to us(Input Numeral only) </label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="amount" id="amount" class=" ip" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="payment_date">Enter Payment Date </label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="payment_date" id="payment_date" class=" ip" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <label>  <input type="checkbox" name="payed" id="payed_box" /> 
                                        I have added  Edealspot.com NO.<?php echo $mask_id;  ?>  message on <?php echo $payment_method_name; ?> Transfer.</label>
                                        <div class="t_c_error"></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3">
                                        <a class="btn edit_ecur save_order" href="javascript:void(0);" >
                                            <span class="inner-btn">
                                                <span class="label"> Save </span>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <?php }  ?>


                    <?php if(!empty($order_reverse_calculations) && $order_reverse_calculations>0){ ?>
                    <div class="panel_header">
                        <h2>Your Transaction details </h2>
                    </div>
                    <div class="panel_contents">
                        <?php // echo '<pre>'; print_r($order_reverse_calculations); echo '</pre>';  ?>
                        <?php foreach($order_reverse_calculations as $k=>$value){  ?>
                        <table cellpadding="4" cellspacing="6">
                            <tbody>
                                
                                <tr>
                                    <td colspan="3">
                                        <div style="border:1px solid #ccc; box-shadow:1px 1px 18px #ddd; padding:5px; margin: 5px;">

                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="">Your Submitted Amount:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <?php echo $value->amount;  ?>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="">Amount that will be transferred:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <?php echo $value->total;  ?>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <?php if($value->payment_date!='0000-00-00 00:00:00'){  ?>
                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="">Payment Date:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <?php echo localDate($this->session->userdata('ctz_offset'),$value->payment_date,'d M Y'); // dateFormat($value->payment_date,'Y-m-d');  ?>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <?php } else { ?>
                                            <div class="d_fds">
                                                <div class="left_fld">
                                                    <label for="">Payment Date*:</label>
                                                </div>
                                                <div class="right_fld">
                                                    <?php echo localDate($this->session->userdata('ctz_offset'),$value->date_added,'d M Y'); // dateFormat($value->payment_date,'Y-m-d');  ?>
                                                </div>
                                                <div class="cb"></div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php }  ?>
                    </div>
                    <?php }  ?>


                    
                    <div class="footer_spacer" style="margin-bottom: 50px;"></div>
                    
                </div>

            </div>

        </section>
               
        
        <script type="text/javascript">
            
            $(function(){
                //$('.column').equalHeight();
                
                $('a.save_order').live('click',function(){
                    if($(this).hasClass('submitting')){
                        return false;
                    }else{
                       $('#reverse_calculation_form').validate({
                           rules:{
                               amount:{
                                   required:true,
                                   number:true
                               },
                               payment_date:{
                                   required:true
                               },
                               payed:{
                                   required:true
                               }
                           },
                           messages:{
                               amount:{
                                   required:'Please enter a Amount',
                                   number:'Please enter a valid Amount'
                               },
                               payment_date:{
                                   required:'Please enter the Payment Date'
                               },
                               payed:{
                                   required:'Please Check this'
                               }
                           },
                            errorPlacement: function(error, element) {
                                if (element.attr("name") == "payed" )
                                error.insertAfter(".t_c_error");
                                else
                                error.insertAfter(element);
                            },
                            success:function(label){
                                // $('a.save_order').addClass('submitting');
                            }
                       });
                       $('#reverse_calculation_form').submit();
                    }
                });
                
                $('#payment_date').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true});
                
            });
            
        </script>

    </body>

</html>