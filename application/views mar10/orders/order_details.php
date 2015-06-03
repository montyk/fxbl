        <?php $this->load->view('common/admin/main_header'); ?>
        <?php $this->load->view('common/includes.php'); ?>
        
        <script type="text/javascript" src="<?php echo base_url();?>public/js/validate.js"></script>
       
        <script type="text/javascript">
            $(document).ready(function(){
                jQuery("#sub_grid_tbl").jqGrid431({
                    url:'<?php echo site_url('orders/currentorders'); ?>',
                    datatype: "json",
                    mtype:'POST',
                    height: $('#sidebar').height(),
                    width: $('#main').width()-4,
                    colNames:['Flag', 'Transaction Number', 'Payment Method', 'e Currency Type','Total Number','Status', 'User Name','More','Messages'],
                    colModel:[
                        {name:'order_flag',index:'order_flag'},
                        {name:'mask_id',index:'mask_id'},
                        {name:'payment_method',index:'payment_method'},
                        {name:'ecurrency',index:'ecurrency'},
                        {name:'total',index:'total'},
                        {name:'order_status',index:'order_status'},
                        {name:'date',index:'date'},
                        {name:'more',index:'more',sortable:false},
                        {name:'more',index:'more',sortable:false}
                    ],
                    rowNum:10,
                    //rowList:[10,20,30],
                    pager: '#sub_grid_pager',
                    sortname: 'id',
                    viewrecords: true,
                    sortorder: "desc",
                    multiselect: false,
                    childGrid: true,
                    childGridIndex: "rows",
                    loadtext:'<img src="<?php echo base_url();  ?>public/images/36.gif"/>'
                });
			
                $(".flip").click(function(){
                    $(".panel").slideToggle("slow");
                });
                $( "#f_sd" ).datepicker();
                $( "#f_ed" ).datepicker();
				
            });
        </script>
        <script type="text/javascript">

            $(document).ready(function() {
		
                //When page loads...
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content
		
            });
        </script>
        <script type="text/javascript">
            var amountTimer;
            
            $(function(){
                //$('.column').equalHeight();
                
                
                /*
                 * NEW INTERACTIONS FOR REVERSE CALCULATIONS
                 */
                
                $('#amount').live('keyup',function(){
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
                
                $('a.save_order').live('click',function(){
                   $('#reverse_calculation_form').validate({
                       rules:{
                           amount:{
                               required:true
                           },
                           order_status:{
                               required:true
                           }
                       },
                       messages:{
                           amount:{
                               required:'Please Enter a amount'
                           },
                           order_status:{
                               required:'Please Select a Status'
                           }
                       }
                   });
                   $('#reverse_calculation_form').submit();
                });
                
            });
            
            /*
             * NEW INTERACTIONS FOR REVERSE CALCULATIONS
             */
            
            function calculateAmount(){
                console.log(12)
                dataP='lr_currency='+$('#lr_currency').val()+'&lr_bank='+$('#lr_bank').val()+'&amount='+$('#amount').val()+'&type='+$('#type').val();
                $.ajax({
                    url:site_url+'orders/buy_sell_reverse_charges',
                    data:dataP,
                    type:'POST',
                    beforeSend:function(){

                    },
                    success:function(dataR){
                        $('#amount_calculations').html(dataR);
                    }
                });
            }
            
        </script>


    </head>

    <body class="app">

 	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>

        <section id="secondary_bar" class="section">
            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <a href="#">FOREXRAY Admin</a> 
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Current orders</a>
                </article>
               <!-- <input type="button" value="Add Liberty Account" class="add_ecur fr" />-->
            </div>
        </section><!-- end of secondary bar -->

        <section id="main" class="column tab_grid section">

            <ul class="tab_navgts ul_reset">
                <li>
                    <div class=""><b><?php echo $mask_id;  ?> - <?php echo $order_status;  ?></b></div>
                </li>
                <li class="fr">
                    <a class="btn edit_ecur" href="<?php echo site_url('orders/currentorders#buy');  ?>" id="2">
                        <span class="inner-btn">
                            <span class="label">Back </span>
                        </span>
                    </a>
                </li>
                <li class="fr">
                    <a class="btn edit_ecur" href="<?php echo site_url('orders/order_messages/'.$this->my_encrypt->encode($id));  ?>" id="2">
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
                        <h2>User Info</h2><span><?php echo anchor_popup(site_url('users/adduser/'.$user_details->id),'More details');  ?></span>
                    </div>
                    <div class="panel_contents">
                        <?php // echo '<pre>'; print_r($user_details); echo '</pre>';  ?>
                        <table cellpadding="4" cellspacing="6">
                            <tbody>
                                <tr>
                                    <td>Username </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->firstname;  ?> </td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->email;  ?> </td>
                                </tr>
                                <tr>
                                    <td>Address </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->address;  ?> </td>
                                </tr>
                                <tr>
                                    <td>City </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->city;  ?> </td>
                                </tr>
                                <tr>
                                    <td>State </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->state;  ?> </td>
                                </tr>
                                <tr>
                                    <td>Home phone </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->home_phone;  ?> </td>
                                </tr>
                                <tr>
                                    <td>Mobile phone </td>
                                    <td>:</td>
                                    <td><?php echo $user_details->mobile_phone;  ?> </td>
                                </tr>
                                <?php if(!empty($user_details->ecur_details)){  ?>
                                <tr>
                                    <td style="vertical-align: top;">Ecurrency Details </td>
                                    <td style="vertical-align: top;">:</td>
                                    <td>
                                        <table cellpadding="2" cellspacing="2">
                                            <tbody>
                                        <?php foreach($user_details->ecur_details as $k=>$v){  ?>
                                                    <tr>
                                                        <td> Account name</td>
                                                        <td>: </td>
                                                        <td> <?php echo $v->account_name;  ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Account number</td>
                                                        <td>: </td>
                                                        <td> <?php echo $v->account_number;  ?></td>
                                                    </tr>
                                                    <tr><td colspan="3"></td></tr>
                                        <?php }  ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                    
                    
                    
                    
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
                    
                    
                    <div class="panel_header">
                        <h2>Recalculation Process</h2>
                    </div>
                    <div class="panel_contents">
                        
                            <?php if(!empty($order_reverse_calculations)){ // echo '<pre>'; print_r($order_reverse_calculations); echo '</pre>';
                                    foreach($order_reverse_calculations as $k=>$v){ 
                            ?>
                            <div style="border:1px solid #ccc; box-shadow:1px 1px 18px #ddd; padding:5px; margin: 15px; background: <?php if($v->user_type=='a'){ echo '#f0faf2;  border:2px solid #bee0c8;';/*#FEFED4 #E1E1E1*/ }else{ echo '#FDF3F3; border:2px solid #F5D8D8;'; }  ?> border-radius:10px;">
                                <div style="text-align: right; font-style: italic; padding:1px 5px;"><?php echo $v->firstname;  ?> (<?php echo (($v->user_type=='a')?'Admin':'User');  ?>) &nbsp; &nbsp;<?php echo localDate($this->session->userdata('ctz_offset'),$v->date_added,'d M Y'); // dateFormat($v->date_added,'Y-m-d h:i a');  ?></div>
                                <form name="payment_form" id="payment_form" method="POST" target="_blank" action="<?php echo site_url('payment_gateway');  ?>"> 
                                <div class="d_fds">
                                    <div class="left_fld">    
                                        <label for=""><b>Fee Details:</b></label>
                                    </div>    
                                    <div class="cb"></div>    
                                </div>

                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for="">Received e-Currency Amount:</label>
                                    </div>
                                    <div class="right_fld"><?php echo $v->amount;  ?></div>
                                    <div class="cb"></div>
                                </div>

                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for="">EdealSpot Charges:</label>
                                    </div>
                                    <div class="right_fld"><?php echo $v->rate;  ?></div>
                                    <div class="cb"></div>
                                </div>

                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for=""><?php echo $v->payment_method_name;  ?> Charges:</label>
                                    </div>
                                    <div class="right_fld"><?php echo $v->payment_method_charges;  ?></div>
                                    <div class="cb"></div>
                                </div>
                                <?php if(!empty($v->charge_type) && $v->charge_type=='sell'){  ?>
                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for="">Wire Transfer Charges:</label>
                                    </div>
                                    <div class="right_fld"><?php echo $v->payment_method_charges2;  ?></div>
                                    <div class="cb"></div>
                                </div>
                                <?php }  ?>

                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for=""><?php echo $v->ecurrency_name;  ?> Charges:</label>
                                    </div>
                                    <div class="right_fld"><?php echo $v->account_charges;  ?></div>
                                    <div class="cb"></div>
                                </div>

                                <div class="d_fds">
                                    <div class="left_fld">
                                        <label for="">Total Amount Payable:</label>
                                    </div>
                                    <div class="right_fld">
                                        <?php echo $v->total;  ?>
                                        <br/>
                                        <p>(Transferable amount is <?php echo $v->total;  ?>)</p>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                                    
                                <div class="d_fds" style="text-align: right;">
                                    <input type="hidden" name="amount" value="<?php echo $amount;  ?>" />
                                    <?php if($orders_type=='buy'){  ?>
                                    <input type="hidden" name="lr_account" value="<?php echo $lr_account;  ?>" />
                                    <input type="hidden" name="lr_account_name" value="<?php echo $lr_account_name;  ?>" />
                                    <?php }  ?>
                                    <?php if($orders_status_id!='3' && $orders_type=='buy'){   ?>
                                    <input type="submit" name="submit_btn" value="  Pay Now  "  style="padding:2px 15px;"/>
                                    <?php }  ?>
                                </div>
                                
                                </form>
                            </div>

                            <?php
                                    } 
                                }  
                            ?>
                        <br/>
                        <form name="reverse_calculation_form" id="reverse_calculation_form" method="POST"> 
                        <table cellpadding="4" cellspacing="6">
                            <tbody>
                            
                                <tr>
                                    <td><label for="amount">Amount Received </label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="amount" id="amount" class=" ip" />
                                        <input type="hidden" id="lr_currency" name="lr_currency" class="lr_currency" value="<?php echo $ecurrencies_id;  ?>" />
                                        <input type="hidden" id="lr_bank" name="lr_bank" class="lr_bank" value="<?php echo $payment_methods_id;  ?>" />
                                        <input type="hidden" id="type" name="type" class="lr_bank" value="<?php echo $orders_type;  ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td id="amount_calculations" colspan="3">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="order_status">Order Status </label></td>
                                    <td>:</td>
                                    <td>
                                        <select id="order_status" class="sl_bx required" name="order_status" title="Please choose a Order Status">
                                            <?php echo selectBox('Select Order Status','orders_status','id,name',' status=1 ',(!empty($orders_status_id)?$orders_status_id:''),'');  ?>
                                        </select>
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
                    
                    <div class="footer_spacer" style="margin-bottom: 50px;"></div>
                    
                </div>

            </div>

        </section>
        </div>
    </body>

</html>