<?php
    $data['active_link'] = "active";
    $data['active'] = "0";
    $this->load->view('common/header_new');
//	   $con=mysql_connect("localhost","root","") or die('Unable to connect Host');
//    $db=mysql_select_db('forexray',$con) or die('Unable to connect DB');
//	//$sql="SELECT id, currency_from, currency_to, ask, bid, status FROM currency_converter ORDER BY id";
//	$sql="SELECT * FROM currency_converter ORDER BY id";
//	//echo $sql;
//	$qry=mysql_query($sql);
?>

</div>

        <!-- **Main - Starts** --> 
		<div id="main">
        
        	<!-- **banner - Starts** -->
            <div class="banner">
                <!-- **Slider Section** -->
                <div id="layerslider_9" class="ls-wp-container" style="width:100%;height:560px;max-width:1920px;margin:-80px auto;margin-bottom: 0px;">
          <?php foreach ($news as $k => $v) { ?>
           <div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">
                        <img src="<?php echo base_url().$v->attachment; ?>" data-src="<?php echo base_url().$v->attachment; ?>" class="ls-bg" alt="bg2" />
                        
                        <div class="ls-l" style="top:240px;left:320px;font-weight:700; z-index:3;font-family:'Roboto';font-size:24px;line-height:21px;color:#fff;white-space: nowrap;" data-ls="offsetxin:-100;durationin:1500;delayin:800;">
						<?php echo $v->heading; ?></div>

                        <div class="ls-l" style="top:300px;left:20px;font-weight:700; z-index:3; letter-spacing:2.5px;font-family:'Roboto';font-size:42px;line-height:26px;color:#ffffff; text-shadow: 0px 0px 12px rgba(0, 0, 0, 0.5); white-space: nowrap;"  data-ls="offsetxin:0;offsetyin:100;durationin:1500;delayin:2000;">
						<?php echo substr(filterStringDecode($v->meta_description), 0, 100) ; ?></div>
                                               
                        <p class="ls-l" style="top:370px;left:320px;white-space: nowrap; line-height:30px;" data-ls="offsetxin:0;offsetyin:100;delayin:4000;"> <a href="#" class="dt-sc-button1 ico-button"> OPEN A REAL ACCOUNT</a></p>
                        
                        <p class="ls-l" style="top:370px;left:530px;white-space: nowrap;" data-ls="offsetxin:-150;delayin:4000;"> <a href="#" class="dt-sc-button2">OPEN A FREE DEMO ACCOUNT</a></p>
                    <p style="color:#f00; font-size:24px"> Read More</p>
                    </div>
                  <?php }?>  
               <!--<div class="ls-slide" data-ls="slidedelay:8000;transition2d:4;">
                   <img src="<?= base_url() ?>public/images/sliders/blank.gif" data-src="<?= base_url() ?>public/images/sliders/slider-2.jpg" class="ls-bg" alt="bg2" />
                        
                        <div class="ls-l" style="top:240px;left:320px;font-weight:700; z-index:3;font-family:'Roboto';font-size:24px;line-height:21px;color:#fff;white-space: nowrap;" data-ls="offsetxin:-100;durationin:1500; delayin:800;">ramesh FOREX , GOLD , CRUDE OIL , SHARES, INDICES</div>

                        <div class="ls-l" style="top:300px;left:20px;font-weight:700; z-index:3; letter-spacing:2.5px;font-family:'Roboto';font-size:42px;line-height:26px;color:#ffffff; text-shadow: 0px 0px 12px rgba(0, 0, 0, 0.5); white-space: nowrap;"  data-ls="offsetxin:0;offsetyin:100;durationin:1500;delayin:2000;">LEADING ONLINE TRADING BROKER SINCE 2012</div>

 <p class="ls-l" style="top:370px;left:320px;white-space: nowrap; line-height:30px;" data-ls="offsetxin:0;offsetyin:100;delayin:4000;"> <a href="#" class="dt-sc-button1 ico-button"> OPEN A REAL ACCOUNT</a></p>
                        
                        <p class="ls-l" style="top:370px;left:530px;white-space: nowrap;" data-ls="offsetxin:-150;delayin:4000;"> <a href="#" class="dt-sc-button2">OPEN A FREE DEMO ACCOUNT</a></p>
                    </div>-->
                </div>
            </div>
            <!-- **banner - Ends** -->
            
        	  
            <div class="slide-controls-wrapper">
                        <div class="slide-controls" style="display: block;">
                            <!-- **column - Starts** -->
                            <div class="column dt-sc-one-fourth no-space first">
                                <!-- **dt-sc-ico-content type6 - Starts** -->
                                <div class="dt-sc-ico-content type8">
                                    
                                    <p>Get 30% of Brokerage Withdrawal over Trading Volume * </p>
                                </div> <!-- **dt-sc-ico-content type6 - Ends** -->
                            </div> <!-- **column - Ends** -->
                            <!-- **column - Starts** -->
                            <div class="column dt-sc-one-fourth no-space">
                                <!-- **dt-sc-ico-content type6 - Starts** -->
                                <div class="dt-sc-ico-content type8">
                                 
                                    <p>Get upto 100% Bonus over Initial <br />
