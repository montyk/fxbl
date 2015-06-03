<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?php if(isset($pages[0]->title)) echo $pages[0]->title;?></title>
        <meta name="description" content="<?php if(isset($pages[0]->meta_description)) echo $pages[0]->meta_description;?>" />
        <meta name="keywords" content="<?php if(isset($pages[0]->meta_keywords)) echo $pages[0]->meta_keywords;?>" />
        <meta name="author" content="edealspot" />
        <meta name="robots" content="index, follow" />



            <!--<link href="<?php echo base_url();  ?>default.css" rel="stylesheet" type="text/css" />-->
            
            <?php $this->load->view('common/general/links');  ?>


            <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css"/>
            <link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>

            <link href="<?php echo base_url();  ?>public/css/general/jquery.tooltip.css" type="text/css"  rel="stylesheet"/>
            <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" type="text/css"  rel="stylesheet"/>
            <script type="text/javascript" src="<?php echo base_url();  ?>/public/js/general/jquery.cluetip.js"></script>

            <script type="text/javascript" rel="javascript">

                $(document).ready(function() {

                    $('.applyCluetip').cluetip({
                        cluetipClass:'rounded',
                        dropShadow:false,
                        splitTitle: '|',
                        width: '200px',
                        //delayedClose:4000,
                        sticky: false,
                        local:true,
                        cursor:false,
                        arrows:true,
                        fx: {
                            open:       'show', // can be 'show' or 'slideDown' or 'fadeIn'
                            openSpeed:  400
                        },
                        attribute:'tip',
                        titleAttribute:'tip',
                        activation:'focus'
                    });

                });

            </script>

    </head>

    <body class="app">
        
		  <?php $this->load->view('common/general/header');  ?>

        <div id="wrapper" class="content">
            <div class="inner">

               <?php $this->load->view('common/general/menu');  ?>
			   <?php $this->load->view('common/general/alexa');  ?>
                <!-- end div#header -->

                <div class="contentcontainer roundbottomfour"><div class="contentelements ovrclr">
                        <div id="page" class="takecareearning fl borderradiusfour">

                            <div id="page-bgtop">

                                <div id="content">

                                    <div class="post pad10">

                                        <h1 class="h_1"><?php if(isset($pages[0]->title)) echo $pages[0]->title;?></h1>
                                        
                                        <!--                  WITH IMAGE                      -->
                                        <?php 
                                            if(!empty($pages))
                                            { ?>
                                                    <div class="post  pad10 newsbox" style="">
                                                        <div class="story">
                                                            <div style="padding: 5px;">
                                                                    <?php echo html_entity_decode($pages[0]->content);?>
                                                            </div>
                                                            <div style="clear: both"></div>
                                                        </div>
                                                    </div>
                                                    <?php
                                            }
                                            else
                                            { ?>
                                                    <div class="post pad10 newsbox" style="">
                                                            <div class="story">
                                                                    <p>
                                                                            No Page is Available
                                                                    </p>
                                                                    <div style="clear: both"></div>
                                                            </div>
                                                    </div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- end div#content -->


                                <!-- end div#sidebar -->

                                <div style="clear: both; height: 1px"></div>

                            </div>

                        </div>
                    </div></div>
                <!-- end div#page -->
            </div>
        </div>

        <!-- end div#wrapper -->
               	<!--	Start footer content-->
		<?php $this->load->view('common/general/footer');  ?>
	<!--end footer content-->




    </body>

</html>



