<?php $this->load->view('common/admin/widget_header'); ?>
		
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/adapters/jquery.js"></script>

        <script>
            var base_url = '<?php echo base_url();?>'
	</script>
	<script type="text/javascript">

	$(document).ready(function() {
		$.ajaxSetup({
			 jsonp: null,
			 jsonpCallback: null
		  });
		//When page loads...
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
		
		//On Click Event
		$("ul.tabs li").click(function() {
		
			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content
			
			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});
	});
    </script>
    <script type="text/javascript">
    $(function(){
        //$('.column').equalHeight();
    });
    </script>
    

</head>


<body class="app">

	<?php //include BASEPATH.'application/views/common/header'; 
//echo $header;?>
	
	
 	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>

	
        <section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Pages</a>
             </article>
		</div>
	</section><!-- end of secondary bar -->
	
<section id="main" class="column section">
	<div class="form_prp">
            <div class="fr">
                <?php $this->load->view('admingallery/view_gallery');  ?>
            </div>
            <div class="clearfix"></div>
            <br/>
	<form name="add_page" id="add_page" action="" method="post" >
	<input type='hidden' name='id' id='id' value='<?php echo $page_id;?>'/> 
		<div class="h_2"><?php echo $sub_heading;?> Page</div>
		<div class="d_fds">
			<div class="left_fld">
				<label for="language_id"><span class="validcol">*</span> Language:</label> 
			</div>
			<div class="right_fld">
                            <select id="language_id" class="sl_bx required" name="language_id" title="Please select a Language">
                                <?php echo selectBox('Select Language','languages','id,name',' status=1 ',((!empty($language_id))?$language_id:0),'');  ?>
                            </select>
			</div>
			<div class="cb"></div>
		</div>
		<div class="d_fds">
			<div class="left_fld">
				<label for="name"><span class="validcol">*</span> Page Name:</label> 
			</div>
			<div class="right_fld">
				<input type='text' name='name' id='name' value='<?php echo $name;?>' class="required ip"/>
			</div>
			<div class="cb"></div>
		</div>
		<div class="d_fds">
			<div class="left_fld">
				<label for="title"><span class="validcol">*</span> Title:</label> 
			</div>
			<div class="right_fld">
				<input type='text' name='title' id='title' value='<?php echo $title;?>' class="required ip"/>
			</div>
			<div class="cb"></div>
		</div>
	
		<div class="d_fds">
			<div class="left_fld">
				<label for="metakey"><span class="validcol">*</span> Meta Keywords:</label> 
			</div>
			<div class="right_fld">
				<textarea id='meta_keywords' value='' class="required t_ar" name='meta_keywords'><?php echo $meta_keywords;?></textarea>
			</div>
			<div class="cb"></div>
		</div>
	
		<div class="d_fds">
			<div class="left_fld">
				<label for="metades"><span class="validcol">*</span> Meta Description:</label> 
			</div>
			<div class="right_fld">
				<textarea id='meta_description' value='' class="required t_ar" name='meta_description'><?php echo $meta_description;?></textarea>
			</div>
			<div class="cb"></div>
		</div>
		<div class="d_fds">
			<div class="left_fld">
				<label for="content"><span class="validcol">*</span> Content:</label> 
			</div>
			<div class="right_fld">
				<textarea class="jquery_ckeditor required" name="content" id='content' cols="10" rows="2"><?php echo $content;?></textarea>
			</div>
			<div class="cb"></div>
		</div>
		<?php
		if($sub_heading == 'Edit')
		{
		?>		
		<div class="d_fds">
			<div class="left_fld">
				<label for="content">Page Link:</label> 
			</div>
			<div class="right_fld">
				<?php echo site_url().'pages/'.$url_key;?>
			</div>
			<div class="cb"></div>
		</div>
		<?php } ?>
		
		<div class="d_fds">
			<div class="left_fld">
				<label for="status"><span class="validcol">*</span>Status:</label> 
			</div>
			<div class="right_fld">
				<select name="status" id="status" style="" class="required sl_bx valid"> 
				<option value="">Select status</option>
				<option value="1" <?php echo $sts = ($status==1?'selected':'');?>>Active</option>
				<option value="2" <?php echo $sts = ($status==2?'selected':'');?>>Inactive</option>       
				</select>
			</div>
			<div class="cb"></div>
		</div>
		<hr/>
		<div class="d_fds">	
			<input type='button' name='save' value='Save' class="alt_btn jsave_page" />
			<input type='button' name='cancel' value='Cancel' class="alt_btn jpage_cancel" />
			<span class="jerror_msg"></span>
		<?php echo $this->formtoken->getField();?>		
		</div>
	
	</form>
	</div>
</section>
    

<!-- End of RTE Files -->
<script>
	var site_url = '<?php echo site_url();?>'
$(document).ready(function(){
			$('.jpage_cancel').live('click',function(){
				window.location = site_url+'adminpages';
			});
			
			$("#add_page").validate({
				rules: {
					name: "required",
					title: "required",
					meta_keywords: "required",
					meta_description: "required",
					content: "required",
					status: "required"
				},
				messages: {
					name: "Please enter Page name",
					title: "Please enter Page title",
					meta_keywords: "Please enter Meta keywords",
					meta_description: "Please enter Meta description",
					content: "Please enter Content",
					status: "Please select Status",
				},
				errorPlacement: function(error, element) {
					error.insertAfter(element);
				},
				submitHandler: function()
				{
					var page_data = $('#add_page').serialize();	
					$.ajax({
						type: "POST",	
						data: page_data,
						url: site_url+"adminpages/save_page", 
						beforeSend : function(){
	 							//$(".overlay").html("<div class='loading'>loading Successfully</div>");
								//console.log(overlay);
						},
						success: function(data)
						{
							jSuccess('Record Updated Successfully',{HorizontalPosition : 'center', VerticalPosition : 'center'}); 
							//jNotify('Notification : <strong>Bold</strong>, <u>Underline</u> and <i>Italic</i> !'); break;
							
							if(data > 0)
							{
								var error_msg = 'Record Updated Successfully';
								if(data > 1) error_msg = 'Record Added Successfully';
								$('.jerror_msg').html(error_msg);
								  window.location = site_url+'adminpages';
							}
							else
							{
								jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
	/*							var error_msg = 'Unable to process.. please check the data';
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
				
			$('.jsave_page').live('click',function(){
				CKEDITOR.instances.content.updateElement();
				$("#add_page").submit();
			});
	});
</script>
<script>
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

    $('.modal_close').live('click',function(){
        $(this).parents('div.modal:first').modal('hide');
    });

});
</script>	
</div>
</body>

</html>