<div class="footer">
    <div class="inner">
        <div class="ovrclr">
            <div class="fl footerelemnets f_one">
                <a href="<?php echo site_url("home"); ?>">Home</a>
                <a href="<?php echo site_url('en/About-Us-Best-in-WholeSale'); ?>">About Us</a>
                <a href="http://edealspot.com/links/links.php">Link Exchange</a>
                <a href="<?php echo site_url('signup'); ?>">Signup</a>
            </div>
            <div class="fl footerelemnets">
                <a href="<?php echo site_url('en/faq'); ?>">FAQ</a>
                <a href="<?php echo site_url('en/wholesalers-in'); ?>">Wholesale</a>
                <a href="<?php echo site_url('en/terms-and-conditions'); ?>">Terms & Conditions</a>
                <a href="<?php echo site_url('login'); ?>">Login</a>
            </div>
            <div class="fl footerelemnets">
                <a href="<?php echo site_url('buy_details'); ?>">Buy</a>
                <a href="<?php echo site_url('rates'); ?>">Rates</a>
                <a href="<?php echo site_url('news'); ?>">Updates</a>
                <a href="<?php echo site_url('news'); ?>">News</a>
            </div>
            <div class="fl footerelemnets borderrightzero">
                <a href="<?php echo site_url('sell_details'); ?>">Sell</a>
                <a href="<?php echo site_url('exchange_details'); ?>">Exchange</a>
                <a href="<?php echo site_url('en/site'); ?>">Sitemap</a>
                <a href="<?php echo site_url('contact_us'); ?>">Contact Us</a>
            </div>
            <div class="fr wingimg"></div>
				<a href="http://gdca.co/business.php?memberid=384" class="reg_logo">
				 <img border="0" alt="" src="http://gdca.co/images/r2.jpg">
				</a>

<!--            <img border="0" alt="" src="http://gdca.co/images/r2.jpg" class="reg_logo" />-->
        </div>
        <div class="copyrights">Copyright &copy; 2012 EDealSpot  All Right Reserved</div>
    </div>
</div>

<div id="chat_fix" style="position:fixed; bottom: 2px; left: 2px;">
    <span id='liveadmin'></span>
</div>
<script language="javascript" type="text/javascript" src="https://www.edealspot.com/chat/client.php?key=L1278AAA16V2A5FE6A3MB733A92"></script>
<script type="text/javascript" rel="javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28611205-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +

'.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
    var x = new Date()
    var timeZone = currentTimeZoneOffsetInHours = x.getTimezoneOffset();
    $.ajax({
        type: "POST",
        url: '<?php echo site_url('home/setUserTimeZone'); ?>',
        data: 'tz_offset='+timeZone,
        beforeSend : function(){
        },
        success: function(){
        },
        complete: function(){
        }
    });
</script>