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
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Rates</a>
             </article>
        </div>
        
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_rates" id="save_rates" action="<?php //echo site_url('adminrates/save_rates');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
            <div class="h_2"><?php echo $label;?> Liberty Account</div>
           <div class="d_fds">
				<div class="left_fld">
					<label for="name"><span class="validcol">*</span> From:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='from' id='from' value='<?php echo $from;?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="to"><span class="validcol">*</span> To:</label> 
				</div>
				<div class="right_fld">
						<?php 
						$to_value = $to;
						$disabled = '';
						if($from > 0 && ($to =='0.00'|| $to==''))
						{
							$to_value = '';
							$disabled = 'disabled';
						}
						?>	
					  <input type='text' name='to' id='to' value='<?php echo $to_value;?>' class="required ip" <?php echo $disabled;?>/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="above">Above:</label> 
				</div>
				<div class="right_fld">
						<?php 
						$checked ='';
						if($from > 0 && ($to =='0.00'|| $to==''))
						{
							$checked ='checked="checked"';
						}
						?>
					  <input type='checkbox' name='above' id='above' value='' class="ip" <?php echo $checked; ?>/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="languages_id"><span class="validcol">*</span> Payment Method:</label> 
				</div>
				<div class="right_fld">
					<select name="paymentg_methods_id" id="paymentg_methods_id" class=" required sl_bx valid">
						<option value="">Select Payment Method</option>
						<?php foreach($payment_methods as $pm_k=>$pm_v){
							$sel = ($paymentg_methods_id == $pm_v->id ? "selected ='selected'":'');
						?>
							<option value="<?php echo $pm_v->id;?>" <?php echo $sel;?>><?php echo $pm_v->name;?></option>
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
						<?php foreach($ecurrencies as $ec_k=>$ec_v){
							$sel = ($ecurrencies_id == $ec_v->id ? "selected ='selected'":'');
						?>
							<option value="<?php echo $ec_v->id;?>" <?php echo $sel;?>><?php echo $ec_v->name;?></option>
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
						<option value="1" <?php echo $typ = ($type!='' && $type==1?'selected':'');?>>BUY</option>
						<option value="2" <?php echo $typ = ($type!='' && $type==2?'selected':'');?>>SELL</option>    
					</select>
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="flat_fees"><span class="validcol">*</span> Fees:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='amount' id='amount' value='<?php echo $amount;?>' class="required ip"/>
					 <!-- <textarea name='amount' id='amount' value='' class="required t_ar"></textarea>-->
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="status_id"><span class="validcol">*</span> Fee Type:</label> 
				</div>
				<div class="right_fld">
					<select name="fee_type" id="fee_type" style="" class="required sl_bx valid">
						<option value="">Select Fee Type</option>
						<option value="1" <?php echo $ftyp = ($fee_type!='' && $fee_type=='flat'?'selected':'');?>>Flat Fee</option>
						<option value="2" <?php echo $ftyp = ($fee_type!='' && $fee_type=='percentile'?'selected':'');?>>%</option>    
					</select>
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="status_id"><span class="validcol">*</span> Status:</label> 
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
             	<input type='button' name='save' value='Save' class="alt_btn jsave_rates" />
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
	$("#save_rates").validate({
		rules: {
			from: {
			  required: true,
			  number: true
			},
			to: {
			  required: true,
			  number: true
			},
			paymentg_methods_id: "required",
			ecurrencies_id: "required",
			type: "required",
			amount: {
			  required: true,
			  number: true
			},
			fee_type:"required",
			status: "required"
		},
		messages: {
			from: {
			  required: "Please enter From Amount",
			  number: "From Amount Should be Number"
			},
			to: {
			  required: "Please enter To Amount",
			  number: "To Amount Should be Number"
			},
			paymentg_methods_id: "Please Select Payment Method",
			ecurrencies_id: "Please Select eCurrency Type",
			type: "Please Select Action",
			amount: {
			  required: "Please enter fee",
			  number: "Fee Should be Number"
			},
			fee_type:"Please Select Fee Type",
			status: "Please select Status",
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#save_rates').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: site_url+"adminrates/save_rates", 
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

							  window.location = site_url+'adminrates';
					}
					else
					{
						jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
/*						var error_msg = 'Unable to process.. please check the data';
						$('.jerror_msg').html(error_msg);
*/					}
				},
				complete : function()
				{
					//$("#sub_grid_tbl").trigger("reloadGrid");
				}
			});
		}
	});
	$('.jsave_rates').live('click',function(){
		$("#save_rates").submit();
	})
	$('.jcancel').live('click',function(){
			window.location = site_url+'adminrates';
	})	
$('#above').live('click',function(){
	if ($('#above').is(':checked')) {
		//$('#to').val('');
		$("#to").attr("disabled", "disabled"); 
	}
	else
	{
		$("#to").removeAttr("disabled"); 
	}
	
});
$('#from,#to').blur(function() {
	var from = $('#from').val();
	var to = $('#to').val();
	if(to != '' && parseInt(from) > parseInt(to))
	{
		alert('TO Amount should be greater than FROM amount');
		$('#to').val('');
	}
 // alert(from);
  //alert(to);
});
	
});
</script>
</div>
</body>
</html>