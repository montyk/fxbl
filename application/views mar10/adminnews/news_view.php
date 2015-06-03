<?php $this->load->view('common/admin/main_header'); ?>
	
	<link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/adapters/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
    
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
                        <a class="current">News</a>
                    </article>
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_news" id="save_news" action="<?php //echo site_url('adminnews/save_news');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
                        <div class="h_2"><?php echo $label; ?> News</div>
                        <div class="fl m_r_10">
                            <div class="left_fld">
                                <label for="url_key">Language:</label> 
                            </div>
                            <div class="right_fld">
                                <select id="language_id" class="sl_bx required" name="language_id" title="Please choose a Language">
                                    <?php echo selectBox('Select Language', 'languages', 'id,name', ' status=1 ', ((!empty($language_id)) ? $language_id : 1), ''); ?>
                                </select>
                            </div>
                            <div class="cb"></div>
                        </div>
                        <div class="cb"></div>
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="name"><span class="validcol">*</span> Heading:</label> 
                            </div>
                            <div class="right_fld">
                                <input type='text' name='heading' id='heading' value='<?php echo $heading; ?>' class="required ip"/>
                            </div>
                            <div class="cb"></div>
                        </div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="languages_id"><span class="validcol">*</span> Category:</label> 
				</div>
				<div class="right_fld">
					<select name="news_categories_id" id="news_categories_id" style="" class=" required sl_bx valid">
						<option value="">Select Category</option>
						<?php foreach($news_cat as $nc_k=>$nc_v){
							$sel = ($news_categories_id == $nc_v->id ? "selected ='selected'":'');
						?>
							<option value="<?php echo $nc_v->id;?>" <?php echo $sel;?>><?php echo $nc_v->name;?></option>
						<?php }?>
					</select>
				</div>
				<div class="cb"></div>
			</div>
                        
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="languages_id"><span class="validcol">*</span> Type:</label> 
                            </div>
                            <div class="right_fld">
                                <label class="hide_promotion_dates"><input type="radio" name="is_promotion" value="0" <?php if(empty($is_promotion) || (isset($is_promotion) && $is_promotion=='0')){ ?>checked="" <?php } ?> /> News</label>
                                <label class="show_promotion_dates"><input type="radio" name="is_promotion" value="1" <?php if(isset($is_promotion) && $is_promotion=='1'){ ?>checked="" <?php } ?>  /> Promotion</label>
                            </div>
                            <div class="cb"></div>
                        </div>
                        
                        <div class="d_fds promotion_date_fields <?php if(empty($is_promotion)){ echo 'hide'; } ?>">
                            <div class="left_fld">
                                <label for="from"><span class="validcol">*</span> From:</label> 
                            </div>
                            <div class="right_fld">
                                <input type='text' name='from' id='from' value='<?php echo $from; ?>' class=" ip" title="Please select a from date"/>
                            </div>
                            <div class="cb"></div>
                        </div>
                        
                        <div class="d_fds promotion_date_fields <?php if(empty($is_promotion)){ echo 'hide'; } ?>">
                            <div class="left_fld">
                                <label for="to"><span class="validcol">*</span> To:</label> 
                            </div>
                            <div class="right_fld">
                                <input type='text' name='to' id='to' value='<?php echo $to; ?>' class=" ip" title="Please select a to date"/>
                            </div>
                            <div class="cb"></div>
                        </div>
                        
                        
			<div class="d_fds">
				<div class="left_fld">
					<label for="flat_fees"><span class="validcol">*</span> Description:</label> 
				</div>
				<div class="right_fld">
					  <textarea name='description' id='description' class="jquery_ckeditor required"><?php echo $description; ?></textarea>
				</div>
				<div class="cb"></div>
			</div>
			
                        <div class="d_fds">
                            <div class="left_fld">
                                    <label for="myfile"><span class="validcol">*</span> Upload Files:</label> 
                            </div>
                            <div class="right_fld">
                                <?php
                                $star_symbol = '<span class="validcol">*</span>';
                                $req_class = 'required ip';
                                if (isset($url) && $url != '') {
                                    $star_symbol = '';
                                    $req_class = '';
                                }
                                ?>
                                <!--<div class="left_fld">
                                        <label for="logo"><?php //echo $star_symbol; ?> Attachments:</label> 
                                </div>
                                <div class="right_fld">
                                          <input type='file' name='myfile' id='myfile' value='' class="<?php //echo $req_class; ?> "/>
                                </div>-->
    <!--                            <label for="myfile">Upload Files:*</label>-->
                                <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                                <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                                <?php if (isset($url) && $url != '') {
                                    ?>
                                                        <!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
                                    <span><?php echo attachment($db_file_name, $original_file_name); ?></span>
                                    <?php }
                                ?>
                            </div>
                            <div class="cb"></div>
                        </div>
		
			<div class="d_fds">
				<div class="left_fld">
					<label for="status_id"><span class="validcol">*</span> Is Home page banner?:</label> 
				</div>
				<div class="right_fld">
					<select name="is_banner" id="is_banner" style="" class=" required sl_bx valid">
						<option value="0" <?php echo $sts = ($is_banner!='' && $is_banner==0?'selected':'');?>>NO</option>
						<option value="1" <?php echo $sts = ($is_banner!='' && $is_banner==1?'selected':'');?>>YES</option>
					</select>
				</div>
				<div class="cb"></div>
			</div>
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="banner_order_num"> Banner Order Number:</label> 
                            </div>
                            <div class="right_fld">
                                <input type='text' name='banner_order_num' id='banner_order_num' value='<?php echo $banner_order_num; ?>' class=" digits ip"/>
                            </div>
                            <div class="cb"></div>
                        </div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="status_id"><span class="validcol">*</span> Status:</label> 
				</div>
				<div class="right_fld">
					<select name="status" id="status" style="" class=" required sl_bx valid">
						<option value="">Select status</option>
						<option value="1" <?php echo $sts = ($status!='' && $status==1?'selected':'');?>>Publish</option>
						<option value="0" <?php echo $sts = ($status!='' && $status==0?'selected':'');?>>Unpublish</option> 
					</select>
				</div>
				<div class="cb"></div>
			</div>
            <hr/>
             <div class="d_fds">
             	<input type='button' name='save' value='Save' class="alt_btn jsave_news" />
				<input type='button' name='cancel' value='Cancel' class="alt_btn jcancel" />
				<span class="jerror_msg"></span>
				<?php echo formtoken::getField(); ?>
             </div>
        </form>
    </div>
