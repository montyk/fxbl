<?php $current = "Messages";
include 'header.php'; ?>

<section id="main" class="column section tab_grid">
    <div class="messages_hdr">
        <a class="btn back fr" href="<?php echo site_url('staff/buyoffers');  ?>" id=""><span class="inner-btn"><span class="label">Back</span></span></a>
        <a class="btn back fr" href="<?php echo site_url('staff/orders_details/'.$this->my_encrypt->encode($order_details->id));  ?>" id=""><span class="inner-btn"><span class="label">Order Details</span></span></a>
        <span class="msg_txt">Messages for <?php echo $order_details->mask_id;  ?></span>
        <div class="clear"></div>
    </div>
    <div class="form_prp">
        <div class="takecareearning">
            <div class="message_ca">
        <?php // echo '<pre>'; print_r($order_messages); echo '</pre>';  ?>
        <?php 
            if(!empty($order_messages)){
                // for ($i = 0; $i <= 7; $i++)
                foreach($order_messages as $k=>$v){ ?>
                    <ul style="" class="<?php if($v->user_id!=$user_id && $v->customer_read=='0'){ echo 'unread'; } /* background:#FEFED4; */ ?>">
                        <li>
                            <div>
                                <div class="fl"><img src="<?php echo base_url(); ?>public/images/default_logo.png" alt="images" style="width: 48px; height: 48px;"/></div>
                                <div class="comment_ca">
                                    <div class="comment_hdr">
                                        <a href="javascript:void(0);"><?php echo $v->firstname;  ?></a>
                                        <span class="fr"><?php echo localDate($this->session->userdata('ctz_offset'),$v->date_added,'d M Y'); // dateFormat($v->date_added,'d M Y');  ?></span>
                                    </div>
                                    <div class="comment_content">
                                        <p><?php echo nl2br($v->message);  ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

            <?php 
                }
            }
            ?>
                <ul class="reply_ul">
                    <li><input type="text" class="reply_input" value="Leave a Message"/></li>
                </ul>
                <form id="reply_form" method="POST" action="" >
                    <ul class="reply_ul reply_edit_wrap" style="display: none;">
                        <li>
                            <div class="fl">
                                <img src="<?php echo base_url(); ?>public/images/default_logo.png" alt="images" style="width: 48px; height: 48px;"/>				
                            </div>
                            <div class="comment_ca">
                                <textarea name="message" class="reply" value="Leave a Message"></textarea>
                                <div>
                                    <a class="btn fl" href="javascript:void(0);" id="reply_send"><span class="inner-btn"><span class="label">Send</span></span></a>									
                                    <a class="btn  fl" href="javascript:void(0);" id="reply_cancel"><span class="inner-btn"><span class="label">Cancel</span></span></a>						
                                </div>
                            </div>
                        </li>	
                    </ul>
                </form>
            </div><!-- message_ca div-->		
        </div>
    </div>

</section> <!--end of section-->
<script type="text/javascript" lang="javascript">
    $(function(){
        
        $('.reply_input').live('click',function(){
            $(this).parents('ul.reply_ul').hide();
            $('ul.reply_edit_wrap').show();
            $('.reply').focus();
        });
        
        $('#reply_cancel').live('click',function(){
            $('.reply_input').parents('ul.reply_ul').show();
            $('.reply_input').blur();
            $('ul.reply_edit_wrap').hide();
        });
        
        $('#reply_send').live('click',function(){
            $('#reply_form').validate({
                rules:{
                    message:{
                        required:true
                    }
                },
                messages:{
                    message:{
                        required:'Please enter a message.'
                    }
                }
            });
            $('#reply_form').submit();
        });
        
    });
</script>
</body>
</html>
