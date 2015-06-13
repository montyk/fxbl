<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>

<div class="app outside">
<!--	PAGE content -->
            <div class="contents pg_width">
                <div class="overlay_bg rel">
                    <div class="fore_ca">
                        <div class="fore_content">
                            <div class="content_wrap fl">
                                <h1 class="h_1">Registration</h1>
							
                                <?php $this->load->view('common/notifications'); ?>
                                
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>"><?php echo $this->config->item('project_name') ?> </a></li>
                                        <li><a class="current">Registration Success</a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        
                                            <div class="post  pad10 newsbox" style="">
                                                <div class="story bootstrap-scope">
                                                    <div style="">
                                                        <div class="well">
                                                            <p>Dear <b><?php if(!empty($registration_info['firstname'])) echo $registration_info['firstname']; ?></b>,</p>
                                                            <p>Thank you for opening an account with <?php echo $this->config->item('project_name') ?>.</p>
                                                            <p>Your account login details have been sent to the email address you have provided us - <?php if(!empty($registration_info['email'])) echo $registration_info['email']; ?>. Please check your inbox (as well as your spam folder).</p>
                                                        </div>
                                                        
                                                        <p>You can use the same Login and Password to log in to any of our 9 trading platforms, which you can access any time from our Platforms section.</p>
                                                        
                                                        <h4 class="title">HOW TO GET STARTED</h4>

                                                        <p>To start trading, please <a href="<?php echo base_url(); ?>/home/metatrader">download and install the <?php echo $this->config->item('project_name') ?> MetaTrader</a>, or use the credentials sent to your email address to log in to any of our 8 trading platforms that you can download or access any time from the Platforms section.</p>

                                                        <h4>HOW TO FUND YOUR ACCOUNT</h4>

                                                        <p>With the login details sent to your email address you can log in to our Members Area at <?php echo $this->config->item('project_name') ?>.com, where you can monitor your account, make deposits and withdrawals, and perform other account-related functions.</p>

                                                        <p>You can close this window now, or you can <a href="<?php echo site_url('home');?>">Click Here</a> to go to our homepage.</p>

                                                        <p>The <?php echo $this->config->item('project_name') ?> Team</p>
                                                        
                                                    </div>
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
										
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <div class="right_ca fl">
                                
                                <?php $this->load->view('common/sidebar_1'); ?>
                                
                                <?php $this->load->view('common/sidebar_terminal'); ?>

                                <?php // $this->load->view('common/sidebar_news');?>
    
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<style type="text/css">
    .req{
        color:#D83B39;
    }
</style>

<?php $this->load->view('common/footer');?>




