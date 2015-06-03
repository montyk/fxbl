<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Best exchange rates liberty reserve</title>
		<meta name="description" content="Best exchange rates liberty reserve, perfect money, pecunix, webmoney, e-gold, solidtrustpay, okpay and Moneybookers" />
		<meta name="keywords" content="Best exchange rates,perfect money,pecunix,webmoney,e-gold,solidtrustpay,okpay,Moneybookers" />
		<meta name="author" content="edealspot"
		<meta name="robots" content="index, follow" />



            <!--<link href="<?php echo base_url();  ?>default.css" rel="stylesheet" type="text/css" />-->
            
            <?php $this->load->view('common/general/links');  ?>


            <link href="<?php echo base_url();  ?>public/css/redmond/jquery-ui-1.8.18.custom.css" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();  ?>public/css/general/admin-style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/pagination.css" rel="stylesheet" type="text/css" />
 			<link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
 
            <link href="<?php echo base_url();  ?>public/css/general/ui.jqgrid.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();  ?>public/css/general/forms.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery.jqGrid.src.js" ></script>

            <link href="<?php echo base_url();  ?>public/css/general/jquery.tooltip.css" type="text/css"  rel="stylesheet"/>
			<link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="<?php echo base_url();  ?>/public/js/general/jquery.cluetip.js"></script>
			<script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>

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

                <!--<script type="text/javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>-->
                <script type="text/javascript" src="<?php echo base_url();  ?>public/js/general/lavalamp.js"></script>
                <script type="text/javascript" src="<?php echo base_url();  ?>public/js/general/jquery_easing.js"></script>
                <script type="text/javascript">
                    $(function() { $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 })}); 
                </script>


                
                <?php $this->load->view('common/general/menu');  ?>
                
				 <?php $this->load->view('common/general/alexa');  ?>
               
                <!-- end div#header -->
				
				<div class="contentcontainer roundbottomfour">
					<div class="contentelements ovrclr">
						<div id="page" class="takecareearning fl borderradiusfour">
						<form name="rates" id="rates" action="" method="post" >
						<div class="d_fds">
							<div class="left_fld">
								<label for="languages_id"><span class="validcol">*</span> Payment Method:</label> 
							</div>
							<div class="right_fld">
								<select name="paymentg_methods_id" id="paymentg_methods_id" class=" required sl_bx valid">
									<option value="">Select Payment Method</option>
									<?php foreach($payment_methods as $pm_k=>$pm_v){?>
										<option value="<?php echo $pm_v->id;?>" ><?php echo $pm_v->name;?></option>
									<?php }?>    
								</select>
							</div>
							<div class="cb"></div>
						</div>
						
						<div class="d_fds">
							<div class="left_fld">
								<label for="status_id"><span class="validcol">*</span> eCurrency Type:</label> 
							</div>
							<div class="right_fld"> 
								<select name="ecurrencies_id" id="ecurrencies_id" class=" required sl_bx valid">
									<option value="">Select eCurrency Type </option>
									<?php foreach($ecurrencies as $ec_k=>$ec_v){?>
										<option value="<?php echo $ec_v->id;?>" ><?php echo $ec_v->name;?></option>
									<?php }?>       
								</select>
							</div>
							<div class="cb"></div>
						</div>
						<div class="d_fds">
							<div class="left_fld">
								<label for="status_id"><span class="validcol">*</span> Action:</label> 
							</div>
							<div class="right_fld">
								<select name="type" id="type" style="" class="required sl_bx valid">
									<option value="">Select Type</option>
									<option value="1" >BUY</option>
									<option value="2" >SELL</option>    
								</select>
							</div>
							<div class="cb"></div>
						</div>
						<hr/>
						 <div class="d_fds">
						 	<div class="left_fld"><label>&nbsp;</label></div>
							<div class="right_fld"><input type='button' name='save' value='Submit' class="alt_btn jrates" />
						 </div>
						</form>
							<div id="page-bgtop" class='jratesdata'>
								
							<div style="clear: both; height: 1px"></div>
							</div>
						</div>
					</div>
				</div>
                <!-- end div#page -->
            </div>
        </div>

        <!-- end div#wrapper -->
        	<!--	Start footer content-->
		<?php $this->load->view('common/general/footer');  ?>
	<!--end footer content-->

<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
$(document).ready(function() {
	$("#rates").validate({
		rules: {
			paymentg_methods_id: "required",
			ecurrencies_id: "required",
			type: "required",
		},
		messages: {
			paymentg_methods_id: "Please Select Payment Method",
			ecurrencies_id: "Please Select eCurrency Type",
			type: "Please Select Type",
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#rates').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: base_url+"rates/getrates", 
				beforeSend : function(){
				},
				success: function(data)
				{
						$('.jratesdata').html(data);
				},
				complete : function()
				{
					//$("#sub_grid_tbl").trigger("reloadGrid");
				}
			});
		}
	});
	$('.jrates').live('click',function(){
		$("#rates").submit();
	})
});
</script>

    </body>

</html>