Investment * </p>
                                </div> <!-- **dt-sc-ico-content type6 - Ends** -->
                            </div> <!-- **column - Ends** -->
                            <!-- **column - Starts** -->
                            <div class="column dt-sc-one-fourth no-space">
                                <!-- **dt-sc-ico-content type6 - Starts** -->
                                <div class="dt-sc-ico-content type8">
                                 
                                    <p>No Other Charges apart from Brokerage is our Promise</p>
                                </div> <!-- **dt-sc-ico-content type6 - Ends** -->
                            </div> <!-- **column - Ends** -->
                            <!-- **column - Starts** -->
                            <div class="column dt-sc-one-fourth no-space border-right">
                                <!-- **dt-sc-ico-content type6 - Starts** -->
                                <div class="dt-sc-ico-content type8">
                                    
                                    <p>Learn How Professional Traders are  <br /> Trading </p>
                                </div> <!-- **dt-sc-ico-content type6 - Ends** -->
                            </div> <!-- **column - Ends** -->
                        </div>        
                    </div>

                    <div class="dt-sc-margin20"></div>
			<!-- **Full-width-section - Starts** -->       
			<div class="full-width-section">
				<div class="container">
             
                    
                    <div class="column dt-sc-one-fourth first animate" data-animation="fadeInUp" data-delay="100">
				        <!-- **dt-sc-ico-content type2 - Starts** -->
                        <div class="dt-sc-ico-content type2">
				            <!-- **icon - Starts** -->
                          
				                <div class="icon_new">
                                   <img src="<?= base_url() ?>public/images/open_ac.png" alt="image"> 
                                </div>
				            <!-- **icon - Ends** -->
				            <h4>Open Account</h4>
				            <p>Open a Real Account and trade with real money. Start from risk free Demo account if you are new.</p>
                            
				        </div> <!-- **dt-sc-ico-content type2 - Starts** -->
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInDown" data-delay="100">
				        <!-- **dt-sc-ico-content type2 - Starts** -->
                        <div class="dt-sc-ico-content type2">
				            <!-- **icon - Starts** -->
                            <div class="icon_new">
                                   <img src="<?= base_url() ?>public/images/learn_trade.png" alt="image"> 
                                </div> <!-- **icon - Ends** -->
				            <h4>Learn Trading</h4>
				            <p>We're here to help enhance your skills throughout your trading journey, not just at the beginning.</p>
                            
				        </div> <!-- **dt-sc-ico-content type2 - Starts** -->
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInUp" data-delay="100">
				        <!-- **dt-sc-ico-content type2 - Starts** -->
                        <div class="dt-sc-ico-content type2">
				            <!-- **icon - Starts** -->
                            <div class="icon_new">
                                   <img src="<?= base_url() ?>public/images/meta_trade.png" alt="image"> 
                                </div> <!-- **icon - Ends** -->
				            <h4> Meta Trader 4</h4>
				            <p>Forex bull now offers Forex and CFD trading on the popular MetaTrader 4 trading platform.</p>
                            
				        </div> <!-- **dt-sc-ico-content type2 - Starts** -->
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInDown" data-delay="100">
                    	<!-- **dt-sc-ico-content type2 - Starts** -->
				        <div class="dt-sc-ico-content type2">
				           <div class="icon_new">
                                   <img src="<?= base_url() ?>public/images/live_chat.png" alt="image"> 
                                </div> <!-- **icon - Ends** -->
				            <h4>Live Chat</h4>
				            <p>Live Chat is available only to Live account holders FOR 24/7. <br>
