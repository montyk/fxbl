<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php
            if (isset($pages[0]->title))
                echo $pages[0]->title;
            else
                echo $this->config->item('project_name');
            ?></title>

        <meta name="description" content="<?php if (isset($pages[0]->meta_description)) echo $pages[0]->meta_description; ?>" />
        <meta name="keywords" content="<?php if (isset($pages[0]->meta_keywords)) echo $pages[0]->meta_keywords; ?>" />
        <meta name="author" content="<?php echo $this->config->item('project_name') ?>" />
        <meta name="robots" content="index, follow" />
        <meta name="copyright" content="Ã‚Â© 2005- 2015  <?php echo $this->config->item('project_name') ?> All rights reserved. <?php echo $this->config->item('project_name') ?>.com" />
        <meta name="contact" content="<?php echo $this->config->item('contact_us_mail') ?>" />
        <meta name="google" content="notranslate" />

        <link rel="canonical" href="<?php echo current_url() ?>" />

        <!--Java script files-->
        <script type="text/javascript">
            var base_url = "<?= base_url() ?>";
        </script>

        <!-- **CSS - stylesheets NR** -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-for-pages.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-responsive-for-pages.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/pages.css" /> 
        <link rel="stylesheet" href="<?= base_url() ?>misc/css/marquee.css">
            <link rel="stylesheet" href="<?= base_url() ?>misc/css/new_design.css">
                <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/base.css" />  

                <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/style.css" />
                <link rel="shortcut icon" href="<?= base_url() ?>/misc/css/images/favicon.ico" type="image/x-icon" />
                <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300italic' rel='stylesheet' type='text/css'>
                    <link id="skin-css" rel="stylesheet" href="<?= base_url() ?>public/skins/skyblue/style.css" type="text/css" media="all"/>
                    <link id="layer-slider" rel="stylesheet"  href="<?= base_url() ?>public/css/layerslider.css" media="all" />

                    <!-- **Additional - stylesheets** -->
                    <link rel="stylesheet" href="<?= base_url() ?>public/css/meanmenu.css" type="text/css" media="all"/>
                    <link rel="stylesheet" href="<?= base_url() ?>public/css/prettyPhoto.css" type="text/css" media="screen"/>
                    <link rel="stylesheet" href="<?= base_url() ?>public/css/animations.css" type="text/css" media="all" />
                    <link rel="stylesheet" href="<?= base_url() ?>public/css/reset_r.css" type="text/css" media="all" />

                    <!-- **Font Awesome** -->
                    <link rel="stylesheet" href="<?= base_url() ?>public/css/font-awesome.min.css" type="text/css" />
                    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/responsive.css" />
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/shortcodes.css" />
                    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/style_r.css" />
                    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>  
                        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
                            <!-- CSS - stylesheets NR-->


                            <!--include javascript files by Nr-->
                            <!-- **jQuery** -->  
                            <script src="<?= base_url() ?>public/js_r/jquery-1.10.2.min.js" type="text/javascript"></script> 

                            <script type="text/javascript">
            jQuery = $.noConflict();
            var site_url ='<?php echo base_url();?>';
            //var CUR = [];
           // var CUR_Table = [];
                            </script>
                            <script src="<?= base_url() ?>public/js/notifications_1.js" type="text/javascript"></script> 
                            <script src="<?= base_url() ?>public/js_r/jquery-migrate.min.js"></script>
                            <script src="<?= base_url() ?>public/js_r/preloader.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/pace.min.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.tabs.min.js"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.tipTip.minified.js"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery-easing-1.3.js" type="text/javascript"></script>
                            <script type="text/javascript" src="<?= base_url() ?>public/js_r/jquery.nav.js"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.viewport.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.jcarousel.min.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/layerslider.transitions.js"></script> 
                            <script src="<?= base_url() ?>public/js_r/layerslider.kreaturamedia.jquery.js"></script> 
                            <script src="<?= base_url() ?>public/js_r/greensock.js"></script> 
                            <script data-cfasync="false" type="text/javascript">var lsjQuery = jQuery;</script><script data-cfasync="false" type="text/javascript"> lsjQuery(document).ready(function () {
                                    if (typeof lsjQuery.fn.layerSlider == "undefined") {
                                        lsShowNotice('layerslider_9', 'jquery');
                                    } else {
                                        lsjQuery("#layerslider_9").layerSlider({responsiveUnder: 1240, layersContainer: 1170, startInViewport: false, pauseOnHover: false, forceLoopNum: false, autoPlayVideos: false, skinsPath: '<?= base_url() ?>public/js_r/layerslider/skins/'})
                                    }
                                });</script>

                            <script src="<?= base_url() ?>public/js_r/jquery.isotope.min.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.prettyPhoto.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/masonry.pkgd.min.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/responsive-nav.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/jquery.meanmenu.min.js" type="text/javascript"></script>
                            <!-- **Sticky Nav** -->
                            <script src="<?= base_url() ?>public/js_r/jquery.sticky.js" type="text/javascript"></script>
                            <!-- **To Top** -->
                            <script src="<?= base_url() ?>public/js_r/jquery.ui.totop.min.js" type="text/javascript"></script>
                            <script type="text/javascript" src="<?= base_url() ?>public/js_r/twitter/jquery.tweet.min.js"></script>
                            <script type="text/javascript" src="<?= base_url() ?>public/js_r/jquery.validate.min.js"></script>
                            <script src="<?= base_url() ?>public/js_r/retina.js" type="text/javascript"></script>
                            <script src="<?= base_url() ?>public/js_r/custom.js" type="text/javascript"></script>  
                            <script type="text/javascript" src="<?php echo base_url(); ?>misc/widgets/js/bootstrap.js"></script>



                            <!--end javascript files Nr -->

                            <!--include javascript files  old-->
                            <!--<script type="text/javascript" src="<?= base_url() ?>misc/js/jquery.1.8.3.min.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>misc/widgets/js/bootstrap.js"></script>
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/jquery.validate.js"></script>  
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/ie6.js"></script>  
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/crossbrowser.js"></script>  
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/script.js"></script>
                            <script language="javascript" type="text/javascript" src="https://www.forexray.com/chat/client.php?key=L13789359EV2CAAF987MC11DCEA"></script>
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/marquee/jquery.marquee.pause.js"></script>
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/marquee/jquery.marquee.js"></script>
                            <script type="text/javascript" src="<?= base_url() ?>misc/js/jquery.cycle2.min.js"></script>
                            <!---include javascript files  old- END -->
                            <!--Styles sheets files old-->
                   <!--<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/misc/css/images/fav.png" />
                   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-for-pages.css" />
                   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-responsive-for-pages.css" />
                   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/base.css" />
                   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/style.css" />
                   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/nivo-slider.css" />
                   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/pages.css" />
                   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/dropdown.css" />
                   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/css3-buttons.css" />
                    <link rel="stylesheet" href="<?= base_url() ?>misc/css/marquee.css">
                   <link rel="stylesheet" href="<?= base_url() ?>misc/css/new_design.css">
                            <!--Styles sheets files old-->

                            <!--include javascript files -->

                            <script type="text/javascript">

                                jQuery(function () {
                                    jQuery('a.active').parents('li.first_level').find('a:first').addClass('active');

                                    jQuery('#language_select').live('change', function () {
                                        dataP = jQuery('#language_select').serialize();
                                        jQuery.ajax({
                                            url: '<?php echo site_url('home/set_user_language'); ?>',
                                            data: dataP,
                                            type: 'POST',
                                            beforeSend: function () {

                                            },
                                            success: function (dataR) {
                                                window.location = '<?php echo site_url(); ?>';
                                            }
                                        })
                                    })
                                });
                                /*sticky header*/
                                /*
                                 var stickyHeaderTop = $('#main_menu').offset().top;
                                 $(window).scroll(function () {
                                 if ($(window).scrollTop() > stickyHeaderTop) {
                                 $('#main_menu').addClass('fixed');
                                 $('#main_menu').css({position: 'fixed', top: '0px', left: "0px", right: "0"});
                                 } else {
                                 $('#main_menu').removeClass('fixed');
                                 $('#main_menu').css({position: 'static', top: '0px'});
                                 }
                                 });
                                 
                                 });
                                 */
                            </script>
                            <script type="text/javascript">
                                /*
                                 function DropDown(el) {
                                 this.dd = el;
                                 this.placeholder = this.dd.children('span');
                                 this.opts = this.dd.find('ul.dropdown > li');
                                 this.val = '';
                                 this.index = -1;
                                 this.initEvents();
                                 }
                                 DropDown.prototype = {
                                 initEvents: function () {
                                 var obj = this;
                                 
                                 obj.dd.on('click', function (event) {
                                 $(this).toggleClass('active');
                                 $(this).addClass('active');
                                 return false;
                                 });
                                 
                                 obj.opts.on('click', function () {
                                 var opt = $(this);
                                 obj.val = opt.text();
                                 obj.index = opt.index();
                                 obj.placeholder.text(obj.val);
                                 obj.dd.attr('class', 'wrapper-dropdown-3 f12 fl');
                                 obj.dd.addClass('lang_ico ' + opt.attr('rel'));
                                 submitLang(opt.attr('rel').replace('lang_ico_', ''));
                                 });
                                 },
                                 getValue: function () {
                                 return this.val;
                                 },
                                 getIndex: function () {
                                 return this.index;
                                 }
                                 }
                                 
                                 function submitLang(selVal) {
                                 $('#language_select').val(selVal);
                                 $('#language_select').trigger('change');
                                 }
                                 
                                 $(function () {
                                 
                                 // Build DropDown
                                 ddHTML = '<ul class="dropdown">';
                                 selectLangText = '';
                                 selectClass = '';
                                 $.each($('#language_select option'), function (k, v) {
                                 classNum = $(v).attr('value');
                                 label = $(v).text();
                                 ddHTML += '<li rel="lang_ico_' + classNum + '">\
                                 <a href="#"><i class="icon-envelope icon-large lang_ico lang_ico_' + classNum + ' "></i>' + label + '</a>\
                                 </li>';
                                 if ($(v).attr('value') == $('#language_select').val()) {
                                 selectLangText = label;
                                 selectClass = 'lang_ico_' + classNum;
                                 }
                                 });
                                 ddHTML += '</ul>';
                                 // console.log(selectLangText)
                                 // console.log(ddHTML);
                                 if (selectLangText != '') {
                                 $('#dd span:first').text(selectLangText);
                                 $('#dd').append(ddHTML).addClass(selectClass);
                                 }
                                 
                                 var dd = new DropDown($('#dd'));
                                 
                                 $(document).click(function () {
                                 // all dropdowns
                                 $('.wrapper-dropdown-3').removeClass('active');
                                 });
                                 
                                 });
                                 */
                            </script>

                            <?php
                            $url_1 = $this->uri->segment(1);
                            $url_2 = $this->uri->segment(2);
                            $url_3 = $this->uri->segment(3);
                            $url_4 = $this->uri->segment(4);
                            $url_string = current_url(); // site_url($this->uri->uri_string()); 
                            $userLangID = $this->session->userdata('user_language_id');
                            $userLanguageABBR = $this->session->userdata('user_language_abbr');

