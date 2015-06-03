<header id="header" class="header">
    <hgroup>

        <?php $userDetails = unserialize($this->session->userdata('user_details')); ?>
        <div class="fl topnav"> 
            <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>misc/css/images/logo.png" alt="Forexray" class="fl " width="200"/></a>
            <div class="user">
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
                <div class="user_details">
                    <?php echo $userDetails->firstname, ' ', $userDetails->lastname; ?>
                </div>

            </div>
            <div class="btn_view_site "><a href="<?php echo site_url(); ?>login/logout">Logout</a></div>
            <script type="text/javascript">
                base_url='<?php echo base_url(); ?>';
                site_url='<?php echo site_url(); ?>';
            </script>
            <script type="text/javascript" src="<?php echo base_url(); ?>public/js/notifications.js"></script>

            <!--            <h1 class="site_title"><a href="dashboard.php">EDEALSPOT Admin</a></h1>
                        <h2 class="section_title">Users List</h2>-->

        </div>
    </hgroup>
</header > <!-- end of header bar -->

