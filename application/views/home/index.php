<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Liberty reserve, Libertyreserve, Buy Liberty reserve, Sell liberty reserve</title>
        <meta name="description" content="Buy Liberty reserve, Sell Liberty reserve and Exchange Liberty  Reserve" />
        <meta name="keywords" content="buy lr, sell lr, buy liberty reserve, sell liberty reserve,exchange digital currency,buylr,digital currency,InstaForex trading terms,rolclub,Hyip Forum,liberty reserve,libertyreserve,Exchange liberty reserve, exchange lr,exchange WebMoney, exchange pecunix,exchange alertpay,exchange solidtyrustpay,exchange okpay,credit card to liberty reserve,debit card to liberty reserve,paypal to liberty reserve,e currency" />
        <meta name="author" content="edealspot"/>
        <meta name="robots" content="index, follow" />



        <?php $this->load->view('common/general/links');  ?>


        <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url();  ?>public/css/nivo-slider.css" rel="stylesheet" type="text/css" />
<!--        <link href="<?php echo base_url();  ?>public/css/nivo-themes/default/default.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo base_url();  ?>public/css/nivo-themes/light/light.css" rel="stylesheet" type="text/css" />
            
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>
        <script type="text/javascript" src="<?php echo base_url();  ?>public/js/general/jquery.cycle.all.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();  ?>public/js/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
            window.onerror=function(e,a,b){
//                console.log(e);
//                console.log(b);
//                console.log(b);
                return true;
            }
            $(function(){
                // $('#gallery').cycle({speed: 4000, delay: 4000,fx:'scrollLeft', random: 0, requeueOnImageNotLoaded: true});
               /* $('#gallery_wrap').cycle({speed: 4000, delay: 4500,fx:'scrollLeft', random: 0, requeueOnImageNotLoaded: true});*/
               
               
               $('#slider').nivoSlider({
                   effect:"boxRainGrowReverse,fold",
                   pauseOnHover:true,
                   pauseTime:4000
               });
               
            });
        </script>
        <!--[if IE]>
        <style type="text/css" rel="stylesheet">
            #gallery{
                width: 907x !important;
                height: 297px !important;
            }
        </style>
        <![endif]-->
        <script type="text/javascript">
            $(function() {
                $("#gallery_wrap > div:gt(0)").hide();
                
                setInterval(function() { 
                    $('#gallery_wrap > div:first')
                    .fadeOut(1000)
                    .next()
                    .fadeIn(1000)
                    .end()
                    .appendTo('#gallery_wrap');
                },  12000);
                
            });
        </script>
        <style type="text/css">
            #gallery_wrap{
                display: none;
            }
            #gallery{
                max-width: 910px;
            }
            .app .galleryalignment{
                height: 310px;
            }
            .banner_det img{
                cursor: pointer;
            }
        </style>
    </head>

