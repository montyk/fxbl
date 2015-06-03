<script type="text/javascript" src="<?php echo base_url();  ?>public/js/general/lavalamp.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>public/js/general/jquery_easing.js"></script>
<script type="text/javascript">
	
	/*var active_tab = 0;
	$(function(){
		$('#main_menu > li:eq('+active_tab+')').addClass('active');
		$("#main_menu").lavaLamp({ fx: "easeout", speed: 400})
	});
*/

	$(function() { $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 })});
</script>	
<!--Start: menu nav list-->
	<div class="contentheader roundtopfour">
		<div id="header">
			
			<?php 
                            $url_1=$this->uri->segment(1); 
                            $url_2=$this->uri->segment(2); 
                            $url_3=$this->uri->segment(3); 
                        ?>
			<div id="menu">
				<ul class="navigation lavaLamp" id="main_menu">
				
					<li class="<?php if($url_1=='home') echo 'active'; ?>">
						<a class="jcamp_types icon homeico"  href="<?php echo site_url("home"); ?>"> <!--title='Home'-->
							Home
						</a>
						<ul class="nav_list children">
								<li class="li_first"><a href="<?php echo site_url('en/About-Us-Best-in-WholeSale');?>">About Us</a></li>
								<li><a href="<?php echo site_url('en/Why-we-are-the-best-data-security');?>">Why we are the best</a></li>
								<li><a href="<?php echo site_url('en/EDEALSPOT-Market-Share-brand-marketing');?>">Edealspot Market Share</a></li>
						</ul>
					</li>
					
					<!--<li class="<?php if($url_1=='rates') echo 'current'; ?>">
						<a class="jcamp_types icon rateico"  href="<?php echo site_url("rates"); ?>">  
							Rates
						</a>-->
						<!--<ul class="nav_list">
							<li class="li_first"><a href="<?php echo site_url('buy_details');?>">Buy</a></li>
							<li><a href="<?php echo site_url('sell_details');?>">Sell</a></li>
						</ul>-->
					<!--</li>
					
					<li class="<?php if($url_1=='buy_details') echo 'current'; ?>">
						<a class=" jcamp_types icon buyico"  href="<?php echo site_url("buy_details"); ?>">  
							Buy
						</a>
					</li>
			
					<li class="<?php if($url_1=='sell_details') echo 'current'; ?>">
						<a class=" jcamp_types icon sellico"  href="<?php echo site_url("sell_details"); ?>">  
							Sell
						</a>   
                                        </li>-->
			
					<!--<li class="<?php if($url_1=='exchange') echo 'current'; ?>">
						<a class=" jcamp_types icon exchangeico" title='Exchange Digital Currency' href="<?php echo site_url("exchange_details"); ?>">
							Exchange
						</a>
					</li>-->
					
                                        <li class="<?php if($url_1=='Liberty_Reserve'){ echo 'current active'; }else if(strpos($url_2,'Liberty-Reserve')!==FALSE){ echo 'active'; } ?>">
						<a class=" jcamp_types icon libertyico" href="<?php echo site_url("en/What-is-Liberty-Reserve"); ?>">  <!--title='Exchange Digital Currency'-->
							Liberty Reserve
						</a>
						<ul class="nav_list liberty children">
								<li class="li_first"><a href="<?php echo site_url("en/What-is-Liberty-Reserve"); ?>">What is Liberty Reserve?</a></li>
								<li>
									<a href="<?php echo site_url("en/Liberty-Reserve-Brunei"); ?>">Liberty reserve in Asia<img src="<?php echo base_url(); ?>public/images/spacer.gif" class="tip_right"/></a>
									<div class="sidelist children">
										<div class="fl">
											<div class="li_first"><a href="<?php echo site_url("en/Liberty-Reserve-Brunei"); ?>">Brunei</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Uzbekistan"); ?>">Uzbekistan</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Bangladesh"); ?>">Bangladesh</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Indonesia"); ?>">Indonesia</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Pakistan"); ?>">Pakistan</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Vietnam"); ?>">Vietnam</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Malaysia"); ?>">Malaysia</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Kazakhstan"); ?>">Kazakhstan</a></div>
										</div>
										<div class="fl second">
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Philippines"); ?>">Philippines</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Nepal"); ?>">Nepal</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-India"); ?>">India</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Algeria"); ?>">Algeria</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-South-Korea"); ?>">South Korea</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Thailand"); ?>">Thailand</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-China"); ?>">China</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Spain"); ?>">Spain</a></div>
										</div>
										<div class="qtip">&nbsp;</div>
										<div class="clear"></div>
									</div>
									
								</li>
								<li>
									<a href="<?php echo site_url("en/Liberty-Reserve-Latvia"); ?>">Liberty reserve in Europe <img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
									<div class="sidelist children">
										<div class="fl">
										
											<div class="li_first"><a href="<?php echo site_url("en/Liberty-Reserve-Latvia"); ?>">Latvia</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Ukraine"); ?>">Ukraine</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Belarus"); ?>">Belarus</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Russia"); ?>">Russia</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Slovakia"); ?>">Slovakia</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Portugal"); ?>">Portugal</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Czech-Republic"); ?>">Czech Republic</a></div>
										</div>
										<div class="fl second">	
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Poland"); ?>">Poland</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Germany"); ?>">Germany</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Netherlands"); ?>">Netherlands</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-United-Kingdom"); ?>">United Kingdom</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-France"); ?>">France</a></div>
											<div><a href="<?php echo site_url("en/Liberty-Reserve-Azerbaijan"); ?>">Azerbaijan</a></div>
										</div>
										<div class="qtip">&nbsp;</div>
										<div class="clear">&nbsp;</div>	
									</div>
								</li>
								
								<li>
									<a href="<?php echo site_url("en/Liberty-Reserve-America"); ?>">Liberty reserve in America<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/> </a>
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Liberty-Reserve-America"); ?>">America</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Canada"); ?>">Canada</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-United-States-of-America"); ?>">United States of America</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Brazil"); ?>">Brazil</a></li>

									</ul>
																			<div class="rtip qtip">&nbsp;</div>
								</li>
								<li>
									<a href="<?php echo site_url("en/liberty-reserve-cote-divoire"); ?>">Liberty reserve in Africa<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/liberty-reserve-cote-divoire"); ?>">Cote d'Ivoire</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Ghana"); ?>">Ghana</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Nigeria"); ?>">Nigeria</a></li>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-South-Africa"); ?>">South Africa</a></li>			
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Egypt"); ?>">Egypt</a></li>			
									</ul>
																			<div class="rtip qtip">&nbsp;</div>
								</li>
								
								<li>
									<a href="<?php echo site_url("en/Liberty-Reserve-Australia"); ?>">Liberty reserve in Australia<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
									<ul>
										<li><a href="<?php echo site_url("en/Liberty-Reserve-Australia"); ?>">Australia</a></li>
									</ul>
																			<div class="rtip qtip">&nbsp;</div>
								</li>
						</ul>
					</li>
					
					
					<li class="<?php if($url_1=='perfect_money'){ echo 'active'; }else if(strpos($url_2,'Perfect-Money')!==FALSE){ echo 'active'; } ?>">
						<a class=" jcamp_types icon perfectico"  href="<?php echo site_url("en/Perfect-Money"); ?>"> <!-- title='Perfect Money'-->
							Perfect Money
						</a>
						<ul class="nav_list perfect children">
								<li class="li_first"><a href="<?php echo site_url("en/Perfect-Money"); ?>">What is Perfect Money?</a></li>
								<li><a href="<?php echo site_url("en/Perfect-Money-Israel"); ?>">Perfect Money In Asia<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Perfect-Money-Israel"); ?>">Israel</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Indonesia"); ?>">Indonesia</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Pakistan"); ?>">Pakistan</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Malaysia"); ?>">Malaysia</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-Kazakhstan"); ?>">Kazakhstan</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-India"); ?>">India</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-China"); ?>">China</a></li>			
									</ul>
										<div class="rtip qtip">&nbsp;</div>
								</li>
								
								<li><a href="<?php echo site_url("en/Perfect-Money-Latvia"); ?>">Perfect Money In Europe<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Perfect-Money-Latvia"); ?>">Latvia</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Ukraine"); ?>">Ukraine</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Belarus"); ?>">Belarus</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Russia"); ?>">Russia</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-Poland"); ?>">Poland</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-Germany"); ?>">Germany</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-United-Kingdom"); ?>">United Kingdom</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-Lithuania"); ?>">Lithuania</a></li>			
										<li><a href="<?php echo site_url("en/Perfect-Money-Azerbaijan"); ?>">Azerbaijan</a></li>			

									</ul>
										<div class="rtip qtip">&nbsp;</div>
									
								</li>
								
								<li><a href="<?php echo site_url("en/Perfect-Money-Canada"); ?>">Perfect Money In America<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Perfect-Money-Canada"); ?>">Canada</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-United-States-of-America"); ?>">United States of America</a></li>
										<li><a href="<?php echo site_url("en/Perfect-Money-Brazil"); ?>">Brazil</a></li>
									</ul>
										<div class="rtip qtip">&nbsp;</div>
								</li>
	
						</ul>
					</li>
					
					<li class="<?php if($url_1=='Web_Money'){ echo 'active'; }else if(strpos($url_2,'Web-Money')!==FALSE){ echo 'active'; } ?>">
						<a class=" jcamp_types icon webico" title='Web Money' href="<?php echo site_url("en/WebMoney"); ?>">
							Web Money
						</a>
						<ul class="nav_list web children">
								<li class="li_first"><a href="<?php echo site_url("en/WebMoney"); ?>">What is Web Money?</a></li>
								<li><a href="<?php echo site_url("en/Web-Money-Pakistan"); ?>">Web Money In Asia<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Web-Money-Pakistan"); ?>">Pakistan</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Tajikistan"); ?>">Tajikistan</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Uzbekistan"); ?>">Uzbekistan</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Kazakhstan"); ?>">Kazakhstan</a></li>			
										<li><a href="<?php echo site_url("en/Web-Money-India"); ?>">India</a></li>			
										<li><a href="<?php echo site_url("en/Web-Money-China"); ?>">China</a></li>			
										<li><a href="<?php echo site_url("en/Web-Money-Japan"); ?>">Japan</a></li>			
									</ul>
									<div class="rtip qtip">&nbsp;</div>
								</li>
								
								<li><a href="<?php echo site_url("en/Web-Money-Belarus"); ?>">Web Money In Europe<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Web-Money-Belarus"); ?>">Belarus</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Russia"); ?>">Russia</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Ukraine"); ?>">Ukraine</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Azerbaijan"); ?>">Azerbaijan</a></li>			
										<li><a href="<?php echo site_url("en/Web-Money-Germany"); ?>">Germany</a></li>			
										<li><a href="<?php echo site_url("en/Web-Money-Finland"); ?>">Finland</a></li>			
									</ul>
									<div class="rtip qtip">&nbsp;</div>
								</li>
								
								<li><a href="<?php echo site_url("en/Web-Money-Canada"); ?>">Web Money In America<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li class="li_first"><a href="<?php echo site_url("en/Web-Money-Canada"); ?>">Canada</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-United-States-of-America"); ?>">United States of America</a></li>
										<li><a href="<?php echo site_url("en/Web-Money-Brazil"); ?>">Brazil</a></li>
									</ul>
									<div class="rtip qtip">&nbsp;</div>
								</li>
								
								<li><a href="<?php echo site_url("en/Web-Money-africa"); ?>">Web Money In Africa<img src="<?php echo base_url();?>public/images/spacer.gif" class="tip_right"/></a>
								
									<ul>
										<li><a href="<?php echo site_url("en/Web-Money-africa"); ?>">Africa</a></li>
									</ul>
									<div class="rtip qtip">&nbsp;</div>
								</li>
								
						</ul>
					</li>
					
                                        <?php 
                                            $ecurrencyUrls=array(
                                                'Cashu','C-gold','Cosmic-pay','e-gold','egopay','Eurogold-cash','Liqpay','Moneybookers',
                                                'Moneygram','Neteller','Okpay','Paxum','Pay-Safe-Card','Paypal','Payza','Pecunix','Solid-trust-pay',
                                                'Technocash','Western-Union','Yandex-Money'
                                            );
                                        ?>
					<li class="<?php if($url_1=='E-Currency'){ echo 'current'; }else if(in_array($url_2,$ecurrencyUrls)){ echo 'active'; } ?> last">
						<a class=" jcamp_types icon ecurrencyico" title='E-Currency' href="<?php echo site_url("en/Cash-u"); ?>">
							E-Currency
						</a>
						
						<div class="last_list children">
							<div class="fl first">
	<!--						<ul class="nav_list">
	-->								<div class="li_first"><a href="<?php echo site_url('en/Cash-u');?>">Cashu</a></div>
									<div><a href="<?php echo site_url('en/C-gold');?>">C-gold</a></div>
									<div><a href="<?php echo site_url('en/Cosmic-pay');?>">Cosmic pay</a></div>
									<div><a href="<?php echo site_url('en/e-gold');?>">e-gold</a></div>
									<div><a href="<?php echo site_url('en/egopay');?>">egopay</a></div>
									<div><a href="<?php echo site_url('en/Eurogold-cash');?>">Eurogold cash</a></div>
									<div><a href="<?php echo site_url('en/Liqpay');?>">Liqpay</a></div>
									<div><a href="<?php echo site_url('en/Moneybookers');?>">Moneybookers</a></div>
									<div><a href="<?php echo site_url('en/Moneygram');?>">Moneygram</a></div>
									<div><a href="<?php echo site_url('en/Neteller');?>">Neteller</a></div>
							</div>
							<div class="fl second">
									<div  class="li_first"><a href="<?php echo site_url('en/Okpay');?>">Okpay</a></div>
									<div><a href="<?php echo site_url('en/Paxum');?>">Paxum</a></div>
									<div><a href="<?php echo site_url('en/Pay-Safe-Card');?>">Pay Safe Card</a></div>
									<div><a href="<?php echo site_url('en/Paypal');?>">Paypal</a></div>
									<div><a href="<?php echo site_url('en/Payza');?>">Payza</a></div>
									<div><a href="<?php echo site_url('en/Pecunix');?>">Pecunix</a></div>
									<div><a href="<?php echo site_url('en/Solid-trust-pay');?>">Solid trust pay</a></div>
									<div><a href="<?php echo site_url('en/Technocash');?>">Technocash</a></div>
									<div><a href="<?php echo site_url('en/Western-Union');?>">Western Union</a></div>
									<div><a href="<?php echo site_url('en/Yandex-Money');?>">Yandex Money</a></div>
							</div>
						</div>
	<!--					</ul>-->
					</li>
					
					
					
			<!--        <li class="">
						<a class=" jcamp_types " href="#">
							<span class="inner-btn">
								<span class="label"><img width="23" height="18" class="fl navico wholesaleico" src="<?php echo base_url(); ?>css/images/spacer.gif"> Wholesale</span>
								<img src="<?php echo base_url(); ?>css/images/spacer.gif" width="11" height="9" class="arrowtip positionabs" />
							</span>
						</a>
					</li>-->
					
					
					
					<!--<li class="<?php if($url_1=='hyip') echo 'current'; ?>">
						<a class=" jcamp_types icon hyipico" title='HYIP' href="<?php echo base_url(); ?>hyip">
							HYIP
						</a>
						<ul class="nav_list">
								<li class="li_first"><a href="#">Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Who we are</a></li>
								<li class="clear"></li>
						</ul>
					</li>
					
					<li class="<?php if($url_1=='forex') echo 'current'; ?>">
						<a class=" jcamp_types icon forexico" title='Forex' href="<?php echo base_url(); ?>forex">
							Forex
						</a>
						<ul class="nav_list">
								<li class="li_first"><a href="#">Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Who we are</a></li>
								<li class="clear"></li>
						</ul>
					</li>-->
					<li class="<?php if($url_1=='news') echo 'current active'; ?>">
						<a class=" jcamp_types icon newsico"  href="<?php echo site_url("news"); ?>">  
							News
						</a>   
                                        </li>
					
					<li class="<?php if($url_1=='contact_us') echo 'current active'; ?>">
						<a class=" jcamp_types icon contactico" title='Contact Us' href="<?php echo site_url("contact_us"); ?>">
							Contacts Us
						</a>
					</li>
                                        
					<li class="clear"></li>
				</ul>
			</div>
		</div>
	</div>

