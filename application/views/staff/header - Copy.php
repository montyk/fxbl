<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>EDEALSPOT Admin Panel</title>
	
	<link rel="stylesheet" href="<?php echo base_url();  ?>public/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url();  ?>public/js/jquery-1.5.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url();  ?>public/js/validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>public/js/hideshow.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>public/js/jquery.equalHeight.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>public/js/notifications.js"></script>
<!--	<script type="text/javascript" src="<?php echo base_url();  ?>public/js/script.js"></script>-->

        <script type="text/javascript">
            var base_url='<?php echo base_url();  ?>',
            site_url='<?php echo site_url();  ?>';

        </script>

</head>

<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="dashboard.php">FOREXRAY Admin</a></h1>
			<h2 class="section_title"><?php echo $current; ?></h2><div class="btn_view_site"><a href="#">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
                        <?php $userDetails=unserialize($this->session->userdata('user_details'));  ?>
			<p><?php echo $userDetails->firstname,' ',$userDetails->lastname;  ?> 
                            <a href="#" class="e_notify j_e_nofity fr"><span class="span_outer"><span class="span_inner hide j_notify_count">0</span></span></a>
			</p>	
                        <div class="notify_ca j_notify">
                            <div class="tip">&nbsp;</div>
                            <div class="notify_hdr">
                                <h4>Messages</h4>
                            </div>
                            <div class="notify_wrap" id="j_message_container">
                                <ul>
                                    <li class="no_notify">
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
<!--                                    <a href="#" >see more</a>-->
                                </div>
                            </div>
                        </div>

			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="#">FOREXRAY Admin</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $current; ?></a></article>
		</div>
	</section>
	<!-- end of secondary bar -->
	
	<!--start of sidebar -->
	<aside id="sidebar" class="column">
			
			<!--
                        <form class="quick_search">
				<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
			</form>
			<hr/>
			-->
			<h3><a href="<?php echo base_url();?>staff/index">Home</a></h3>
			<h3><a href="<?php echo base_url();?>staff/buy">Buy</a></h3>
			<h3><a href="<?php echo base_url();?>staff/sell">Sell</a></h3>
			<h3>Orders</h3>
			<ul class="toggle">
				<li class="icn_folder"><a href="<?php echo base_url();?>staff/buyoffers">Buy</a></li>
				<li class="icn_photo"><a href="<?php echo base_url();?>staff/selloffers">Sell</a></li>
			</ul>
			<h3 class="icn_video"><a href="<?php echo base_url();?>staff/profile">Your Profile</a></h3>
			<h3 class="icn_video"><a href="<?php echo base_url();?>staff/testimonials">Testimonials</a></h3>
			<div class="clear"></div>
			<footer>
				<hr />
				<p><strong>Copyright &copy; 2011 EDEALSPOT</strong></p>
			</footer>
	</aside>
	<!-- end of sidebar -->