Do you need Help ? <a href="#"> Click Here</a></p>
                            
				        </div> <!-- **dt-sc-ico-content type2 - Starts** -->
				    </div>
                
                </div> <!-- **container - Starts** -->
            </div><!-- **Full-width-section - Ends** -->
                                <div class="dt-sc-margin20"></div>

            <!-- **full-width-section - starts** -->
            <div class="intro-text type1">
                <div class="container">
                    <div class="column dt-sc-one-half first pull-left">
                        <h4>Start trading with forexbull now</h4>
                    </div>
                    <div class="column dt-sc-one-half btn_pad">
                        <a class="dt-sc-button1 ico-button" href="#">OPEN A FREE DEMO ACCOUNT</a> 
                        <a class="dt-sc-button2" href="#">OPEN A REAL ACCOUNT</a> 
                        
                    </div>
                </div>
            </div><!-- **full-width-section - Ends** -->
            <div class="dt-sc-margin20"></div>
                        <!-- **full-width-section - starts** -->
            <div class=" full-width-section type1">
                <div class="container">EURUSD  1.08076  1.08046          GBPUSD  1.49633  1.49593          USDCHF  0.95317  0.95145          USDJPY  118.919  118.899        USDCAD  1.22489  1.22459      EURGBP   </div>
            </div><!-- **full-width-section - Ends** -->
            <div class="dt-sc-margin20"></div>
            
<!--            <div class="parallax full-width-section rj-parallax" style="background-position: 50% -63px;">-->
            <div class="parallax full-width-section rj-parallax" style="background-position: 50% -63px;">
                
                    <!-- **column - Starts** -->
                    <div class="column dt-sc-one-half first pull-left animate fadeInDown" data-animation="fadeInDown" data-delay="100">
                    <div class="rjpad">
                        <h3 style="color:#fff;"> Welcome to Forex Bull</h3>
                        <p>ForexBull is a Foreign Exchange ("Forex") and CFD broker, with a focus on superior trading conditions and customer service. We offers spreads as low as 1 pip, interest paid on your account balance, direct interbank (ECN) trading access, and the lowest margin requirements for all products. Forex Bull’s advanced software allows you to easily trade from your PC, Mac, web-browser, iPhone, or other mobile device, whether using MetaTrader or ActTrader.</p>
                        
                          <a href="#" class="dt-sc-button large">Who We Are<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div> <!-- **column - Ends** -->  
                                       
                    <!-- **column - Starts** -->
                    <div class="column dt-sc-one-half animate zoomIn" data-animation="zoomIn" data-delay="100">
                        <img class="aligncenter" src="<?= base_url() ?>public/images/sliders/user.jpg" alt="image">
                    </div> <!-- **column - Ends** -->
                    
            </div>
            <div class="dt-sc-margin20"></div>  
            <div class="container">
                    
                    
                    <div class="column dt-sc-one-fourth first fadeInLeft" data-animation="fadeInLeft" data-delay="100">
                        <div class="dt-sc-ico-content type4">
                    
                                <img src="<?= base_url() ?>public/images/tr_p.jpg" alt="image">                            
                            <div class="dt-sc-location-detail">
                                <h6>TRADING PRODUCTS</h6>
                                <ul>
                                 <li><span class="fa fa-angle-right"></span> Account Types</li>
                                    <li><span class="fa fa-angle-right"></span> PAMM </li>
                                    <li><span class="fa fa-angle-right"></span> Forex Islamic</li>
                                    <li><span class="fa fa-angle-right"></span> Forexcopy System</li>
                                    <li><span class="fa fa-angle-right"></span> Payment Systems</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="column dt-sc-one-fourth fadeInRight" data-animation="fadeInRight" data-delay="100">
                             <div class="dt-sc-ico-content type4">
                    
                                <img src="<?= base_url() ?>public/images/tr_c.jpg" alt="image">                            
                            <div class="dt-sc-location-detail">
                                <h6>TRADE CONDITIONS</h6>
                                <ul>
                                 <li><span class="fa fa-angle-right"></span> Spreads </li>
                                    <li><span class="fa fa-angle-right"></span> Overnight Positions  </li>
                                    <li><span class="fa fa-angle-right"></span> Margin and Leverage </li>
                                    <li><span class="fa fa-angle-right"></span> Execution Methodology </li>
                                    <li><span class="fa fa-angle-right"></span> Advantages </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="column dt-sc-one-fourth fadeInLeft" data-animation="fadeInLeft" data-delay="100">
                            <div class="dt-sc-ico-content type4">
                    
                                <img src="<?= base_url() ?>public/images/t_s.jpg" alt="image">                            
                            <div class="dt-sc-location-detail">
                                <h6>TRADING SOFTWARES</h6>
                                <ul>
                                 <li><span class="fa fa-angle-right"></span> Download MetaTrader 4</li>
                                    <li><span class="fa fa-angle-right"></span> About MetaTrader 4 </li>
                                    <li><span class="fa fa-angle-right"></span> MetaTrader 4 User Guide</li>
                                    <li><span class="fa fa-angle-right"></span> Automated Trading</li>
                                    <li><span class="fa fa-angle-right"></span> Multiterminal MAM</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="column dt-sc-one-fourth fadeInRight" data-animation="fadeInRight" data-delay="100">
                            <div class="dt-sc-ico-content type4">
                    
                                <img src=" http://www.placehold.it/245x123&text=Image" alt="image">                            
                            <div class="dt-sc-location-detail">
                                <h6>TRADING PRODUCTS</h6>
                                <ul>
                                 <li><span class="fa fa-angle-right"></span> Account Types</li>
                                    <li><span class="fa fa-angle-right"></span> PAMM </li>
                                    <li><span class="fa fa-angle-right"></span> Forex Islamic</li>
                                    <li><span class="fa fa-angle-right"></span> Forexcopy System</li>
                                    <li><span class="fa fa-angle-right"></span> Payment Systems</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                        
                    </div>
                </div>


