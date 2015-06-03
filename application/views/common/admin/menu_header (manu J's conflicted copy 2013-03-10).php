<header id="header" class="header">
     <hgroup>
		
<?php $userDetails=unserialize($this->session->userdata('user_details'));  ?>
<div class="fl topnav"> 
    <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>misc/css/images/logo.png" alt="Forexray" class="fl " width="200"/></a>
<div class="user">
		<a href="#" class="e_notify j_e_nofity fl"><span class="notify_txt">Messages</span><span class="span_outer"><span class="span_inner hide j_notify_count">0</span></span></a>

    <div class="notify_ca j_notify">
        <div class="tip">&nbsp;</div>
        <div class="notify_hdr">
                <h4>Messages</h4>
        </div>
        <div class="notify_wrap" id="j_message_container">
                <ul>
                        <li style="border-bottom: none;">
                                <div><i>No New Messages..</i></div>
                                <div class="clear">&nbsp;</div>
                        </li>
                        <?php for ($i = 0; $i < 0; $i++) { ?>
                                <li>
                                        <img src="<?php echo base_url(); ?>/public/images/default_logo.png" class="fl n_user_img" />
                                        <div class="fl notify_txt">
                                                <div class="n_user"><b>Test User</b></div>
                                                <div class="notify_msg">Hi this is test message</div>
                                                <div class="dt">Aug 27</div>
                                        </div>
                                        <div class="clear">&nbsp;</div>
                                </li>
                        <?php } ?>
                </ul>
                <div class="tac see_more">
                <!-- <a href="#" >see more</a> -->
                </div>
        </div>
    </div>
</div>
<div class="btn_view_site "><a href="<?php  echo site_url();?>login/logout">Logout</a></div>
<script type="text/javascript">
    base_url='<?php echo base_url();  ?>';
    site_url='<?php echo site_url();  ?>';
</script>
<script type="text/javascript" src="<?php echo base_url();  ?>public/js/notifications.js"></script>

<!--            <h1 class="site_title"><a href="dashboard.php">EDEALSPOT Admin</a></h1>
            <h2 class="section_title">Users List</h2>-->
			
			</div>
        </hgroup>
    </header > <!-- end of header bar -->
	
