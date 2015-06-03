<? $data['active_link'] = "active"; 
   $data['active'] ="0";	
?>
	
<?php $this->load->view('common/header_OLD', $data);?>

	

<div class="app outside">
<div class="pg_width">
	<div class="left_ca fl">
		<div class="sliders mt10 ml5">
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                                <img src="<?php base_url() ?>misc/css/images/banners/banner1.png" alt="" data-transition="slideInRight" title="#htmlcaption1" />
                                <img src="<?php base_url() ?>misc/css/images/banners/banner2.png" alt="" title="#htmlcaption2" />
                                <img src="<?php base_url() ?>misc/css/images/banners/banner3.png" alt="" data-transition="slideInLeft" title="#htmlcaption3" />
                                <img src="<?php base_url() ?>misc/css/images/banners/banner4.png" alt="" title="#htmlcaption4" />
                        </div>

                        <div id="htmlcaption1" class="nivo-html-caption f11">
                                <div class="economica_reg f24">Advantages</div><div>Advantages   Forex Ray was founded by traders to serve traders. With many years of experience in Banks� treasury departments, we are in a position to understand the precise needs of forex traders. We aim to provide you with the same professional service, execution, and trading functionality...</div>
                                <div class="more fr tahoma_bold f11"><a href="<?php echo site_url('pages/Advantages'); ?>">More</a></div>
                        </div>
                        <div id="htmlcaption2" class="nivo-html-caption f11">
                                <div class="economica_reg f24">About Metatrader 4</div><div>About Metatrader Before we introduce the Forex platform which we offer to our traders it is important to explain that the tool often described as forex platform or forex terminal is what is used in retail Forex trading as the bridge between the retail trader like yourself... </div>
                                <div class="more fr tahoma_bold f11"><a href="<?php echo site_url('pages/About-Metatrader-4'); ?>">More</a></div>
                        </div>
                        <div id="htmlcaption3" class="nivo-html-caption f11">
                                <div class="economica_reg f24">Account Forms</div><div>Individual Account Form Corporate Account Form Business Introducer Request Internal Funds Transfer Change of Trading Account Details Withdrawal of Funds Form Note To be able to open, view and print the account documentation and forms, you need to install Acrobat Reader or another PDF... </div>
                                <div class="more fr tahoma_bold f11"><a href="<?php echo site_url('pages/Trading-account-forms'); ?>">More</a></div>
                        </div>


                        <div id="htmlcaption4" class="nivo-html-caption f11">
                                <div class="economica_reg f24">Execution Methodology</div> Execution Methodology Market execution Just Click and Trade Trade 4 million per time Guaranteed fills on take profit and stop loss orders 24h dealing room access and customer support Place orders online or by phone Execution Quality is one of the most important factors...
                                <div class="more fr tahoma_bold f11"><a href="<?php echo site_url('pages/ExecutionMethodology'); ?>">more</a></div>
                        </div>
                    </div>
	
                    <script type="text/javascript" src="<?=base_url()?>misc/js/jquery.nivo.slider.js"></script>

		</div>
		<div>
                    <div class="fl box">
                        <div class="t_hdr tac f18 economica_bold row_hdr">TRADING</div>
                        <img src="<?php base_url(); ?>misc/css/images/banner1.png" alt="trading" />
                        <ul>
                            <li><a href="<?php echo site_url('pages/Trading'); ?>" class="fl">Account Types</a><a href="<?php echo site_url('pages/Trading-account-forms'); ?>" class="fr mr12">Account  Forms</a></li>
                            <li><a href="<?php echo site_url('pages/Forex-Islamic'); ?>" class="fl">Forex Islamic</a><a href="<?php echo site_url('pages/Account-Funding'); ?>" class="fr">Account Funding</a></li>
                            <li><a href="<?php echo site_url('pages/Funds-Withdrawal'); ?>" class="fl">Funds Withdrawal</a></li>
                        </ul>
                    </div>
                    <div class="fl box">
                        <div class="ts_hdr tac f18 economica_bold row_hdr">TRADING SOFTWARES</div>
                        <img src="<?php base_url(); ?>misc/css/images/banner2.png"  alt="trading software" />
                        <ul>
                            <li><a href="<?php echo site_url('pages/Download-MetaTrader-4');?>" class="fl">Download MetaTrader 4</a><a href="<?php echo site_url('pages/About-Metatrader-4'); ?>" class="fr">About MetaTrader 4</a></li>
                            <li><a href="<?php echo site_url('pages/MetaTrader-4-User-Guide'); ?>" class="fl">MetaTrader 4 User Guide</a><a href="<?php echo site_url('pages/Automated-Trading'); ?>" class="fr">Automated Trading</a></li>
                            <li><a href="<?php echo site_url('pages/Multiterminal-MAM'); ?>" class="fl">Multiterminal MAM</a></li>
                        </ul>
                    </div>
                    <div class="fl box">
                        <div class="tc_hdr tac f18 economica_bold row_hdr">TRADE CONDITIONS</div>
                        <img src="<?php base_url(); ?>misc/css/images/banner3.png"  alt="trade conditions" />
                        <ul>
                            <li><a href="<?php echo site_url('pages/Spreads'); ?>" class="fl">Spreads</a><a href="<?php echo site_url('pages/Overnight-Positions'); ?>" class="fr mr12">Overnight Positions</a></li>
                            <li><a href="<?php echo site_url('pages/Margin-and-Leverage'); ?>" class="fl">Margin and Leverage</a><a href="<?php echo site_url('pages/ExecutionMethodology'); ?>" class="fr">Execution Methodology</a></li>
                            <li><a href="<?php echo site_url('pages/Advantages'); ?>" class="fl">Advantages</a></li>
                        </ul>
                    </div>						
                    <div class="cl"></div>			
		</div>	
		
		<div class="ml10 mt12">
			<div class="f18 economica_reg c06">Forex Ray</div>
			<div class="f12 mt3 forex_desc mb20 c32">
				<p>
				We aim to provide you with the same professional service, execution, and trading functionality demanded by interbank traders. Here are some of the reasons why Forex Ray is the right choice for trading Forex online:Best Execution Policy.</p>				<p>No Re-Quotes We take all necessary steps to obtain the best possible results for our clients when executing their trading orders. All orders are executed automatically without any dealer intervention.</p>
			</div>
		</div>
		
		<div class="bdr stock_rates ml10">
			<marquee id="m5" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="4" height="20">

			<span class="content_bold">BHEL 
				&nbsp;<span class="green">232.6</span> 
			</span>|
			
			<span class="content_bold">BAAUTO 
				&nbsp;<span class="red">2131.9</span> 
			</span>|
			
			<span class="content_bold">BHATE 
				&nbsp;<span class="green">322.1</span> 
			</span>|

			<span class="content_bold">CIPLA 
				&nbsp;<span class="red">417.45</span> 
			</span>|
			
			<span class="content_bold">COALIN 
				&nbsp;<span class="green">359.95</span> 
			</span>|
			
			<span class="content_bold">DLFLIM 
				&nbsp;<span class="green">235.35</span> 
			</span>|
			
			<span class="content_bold">GAIL 
				&nbsp;<span class="red">357.4</span> 
			</span>|
			
			<span class="content_bold">HDFC 
				&nbsp;<span class="green">832.95</span> 
			</span>|
			
			<span class="content_bold">HDFBAN 
				&nbsp;<span class="green">684.5</span> 
			</span>|

			<span class="content_bold">HERHON
				&nbsp;<span class="red">1897.35</span>
			</span>|
			
			<span class="content_bold">HINDAL 
				&nbsp;<span class="green">134.15</span> 
			</span>|
			
			<span class="content_bold">WIPRO 
				&nbsp;<span class="red">396.9</span> 
			</span>
			

		</marquee>
		</div>
		<div class="mb10">
			<marquee id="m5" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="4" height="20">
				<img src="" />
			</marquee>
		</div>
		
	</div>
	<div class="right_ca fl">
		<div class="demo mt10 ml10">
			<img src="<?= base_url(); ?>/misc/css/images/open_trading.png" alt="Open Trading" />
			<img src="<?= base_url(); ?>/misc/css/images/open_demo.png" alt="Open Demo" class="mt8" />
			<img src="<?= base_url(); ?>/misc/css/images/live_chat.png" alt="Live Chat" class="mt8" />
		</div>
		<div class="mt40 ml10 stocks_list">
			<div class="tabs">
				<ul class="navlist">
					<li class="bdr_none first"><a href="#first"><span>Forex</span></a></li>
					<li><a href="#second" class="second"><span>Commodities</span></a></li>
					<li><a href="#third"><span>Stocks</span></a></li>
					<li class="li_last"><a href="#four"><span>Indices</span></a></li>					
				</ul>
				
				<div class="tabs_content">
					<div id="first" class="first">
						<div class="mi_row">
							<div class="mi_clo1 fwb">Instrument</div>
							<div class="mi_clo2 fwb">Bid/Ask</div>
							<div class="mi_clo3 fwb c_black">Spread</div>
							<?php for($i=0;$i<=5;$i++){ ?>
							<div class="mt10">
							<div class="mi_clo1"><img src="<?= base_url(); ?>misc/css/images/euro.png" alt="symbol" /><img src="<?= base_url(); ?>misc/css/images/usd.png" alt="symbol" />EURUSD</div>
							<div class="mi_clo2">CLOSED</div>
							<div class="mi_clo3 tac">0.2</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div id="second" class="second">
						Commodities updated soon
					</div>
					<div id="third" class="third">
						Stocks updated soon
					</div>
					<div id="four" class="four">
						Indicies updated soon
					</div>
				</div>
			</div>

		</div>
		
		<div class="updates ml10 mt12 mb20">
			<div class="tabs_latest">
				<ul class="navlist">
					<li class="bdr_none first"><a href="#first"><span class="news">News</span></a></li>
					<li class="last"><a href="#second"><span class="events">Events</span></a></li>
				</ul>
				<div class="news_list">
					<div id="first" class="first">
						<?php for($i=0; $i<=1; $i++){ ?>
							<div class="c_555 mt10 tdu news_content">Stock Market flat on the day on fiscal conc...</div>
							<span class="pl10"><b>14/12/2012 21:30:23</b></span>
						<?php } ?>
					</div>
					<div id="second" class="second">
						Events 
					</div>
				</div>	
			</div>
		</div>
	</div>
	<div class="cl"></div>
</div>

</div>

<?php $this->load->view('common/footer_OLD');?>