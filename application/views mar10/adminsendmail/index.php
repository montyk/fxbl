<?php $this->load->view('common/admin/main_header'); ?>
<script type="text/javascript" src="<?php echo base_url();  ?>public/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>public/js/ckeditor/adapters/jquery.js"></script>

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
                <a class="current">Send Mail</a>
             </article>
             
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp">
		<form name="send_mail" id="send_mail" action="<?php //echo site_url('adminsendmail/send_mail');?>" method="post" >
			<input type='hidden' name='from' id='from' value='<?php echo $this->config->item('from_mail') ?>'/> 	
            <div class="h_2">Send email</div>
         <div class="d_fds">
			<div class="left_fld">
				<label for="name">Email:<span class="validcol">*</span></label> 
			</div>
			<div class="right_fld">
				  <input type='text' name='email' id='email' value='' class="required ip" />
			</div>
			<div class="cb"></div>
		</div>
		
		<div class="d_fds">
			<div class="left_fld">
				<label for="title">Subject:<span class="validcol">*</span></label> 
			</div>
			<div class="right_fld">
				  <input type='text' name='subject' id='subject' value='' class="required ip"/>
			</div>
			<div class="cb"></div>
		</div>
	   
		<div class="d_fds">
			<div class="left_fld">
				<label for="content">Content:<span class="validcol">*</span></label> 
			</div>
			<div class="right_fld">
				<textarea class=" t_ar jquery_ckeditor required ip" name="message" id='message' cols="10" rows="2"></textarea>
			</div>
			<div class="cb"></div>
		</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='send' value='Send' class="alt_btn jsend_mail" />
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
	
	$("#send_mail").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			subject:"required",
			message: "required"
		},
		messages: {
			email: "Please enter a valid email address",
			subject:"Please enter Subject",
			message: "Please Enter Content"
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#send_mail').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: site_url+"adminsendmail/send_mail", 
				beforeSend : function(){
				},
				success: function(data)
				{
					if(data)
					{
						var error_msg = 'Mail has been sent';
						$('.jerror_msg').html(error_msg);
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
	$('.jsend_mail').live('click',function(){
		CKEDITOR.instances.message.updateElement();
		$("#send_mail").submit();
	})
	$('.jcancel').click(function(){
		window.location = site_url+'adminsendmail';
	});
});
</script>
</div>
</body>
</html>