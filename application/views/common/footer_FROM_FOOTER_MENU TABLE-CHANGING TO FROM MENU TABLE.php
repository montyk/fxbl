	<!--Start: Footer-->
	<div class="footer">
		<div class="footer_list">
                    <div class="ftr_menu pg_width din_med">
                        <div class="tac">
                            <span class="one ftr_active">FOREX OVERVIEW</span>
                            <span class="two">GOLA AND SILVER</span>
                            <span class="three">FOREX ARTICLES</span>
                            <span class="four">FOREX TUTORIAL</span>
                            <span class="five">FOREX TRADING TIPS</span>
                        </div>
                    </div>
		</div>
		<div class="ftr_wrap pg_width">
                    <div class="ftr_ca">
			
                        <?php 
                            $footerMenus=$this->adminfootermenus_model->get_menus(FALSE);  
                            $settings=$this->adminsettings_model->get_settings(FALSE); 
                            $numOfFooterColumns=$settings[0]->value;
                            $footerMenusCount=count($footerMenus);
                            if($footerMenusCount)
                                $maxRowsPerCol=round($footerMenusCount/$numOfFooterColumns);
                            else
                                $maxRowsPerCol=0;
                        ?>
                        
                        <?php // echo '<pre>'; print_r($footerMenus); echo '</pre>'; ?>
                        <?php // echo '<pre>'; print_r($settings); echo '</pre>'; ?>
                        <div class="ftr_type"><ul>
                        <?php if(!empty($footerMenus)){  ?>
                            <?php $firstLoop=TRUE; $j=0; foreach($footerMenus as $k=>$v){ $j++; ?>
                                <?php if(!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1'){ ?>
                                    <li><a href="<?php echo $v['href']; ?>"><?php echo $v['label']; ?></a></li>
                                    <?php if(!$firstLoop && $maxRowsPerCol && $j%$maxRowsPerCol==0){  ?>
                                    </ul></div><div class="ftr_type <?php if(($j/$numOfFooterColumns)>=$maxRowsPerCol){ echo 'borderrightzero'; }  ?>"><ul>
                                    <?php }else{ $firstLoop=FALSE; } ?>

                                <?php }  ?>
                            <?php }  ?>
                        <?php }  ?>
                        </ul></div>
                        
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
			<div class="ftr_copy_ca tahoma f12 c_white tac pg_width">
				<div class="">
					<a href="#">Anti-Money Laundering</a>|<a href="#">Disclaimer</a>|<a href="#">Privacy Policy</a>|<a href="#">Risk Warnings</a>|<a href="#" class="lst">Execution Methodology</a>
				</div>
				<div class="mt12">&copy; 2005- 2012  Forexray All rights reserved.</div>
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
	
</div> <!--Main ca div-->
</body>
</html>
