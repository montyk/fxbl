<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Deposit Funds</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
	
    </head>
    <body class="app pamm_man_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Deposit Funds</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">Deposit Funds - <?php echo !empty($page)?$page:'Local Exchanger';?></div>
                        <div class="help_text" >
                            <b style="display:none">How do I deposit by <?php echo $page;?>?</b>
                            <?php // if($page=='MoneyGram' || $page=='Western Union'){?>
                            <!--<p class="m_t_b_10">To deposit funds using <?php echo $page;?> please send a mail to <a href="mailto:<?php echo $email_id;?>" target="_blank"><?php echo $email_id;?></a>.</p>-->


                           
                             <p class="m_t_b_10" style="display:none">In order to fund your account via Wire Transfer, please download Fund Transfer Form, complete the necessary details and email it back to us along with the SWIFT confirmation document(TT Receipt) .</p><br/>
  <p class="m_t_b_10"><b>Please complete the form below to download wire transfer Invoice.</b></p>
                            
                       <div id="invoice_div" class="o_h sum_box r_f m_t_20">							
                            <form name='invoice_form' id='invoice_form' method="post">            
                            <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Transfer Amount in USD:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="amount" id="amount"  class="ip r_f required number" placeholder="Amount in USD" title="Please enter  amount" value="" /></div>
</div> 
                             <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star"></span>Sender:</label></div>
                                    <div class="rgt_stflbl ip r_f">
								<!--	<input type="text" name="sender" id="sender"  class="ip r_f required" placeholder="Sender Name" title="Please enter Sender Name" value="" />-->
									<?php $userDetails=unserialize($this->session->userdata('fx_user_details')); echo $userDetails->firstname,' ',$userDetails->lastname;?>
									</div>

                        </div>     
						<?php if($page_id=='bwt2'){?>
						<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name"><span class="star">*</span>Full Name Of Your Bank:</label></div>
                                    <div class="rgt_stflbl"><input type="text" name="bank" id="bank"  class="ip r_f required" placeholder="Your Bank Name" title="Please enter your Bank" value="" /></div>
							</div>
						<?php } else{ ?>
						<input type="hidden" name="bank" value="localexchanger">
                      <?php }?>						
									<a class="button yellow m_t_20 cur_def j_general_submit">Confirm</a>

                           </form>
                        </div>      
                         <div id="invoice_confirmation" class="o_h sum_box r_f m_t_20">							
                            
									

                           </form>
                        </div> 
                            <!--<p>To locate the nearest <?php //echo $page;?> offices please click on "Find <?php //echo $page;?> Agent". In some countries it is possible to transfer the funds online.</p>-->
                            <?php // }?>
                        </div>

                                          
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
             
        </div>    
        <script>
		$(function(){
		$('#invoice_confirmation').hide();
		   $('#invoice_form').validate({
            errorElement: 'div',
			submitHandler:function(form){
				
				save_invoice($(form).serialize());
			}
         })
		 
		 
		
		
		})
		function save_invoice(params)
		{
		   $.ajax({
            url:'<?php echo site_url('userpages/invoice')?>',
	        type:'POST', 
			timeout:4500,
			data:params,
            beforeSend:function(){},
            success:function(dataR, textStatus, jqXHR){
                // if(jqXHR.status==0){ alert("Network Disconnected.");}
				
				$('#invoice_confirmation').html(dataR).show();
				$('#invoice_div').hide(); 
				$('.m_t_b_10').hide();
                $('.j_general_cancel').on('click',function(){
		 $('#invoice_confirmation').hide();
		 
		         $('#amount').val('');
				 $('#sender').val('');
				 $('#bank').val('');
				$('.m_t_b_10').show();
				$('#invoice_div').show();   
		 })
				
},
            error:function(jqXHR, textStatus, errorThrown){
               
            }
        });

		
		}
		</script>
		
    </body>
</html>