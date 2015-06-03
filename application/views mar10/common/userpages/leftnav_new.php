<?php $userDetails=unserialize($this->session->userdata('fx_user_details')); ?>
<?php $pamm_count=$this->pamm_manager_model->is_pamm_count($userDetails->id);?>
<ul class="nav_emt j_left_nav">
    <li><a href="<?php echo site_url('userpages/homenew'); ?>" class="active">Home</a></li>
    <li><a href="<?php echo site_url('userpages/depositnew'); ?>">Deposit</a></li>
    <li><a href="<?php echo site_url('userpages/withdrawalnew'); ?>">Withdrawal</a></li>
    <li><a href="<?php echo site_url('userpages/mywallet'); ?>"> My Wallet</a></li>     
    <li><a href="#forexray_menu" class="collapse j_submenu_toggle">Reports</a></li>
    <ul class="lft_sub_menu">
        <li>
            <a href="<?php echo site_url('userpages/trading_history'); ?>"> Trading History </a>
        </li>
		<?php  if($userDetails->account_for!='2'){?>
        <li>
            <a href="<?php echo site_url('userpages/open_positions'); ?>"> Open Positions </a>
        </li>
		<?php }?>
        <li>
            <a href="<?php echo site_url('userpages/deposits_withdrawls'); ?>"> Deposits/Withdrawals </a>
        </li>
	</ul>
    <li><a href="#forexray_menu" class="collapse j_submenu_toggle">My Account</a></li>
    <ul class="lft_sub_menu">
<!--        <li>
            <a href="<?php echo site_url('userpages/change_leverage'); ?>"> Change Leverage </a>
        </li>-->
       <li>
            <a href="<?php echo site_url('userpages/my_profile'); ?>"> My Profile </a>
        </li>
       <li>
            <a href="<?php echo site_url('userpages/change_password'); ?>"> Change Password </a>
        </li>
       <li>
            <a href="<?php echo site_url('userpages/internal_transfer'); ?>"> Internal Transfer </a>
        </li>
        
        <?php if($userDetails->account_for=='3'){?>
	<li><a href="<?php echo site_url('userpages/my_program'); ?>"> My PAMM Program</a></li>
	<li><a href="<?php echo site_url('userpages/pamm_manager'); ?>"> <?php if($pamm_count>0) echo 'Edit'; else echo 'Create';?> PAMM Manager</a></li>
	<li><a href="<?php echo site_url('userpages/view_investors'); ?>"> View PAMM Investors</a></li>        
	<?php }?>
        <?php  if($userDetails->account_for=='2'){?>
	<li><a href="<?php echo site_url('userpages/get_managers'); ?>"> PAMM Managers</a></li>
	<li><a href="<?php echo site_url('userpages/my_fundprogram'); ?>"> My PAMM Funds</a></li>        
	<?php }?>

    </ul>
    <li><a href="#forexray_menu" class="collapse j_submenu_toggle">Upload Documents</a></li>
    <ul class="lft_sub_menu">
        <li>
            <a href="<?php echo site_url('userpages/validation_documents'); ?>"> Validation Documents </a>
        </li>
        <li>
            <a href="<?php echo site_url('userpages/additional_documents'); ?>"> Additional Documents </a>
        </li>
    </ul>
    <!--<li><a href="<?php //echo site_url('userpages/trading_signals'); ?>">Trading Signals</a></li>-->
    <li><a href="<?php echo site_url('userpages/support_request'); ?>">Support Request</a></li>

</ul>