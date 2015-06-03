<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php if(isset($pages[0]->title)) echo $pages[0]->title; else echo 'FOREXRAY'; ?></title>
<meta name="description" content="<?php if(isset($pages[0]->meta_description)) echo $pages[0]->meta_description;?>" />
<meta name="keywords" content="<?php if(isset($pages[0]->meta_keywords)) echo $pages[0]->meta_keywords;?>" />
<meta name="author" content="FOREXRAY" />
<meta name="robots" content="index, follow" />

<!--Java script files--->
<script type="text/javascript">
	var base_url="<?=base_url()?>";
</script>

<!--Styles sheets files-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/misc/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/misc/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/misc/css/nivo-slider.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/misc/css/pages.css" />



<!--include javascript files -->
<script type="text/javascript" src="<?=base_url()?>misc/js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>misc/js/jquery.validate.js"></script>  
<script type="text/javascript" src="<?=base_url()?>misc/js/ie6.js"></script>  
<script type="text/javascript" src="<?=base_url()?>misc/js/crossbrowser.js"></script>  
<script type="text/javascript" src="<?=base_url()?>misc/js/script.js"></script>

<?php 
    $url_1=$this->uri->segment(1); 
    $url_2=$this->uri->segment(2); 
    $url_3=$this->uri->segment(3); 
    $url_4=$this->uri->segment(4); 
	
?>

</head>
<body class="app">
  <div class="ca">	
	<div class="header">
		<div class="sub_hdr pg_width pos_rel">
			<img src="<?= base_url() ?>misc/css/images/logo.png" alt="Forexray" class="logo" />
			<div class="hdr_links pos_ab">
				<div class="din_med">
					<a class="h_icon my_acc f12">My Account</a>
					<a class="h_icon lang f12">English<span class="arr_dwn"></span></a>
					<a class="h_icon chat f12">Chat</a>
					<a class="h_icon mail f12">Mail</a>
				</div>
				<div class="mt18">
					<a class="ph_no fl economica_reg f24">+852 5808 3101</a>
					<a class="create_acc fl h_btn fwb f12 tahoma_bold">Create Account</a>
					<div class="cl"></div>
				</div>	
			</div>
		</div>	<div class="clear"></div>

	</div>	
	
