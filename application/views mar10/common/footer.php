
<?php 
    $userLangID=$this->session->userdata('user_language_id');
    $userLanguageABBR=$this->session->userdata('user_language_abbr');
?>	
<!--Start: Footer-->
    <div class="footer">
            <div class="footer_list">
                <div class="ftr_menu pg_width din_med">
                    <div class="tac">
                        <span class="one"><a href="<?php echo site_url('home/download/FINANCIAL_SERVICES_GUIDE.pdf'); ?>">FINANCIAL SERVICES GUIDE</a></span>
                        <span class="one"><a href="<?php echo site_url('home/download/PRODUCT_DISCLOSURE_STATEMENT.pdf'); ?>">PRODUCT DISCLOSURE STATEMENT</a></span>
                        <span class="one"><a href="<?php echo site_url('home/download/TERMS_AND_CONDITIONS.pdf'); ?>">TERMS AND CONDITIONS</a></span>

<!--                            <span class="one ftr_active">FOREX OVERVIEW</span>
                        <span class="two">GOLD AND SILVER</span>
                        <span class="three">FOREX ARTICLES</span>
                        <span class="four">FOREX TUTORIAL</span>
                        <span class="five">FOREX TRADING TIPS</span>-->
                    </div>
                </div>
            </div>
            <div class="ftr_wrap pg_width">
                <div class="ftr_ca">

                <?php 
                    $langDetails=array('language_id'=>$userLangID);
                    $menus=$this->adminmenus_model->get_menus($this->config->item('cache_menu'),$langDetails,'','footer_order_num'); 
                ?>
                <?php // echo '<pre>'; print_r($menus); echo '</pre>'; ?>
                <?php if(!empty($menus)){  ?>
                    <?php foreach($menus as $k=>$v){  ?>
                        <?php if(!empty($v['show_in_footer_menu']) && $v['show_in_footer_menu']=='1'){ ?>
                        <div class="ftr_type">
                            <div class="hdr">
                                <?php echo anchor($v['href'],$v['label'],'class="'.strtolower(strtok($v['label']," ")).'_ico  c_94 " style="" ');  ?>
                            </div>
                            <?php if(!empty($v['submenu'])){ ?>
                            <ul>
                                <?php foreach($v['submenu'] as $k2=>$v2){  ?>
                                <li><?php if(!empty($v2['show_in_footer_menu']) && $v2['show_in_footer_menu']=='1'){ echo anchor($v2['href'],$v2['label'],'class="'.strtolower(strtok($v2['label']," ")).'_ico  c_94"');  } ?></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                        <?php }  ?>
                    <?php }  ?>
                <?php }  ?>





<!--			<div class="ftr_type">
                            <div class="hdr">Trading</div>
                            <ul>
                                    <li><a href="<?php echo site_url('pages/Trading'); ?>">Account Types</a></li>
                                    <li><a href="<?php echo site_url('pages/Trading-account-forms'); ?>">Account Forms</a></li>
                                    <li><a href="<?php echo site_url('pages/Forex-Islamic'); ?>">Forex Islamic</a></li>
                                    <li><a href="<?php echo site_url('pages/Account-Funding'); ?>">Account Funding</a></li>
                                    <li><a href="<?php echo site_url('pages/Funds-Withdrawal'); ?>">Funds Withdrawal</a></li>
                            </ul>
                    </div>

                    <div class="ftr_type">
                            <div class="hdr">Trading Softwares</div>
                            <ul>
                                    <li><a href="<?php echo site_url('pages/Download-MetaTrader-4');?>">Download MetaTrader 4</a></li>
                                    <li><a href="<?php echo site_url('pages/About-Metatrader-4'); ?>">About MetaTrader 4</a></li>
                                    <li><a href="<?php echo site_url('pages/MetaTrader-4-User-Guide'); ?>">MetaTrader 4 User Guide</a></li>
                                    <li><a href="<?php echo site_url('pages/Automated-Trading'); ?>">Automated Trading</a></li>
                                    <li><a href="<?php echo site_url('pages/Multiterminal-MAM'); ?>">Multiterminal MAM</a></li>
                            </ul>
                    </div>

                    <div class="ftr_type">
                            <div class="hdr">Trade Conditions</div>
                            <ul>
                                    <li><a href="<?php echo site_url('pages/Spreads'); ?>">Spreads</a></li>
                                    <li><a href="<?php echo site_url('pages/Overnight-Positions'); ?>">Overnight Positions</a></li>
                                    <li><a href="<?php echo site_url('pages/Margin-and-Leverage'); ?>">Margin and Leverage</a></li>
                                    <li><a href="<?php echo site_url('pages/ExecutionMethodology'); ?>">Execution Methodology</a></li>
                                    <li><a href="<?php echo site_url('pages/Advantages'); ?>">Advantages</a></li>
                            </ul>
                    </div>

                    <div class="ftr_type">
                            <div class="hdr">Education</div>
                            <ul>
                                    <li><a href="<?php echo site_url('pages/education'); ?>">Forex Overview</a></li>
                                    <li><a href="<?php echo site_url('pages/Forex-Articles'); ?>">Forex Article</a></li>
                                    <li><a href="<?php echo site_url('pages/Forex-Tutorials'); ?>">Forex Tutorial</a></li>
                                    <li><a href="<?php echo site_url('pages/Forex-Trading-Tips'); ?>">Forex Trading Tips</a></li>
                            </ul>
                    </div>

                    <div class="ftr_type">
                            <div class="hdr">Supports</div>
                            <ul>
                                    <li><a href="<?php echo site_url('pages/live-chat'); ?>">Live Chat</a></li>
                                    <li><a href="<?php echo site_url('pages/FAQ'); ?>">Call back</a></li>
                                    <li><a href="<?php echo site_url('pages/FAQ'); ?>">FAQ</a></li>
                            </ul>
                    </div>-->

                </div>
                <div class="cl"></div>

            </div>
        <div class="ftr_copy pos_rel">
            <div class="ftr_copy_ca tahoma f12 c_94 tac pg_width">
                <div style="color: #949494;">
                    <?php
                    if(!isset($home_pages_sections)){
                        $home_pages_sections=$this->adminhomepage_model->get_home_page_sections($this->config->item('cache_page'),$langDetails);
                    }
                    if (!empty($home_pages_sections[5]->content)) {
                        echo html_entity_decode($home_pages_sections[5]->content);
                    }
                    ?>
                </div>
                <div class="">
                    <a href="<?php echo site_url('en/Anti-money-Laundering'); ?>">Anti-Money Laundering</a>|<a href="<?php echo site_url('en/Disclaimer'); ?>">Disclaimer</a>|<a href="<?php echo site_url('en/Privacy-Policy'); ?>">Privacy Policy</a>|<a href="<?php echo site_url('en/Risk-Warning'); ?>">Risk Warnings</a>|<a href="<?php echo site_url('en/ExecutionMethodology'); ?>" class="lst">Execution Methodology</a>
                </div>
                <div class="mt12">&copy; 2005- 2013  Forexray All rights reserved.</div>
                <div class="follow pos_ab">
                    <div>FOLLOW US</div>
                    <div class="mt6">
                        <img src="<?php echo base_url(); ?>misc/css/images/facebook.png" />
                        <img src="<?php echo base_url(); ?>misc/css/images/twitter.png" />
                        <img src="<?php echo base_url(); ?>misc/css/images/blog.png" />
                    </div>
                </div>
            </div>	
            <div class="cl"></div>
        </div>
    </div>	
    <!--End: Footer-->

</div> 

<span id='liveadmin' style="position:fixed;left:0px;bottom:0px"></span>

<!--Main ca div-->

<!--<div id="chat_footer_link" title="Click to Chat Live">-->
</div>

<a id="feedback_footer_link" href="<?php echo base_url(); ?>en/Contact-Us" title="Click to give your Feedback">
</a>


</body>
</html>
