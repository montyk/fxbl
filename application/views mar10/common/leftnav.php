<?php 
    $url_1=$this->uri->segment(1); 
    $url_2=$this->uri->segment(2); 
    $url_3=$this->uri->segment(3); 
    $url_4=$this->uri->segment(4); 
?>

<aside id="sidebar" class="column sidebar">
<!--
    <div class="fl logo">
        <a href="#"><img src="<?php echo base_url(); ?>misc/css/images/logo.png" alt="Edealspot" class="fl " width="200"/>
            <span class="fl logo_txt hide"><span class="yellow">EDEAL</span><span class="blue">SPOT</span></span>
        </a>
        <div class="clear"></div>
    </div>-->

    <!--<h3 class="toggle_hdr"><a><span>Content</span></a></h3>-->
    <ul class="toggle">
        <li class="icn_page  <?php if($url_1=='adminpages') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminpages"><img src="<?php echo base_url(); ?>misc/css/images/pages-icon.png" alt="Pages" /><span>Pages</span></a></li>
		
        <li class="icn_page  <?php if($url_1=='adminmenus') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminmenus"><img src="<?php echo base_url(); ?>misc/css/images/menu-icon.png" alt="Pages" /><span>Menus</span></a></li>
		
<!--        <li class="icn_page  <?php if($url_1=='adminfootermenus') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminfootermenus"><span>Footer Menus</span></a></li>-->
        <li class="icn_page  <?php if($url_1=='adminhomepage') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminhomepage"><img src="<?php echo base_url(); ?>misc/css/images/home.png" alt="home" /><span>Home Page</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminusers' && $url_2=='') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminusers"><img src="<?php echo base_url(); ?>misc/css/images/edit_users.png" alt="home" /><span>Users</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminusers'  && $url_2=='wallet') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminusers/wallet"><img src="<?php echo base_url(); ?>misc/css/images/wallet.png" alt="home" /><span>Wallet</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminusers'  && ($url_2=='pamm_managers' || $url_2=='pamm_investors')) echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminusers/pamm_managers"><img src="<?php echo base_url(); ?>misc/css/images/manager.png" alt="home" /><span>PAMM Managers</span></a></li>
		<li class="icn_page  <?php if($url_1=='adminusers'  && $url_2=='investorsofusers') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminusers/investorsofusers"><img src="<?php echo base_url(); ?>misc/css/images/manager.png" alt="home" /><span>PAMM Investors</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminusers'  && $url_2=='remove_investorslist') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminusers/remove_investorslist"><img src="<?php echo base_url(); ?>misc/css/images/manager.png" alt="home" /><span>PAMM Investors Request List</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminsettings' && $url_2=='') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminsettings"><img src="<?php echo base_url(); ?>misc/css/images/settings.png" alt="Settings" /><span>Settings</span></a></li>
        <li class="icn_page  <?php if($url_1=='adminsettings' && $url_2=='edit_dropdowns') echo 'active'; ?>"><a href="<?php echo site_url('adminsettings/edit_dropdowns'); ?>"><img src="<?php echo base_url(); ?>misc/css/images/dropdown.png" alt="Manage Dropdown" /><span>Manage Dropdowns</span></a></li>
        <li class="icn_contact  <?php if($url_1=='adminwithdrawal_requests') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminwithdrawal_requests"><img src="<?php echo base_url(); ?>misc/css/images/contact.png" alt="WithDrawal Requests" /><span>WithDrawal Requests</span></a></li>
        <li class="icn_contact  <?php if($url_1=='admincontactus') echo 'active'; ?>"><a href="<?php echo base_url(); ?>admincontactus"><img src="<?php echo base_url(); ?>misc/css/images/contact.png" alt="contactus" /><span>Contact Us</span></a></li>
        <!--<li class="icn_photo"><a href="<?php //echo base_url(); ?>admincontactus/add_contactus">Add Contact Us</a></li>-->
        <li class="icn_email  <?php if($url_1=='adminsendmail') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminsendmail"><img src="<?php echo base_url(); ?>misc/css/images/email.png" alt="email" /><span>Send email</span></a></li>
        <li class="icn_testimonial  <?php if($url_1=='admintestimonials') echo 'active'; ?>"><a href="<?php echo base_url(); ?>admintestimonials"><img src="<?php echo base_url(); ?>misc/css/images/testimonial.png" alt="testimonial" /><span>Testimonials</span></a></li>
        <!--<li class="icn_video"><a href="<?php //echo base_url(); ?>admintestimonials/add_testimonial">Add Testimonials</a></li>-->
        <li class="icn_news <?php if($url_1=='adminnews' && $url_2=='') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminnews"><img src="<?php echo base_url(); ?>misc/css/images/news.png" alt="news" /><span>News / Promotions</span></a></li>
        <!--<li class="icn_news <?php if($url_2=='promotions') echo 'active'; ?>"><a href="<?php echo site_url('adminnews/promotions'); ?>"><img src="<?php echo base_url(); ?>misc/css/images/news.png" alt="news" /><span>Promotions</span></a></li>-->
        <li class="icn_chat <?php if($url_1=='chat') echo 'active'; ?>"><a href="<?php echo base_url(); ?>chat"><img src="<?php echo base_url(); ?>misc/css/images/chat.png" alt="chat" /><span>Chat</span></a></li>
        <li class="icn_links <?php if($url_1=='links') echo 'active'; ?>"><a href="#"><img src="<?php echo base_url(); ?>misc/css/images/links.png" alt="links" /><span>Links</span></a></li>
        <li class="icn_links <?php if($url_1=='admingallery') echo 'active'; ?>"><a href="<?php echo base_url(); ?>admingallery"><img src="<?php echo base_url(); ?>misc/css/images/gallery.png" alt="Gallery" width="32" /><span>Gallery</span></a></li>
        <li class="icn_links <?php if($url_1=='adminwidgets' && empty($url_2)) echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminwidgets"><img src="<?php echo base_url(); ?>misc/css/images/widgets.png" alt="Widgets" /><span>Widgets</span></a></li>
        <li class="icn_links <?php if($url_2=='widget_gallery') echo 'active'; ?>"><a href="<?php echo base_url(); ?>adminwidgets/widget_gallery"><img src="<?php echo base_url(); ?>misc/css/images/widgets.png" alt="Widgets" /><span>Widgets Gallery</span></a></li>
    </ul>
    

<!--    <div class="footer">
        
        <p><strong>Copyright &copy; 2011 FOREX RAY</strong></p>
    </div>
-->
</aside>
<!-- end of sidebar -->