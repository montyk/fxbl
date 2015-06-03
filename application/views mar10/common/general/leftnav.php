
<aside id="sidebar" class="column">
		
		<form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
        
        <h3>Home</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url();?>dashboard/dashboard_ctlr">Dashboard</a></li>
		</ul>
        <h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url();?>users/adduser">Add New User</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url();?>users/usersgrid">View Users</a></li>
			<li class="icn_profile"><a href="<?php echo base_url();?>users/userprofile">Your Profile</a></li>
		</ul>
		<h3>Orders</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url();?>orders/currentorders">Current orders</a></li>
			<li class="icn_edit_article"><a href="<?php echo base_url();?>orders/archive">Archive Orders</a></li>
			<li class="icn_categories"><a href="<?php echo base_url();?>orders/#">Report</a></li>
			<!--<li class="icn_tags"><a href="#">Tags</a></li>-->
		</ul>
		<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo base_url();?>index.php/pages">Pages</a></li>
			<li class="icn_photo"><a href="<?php echo base_url();?>index.php/contactus">Contact Us</a></li>
			<li class="icn_audio"><a href="messages.php">Messages</a></li>
			<li class="icn_video"><a href="<?php echo base_url();?>index.php/testimonials">Testimonials</a></li>
            <li class="icn_video"><a href="<?php echo base_url();?>index.php/news">News</a></li>
            <li class="icn_video"><a href="#">Chat</a></li>
            <li class="icn_video"><a href="#">Links</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?php echo base_url();?>index.php/ecurrency">E-Currency Type</a></li>
			<li class="icn_security"><a href="<?php echo base_url();?>index.php/payment">Payment Methods</a></li>
			<li class="icn_jump_back"><a href="<?php echo base_url();?>index.php/liberty_account">Liberty Accounts</a></li>
            <li class="icn_jump_back"><a href="<?php echo base_url();?>index.php/rates">Rates</a></li>
            <li class="icn_jump_back"><a href="#">Settings</a></li>
            <li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
		
		<footer>

			<p><strong>Copyright &copy; 2011 EDEALSPOT</strong></p>
			<!--<p>Theme by <a href="#">MediaLoot</a></p>-->
		</footer>
</aside><!-- end of sidebar -->