<body class="app">
  
    <?php $this->load->view('common/general/header');  ?>

	<!--	START WRAPPER DIV-->
	<div id="wrapper" class="content">
		<div class="inner">
		
		<?php $this->load->view('common/general/menu');  ?>
		
		<?php $this->load->view('common/general/alexa');  ?>
	
			<!--	START contentcontainer bottom DIV-->	
			 <div class="contentcontainer roundbottomfour">
                                <div style="padding: 1px 10px 0px;">      
                                    <?php $this->load->view('common/notifications');  ?>
                                </div> 
				 <div class="galleryalignment" >
                                    <?php  // echo '<pre>'; print_r($banner_news); echo '</pre>';  ?>
                                    <div id="gallery" class="galleryalign">
                                        <div class="slider-wrapper theme-light">
                                            <div class="ribbon"></div>
                                            <div id="slider" class="nivoSlider">
                                        <?php if(!empty($banner_news)){ foreach($banner_news as $k=>$v){ ?>
                                            <a href="<?php echo site_url('news/full_story/'.$v->id);  ?>">
                                                <img src="<?php echo base_url(),$v->attachment;  ?>" alt="Forexray - <?php echo strip_tags(filterStringDecode($v->heading));  ?>" title="<?php echo substr(strip_tags(filterStringDecode($v->description)),0,280);  ?>... " />
                                            </a>
                                        <?php } } ?>
                                            </div>
                                        </div>
                                        <?php if(!empty($banner_news)){ foreach($banner_news as $k=>$v){ ?>
                                        <div id="slider-caption-<?php echo $k;  ?>" class="nivo-html-caption"><?php echo filterStringDecode($v->description);  ?></div>
                                        <?php } } ?>
                                    </div>
                                    <div class="gallery_content_ca" id="gallery_wrap">
                                        <?php if(!empty($banner_news)){ foreach($banner_news as $k=>$v){ ?>
                                        <div class="gallery_content">
                                            <div class="gallery_slide">
                                                <h2><?php echo $v->heading;  ?></h2>
                                                <div>
                                                    <?php echo filterStringDecode($v->description);  ?>
                                                </div>
                                                <div class="fr r_more brad4"><a href="<?php echo site_url('news/full_story/'.$v->id);  ?>">Read more</a></div>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                        <?php for($i=6; $i<=5; $i++){ ?>
                                        <div class="gallery_content">
                                            <div class="gallery_slide">
                                                    <h2>Welcome to <?php echo $i; ?></h2>
                                                    <p>Welcome to <?php echo $this->config->item('project_name') ?></p>
                                                    <div class="fr r_more brad4"><a href="#">Read more</a></div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
				</div>

				 
				<!--	START contentelement bottom DIV-->		
			 	 <div class="contentelements ovrclr">
					<script language="javascript" type="text/javascript">
					  function display_data(){
						  var currency = document.getElementById("currency").value;
						  var currency_from = document.getElementById("currency_from").value;
						  var currency_to = document.getElementById("currency_to").value;
						  if(currency==""){
							  alert("Please enter currency");
							  document.getElementById("currency").focus;
							  return true;
						  }
						  if(currency_from==""){
							  alert("Please enter currency from");
							  document.getElementById("currency_from").focus;
							  return true;
						  }
						  if(currency_to==""){
							  alert("Please enter currency to");
							  document.getElementById("currency_to").focus;
							  return true;
						  }
						  $.ajax({
							  type: "POST",
							  url: "<?php echo base_url();  ?>converter",
							  data: "currency="+currency+"&currency_from="+currency_from+"&currency_to="+currency_to,
							  success: function(msg){
								  $("#state_data").html('<h2><b>'+msg+'</b></h2>');
							  }
						  });
					  }
					
					</script>
					
					<script language="javascript" type="text/javascript">
					  $(document).ready(function(){
						$("#loginform").validate({
						  rules: {
							currency: {
							  required: true,
							  number: true
							},
							currency_from: "required",
							currency_to: "required"
						  },
						  messages: {
							currency: "Please enter valid number only",
							currency_from: "Please select currency from",
							currency_to: "Please select currency to"
						  }
						});
					  });
					</script>
					
					<div class="takecareearning fl borderradiusfour">
						
						<div class="font_myraid">
							<div class="companyprof fl">
								<h2>Welcome to EDEALSPOT exchange! </h2>
								<div class="img_exchanger">
                                                                    <img style="" src="<?php echo base_url();  ?>public/images/money_img.png" alt="Money_exchanger" class="brad4 fl"/>
                                                                    <p>
                                                                        Welcome to <strong><span style="color:#fca810;"><span>Edeal</span></span><span style="color:#3cc2e7;">Spot.com</span></strong>, a leading e-currency exchange service. Digital currency transaction is our forte and we make it fast, easy and safe for our customers to transfer money, exchange, buy and sell currency.
                                                                    </p>
                                                                    <p>
                                                                        Through our expertise and global reach, we have helped people across the world enjoy hassle-free, smooth e-currency transactions...
                                                                    </p>

                                                                    <div class="fr r_more brad4"><a href="<?php echo site_url("pages/homepage "); ?>">Read more</a></div>
                                                                    <div class="clear"></div>
								</div>	
							</div>
							<div class="testimonial fl">
								<h2><b>TESTIMONIAL</b></h2>
                                                                <p>“<?php echo ((!empty($testmonial))?$testmonial[0]->message:'Loading...');  ?>�?</p>
                                                                <div class="tip">&nbsp;</div>
								<div><?php echo ((!empty($testmonial))?$testmonial[0]->name:'Loading...');  ?></div>
                                                                <div class="fr r_more brad4"><a href="<?php echo site_url('testimonials')  ?>">View All</a></div>
							</div>
							<div class="clear"></div>
						</div>
						
						<div  class="font_myraid">
						
						<div class="banner fl first">
							<div class="banner_hdr fb">Liberty Reserve<img src="<?php echo base_url();  ?>public/images/spacer.gif" alt="Reserve" class="l_ico" /></div>
							<div class="banner_det"><p>The internet has revolutionized the way we live our lives. From business to shopping, everything can be carried out within a matter of a few clicks. Liberty Reserve is a money transfer service that allows you to purchase online as well as conduct sales.</p></div>
							<div class="fr r_more brad4"><a href="<?php echo site_url("pages/What-is-Liberty-Reserve"); ?>">Read more</a></div>
							<div class="button_bg">&nbsp;</div>
						</div>
						
						<div class="banner fl">
							<div class="banner_hdr fb">Digital Currency<img src="<?php echo base_url();  ?>public/images/spacer.gif" alt="Reserve" class="d_ico"/></div>
							<div class="banner_det">
							<ul>
								<li>
                                                                    <span class="fl">Perfect Money</span>
                                                                    <img src="<?php echo base_url();  ?>public/images/perfect_money.png" alt="Perfect Money" class="fr" onclick="window.open('<?php echo site_url('en/Perfect-Money');  ?>','_blank');" />
                                                                    <div class="clear"></div>
                                                                </li>
								<li>
                                                                    <span class="fl">Okpay</span>
                                                                    <img src="<?php echo base_url();  ?>public/images/ok_pay.png" alt="Ok Pay" class="fr" onclick="window.open('<?php echo site_url('en/Okpay');  ?>','_blank');" />
                                                                    <div class="clear"></div>
                                                                </li>
								<li>
                                                                    <span class="fl">Eurogoldcash</span>
                                                                    <img src="<?php echo base_url();  ?>public/images/eurogold.png" alt="Euro Gold" class="fr" onclick="window.open('<?php echo site_url('en/Eurogold-cash');  ?>','_blank');" />
                                                                    <div class="clear"></div>
                                                                </li>
								<li>
                                                                    <span class="fl">Cgold</span>
                                                                    <img src="<?php echo base_url();  ?>public/images/cgold.png" alt="cgold" class="fr" onclick="window.open('<?php echo site_url('en/C-gold');  ?>','_blank');" />
                                                                    <div class="clear"></div>
                                                                </li>
								<li>
                                                                    <span class="fl">Cosmic Pay</span>
                                                                    <img src="<?php echo base_url();  ?>public/images/cosmic.png" alt="cosmic pay" class="fr" onclick="window.open('<?php echo site_url('en/Cosmic-pay');  ?>','_blank');" />
                                                                    <div class="clear"></div>
                                                                </li>
							</ul>
							</div>
							<div class="fr r_more brad4"><a href="#">Read more</a></div>							
							<div class="button_bg">&nbsp;</div>
						</div>
						
						<div class="banner fl last">
							<div class="banner_hdr fb">News<img src="<?php echo base_url();  ?>public/images/spacer.gif" alt="Reserve" class="n_ico"/></div>

                                                        <?php
                                                        if(!empty($news)){
                                                            foreach($news as $k=>$v){
                                                            ?>
                                                        <div class="banner_det">
                                                            <p><?php echo substr(filterStringDecode($v->description),0,100);  ?> ...</p>
							</div>	
							<div class="fr r_more brad4"><a href="<?php echo site_url('news/full_story/'.$v->id);  ?>">Read more</a></div>
							<div class='clear'></div>

                                                        <?php }
                                                        }  ?>

							<div class="button_bg">&nbsp;</div>
							<div class="clear"></div>
						</div>
                                                <div class="clear"></div>
						</div>					
						
				        <script type="text/javascript" src="<?php echo base_url();  ?>public/js/jflow.js"></script>
                                        
                                        <script type="text/javascript">
                                            $(function($) {
//                                                    $("div#controller").jFlow({
//                                                            slides: "#slides",
//                                                            width: "4525px",
//                                                            height: "100px"
//                                                    });
//                                                $('.fadingBox:first').show();
//                                                totalFadeBoxes=$('.fadingBox').length;
//                                                presentFadeBox=0;
//                                                $('.jFlowPrev').live('click',function(){
//                                                    $('.fadingBox:visible').fadeOut('fast',function(){
//                                                        presentFadeBox++;
//                                                        $('.fadingBox:eq('+presentFadeBox+')').fadeIn('fast');
//                                                        if(presentFadeBox>=totalFadeBoxes){ presentFadeBox=0; }
//                                                    });
//                                                });
//                                                $('.jFlowNext').live('click',function(){
//                                                    presentFadeBox--;
//                                                    $('.fadingBox:eq('+presentFadeBox+')').fadeIn('fast');
//                                                    if(presentFadeBox>=totalFadeBoxes){ presentFadeBox=0; }
//                                                });

                                            });
                                        </script>
                                        

                                        <div class="partners_hdr"><h1>Our Partners</h1></div>

                                        <!--

                                        <div id="controller" class="hidden">
                                                <span class="jFlowControl">No 1</span>
                                                <span class="jFlowControl">No 2</span>
                                        </div>

                                        <div id="prevNext">
                                                <img src="<?php echo base_url();  ?>public/images/spacer.gif" alt="Previous Tab" class="jFlowPrev" />
                                                <img src="<?php echo base_url();  ?>public/images/spacer.gif" alt="Next Tab" class="jFlowNext" />
                                        </div>

                                        <div class="partners fadeWrapper" id="slides">

                                            <div class="fadingBox hide">
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner1.png" class="pimg1" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner2.png" class="pimg2" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner3.png" class="pimg3" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner4.png" class="pimg4" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner5.png" class="pimg5" /></a>
                                            </div>

                                            <div class="fadingBox hide">
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner6.png" class="pimg1" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner7.png" class="pimg2" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner8.png" class="pimg3" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner9.png" class="pimg4" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner10.png" class="pimg5" /></a>
                                            </div>

                                            <div class="fadingBox hide">
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner11.png" class="pimg1" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner12.png" class="pimg2" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner13.png" class="pimg3" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner14.png" class="pimg4" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner15.png" class="pimg5" /></a>
                                            </div>

                                            <div class="fadingBox hide">
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner16.png" class="pimg1" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner17.png" class="pimg2" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner18.png" class="pimg3" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner19.png" class="pimg4" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner20.png" class="pimg5" /></a>
                                            </div>

                                            <div class="fadingBox hide">
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner21.png" class="pimg1" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner22.png" class="pimg2" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner23.png" class="pimg3" /></a>
                                                    <a href="#"><img src="<?php echo base_url();  ?>public/images/logos/partner24.png" class="pimg4" /></a>

                                            </div>

                                        </div>

                                        -->

                                        <div class="circular_wrap" style="position: relative; padding-bottom: 40px;">
                                        <iframe src="<?php echo site_url('home/iframe_carousel');  ?>" height="380px" width="905px" scrolling="no" frameborder=0 style="border:none; overflow:visible; "></iframe>
                                        </div>
                                 </div>
                          </div>
                        <!--	end contentelement  DIV-->
    		 </div>
			<!--	end contentcontainer bottom DIV-->			 
		</div>
	</div>
	<!-- end div#wrapper -->
	
	<!--	Start footer content-->
	<?php $this->load->view('common/general/footer');  ?>
	<!--end footer content-->
	
</body>

</html>



