<form name="add_page" id="add_page" action="" method="post" >
<input type='hidden' name='page_id' id='page_id' value='<?php echo $page_id;?>'/> 
<div class="m_h ed_img">
	<div class="h_t fl j_ae_ecur_txt">Add Page</div>
	<div class="j_u_m icon ed_img fr c_i c_i_h"></div>
	<div class="cb"></div>
</div>
<div class="m_c">
	
	
	<div class="d_fds">
		<div class="left_fld">
			<label for="name">Page Name:</label> 
		</div>
		<div class="right_fld">
			  <input type='text' name='name' id='name' value='<?php echo $name;?>' class="required ip"/>
		</div>
		<div class="cb"></div>
	</div>
	
	<div class="d_fds">
		<div class="left_fld">
			<label for="title">Title:</label> 
		</div>
		<div class="right_fld">
			  <input type='text' name='title' id='title' value='<?php echo $title;?>' class="required ip"/>
		</div>
		<div class="cb"></div>
	</div>
   
	<div class="d_fds">
		<div class="left_fld">
			<label for="metakey">Meta Keywords:</label> 
		</div>
		<div class="right_fld">
			  <textarea id='meta_keywords' value='' class="required t_ar" name='meta_keywords'><?php echo $meta_keywords;?></textarea>
		</div>
		<div class="cb"></div>
	</div>
	
	<div class="d_fds">
		<div class="left_fld">
			<label for="metades">Meta Description:</label> 
		</div>
		<div class="right_fld">
			  <textarea id='metades' value='' class="required t_ar" name='meta_description'><?php echo $meta_description;?></textarea>
		</div>
		<div class="cb"></div>
	</div>
	
	<div class="d_fds">
		<div class="left_fld">
			<label for="content">Content:</label> 
		</div>
		<div class="right_fld">
			<textarea class="jquery_ckeditor " name="content" id='content' cols="10" rows="2"><?php echo $content;?></textarea>
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
				<option value="1" <?php echo $sts = ($status==1?'selected':'');?>>Active</option>
				<option value="2" <?php echo $sts = ($status==2?'selected':'');?>>Inactive</option>       
			</select>
		</div>
		<div class="cb"></div>
	</div>
	

</div>

<div class="m_f ed_img">
	<a class="prybtn fl">
		<span class="inner-btn">
			<span class="label jsave_page">Save</span>    
		</span>
	</a>
	<a class="secbtn fl j_u_m">
		<span class="inner-btn">
			<span class="label">Cancel</span>    
		</span>
	</a>
</div>
</form>

<script>
	var base_url = '<?php echo base_url();?>'
		$(document).ready(function(){
			$('.jsave_page').live('click',function(){
			var page_data = $('#add_page').serialize();	
				$.ajax({
					type: "POST",	
					data: page_data,
					url: base_url+"adminpages/save_page", 
					beforeSend : function(){
					},
					success: function(data)
					{
					},
					complete : function()
					{
						$.unblockUI();
						$("#sub_grid_tbl").trigger("reloadGrid");
					}
				});
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
$('.jquery_ckeditor').ckeditor(CKconfig);
});
</script>	