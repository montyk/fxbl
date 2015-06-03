 <?php $this->load->view('common/analyticstracking');?>  
 <?php $this->load->view('common/alexacertify');?>  

<div id="footer" class="p_f bounceInUp animation_setting">
    <a href="#">Site Map</a>
    <a href="<?php echo site_url('userpages/support_request'); ?>">Contact us</a>
</div>
<script type="text/javascript">
    $(function(){
        
        $('.j_submenu_toggle').on('click',function(){
            $(this).parent().next('.lft_sub_menu').slideToggle();
            $(this).toggleClass('right-arrow');
        });
        
        $('.j_left_nav li a').removeClass('active');
        $('.j_left_nav li a').each(function(k,v){
            // console.log($(this).attr('href').split('/').pop())
            if($(this).attr('href').split('/').pop()==window.location.href.split('/').pop()){
                $(this).addClass('active');
                return;
            }
        });
        
        
        $('.j_general_validate').validate({
            errorElement: 'div'
        });

        $('.j_general_submit').on('click',function(){
            $(this).parents('form').submit();
        });
        
        $('.j_trigger_chat').on('click',function(){
            $('#liveadmin_status_image_liveadmin').trigger('click');
        });
        
    })
    
</script>
<!--
<div id="chat_footer_link" title="Click to Chat Live" class="j_trigger_chat">
    //<div class="chat_txt">Click to chat live.</div>
</div>-->
<span id='liveadmin' style="position:fixed;left:0px;bottom:0px"></span>

</body>
 <?php $this->load->view('common/analyticstracking');?>  
 <?php $this->load->view('common/alexacertify');?>  

</html>