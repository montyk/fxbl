<?php 
$userDetails=unserialize($this->session->userdata('fx_user_details'));  
$userwallet=$this->users_model->get_wallet($userDetails->id);
$wallet=$userwallet->wallet;
?>

<div class="header animation_setting bounceInDown">
    <div class="logo_inner p_a"></div>
    <div class="p_a app_interaction">
        <a class="f_l chat first tf_animation j_trigger_chat">Chat</a>
        <a class="f_l logged_user tf_animation p_r">
            <span class="usr_ico icon p_a tf_animation"></span><?php echo $userDetails->firstname,' ',$userDetails->lastname;?>  
        </a>
        <a class="f_l"> <?php echo $userDetails->login;?></a>
        <!--<a class="f_l"> Wallet: <?php echo ($wallet!='')?$wallet:'0';?></a>-->
        <a class="f_l logout last"  href="<?php  echo site_url('login/logout');?>">logout</a>
        <div style="display:none"></div>
        <div class="c_b"></div>
    </div>
</div>
<!--<div id='liveadmin' style="display: none;"></div>-->