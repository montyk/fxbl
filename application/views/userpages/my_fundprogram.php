<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - PAMM Manager Account</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
		<script src="<?php echo base_url(); ?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.custom.min.js"></script>  
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui-1.8.1.custom.css" type="text/css" media="screen" />
		
    </head>
	<script language="javascript">
$(document).ready(function(){
    
    
 $("#dialog-message").hide();
$("#confirmation_dialog").hide();
     
    /*Hiding the div with ID dialog-message and #confirmation_dialog
    These 2 divs are responsible for the modal boxes .
    
    */
    
    
    /*a Function to Initialise a Dialog instance for the modal box */
function modal_message()
{

	
		$("#dialog-message").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('destroy');
                    
				}
			}
		});
}



$('a.delete').click(function(e){ // if a user clicks on the "delete" image
e.preventDefault(); //prevent the default browser behavior when clicking   
var row_id =     $(this).attr('id');
var parent =   $(this).parent().parent();

		$('#confirmation_dialog').dialog({ /*Initialising a confirmation dialog box (with  cancel/OK button)*/
				   
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { //If the user choose to click on "OK" Button
					
				 
                           
                      	$(this).dialog('close'); // Close the Confirmation Box
                        
                       $.ajax({//make the Ajax Request
			type: 'get',
			url: 'remove_pamm',
			//data: 'delete=' + row_id,
			beforeSend: function() {
			 	parent.animate({'backgroundColor':'yellow'},600);
			},
			success: function(response) {//if the page ajax_delete.php returns the value "1"
	if(response=='1'){
	//parent.slideUp(600,function() {//remove the Table row .
					//parent.remove();
				//});
                   
                
                modal_message();//Display the success message in the modal box
				window.location.reload();
	}else {
	   alert('We could not delete it !');//if ajax_delete.php does not return the value "1"
	}
    
			
			}
		});
						}, 
						"Cancel": function() { //if the User Clicks the button "cancel"
						$(this).dialog('close');
						} 
					}
				});
                    
                    

 $('#confirmation_dialog').dialog('open');//Dispplay confirmation Dialogue when user clicks on "delete Image"
        
        
        
        
        	return false;
           
        });
});

</script>

    <body class="app pamm_man_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">PAMM Manager </div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">My PAMM Program</div>

                        
                        
                        
                        
<script type="text/javascript">
$("#dialog-message").hide();
function modal_message()
{

	
		$("#dialog-message").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('destroy');
                    
				}
			}
		});
}
/*$(document).ready(function() {
        $('.remove_pamm').live('click',function(){
            if(confirm('Are you sure you want to remove the PAMM Program?')){
                dataP='id='+$(this).attr('rel');
                $.ajax({
                    url:'<?php echo site_url('userpages/remove_pamm');  ?>',
                    data:dataP,
                    type:'POST',
                    beforeSend:function(){
                        
                    },
                    success:function(){
                        window.location.reload();
						modal_message();
                    }
                })
            }
        });
                                
});*/
</script>
                        
                        
                     
                        
                      <?php if(isset($message) && $message!=''){
					  if($msg=='1' || $msg=='3')
					  $class='up_alert_error alert_success';
					  else
					  $class='up_alert_error alert_error';
					  
					  ?>
                        <div class="<?php echo $class;?>"><?php echo $message;?></div>
                      <?php }?>  
                         <?php  if($activerows=='0' && $inactiverows=='0'){?>  
                        
                         <?php }else{?>
                        <div class="o_h sum_box r_f m_t_20">
                           
							
                                <div class="log_bankdet col_blk ">
                              
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Trading Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($trading_name) && $trading_name!=''){ echo $trading_name; } ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="firstname">PAMM Manager Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($firstname) && $firstname!=''){   echo ucfirst($firstname).' '.ucfirst($lastname);} ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="acc_no">Acc. NO</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($login) && $login!=''){ echo $login; } ?></div>
                                </div>
                                <!--<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="email">Email Id</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($email) && $email!=''){ echo $email; } ?></div>
                                </div>-->

                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="minimum_deposit">Minimum Deposit </label></div>
                                    <div class="rgt_stflbl"><?php echo $minimum_deposit;?> USD 
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="success_fee">Success Fee</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $success_fee;?>%
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="penalty_fee">Penalty Fee </label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $penalty_fee; ?>% of Deposited Capital
                                    </div>
                                </div>
								
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_period">Trading Period</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $trading_period;?>
                                    </div>
                                </div>
				<div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="my_funds">My Funds</label></div>
                                    <div class="rgt_stflbl">
    					<?php echo $amount;?>USD
                                    </div>
                                </div>
				
                              
                                <?php echo formtoken::getField(); ?>
                                          </div>
                        
                        
                        
                        
                        
                       
                  <?php 
         
                $size = sizeof($answerData2['csv']);
                $profit_loss=0;
                $deposit=0;
                $withdrawal=0;
                for($i = 0; $i < $size; $i++)
                {
                    //echo $answerData2['csv'][$i];echo '<br/>';
                    $values = explode(";", $answerData2['csv'][$i]);
                    if($values[12]=='6' && $values[5]>0)
                    {
                        $deposit=$deposit+$values[5];
                    }
                    $withdrawal+=$values[11];
                    if($values[12]=='6' && $values[5]<0)
                    {
                        $withdrawal+=$values[5];
                    }
                    if($values[12]=='1' || $values[12]=='0')
                    {
                            $profit_loss=$profit_loss+($values[5])+($values[15]);//echo '<br/>';
                    }
                    
                    //print_r($values);
                }
                $profit_loss=$profit_loss;
                $profit = $deposit + $profit_loss + $withdrawal;


                ?>                        <div class="o_h sum_box r_f m_t_10">
                            <div class="f_l box">
                                <div class="lft_fld">Profit/Loss:</div>
                                <div class="rgt_fld"><?=$profit_loss ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Balance:</div>
                                <div class="rgt_fld">  <?php echo $balance;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity:</div>
                                <div class="rgt_fld">  <?php echo $equity;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin:</div>
                                <div class="rgt_fld">  <?php echo $free_margin;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Profit:</div>
                                <div class="rgt_fld">  <?php echo $profit;?></div>
                            </div>
                           
                        </div>
                        
                        
                        <!--<span class="button yellow m_t_20 cur_def j_general_submit remove_pamm">Remove Funds</span>       <?php //echo site_url('userpages/remove_pamm/'.$id);?>-->
                        <?php if(isset($inactiverows) && $inactiverows=='0'){?>
                        <a class="button yellow m_t_20 cur_def j_general_submit delete" href="#" >Remove Funds</a>
                        
                        <?php }?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="button yellow m_t_20 cur_def j_general_submit" href="<?php echo site_url('userpages/add_funds/'.$id);?>" >Add Funds</a>
                         <?php }?>


                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        <div id="confirmation_dialog" title="Delete Confirmation">
  <p>Are you sure you want to delete the PAMM Program now ?</p>
</div>


<div id="dialog-message" title="Message">
  <p> <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span> Your PAMM Program has been deleted Successfully . </p>
</div>
    </body>
</html>