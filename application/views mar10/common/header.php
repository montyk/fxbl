<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <title><?php if (isset($pages[0]->title)) echo $pages[0]->title; else echo 'FOREXRAY'; ?></title>
        
        <meta name="description" content="<?php if (isset($pages[0]->meta_description)) echo $pages[0]->meta_description; ?>" />
        <meta name="keywords" content="<?php if (isset($pages[0]->meta_keywords)) echo $pages[0]->meta_keywords; ?>" />
        <meta name="author" content="FOREXRAY" />
        <meta name="robots" content="index, follow" />
        
        <meta name="copyright" content="Ã‚Â© 2005- 2013  Forexray All rights reserved. forexray.com" />
        <meta name="contact" content="contact_us@forexray.com" />
        <meta name="google" content="notranslate" />
        
        <link rel="canonical" href="http://www.forexray.com/" />
        
        <!--Java script files-->
        <script type="text/javascript">
            var base_url="<?= base_url() ?>";
        </script>
    
        <!--Styles sheets files-->
        <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/misc/css/images/fav.png" />
    
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-for-pages.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-responsive-for-pages.css" />
        
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/base.css" />

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/nivo-slider.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/pages.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/dropdown.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/misc/css/css3-buttons.css" />

    
        
        
        <!--include javascript files -->
        <script type="text/javascript" src="<?= base_url() ?>misc/js/jquery.1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>misc/widgets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>misc/js/jquery.validate.js"></script>  
        <script type="text/javascript" src="<?= base_url() ?>misc/js/ie6.js"></script>  
        <script type="text/javascript" src="<?= base_url() ?>misc/js/crossbrowser.js"></script>  
        <script type="text/javascript" src="<?= base_url() ?>misc/js/script.js"></script>
        
		<script language="javascript" type="text/javascript" src="https://www.forexray.com/chat/client.php?key=L13789359EV2CAAF987MC11DCEA"></script>
		
		
		<!--include css files -->
<link rel="stylesheet" href="<?= base_url() ?>misc/css/marquee.css">

<!--include javascript files -->

<script type="text/javascript" src="<?= base_url() ?>misc/js/marquee/jquery.marquee.pause.js"></script>
<script type="text/javascript" src="<?= base_url() ?>misc/js/marquee/jquery.marquee.js"></script>




        
        <script type="text/javascript">
            $(function(){
                $('a.active').parents('li.first_level').find('a:first').addClass('active');
                
                $('#language_select').live('change',function(){
                    dataP=$('#language_select').serialize();
                    $.ajax({
                        url:'<?php echo site_url('home/set_user_language'); ?>',
                        data:dataP,
                        type:'POST',
                        beforeSend:function(){
                            
                        },
                        success:function(dataR){
                            window.location='<?php echo site_url(); ?>';
                        }
                    })
                });
                
                /*sticky header*/
                var stickyHeaderTop = $('#main_menu').offset().top;
                $(window).scroll(function(){
                    if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#main_menu').addClass('fixed');
                        $('#main_menu').css({position: 'fixed', top: '0px', left: "0px", right: "0"});
                    } else {
                        $('#main_menu').removeClass('fixed');
                        $('#main_menu').css({position: 'static', top: '0px'});
                    }
                });
                
                /*
                $('#main_menu ul li.first_level').each(function(k,v){
                    if($(this).find('ul.submenu').length!=0){
                        $(this).find('a:first').attr('href','#');
                    }
                });
                */
            });
        </script>
        <script type="text/javascript">
            
            function DropDown(el) {
                this.dd = el;
                this.placeholder = this.dd.children('span');
                this.opts = this.dd.find('ul.dropdown > li');
                this.val = '';
                this.index = -1;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents : function() {
                    var obj = this;
                    
                    obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        $(this).addClass('active');
                        return false;
                    });
                    
                    obj.opts.on('click',function(){
                        var opt = $(this);
                        obj.val = opt.text();
                        obj.index = opt.index();
                        obj.placeholder.text(obj.val);
                        obj.dd.attr('class','wrapper-dropdown-3 f12 fl');
                        obj.dd.addClass('lang_ico '+opt.attr('rel'));
                        submitLang(opt.attr('rel').replace('lang_ico_',''));
                    });
                },
                getValue : function() {
                    return this.val;
                },
                getIndex : function() {
                    return this.index;
                }
            }
            
            function submitLang(selVal){
                $('#language_select').val(selVal);
                $('#language_select').trigger('change');
            }
            
            $(function() {
                
                // Build DropDown
                ddHTML='<ul class="dropdown">';
                selectLangText=''; selectClass='';
                $.each($('#language_select option'),function(k,v){
                    classNum=$(v).attr('value');
                    label=$(v).text();
                    ddHTML+='<li rel="lang_ico_'+classNum+'">\
                                        <a href="#"><i class="icon-envelope icon-large lang_ico lang_ico_'+classNum+' "></i>'+label+'</a>\
                                    </li>';
                    if($(v).attr('value')==$('#language_select').val()){ selectLangText=label; selectClass='lang_ico_'+classNum; }
                });
                ddHTML+='</ul>';
                // console.log(selectLangText)
                // console.log(ddHTML);
                if(selectLangText!=''){
                    $('#dd span:first').text(selectLangText);
                    $('#dd').append(ddHTML).addClass(selectClass);
                }
                
                var dd = new DropDown( $('#dd') );
                
                $(document).click(function() {
                    // all dropdowns
                    $('.wrapper-dropdown-3').removeClass('active');
                });
                
            });
            
        </script>
    
        <?php
        $url_1 = $this->uri->segment(1);
        $url_2 = $this->uri->segment(2);
        $url_3 = $this->uri->segment(3);
        $url_4 = $this->uri->segment(4);
        $url_string = current_url(); // site_url($this->uri->uri_string()); 
        $userLangID = $this->session->userdata('user_language_id');
        $userLanguageABBR = $this->session->userdata('user_language_abbr');
        ?>
    
    </head>