//**************************************************
                            if (!function_exists('buildSubMenu')) {

                                function buildSubMenu($menuArray, $url_string, $url_1, $url_2, $url_3, $url_4, $userLanguageABBR) {
                                    $html = '';
                                    $menuItemsPresent = FALSE;
                                    if (!empty($menuArray)) {
                                        $html.='<ul class="submenu">';
                                        foreach ($menuArray as $k => $v) {
                                            if (!empty($v['show_in_main_menu']) && $v['show_in_main_menu'] == '1') {
                                                $menuItemsPresent = TRUE;
                                                // $activeClass=''; if(substr($v['href'], -strlen($url_2)) == $url_2){ $activeClass='current active'; }else if($url_1!='en' && strpos($v['href'],$url_1)){ $activeClass='current active'; } 
                                                $activeClass = '';
                                                if ($v['href'] == $url_string) {
                                                    $activeClass = 'current active';
                                                } else if ($url_1 != $userLanguageABBR && strpos($v['href'], $url_1)) {
                                                    $activeClass = 'current active';
                                                }
                                                $html.='<li class=" ">' . anchor($v['href'], $v['label'], 'class=" ' . $activeClass . ' " ');
                                                if (!empty($v['submenu'])) {
                                                    $html.=buildSubMenu($v['submenu'], $url_string, $url_1, $url_2, $url_3, $url_4, $userLanguageABBR);
                                                }
                                                $html.='</li>';
                                            }
                                        }
                                        $html.='</ul>';
                                    }
                                    if ($menuItemsPresent)
                                        return $html;
                                    else
                                        return '';
                                }

                            }
                            ?>

                            </head>
                            <body>
                                <div class="loader-wrapper">
                                    <div id="loader-image"></div>
                                </div>
                                <!-- **Wrapper** -->
                                <div class="wrapper"> 
                                    <div class="inner-wrapper">

                                        <!-- **Top Bar** -->
                                        <div class="top-bar">
                                            <div class="container">

                                                <ul class="top-menu">
                                                    <li><a href="<?php echo site_url('news'); ?>"> <span class="fa fa-newspaper-o"></span> News</a></li>
                                                    <li><a href="<?php echo site_url('news/promotions'); ?>"> <span class="fa fa-calendar-o"></span> Events</a></li>
                                                    <li><a href=""> <span class="fa fa-phone"></span> +852 5805 3101</a></li>
                                                </ul>

                                                <div class="top-rightt pull-right">
                                                    <ul class="top-menu">
                                                        <li><a href="<?php echo site_url('login'); ?>"> <span class="fa fa-comments"></span> Client Support</a></li>
                                                        <li><a href="<?php echo site_url('login'); ?>"> <span class="fa fa-user"></span>Login</a></li>
                                                        <li><a href="<?php echo site_url('registration'); ?>"> <span class="fa fa-user"></span>Registration</a></li>
                                                        <li> <span class="fa fa-globe"></span> 
                                                            <select id="language_select" class="required" name="language_id" >
                                                                <!--                                                                <option value="germany">English</option>
                                                                                                                                <option value="germany">Germany</option>
                                                                                                                                <option value="spanish">Spanish</option>
                                                                                                                                <option value="arabic">Arabic</option>-->

