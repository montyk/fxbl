<?php
    $data['active_link'] = "active";
    $data['active'] = "0";
    $this->load->view('common/header', $data);
	   $con=mysql_connect("localhost","root","") or die('Unable to connect Host');
    $db=mysql_select_db('forexray',$con) or die('Unable to connect DB');
	//$sql="SELECT id, currency_from, currency_to, ask, bid, status FROM currency_converter ORDER BY id";
	$sql="SELECT * FROM currency_converter ORDER BY id";
	//echo $sql;
	$qry=mysql_query($sql);
?>
<style>
div.whatforextext .block2, div.whatforextext .block3{ display:none}
</style>
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
                                        <div>'.substr(filterStringDecode($v->meta_description), 0, 100).' ...</div>
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
                    <div class="fl box three">
                            <?php if(!empty($home_pages_sections[2]->content)){ echo html_entity_decode($home_pages_sections[2]->content); } ?> 
                           <?php /*?> <?php if(!empty($home_pages_sections[2]->read_more_link)){  ?>    
                            <div class="fr r_more brad4"><a href="<?php echo $home_pages_sections[2]->read_more_link; ?>">Read More</a></div>
                            <?php } ?><?php */?>
                            <?php if(!empty($home_pages_sections[2]->read_more_link)){  ?>  
                            <div class="overlay"><a style="color: white;" href="<?php echo $home_pages_sections[2]->read_more_link; ?>">Read More</a></div>
                            <?php } ?>
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
                    				
                    <div class="cl"></div>			
            </div>	

            <div class="ml10 mt12 new_lyt_news">
                    <div class="fl lft_one boxWrap">
                        <div class="new_lyt_news_hdr orange_home">
                            <div class="inner">Why Forexray?</div>
                            <div class="new_lyt_news_hdrwht">&nbsp;</div>
                        </div>
						
                        <div class="whatforextext" >
                            <?php if(!empty($home_pages_sections[3]->content)){ $home_content= html_entity_decode($home_pages_sections[3]->content); echo $home_content; //$home_content=strip_tags($home_content);echo substr($home_content,0,580)."...";
    						} ?>	
                        </div>
                        <?php if(!empty($home_pages_sections[3]->href)){  ?>	
                        <div class="new_read_more"><a href="<?php echo $home_pages_sections[3]->href; ?>">Read More</a></div>
                        <?php } ?>

                    </div>
                    <div class="fl lft_two boxWrap">
                        <div class="new_lyt_news_hdr green_home">
                            <div class="inner">News</div>
                            <div class="new_lyt_news_hdrwht">&nbsp;</div>
                        </div>
                        <div class="news_wrp">
                            <?php if (!empty($sidebar_news)) foreach ($sidebar_news as $k => $v) { ?>
                                <span class="pl10"><b><?php echo $v->last_modified; ?></b></span>
                                <div class="c_555 tdu news_content"><a href="<?php echo site_url('news/full_story/' . $v->id); ?>"><?php echo substr(strip_tags(filterStringDecode($v->description)), 0, 100); ?>...</a></div>
                            <?php } else { ?>
                            To be announced......
                            <?php } ?>
                        </div>
                        <div class="new_view_all"><a href="<?php echo site_url('news'); ?>">View All</a></div>


                    </div>
                    <div class="fl lft_three boxWrap">
                        <div class="new_lyt_news_hdr blue_home">
                            <div class="inner">Promotions</div>
                            <div class="new_lyt_news_hdrwht">&nbsp;</div>
                        </div>
                      <div class="prom_wrp">
                        <?php if (!empty($sidebar_promotions)) foreach ($sidebar_promotions as $k => $v) { ?>
                            <span class="pl10"><b><?php echo $v->last_modified; ?></b></span>
                            <div class="c_555 tdu news_content"><a href="<?php echo site_url('news/full_story/' . $v->id); ?>"><?php echo substr(strip_tags(filterStringDecode($v->description)), 0, 100); ?>...</a></div>
                        <?php } else { ?>
                        To be announced......
                        <?php } ?>
                     </div>
                     <div class="prm_view_all"><a href="<?php echo site_url('news/promotions'); ?>">View All</a></div>

                    </div>

					
                    <div class="cl"></div>
		
				
                    <div class="cl"></div>
                </div>


    </div>
	
	

    <div class="right_ca fl">
        
        <?php $this->load->view('common/sidebar_1'); ?>
        
        <?php $this->load->view('common/sidebar_terminal'); ?>
        
        <?php $this->load->view('common/sidebar_news');?>
        
    </div>

    <div class="cl"></div>


    <div class='marquee-with-options'>
        <?php while($row=mysql_fetch_array($qry)){?>
  <span class="symbol"><img alt="<?php echo $row['status'];?>" src="plugins/raju/img/<?php echo $row['status'];?>.gif" width="9" height="5">&nbsp;<?=$row['currency_from'].$row['currency_to']?>&nbsp;&nbsp;<?=$row['ask']?>&nbsp;&nbsp;<?=$row['bid']?></span>
        <?php } ?>
    </div>
                

    <div class="trade_img type2 mb20">
        <div class="pg_width">
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#VisaMasterCards'); ?>"><img src="<?= base_url(); ?>public/images/logos/visa_card.png" alt="trading partners" width="63" height="50"  /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/master_card.png" alt="trading partners" width="60" height="50"  /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#Swift'); ?>"><img src="<?= base_url(); ?>public/images/logos/Neteller.png" alt="trading partners" width="73" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#MoneyBrokers'); ?>"><img src="<?= base_url(); ?>public/images/logos/Skrill.png" alt="trading partners" width="53" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#WebMoney'); ?>"><img src="<?= base_url(); ?>public/images/logos/WebMoney.png" alt="trading partners" width="86" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#LiqPay'); ?>"><img src="<?= base_url(); ?>public/images/logos/ukash.png" alt="trading partners" width="110" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds#CreditCards'); ?>"><img src="<?= base_url(); ?>public/images/logos/bank-wire.png" alt="trading partners" width="111" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/iDeal.png" alt="trading partners" width="63" height="50" /></a></span>
            <span class="partners"><a href="<?php echo site_url('en/Deposit-Withdraw-Funds'); ?>"><img src="<?= base_url(); ?>public/images/logos/SofortBanking.png" alt="trading partners" width="63" height="50" /></a></span>
        </div>
    </div>

</div>


<div class="cl"></div>

</div>
	
<?php $this->load->view('common/footer');?>