<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>EDEALSPOT Staff Panel</title>
	
	<link href="<?php echo base_url();  ?>public/css/general/images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
	<link rel="stylesheet" href="<?php echo base_url();  ?>public/css/layout.css" type="text/css" media="screen" />

	<link rel="stylesheet" href="<?php echo base_url();  ?>public/css/general/forms.css" type="text/css" media="screen" />
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
        <script type="text/javascript">
            var x = new Date()
            var timeZone = currentTimeZoneOffsetInHours = x.getTimezoneOffset();
            $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('home/setUserTimeZone');?>',
                    data: 'tz_offset='+timeZone,
                    beforeSend : function(){
                    },
                    success: function(){
                    },
                    complete: function(){
                    }
            });
        </script>
		
</head>

<body class="app">

	<!--start of sidebar -->
	<aside id="sidebar" class="column sidebar">
			<div class="fl logo">
				<a href="#"><img src="<?php echo base_url();?>/public/css/general/images/wing.png" alt="Edealspot" class="fl "/>
				<span class="fl logo_txt"><span class="yellow">EDEAL</span><span class="blue">SPOT</span></span></a>
				<div class="clear"></div>
			</div>
			<div class="side_sep fl"></div>
			<!--
                        <form class="quick_search">
				<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
			</form>
			<hr/>
			-->
			<div class="line_bg fl"></div>
                        <?php
                            $controller_url=$this->uri->segment(1);
                            $url_2=$this->uri->segment(2);
                        ?>
			<h3 class="<?php if($url_2=='index' || $url_2==''){ echo 'active'; }  ?>">
                            <a href="<?php echo site_url();?>staff/index" class="home"><span>Home</span></a>
                        </h3>
			<h3 class="<?php if($url_2=='buy' || $url_2=='buy_confirm'){ echo 'active'; }  ?>">
                            <a href="<?php echo site_url();?>staff/buy"  class="buy"><span>Buy</span></a>
                        </h3>
			<h3 class="<?php if($url_2=='sell' || $url_2=='sell_confirm'){ echo 'active'; }  ?>">
                            <a href="<?php echo site_url();?>staff/sell" class="sell"><span>Sell</span></a>
                        </h3>
                        <?php $orderUrlsArr=array('orders_details','order_messages');  ?>
                        <h3 class="toggle_hdr <?php if(in_array($url_2, $orderUrlsArr)){ echo 'active'; }  ?>">
                            <a><span>Orders</span></a>
                        </h3>
			<ul class="toggle">
				<li class="icn_folder <?php if($url_2=='buyoffers'){ echo 'active'; }  ?>">
                                    <a href="<?php echo site_url();?>staff/buyoffers"><span>Buy</span></a>
                                </li>
				<li class="icn_photo <?php if($url_2=='selloffers'){ echo 'active'; }  ?>">
                                    <a href="<?php echo site_url();?>staff/selloffers"><span>Sell</span></a>
                                </li>
			</ul>
			<h3 class="icn_video <?php if($url_2=='profile'){ echo 'active'; }  ?>">
                            <a href="<?php echo site_url();?>staff/profile" class="profile"><span>Your Profile</span></a>
                        </h3>
			<h3 class="icn_video <?php if($url_2=='testimonials'){ echo 'active'; }  ?>">
                            <a href="<?php echo site_url();?>staff/testimonials"  class="testimonial"><span>Testimonials</span></a>
                        </h3>
			<div class="clear"></div>
			<div class="footer">
			<div class="side_sep fl"></div>
                        <p><strong>Copyright &copy; 2011 EDEALSPOT</strong></p>
			</div>
	</aside>
	<!-- end of sidebar -->
	
	<!--	start right_content-->
	<div class="right_content">
	
	<header id="header" class="header">
		<hgroup>
			<div class="fl topnav">
			<!--<h2 class="section_title"><?php echo $current; ?></h2>-->
			
                <div class="user">
                        <?php $userDetails=unserialize($this->session->userdata('user_details'));  ?>
                        <div class="user_details"><?php echo $userDetails->firstname,' ',$userDetails->lastname;  ?>&nbsp;</div>	
                        <a href="#" class="e_notify j_e_nofity fl"><span class="notify_txt">Messages</span><span class="span_outer"><span class="span_inner hide j_notify_count">0</span></span></a>
						
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
                                </div>
                            </div>
                        </div>

		</div>

			
			
			<div class="btn_view_site"><a href="<?php echo site_url(); ?>/login/logout">Logout</a></div>
			</div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar" class="section">
		
		<div class="breadcrumbs_container">
			<div class="article breadcrumbs"><a href="#">EDEALSPOT Staff</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $current; ?></a></div>
		</div>
	</section>
	<!-- end of secondary bar -->
	
	


	