<body class="app">
     <?php $this->load->view('common/analyticstracking');?>  
  <div class="ca">	
    <div class="header">
        <div class="sub_hdr pg_width pos_rel">
                <a href="<?php echo site_url(); ?>"><img src="<?= base_url() ?>misc/css/images/logo.png" alt="Forexray" class="logo" /></a>
                <div class="hdr_links pos_ab">
                        <div class="din_med">
                            <a class="h_icon calendar f12 fl" href="javascript:void(0);"><?php echo gmdate("d F Y", time()); ?></a>
                            <a class="h_icon my_acc f12 fl" href="<?php echo site_url('login'); ?>">Login</a>
<!--                            <a class="h_icon register f12 fl" href="<?php echo site_url('registration'); ?>">Register</a>-->
                            <a class="h_icon lang f12 fl hide">
                                <span class="arr_dwn"></span>
                                <select id="language_select" class="required" name="language_id" title="Please choose a Language" style="width: 80px;margin: 0;">
                                    <?php echo selectBox('', 'languages', 'id,name', ' status=1 ', $userLangID, ''); ?>
                                </select>
                            </a>
                            <!--<a id='liveadmin' class=" f12 fl hide">Chat</a>-->
                            <a class="h_icon forum f12 fl" href="<?php echo site_url('forum'); ?>">Forum</a>
                            <div id="dd" class="wrapper-dropdown-3 lang_ico f12 fl" tabindex="1">
                                <span>English</span>
                            </div>
                            
                            <a href="<?php echo site_url('en/Support'); ?>" class="h_icon mail f12 fl">Mail</a>
                            <div class="cl"></div>
                        </div>
                        <div class="mt18">
                            <!--<a class="ph_no fl economica_reg f24">+64 9887 3380</a>-->
                            <a class="create_acc fl h_btn fwb f12 tahoma_bold hide">Create Account</a>
                            <span class="fl search_fld"><input type="text" value="" name="search" class="search"></span>
                            <div class="cl"></div>
                        </div>	
                </div>
        </div>	
        <div class="clear"></div>
    </div>	
	
      <?php 
        
        if(!function_exists('buildSubMenu')){
            function buildSubMenu($menuArray,$url_string,$url_1,$url_2,$url_3,$url_4,$userLanguageABBR){
                $html='';$menuItemsPresent=FALSE;
                if(!empty($menuArray)){
                    $html.='<ul class="submenu">';
                        foreach($menuArray as $k=>$v){
                            if(!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1'){
                                $menuItemsPresent=TRUE;
                                // $activeClass=''; if(substr($v['href'], -strlen($url_2)) == $url_2){ $activeClass='current active'; }else if($url_1!='en' && strpos($v['href'],$url_1)){ $activeClass='current active'; } 
                                $activeClass=''; if($v['href']==$url_string){ $activeClass='current active'; }else if($url_1!=$userLanguageABBR && strpos($v['href'],$url_1)){ $activeClass='current active'; } 
                                $html.='<li class=" ">'.anchor($v['href'],$v['label'],'class=" '.$activeClass.' " ');
                                if(!empty($v['submenu'])){
                                    $html.=buildSubMenu($v['submenu'],$url_string,$url_1,$url_2,$url_3,$url_4,$userLanguageABBR);
                                }
                                $html.='</li>';
                            }
                        }
                    $html.='</ul>';
                }
                if($menuItemsPresent)
                    return $html;
                else
                    return '';
            }
        }

    ?>
      
    <div class="nav din_med f12" id="main_menu">
        <ul class="main_menu pg_width">

            <?php 
                $langDetails=array('language_id'=>$userLangID);
                $menus=$this->adminmenus_model->get_menus($this->config->item('cache_menu'),$langDetails);  
            ?>
            <?php // echo '<pre>'; print_r($menus); echo '</pre>'; ?>
            <?php if(!empty($menus)){  ?>
                <?php foreach($menus as $k=>$v){  ?>
                    <?php if(!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1'){ ?>
                    <?php $activeClass=''; if(substr($v['href'], -strlen($url_2)) == $url_2){ $activeClass='current active'; }else if($url_1!=$userLanguageABBR && strpos($v['href'],$url_1)){ $activeClass='current active'; } ?>
                    <?php /* Special Case - For Home */ if(($url_1=='' || $url_1=='home') && $v['href']==base_url()){ $activeClass='current active'; } ?>
                    <li class="fl <?php echo $activeClass; ?> first_level">
                        <?php echo anchor($v['href'],$v['label'],'class="'.strtolower(strtok($v['label']," ")).'_ico '.$activeClass.' "'); // $v['href']  ?>
                        <!-- <span>&nbsp;</span>-->
                        <?php if(!empty($v['submenu'])){ echo buildSubMenu($v['submenu'],$url_string,$url_1,$url_2,$url_3,$url_4,$userLanguageABBR); }  ?>
                    </li>
                    <?php }  ?>
                <?php }  ?>
            <?php }  ?>
            <li class="cl"></li>
        </ul>
    </div>
