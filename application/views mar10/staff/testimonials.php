<?php $current="Testimonial"; include 'header.php'; ?>

	
<section id="main" class="column section">
	<div class="form_prp">
		<form name="save_tm" id="save_tm" action="" method="post" >
		<input type='hidden' name='id' id='id' value=''/> 	
		<input type='hidden' name='users_id' id='users_id' value='<?php echo $user_id;?>'/>
		<input type='hidden' name='status' id='status' value="0"/> 	 	
		<div class="h_2">Add Testimonial</div>
		<div class="d_fds">
			<div class="left_fld">
				<label for="content"> Testimonial:<span class="validcol">*</span></label> 
			</div>
			<div class="right_fld">
				  <textarea id='message' name='message' class="required t_ar"></textarea>
			</div>
			<div class="cb"></div>
		</div>
		
		<hr/>
		 <div class="d_fds">
			<input type='button' name='save' value='Add Testimonial' class="alt_btn jsave_tm" />
			<span class="jerror_msg"></span>
			<?php echo formtoken::getField(); ?>
		 </div>
        </form>
    </div>
</section>
	
    <!--End@@code for the Modal Window-->
<script type="text/javascript">
var site_url = '<?php echo site_url();?>';
$(document).ready(function() {
	$("#save_tm").validate({
	rules: {
		message: "required",
	},
	messages: {
		message: "Testimonial should not be empty",
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
			url: site_url+"staff/save_tm", 
			beforeSend : function(){
			},
			success: function(data)
			{
				if(data > 0)
				{
					var error_msg = 'Testimonial Updated Successfully';
					if(data > 1) error_msg = 'Testimonial Added Successfully';
					$('.jerror_msg').html(error_msg);
				}
				else
				{
					var error_msg = 'Unable to process.. please check the data';
					$('.jerror_msg').html(error_msg);
				}
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
});
</script>	
</body>

</html>