<?php $active_link; ?>

	  <?php
	  
	  
	  $list = array(
					array('href'=>'/','label'=>'HOME'),
					array('href'=>'pages/Trading','label'=>'TRADING','submenus'=>array(
                                                                                                array('href'=>'pages/trading','label'=>'Account Types'),array('href'=>'pages/Trading-account-forms','label'=>'Account Forms'),array('href'=>'pages/Forex-Islamic','label'=>'Forex Islamic'),array('href'=>'pages/Account-Funding','label'=>'Account Funding'),array('href'=>'pages/Funds-Withdrawal','label'=>'Funds Withdrawal')
                                                                                                )
                                        ),
					array('href'=>'pages/Spreads','label'=>'TRADE CONDITIONS','submenus'=>array(
                                                                                                array('href'=>'pages/Spreads','label'=>'Spreads'),array('href'=>'pages/Overnight-Positions','label'=>'Overnight Positions'),array('href'=>'pages/Margin-and-Leverage','label'=>'Margin-and-Leverage'),array('href'=>'pages/ExecutionMethodology','label'=>'Execution Methodology'),array('href'=>'pages/Advantages','label'=>'Advantages')
                                                                                                )
                                        ),					
					array('href'=>'pages/Open-Demo', 'label'=>'OPEN DEMO'),
					array('href'=>'pages/open-Live', 'label'=>'OPEN LIVE'),
					array('href'=>'pages/Download-MetaTrader-4', 'label'=>'TRADING SOFTWARE','submenus'=>array(
                                                                                                array('href'=>'pages/Download-MetaTrader-4','label'=>'Download MetaTrader 4'),array('href'=>'pages/About-Metatrader-4','label'=>'About MetaTrader 4'),array('href'=>'pages/MetaTrader-4-User-Guide','label'=>'MetaTrader 4 User Guide'),array('href'=>'pages/Automated-Trading','label'=>'Automated Trading'),array('href'=>'pages/Multiterminal-MAM','label'=>'Multiterminal MAM')
                                                                                                )),					
					array('href'=>'pages/education', 'label'=>'EDUCATION','submenus'=>array(
                                                                                                array('href'=>'pages/education','label'=>'Forex Overview'),array('href'=>'pages/Forex-Articles','label'=>'Forex Article'),array('href'=>'pages/Forex-Tutorials','label'=>'Forex Tutorial'),array('href'=>'pages/Forex-Trading-Tips','label'=>'Forex Trading Tips')
                                                                                                )),
					array('href'=>'pages/support', 'label'=>'SUPPORTS','submenus'=>array(
                                                                                                array('href'=>'pages/live-chat','label'=>'Live chat'),array('href'=>'pages/FAQ','label'=>'FAQ'),array('href'=>'pages/FAQ','label'=>'FAQ')
                                                                                                ))
				  );
                        
			$list_html = "";
                        for($i=0; $i<count($list); $i++){
                            $sub_list_html=''; $activate_main_menu=FALSE;
                            if(!empty($list[$i]['href'])){
                                $sub_list_html.='<ul class="submenu">';
                                if(!empty($list[$i]['submenus']))
                                foreach($list[$i]['submenus'] as $sub_k=>$sub_v){
                                    $sub_list_html .= "<li class=' ".(( ($url_1.'/'.$url_2==$sub_v['href']) )?"active":"")."'><a href='".site_url($sub_v['href'])."' class=' ".(( ($url_1.'/'.$url_2==$sub_v['href']) )?"active":"")."'>".$sub_v['label']."</a></li>";
									if($url_1.'/'.$url_2==$sub_v['href']){
	                                    $activate_main_menu=TRUE;
									}
                                }
                                $sub_list_html.='</ul>';
                            }

                            $list_html .= "<li class='fl ".(( $activate_main_menu || ($url_1.'/'.$url_2==$list[$i]['href']))?"active":"")."'><a href='".site_url($list[$i]['href'])."' class=' ".(( $activate_main_menu || ($url_1.'/'.$url_2==$list[$i]['href']))?"active":"")."'>".$list[$i]['label']."</a><span>&nbsp;</span>";
                            $list_html.=$sub_list_html;
                            $list_html.='</li>';
                        }
	  
	  
	  
	  /*
	  
			$list = array(
					array('href'=>'/','label'=>'HOME'),
					array('href'=>'pages/Trading','label'=>'TRADING'),
					array('href'=>'pages/Spreads', 'label'=>'TRADE CONDITIONS'),
					array('href'=>'pages/Open-Demo', 'label'=>'OPEN DEMO'),
					array('href'=>'pages/open-Live', 'label'=>'OPEN LIVE'),
					array('href'=>'pages/tradingsoftware', 'label'=>'TRADING SOFTWARE'),					
					array('href'=>'pages/education', 'label'=>'EDUCATION'),
					array('href'=>'pages/support', 'label'=>'SUPPORTS')
				  );
				  
			$subMenuList=array(
                            'pages/Trading-account-forms'=>'pages/Trading',
							'pages/Forex-Islamic'=>'pages/Trading',
							'pages/Account-Funding'=>'pages/Trading',							
							'pages/Funds-Withdrawal'=>'pages/Trading',														
							
							'pages/Download-MetaTrader-4'=>'pages/tradingsoftware',														
							'pages/About-Metatrader-4'=>'pages/tradingsoftware',																					
							'pages/MetaTrader-4-User-Guide'=>'pages/tradingsoftware',																					
							'pages/Automated-Trading'=>'pages/tradingsoftware',																					
							'pages/Multiterminal-MAM'=>'pages/tradingsoftware',																					

							'pages/Overnight-Positions'=>'pages/Spreads',														
							'pages/Margin-and-Leverage'=>'pages/Spreads',														
							'pages/ExecutionMethodology'=>'pages/Spreads',														
							'pages/Advantages'=>'pages/Spreads',														
							
							'pages/Forex-Articles'=>'pages/education',														
							'pages/Forex-Tutorials'=>'pages/education',														
							'pages/Forex-Trading-Tips'=>'pages/education',														
							
							'pages/FAQ'=>'pages/support',														
							
                            'pages/XYZ'=>'pages/Trading'
                        );
			
						
			$list_html = "";
			  for($i=0; $i<count($list); $i++){
				$list_html .= "<li class='fl ".(((!empty($subMenuList[$url_1.'/'.$url_2]) && $subMenuList[$url_1.'/'.$url_2]==$list[$i]['href']) || ($url_1.'/'.$url_2==$list[$i]['href']))?"active":"")."'><a href='".site_url($list[$i]['href'])."' class=' ".(((!empty($subMenuList[$url_1.'/'.$url_2]) && $subMenuList[$url_1.'/'.$url_2]==$list[$i]['href']) || ($url_1.'/'.$url_2==$list[$i]['href']))?"active":"")."'>".$list[$i]['label']."</a><span>&nbsp;</span></li>";
			  } */
			  $header_nav = "<ul class='main_menu pg_width'><li class='fl'><span>&nbsp;</span></li>".$list_html."<li class='fl search_fld'><input type='text' value='' name='search' class='search'></li><li class='cl'></li></ul>";
			?>
	  <div class="nav din_med f12">
		 <?php echo $header_nav; ?>
		</div>	  
