<!doctype html>
<html lang="en">

    <head>
<!--        <meta content="text/html; charset=UTF-8" http-equiv="content-type">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <meta name="google" content="notranslate" />
        
        <title>FOREXRAY User Panel</title>

        <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/misc/css/images/fav.png" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/layout.css" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        
        <script type="text/javascript">
            var base_url='<?php echo base_url();  ?>',
            site_url='<?php echo site_url();  ?>';
        </script>

        <script src="<?php echo base_url(); ?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
        <!--<link href="js/jqGrid-4.3.1/src/css/ui/jquery-ui-1.8.css" rel="stylesheet"  />-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
        <link href="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
        <script src="<?php echo base_url(); ?>public/js/hideshow.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.equalHeight.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.blockUI.js"></script>
<!--		<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jnotify.js"></script>-->
        <?php if($this->uri->segment(1)!='admintestimonials'){  ?>
        <script src="<?php echo base_url(); ?>public/js/validate.js" type="text/javascript"></script> <!--  GRID PROBLEM IF INCLUDED-->
        <?php }  ?>
