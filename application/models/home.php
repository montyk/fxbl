<?php
    $data['active_link'] = "active";
    $data['active'] = "0";
    $this->load->view('common/header', $data);
	$con=mysql_connect("localhost","root","123456") or die('Unable to connect Host');
	$db=mysql_select_db('dev_frx',$con) or die('Unable to connect DB');
	//$sql="SELECT id, currency_from, currency_to, ask, bid, status FROM currency_converter ORDER BY id";
	$sql="SELECT * FROM currency_converter ORDER BY id";
	//echo $sql;
	$qry=mysql_query($sql);
?>

<div class="app outside">
<div class="pg_width">
    <div class="left_ca fl">
            <div class="slider_wrapper">
                <?php  if(!empty($news)){ $sliderHtmlCaptions=''; ?>
                <div class="sliders mt10 ml5">
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                            <?php foreach ($news as $k => $v) { ?>
                            <img src="<?php echo base_url().$v->attachment; ?>" alt="" data-transition="slideInRight" title="#slider_htmlcaption_<?php echo $k; ?>" height="270" style="height:270px;"/>
                            <?php $sliderHtmlCaptions.='<div id="slider_htmlcaption_'.$k.'" class="nivo-html-caption f11">
                                        <div class="economica_reg f24">'.$v->heading.'</div>
                                        <div>'.substr(filterStringDecode($v->description), 0, 100).' ...</div>
                                        <div class="more fr tahoma_bold f11"><a href="'.site_url('news/full_story/' . $v->id).'">More</a></div>
                                    </div>'; 
                            ?>
                            <?php } ?>
                        </div>
                        <?php echo $sliderHtmlCaptions; ?>
                    </div>
                </div>
                <?php }  ?>
            </div>

            <script type="text/javascript" src="<?=base_url()?>misc/js/jquery.nivo.slider.js"></script>
            <div class="box_update">
                    <div class="fl box one">
                            <?php if(!empty($home_pages_sections[0]->content)){ echo html_entity_decode($home_pages_sections[0]->content); } ?>	
							<?php if(!empty($home_pages_sections[0]->read_more_link)){  ?>	
							<div class="overlay"><a style="color: white;" href="<?php echo $home_pages_sections[0]->read_more_link; ?>">Read More</a></div>
							<?php } ?>
<?php /*?>                            <?php if(!empty($home_pages_sections[0]->read_more_link)){  ?>	
                            <div class="fr r_more brad4"><a href="<?php echo $home_pages_sections[0]->read_more_link; ?>">Read More</a></div> <?php } ?>
<?php */?>                           
                    </div>
                    <div class="fl box two">
                            <?php if(!empty($home_pages_sections[1]->content)){ echo html_entity_decode($home_pages_sections[1]->content); } ?>	
                           <?php /*?> <?php if(!empty($home_pages_sections[1]->read_more_link)){  ?>	
                            <div class="fr r_more brad4"><a href="<?php echo $home_pages_sections[1]->read_more_link; ?>">Read More</a></div>
                            <?php } ?><?php */?>
							<?php if(!empty($home_pages_sections[1]->read_more_link)){  ?>	
							<div class="overlay"><a style="color: white;" href="<?php echo $home_pages_sections[1]->read_more_link; ?>">Read More</a></div>
							<?php } ?>
							
                    </div>
                    <div class="fl box three">
                            <?php if(!empty($home_pages_sections[2]->content)){ echo html_entity_decode($home_pages_sections[2]->content); } ?>	
                           <?php /*?> <?php if(!empty($home_pages_sections[2]->read_more_link)){  ?>	
                            <div class="fr r_more brad4"><a href="<?php echo $home_pages_sections[2]->read_more_link; ?>">Read More</a></div>
                            <?php } ?><?php */?>
							<?php if(!empty($home_pages_sections[2]->read_more_link)){  ?>	
							<div class="overlay"><a style="color: white;" href="<?php echo $home_pages_sections[2]->read_more_link; ?>">Read More</a></div>
							<?php } ?>
                    </div>						
                    <div class="cl"></div>			
            </div>	

            <div class="ml10 mt12">
                    <?php if(!empty($home_pages_sections[3]->content)){ echo html_entity_decode($home_pages_sections[3]->content); } ?>	
                    <?php if(!empty($home_pages_sections[3]->read_more_link)){  ?>	
                    <div class="fr r_more brad4"><a href="<?php echo $home_pages_sections[3]->read_more_link; ?>">Read More</a></div>
                    <?php } ?>
					
                    <div class="cl"></div>
					<!-- Marquee-->
		
				<div class='marquee-with-options'>
				<?php while($row=mysql_fetch_array($qry)){?>
					<span class="symbol"><img src="plugins/raju/img/<?php echo $row['status'];?>.gif" width="11" height="9">&nbsp;<?=$row['currency_from'].$row['currency_to']?>&nbsp;&nbsp;<?=$row['ask']?>&nbsp;&nbsp;<?=$row['bid']?></span>
				<?php } ?>
				<!--	<span class="symbol">VALUE-1</span><span class="bid">GBPUSD</span><span class="ask"> 1.5929</span><span class="ask">1.5933</span>
					<span class="symbol">VALUE-1</span><span class="bid">USDCHF</span><span class="ask"> 0.9160</span><span class="ask">0.9165</span>
					<span class="symbol">VALUE-1</span><span class="bid">USDJPY</span><span class="ask"> 98.62</span><span class="ask">98.66</span>
					<span class="symbol">VALUE-1</span><span class="bid">AUDUSD</span><span class="ask">0.9514</span><span class="ask">0.9523</span>
					<span class="symbol">VALUE-1</span><span class="bid">USDCAD</span><span class="ask"> 1.0360</span><span class="ask">1.0364</span>-->
				</div>
				
		
	<!-- Marquee-->
                    <div class="trade_img type2 mb20">
                        <div class="pg_width">
<!--                            <marquee behavior="scroll" scrollamount="3" direction="left">-->
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#VisaMasterCards'); ?>"><img src="<?= base_url(); ?>public/images/logos/visa_card.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/master_card.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#Swift'); ?>"><img src="<?= base_url(); ?>public/images/logos/Neteller.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#MoneyBrokers'); ?>"><img src="<?= base_url(); ?>public/images/logos/Skrill.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#WebMoney'); ?>"><img src="<?= base_url(); ?>public/images/logos/WebMoney.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#LiqPay'); ?>"><img src="<?= base_url(); ?>public/images/logos/ukash.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#CreditCards'); ?>"><img src="<?= base_url(); ?>public/images/logos/bank-wire.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/iDeal.png" alt="trading partners" /></a></span>
                            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/SofortBanking.png" alt="trading partners" /></a></span>
                            <!--</marquee>-->
                        </div>
                    </div>
                    <div class="cl"></div>
            </div>
<!--
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
            </div>-->
            <!--<div class="mb10">
                    <marquee id="m5" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="4" height="20">
                            <img src="" />
                    </marquee>
            </div>-->

    </div>
	
	

    <div class="right_ca fl">
        
        <?php $this->load->view('common/sidebar_1'); ?>
        
        <?php $this->load->view('common/sidebar_terminal'); ?>
        
        <?php $this->load->view('common/sidebar_news');?>
        
    </div>
</div>
<div class="cl"></div>

</div>
	
<?php $this->load->view('common/footer');?>