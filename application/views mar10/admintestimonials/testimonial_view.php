<?php $this->load->view('common/admin/main_header'); ?>
<script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>
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
                <a class="current">Testimonials</a>
             </article>
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_tm" id="save_tm" action="<?php //echo site_url('admintestimonials/save_tm');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
            <div class="h_2"><?php echo $label;?> Testimonial</div>
          <div class="d_fds">
				<div class="left_fld">
					<label for="name">Name:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='name' id='name' value='<?php echo $name;?>' class="required ip"/ readonly="true">
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="content">Testimonial:</label> 
				</div>
				<div class="right_fld">
					  <textarea id='message' name='message' class="required t_ar"><?php echo $message;?></textarea>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="status">Status:</label> 
				</div>
				<div class="right_fld">
					<select name="status" id="status" style="" class="required sl_bx valid">
						<option value="">Select status</option>
						<option value="1" <?php echo $sts = ($status==1?'selected':'');?>>Publish</option>
						<option value="0" <?php echo $sts = ($status==0?'selected':'');?>>Unpublish</option>    
					</select>
				</div>
				<div class="cb"></div>
			</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='save' value='Save' class="alt_btn jsave_tm" />
				<input type='button' name='cancel' value='Cancel' class="alt_btn jcancel" />
				<span class="jerror_msg"></span>
				<?php echo formtoken::getField(); ?>
             </div>
        </form>
    </div>
</section>
<script type="text/javascript">
var site_url = '<?php echo site_url();?>';
$(document).ready(function() {
	$("#save_tm").validate({
	rules: {
		message: "required",
		status: "required"
	},
	messages: {
		message: "Testimonial should not be empty",
		status: "Please select Status"
	},
	errorPlacement: function(error, element) {
		error.insertAfter(element);
	},
	submitHandler: function()
	{
		var data = $('#save_tm').serialize();
		$.ajax({
			type: "POST",	
			data: data,
			url: site_url+"admintestimonials/save_tm", 
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

						  window.location = site_url+'admintestimonials';
				}
				else
				{
					jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
/*					var error_msg = 'Unable to process.. please check the data';
					$('.jerror_msg').html(error_msg);
*/				}
			},
			complete : function()
			{
				//$("#sub_grid_tbl").trigger("reloadGrid");
			}
		});
	}
});
$('.jsave_tm').live('click',function(){
	$("#save_tm").submit();
})
$('.jcancel').live('click',function(){
	window.location = site_url+'admintestimonials';
})

});
</script>
</div>
</body>
</html>