<?php $this->load->view('common/admin/main_header'); ?>

</head>
<body class="app">
 	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	<section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
                <a href="#">EDEALSPOT </a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Contact Us</a>
             </article>
		</div>
	</section><!-- end of secondary bar -->
	

	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_cu" id="save_cu" action="" method="post" >
			<input type='hidden' name='id' id='id' value=''/> 	
            <div class="h_2">Contact Us</div>
          	<div class="d_fds">
				<div class="left_fld">
					<label for="name"><span class="validcol">*</span> Name:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='name' id='name' value='' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="name"><span class="validcol">*</span> Email:</label> 
				</div>
				<div class="right_fld">
					  <input type='email' name='email' id='email' value='' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="name"><span class="validcol">*</span> Subject:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='subject' id='subject' value='' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="name"><span class="validcol">*</span> Contact No:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='phone' id='phone' value='' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="content"><span class="validcol">*</span> Testimonial:</label> 
				</div>
				<div class="right_fld">
					  <textarea id='message' name='message' class="required t_ar"></textarea>
				</div>
				<div class="cb"></div>
			</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='save' value='Save' class="alt_btn jsave_cu" />
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
	$("#save_cu").validate({
	rules: {
		name: "required",
		email: {
				required: true,
				email: true
			},
		subject: "required",
		phone: "required",
		message: "required"
	},
	messages: {
		name: "Name should not be empty",
		email: "Please enter a valid email address",
		subject: "Subject should not be empty",
		phone: "Phone should not be empty",
		message: "Testimonial should not be empty"
	},
	errorPlacement: function(error, element) {
		error.insertAfter(element);
	},
	submitHandler: function()
	{
		var data = $('#save_cu').serialize();
		$.ajax({
			type: "POST",	
			data: data,
			url: site_url+"admincontactus/save_cs", 
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
						  window.location = site_url+'admincontactus';
				}
				else
				{
					jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
					/*var error_msg = 'Unable to process.. please check the data';
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
$('.jsave_cu').live('click',function(){
	$("#save_cu").submit();
})
$('.jcancel').live('click',function(){
	window.location = site_url+'index.php/testimonials';
})

});
</script>
</div>
</body>
</html>