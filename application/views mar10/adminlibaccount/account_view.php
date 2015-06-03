<?php $this->load->view('common/admin/main_header'); ?>

    <link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />
	
</head>
<body class="app">
	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	<section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
				 <img src="<?php echo base_url();  ?>misc/css/images/fav.png" class="fl bread_logo" /> 
                <div class="breadcrumb_divider"></div>
                <a class="current">E-Currency Accounts</a>
             </article>
		</div>
	</section><!-- end of secondary bar -->
	

	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_la" id="save_la" action="<?php //echo site_url('adminlibaccount/save_la');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
            <div class="h_2"><?php echo $label;?> E-Currency Accounts</div>
                        <div class="d_fds">
				<div class="left_fld">
					<label for="ecurrencies_id"><span class="validcol">*</span> E-Currency type:</label> 
				</div>
				<div class="right_fld">
                                        <select class="sl_bx" id="ecurrencies_id" name="ecurrencies_id" title="Please choose a e-currency type">
                                            <?php echo selectBox('Select Currency Type','ecurrencies','id,name',' status=1 ',((!empty($ecurrencies_id))?$ecurrencies_id:0),'');  ?>
                                        </select>
				</div>
				<div class="cb"></div>
			</div>
			
                        <div class="d_fds">
				<div class="left_fld">
					<label for="lan"><span class="validcol">*</span> E-Currency Account Name:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='name' id='name' value='<?php echo $name;?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="an"><span class="validcol">*</span> E-Currency Account Number:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='account_number' id='account_number' value='<?php echo $account_number;?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="status"><span class="validcol">*</span> Status:</label> 
				</div>
				<div class="right_fld">
					<select name="status" id="status" style="" class="required sl_bx valid">
						<option value="">Select status</option>
						<option value="1" <?php echo $sts = ($status!='' && $status==1?'selected':'');?>>Active</option>
						<option value="0" <?php echo $sts = ($status!='' && $status==0?'selected':'');?>>Inactive</option>    
					</select>
				</div>
				<div class="cb"></div>
			</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='save' value='Save' class="alt_btn jsave_la" />
				<input type='button' name='cancel' value='Cancel' class="alt_btn jcancel" />
				<span class="jerror_msg"></span>
				<?php echo $this->formtoken->getField();?>	
             </div>
        </form>
    </div>
</section>
<script type="text/javascript">
var site_url = '<?php echo site_url();?>';
$(document).ready(function() {
        $("#save_la").validate({
            rules: {
                name: "required",
                ecurrencies_id: "required",
                account_number: {
                    required: true,
                    number: true
                },
                status: "required"
            },
            messages: {
                name: "Please enter Liberty Account Name",
                ecurrencies_id: "Please choose a e-currency type",
                account_number: {
                    required: "Please enter Account number",
                    number: "Account number Should be Number"
                },
                status: "Please select Status"
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function()
            {
                var data = $('#save_la').serialize();
                $.ajax({
                    type: "POST",	
                    data: data,
                    url: site_url+"adminlibaccount/save_la", 
                    beforeSend : function(){
                    },
                    success: function(data)
                    {
						jSuccess('Record Updated Successfully',{HorizontalPosition : 'center', VerticalPosition : 'center'}); 
                        if(data > 0)
                        {
                            var error_msg = 'Record Updated Successfully';
                            if(data > 1) error_msg = 'Record Added Successfully';
                            $('.jerror_msg').html(error_msg);

                                window.location = site_url+'adminlibaccount';
                        }
                        else
                        {
							jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                          /*  var error_msg = 'Unable to process.. please check the data';
                            $('.jerror_msg').html(error_msg);*/
                        }
                    },
                    complete : function()
                    {
                        //$("#sub_grid_tbl").trigger("reloadGrid");
                    }
                });
            }
        });
        
	$('.jsave_la').live('click',function(){
		$("#save_la").submit();
	})
	$('.jcancel').live('click',function(){
		window.location = site_url+'adminlibaccount';
	})		
});
</script>
</div>
</body>
</html>