<?php
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3);
    $url_4 = $this->uri->segment(4);
?>

<aside id="sidebar" class="column sidebar">


    <ul class="toggle">
        <li class="icn_page  <?php if ($url_2 == 'trade') echo 'active'; ?>">
            <a href="<?php echo site_url('userpages/trade'); ?>">
                <img src="<?php echo base_url(); ?>public/css/images/leftnav_trade.png" alt="Pages" /><span>Trade</span>
            </a>
        </li>
        
        <li class="icn_page  <?php if ($url_2 == 'account_history') echo 'active'; ?>">
            <a href="<?php echo site_url('userpages/account_history'); ?>">
                <img src="<?php echo base_url(); ?>public/css/images/account_history.png" alt="Account History" /><span>Account History</span>
            </a>
        </li>
        
    </ul>

</aside>
<!-- end of sidebar -->