<div class="intro-text type5">
                            <div class="intro-text-content">
                                <h2> Why ForexBull?</h2>
                                <h6> Absolutely no trading restrictions:</h6>
                               
        <ul class="dt-sc-fancy-list tick">
                            <li>We execute only through ECN/STP</li>
                            <li>Hedging possibility</li>
                            <li>Ultra-fast execution</li>
                            <li>EU registration</li>
                            <li>Leverage up to 1:400</li>
                            <li>Spreads from 0 pips</li>
                            <li>Expert advisor are welcome</li>
                            <li>News trading is allowed</li>
                            <li>Commissions from USD 1 (for 1 lot)</li>
                        </ul>
                                <a href="#" class="dt-sc-button medium"> WHY FOREXBULL? <span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                <section id="primary" class="content-full-width intro-text type1">
                <div class="full-width-section">
                    <div class="container">                        
                        <div class="dt-sc-margin30"></div>
                        <div class="column dt-sc-one-fifth first">
                            <div class="dt-sc-ico-content type1">
                                <div class="icon">
                                    <span class="fa fa-anchor"></span>
                                </div>
                                <h4> Live<span>Chat</span> </h4>
                                
                            </div>
                        </div>
                        <div class="column dt-sc-one-fifth">
                            <div class="dt-sc-ico-content type1">
                                <div class="icon">
                                     <span class="fa fa-trophy"></span>
                                </div>
                                <h4>Sky<span>pe</span></h4>
                                
                            </div>
                        </div>
                        <div class="column dt-sc-one-fifth">
                            <div class="dt-sc-ico-content type1">
                                <div class="icon">
                                    <span class="fa fa-paper-plane"></span>
                                </div>
                                <h4> Email<span>Us</span> </h4>
                                
                            </div>
                        </div>
                        <div class="column dt-sc-one-fifth">
                            <div class="dt-sc-ico-content type1">
                                <div class="icon">
                                    <span class="fa fa-flag"></span>
                                </div>
                                <h4>Call<span>Us</span> </h4>
                                
                            </div>
                        </div>
                        
                        <div class="column dt-sc-one-fifth first">
                            <div class="dt-sc-ico-content type1">
                                <div class="icon">
                                    <span class="fa fa-anchor"></span>
                                </div>
                                <h4> Reach<span>US</span> </h4>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                </section>

                
		
        </div><!-- **Main - Ends** --> 
        
	
<?php $this->load->view('common/footer_new');?>