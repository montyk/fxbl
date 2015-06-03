<div class="mt10 ml10 stocks_list">
    <iframe src="http://forexray.com/plugins/raju/terminal.php" height="340px"></iframe>
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