</section>
<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
var site_url='<?php echo site_url()?>';
$(document).ready(function() {
	
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
	
	
	$("#save_news").validate({
            rules: {
                    heading: "required",
                    news_categories_id: "required",
                    description: "required",
                    myfile: {
                                    <?php if(isset($url) &&  $url == '')
                                    {?>
                                    required: true,
                                    <?php } ?>
                                    accept: "png|jpe?g|gif"
                    },
                    status: "required"
            },
            messages: {
                    heading: "Please enter News heading",
                    news_categories_id: "Please Select Category Id",
                    description: "Please enter Description",
                    myfile: {
                            <?php if(isset($url) &&  $url == '')
                            {?>
                            required: "Please select Attachment",
                            <?php } ?>
                            accept: "File must be JPG, GIF or PNG"
                    },
                    status: "Please select Status"
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function()
            {
                    var data = $('#save_news').serialize();
                    $.ajax({
                            type: "POST",
                            data: data,
                            url: site_url+"adminnews/save_news",
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
                                                      window.location = site_url+'adminnews';
                                    }
                                    else
                                    {
											jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                                           /* var error_msg = 'Unable to process.. please check the data';
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

    $('.jsave_news').live('click',function(){
            CKEDITOR.instances.description.updateElement();
            $("#save_news").submit();
    });

    $('.jcancel').live('click',function(){
            window.location = site_url+'adminnews';
    });
	
});
</script>
 <script type="text/javascript">
  var app_name = '<?php echo $this->config->item('app_name') ?>';
        $(function(){
            
           $('.myfile').uploadify({
                    'uploader'  : site_url+'uploadify/uploadify.swf',
                    'script'    : '<?php echo site_url();  ?>uploadify/uploadify.php',
					//'script'    : '<?php //echo base_url('uploadify');  ?>',
                    'cancelImg' : site_url+'uploadify/cancel.png',
                    'folder'    : '/'+app_name+'/uploads',
                    'auto'      : true,
                    'multi'     : false,
                    'fileExt'   : '*.jpg;*.gif;*.png',
                    'fileDesc'    : 'Image Files',
                    'sizeLimit'   : 1024000,
                    'removeCompleted' : false,
                    'onComplete'  : function(event, ID, fileObj, response, data) {
                        // Any Callback Functionality goes here.
                    }
            }); 
            
            
            $('.show_promotion_dates').live('click',function(){
               $('.promotion_date_fields').slideDown('fast');
               $('.promotion_date_fields input').addClass('required');
            });
            
            $('.hide_promotion_dates').live('click',function(){
               $('.promotion_date_fields').slideUp('fast');
               $('.promotion_date_fields input').removeClass('required');
            });
            
            $('#from').datepicker({
                beforeShow: function(input) {	
                    return {maxDate: ($('#to').val()!='' ? $('#to').datepicker("getDate") : null)};	
                },
                dateFormat:'yy-mm-dd'
            });
            $('#to').datepicker({
                beforeShow: function(input) {
                    return {minDate: ($('#from').val()!='' ? $('#from').datepicker("getDate") : null)};
                },
                dateFormat:'yy-mm-dd'
            });
            
        });
    </script>
</div>
</body>
</html>