<?php echo selectBox('', 'languages', 'id,name', ' status=1 ', $userLangID, ''); ?>
                                                            </select>
                                                            <i class="fa fa-angle-down"></i>

                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                    </div></div>

                                <?php
                                $langDetails = array('language_id' => $userLangID);
                                $menu = $this->adminmenus_model->get_menus($this->config->item('cache_menu'), $langDetails);
                                ?>
                                <div id="header-wrapper">
                                    <!-- **Header** -->
                                    <header class="header">
                                        <div class="container">

                                            <!-- **Logo - End** -->
                                            <div id="logo">
                                                <a href="index.html" title="ForexBull.com"> <img src="<?= base_url() ?>public/images/logo.png" alt="logo"/> </a>
                                            </div><!-- **Logo - End** -->

                                            <div id="menu-container">
                                                <!-- **Nav - Starts**-->
                                                <nav id="main-menu">
                                                    <div id="dt-menu-toggle" class="dt-menu-toggle">
                                                        Menu
                                                        <span class="dt-menu-toggle-icon"></span>
                                                    </div>
                                                    <ul class="menu">
                                                        <?php
                                                        foreach ($menu as $k => $v) {
                                                            if (!empty($v['show_in_main_menu']) && $v['show_in_main_menu'] == '1') {
                                                                $activeClass = '';
                                                                if (substr($v['href'], -strlen($url_2)) == $url_2) {
                                                                    $activeClass = 'current active';
                                                                } else if ($url_1 != $userLanguageABBR && strpos($v['href'], $url_1)) {
                                                                    $activeClass = 'current active';
                                                                }
                                                                if (($url_1 == '' || $url_1 == 'home') && $v['href'] == base_url()) {
                                                                    $activeClass = 'current active';
                                                                }
                                                                ?>
                                                                <li class="current_page_item menu-item-simple-parent" <?php echo $activeClass; ?> >
                                                                    <!--                                                        <a href="index.html">-->
                                                                    <?php echo anchor($v['href'], $v['label'], 'class="' . strtolower(strtok($v['label'], " ")) . '_ico ' . $activeClass . ' "'); ?>
                                                                    <?php
                                                                    if (!empty($v['submenu'])) {
                                                                        echo buildSubMenu($v['submenu'], $url_string, $url_1, $url_2, $url_3, $url_4, $userLanguageABBR);
                                                                    }
                                                                    ?>

                                                                    <!--                                                        </a>-->
                                                                </li>
    <?php }
}
?>
                                                        <!--                                                    <li class="menu-item-megamenu-parent megamenu-4-columns-group menu-item-depth-0"><a href="#">TRADING</a>
                                                        
                                                                                                            </li>
                                                                                                            <li class="menu-item-simple-parent"><a href="#">TRADE PLATFORMS</a>
                                                        
                                                                                                            </li>
                                                                                                            <li class="menu-item-megamenu-parent megamenu-4-columns-group menu-item-depth-0"><a href="#">PARTNERSHIPS</a>
                                                        
                                                                                                            </li>
                                                                                                            <li class="menu-item-megamenu-parent megamenu-5-columns-group menu-item-depth-0"><a href="#">TRADING TOOLS</a>
                                                                                                            </li>
                                                                                                            <li class="menu-item-simple-parent"><a href="#">LEARN TRADING</a>
                                                        
                                                                                                            </li>
                                                                                                            <li class="menu-item-simple-parent"><a href="#">SUPPORT</a>
                                                        
                                                                                                            </li>-->
                                                    </ul>
                                                </nav>
                                                <!-- **Nav - End**-->
                                            </div>

                                        </div>
                                    </header><!-- **Header - End** -->
                                </div>