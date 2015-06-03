<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Testimonials</title>
        <meta name="description" content="Testimonials" />
        <meta name="keywords" content="Testimonials" />
        <meta name="author" content="edealspot"
              <meta name="robots" content="index, follow" />



            <!--<link href="<?php echo base_url();  ?>default.css" rel="stylesheet" type="text/css" />-->
            
            <?php $this->load->view('common/general/links');  ?>


            <link href="<?php echo base_url();  ?>public/css/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/style2.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/admin-style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/pagination.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/ui.jqgrid.css"/>
            <link href="<?php echo base_url();  ?>public/css/forms.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>

            <link href="<?php echo base_url();  ?>public/css/jquery.tooltip.css" type="text/css"  rel="stylesheet"/>
            <link href="<?php echo base_url();  ?>public/css/redmond/jquery-ui-1.8.18.custom.css" type="text/css"  rel="stylesheet"/>
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

						<div id="page" class="takecareearning fl borderradiusfour" >

                            <div id="page-bgtop">

                                <div id="content">

                                    <div class="post pad10" >
										<div class="h_1">Testimonials</div>
                                        <!--                  WITH IMAGE                      -->
                                        <?php 
										if(!empty($testmonial))
										{ 
											foreach($testmonial as $key=>$value)
											{
											?>
												<div class="post pad10 newsbox" style="">
												<div class="story">
													<p>
														<?php echo html_entity_decode($value->message);?>
													</p>
													<div style="clear: both"></div>
												</div>
												<br/>
       											<div style="text-align: right;"><i>-  <?php echo $value->name;?></i></div>
											</div>
											<?php
											}
										}
										else
										{ ?>
											<div class="post brad8 pad10 newsbox" style="">
												<div class="story">
													<p>
														No Testimonials
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
       	<?php $this->load->view('common/general/footer');  ?>


    </body>

</html>



