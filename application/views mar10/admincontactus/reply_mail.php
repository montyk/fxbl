	<?php $this->load->view('common/admin/main_header'); ?>
	
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/adapters/jquery.js"></script>

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
                <a class="current">Contact Us</a>
             </article>
             
		</div>
	</section><!-- end of secondary bar -->
	

	
	<section id="main" class="column section">
    
        <div class="form_prp">
		<form name="reply_mail" id="reply_mail" action="<?php //echo site_url('admincontactus/send_mail');?>" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
			<input type='hidden' name='from' id='from' value='<?php echo $this->config->item('from_mail'); ?>'/> 
			<input type='hidden' name='email' id='email' value='<?php echo $email;?>'/> 	
            <div class="h_2">Reply to Message</div>
         <div class="d_fds">
			<div class="left_fld">
				<label for="name">Email:</label> 
			</div>
			<div class="right_fld">
				  <input type='text' name='dis_email' id='dis_email' value='<?php echo $email;?>' class="required ip" disabled="disabled"/>
			</div>
			<div class="cb"></div>
		</div>
		
		<div class="d_fds">
			<div class="left_fld">
				<label for="title">Subject:</label> 
			</div>
			<div class="right_fld">
				  <input type='text' name='subject' id='subject' value='<?php echo $subject;?>' class="required ip"/>
			</div>
			<div class="cb"></div>
		</div>
	   
		<div class="d_fds">
			<div class="left_fld">
				<label for="content">Content:</label> 
			</div>
			<div class="right_fld">
				<textarea class=" jquery_ckeditor required ip" name="content" id='content' cols="10" rows="2"></textarea>
			</div>
			<div class="cb"></div>
		</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='save' value='Send' class="alt_btn jreply_mail" />
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
	$(function()
	{
	var CKconfig = {
		toolbar:
		[
			['Bold','Italic','Underline','Strike'],
			['NumberedList','BulletedList','-','Outdent','Indent'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker'],
			['Undo','Redo'],['TextColor','BGColor','-','Format']
		],
		 removePlugins : 'elementspath',
		 resize_enabled : false,
		 forcePasteAsPlainText : true
	};
	$('.jquery_ckeditor').ckeditor();
	});
	$("#reply_mail").validate({
		rules: {
			email: "required",
			subject:"required",
			content: "required"
		},
		messages: {
			email: "Please enter Email id",
			subject:"Please enter Subject",
			content: "Please Enter Content"
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#reply_mail').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: site_url+"admincontactus/send_mail", 
				beforeSend : function(){
				},
				success: function(data)
				{
					if(data>0)
					{
						var error_msg = 'Mail has been sent';
						$('.jerror_msg').html(error_msg);
						setTimeout(function() {
							  window.location = site_url+'admincontactus';
						}, 5000);
					}
					else
					{
						var error_msg = 'Unable to sent mail, please try again...';
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
	$('.jreply_mail').live('click',function(){
		CKEDITOR.instances.content.updateElement();
		$("#reply_mail").submit();
	})
	$('.jcancel').click(function(){
		window.location = site_url+'admincontactus';
	});
});
</script>
</div>
</body>
</html>