<?php    
$protocol=(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$server_domain_name=$protocol.$this->config->item('project_name').".com";
?>
<div class="mt10 ml10 stocks_list">
   <!--<iframe src="<?php echo base_url();?>/plugins/raju/terminal.php" height="496px"></iframe>-->
    <!-- Local --> 
   <!-- server -->

    <!-- <iframe src="http://forexray.com/plugins/raju/terminal.php" height="487px"></iframe>-->
    <!-- Local -->
    
    <div class="dt-sc-location-detail">
                                <h6>LIVE RATES</h6>
                                
							<table class="table">
								<thead>
									<tr>
										<th>Symbol</th>
										<th>Bid</th>
									</tr>
								</thead>
							<tbody>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
									<tr>
										<td>EURUSD</td>
										<td>1.12375</td>
									</tr>
							</tbody>
							</table>
                            </div>
    

    <div class="tabs" style="display:none">
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
                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                        <div class="mt10">
                            <div class="mi_clo1"><img src="<?= base_url(); ?>misc/css/images/euro.png" width="16" height="11" alt="symbol" /><img width="16" height="11" src="<?= base_url(); ?>misc/css/images/usd.png" alt="symbol" />EURUSD</div>
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

<div style="display:none;"class="box_central rad_four">

    <div class="box_central_header">Central Banks Rates</div>
     <div class="box_central_content">
        <table width="100%">
            <!--<thead>
                <tr>
                    <th width="10">&nbsp;</th>
                    <th width="140">Central Banks</th>
                    <th width="180">Interest Rates</th>
                    <th width="10">&nbsp;</th>
                </tr>
            </thead>-->
            <tbody>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/FED.png" alt="FED"/> FED</td>
                    <td class="last">0.00%-0.25% </td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/ECB.png" alt="ECB"/> ECB</td>
                    <td class="last">0.25% </td>
                    <td width="10">&nbsp;</td>
                </tr>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/BOE.png" alt="BOE"/> BOE</td>
                    <td class="last">0.50%  </td>
                    <td width="10">&nbsp;</td>
                </tr>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/SNB.png" alt="SNB"/> SNB</td>
                    <td class="last">0.00% </td>
                    <td width="10">&nbsp;</td>
                </tr>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/RBA.png" alt="RBA"/> RBA</td>
                    <td class="last">2.50%</td>
                    <td width="10">&nbsp;</td>
                </tr>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/BOC.png" alt="BOC"/> BOC</td>
                    <td class="last">1.00% </td>
                    <td width="10">&nbsp;</td>
                </tr>
                 <tr>
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/RBNZ.png" alt="RBNZ"/> RBNZ</td>
                    <td class="last">2.75%</td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr class="trlast">
                    <td width="10">&nbsp;</td>
                    <td class="first"><img src="<?= base_url(); ?>misc/css/images/tab_icon/BOJ.png" alt="BOJ"/> BOJ</td>
                    <td class="last">0.10%  </td>
                    <td width="10">&nbsp;</td>
                </tr>
            </tbody>

        </table>


     </div>


</div>



<div class="ad_1" style="display:none">
    <div class="cycle-slideshow " data-cycle-fx=fadeout data-cycle-timeout=1000 data-cycle-pause-on-hover="true">
        <img src="<?=base_url()?>misc/css/images/ads/1.png" width="246" height="127" />
        <img src="<?=base_url()?>misc/css/images/ads/2.png" width="246" height="127" />
  
    </div>
</div>

<div class="ad_2" style="display:none">
    <div class="cycle-slideshow " data-cycle-fx=fadeout data-cycle-timeout=1500 data-cycle-pause-on-hover="true">
        <img src="<?=base_url()?>misc/css/images/ads/3.png" width="246" height="127" />
        <img src="<?=base_url()?>misc/css/images/ads/2.png" width="246" height="127" />
  
    </div>
</div>