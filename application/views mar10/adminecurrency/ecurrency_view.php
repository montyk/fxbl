<?php $this->load->view('common/admin/main_header'); ?>

	<link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>
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
                <a class="current">E-Currency Type</a>
             </article>
             <a class="nblu_btn add_ecur fr " href="<?php echo site_url('adminecurrency/ecurrency_view');?>">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url();?>public/images/spacer.gif">
                        	Add eCurrency
                        </span>
                    </span>
                </a>
		</div>
	</section><!-- end of secondary bar -->


	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_ec" id="save_ec" action="<?php //echo site_url('Adminecurrency/save_ec');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
            <div class="h_2"><?php echo $label;?> eCurrency</div>
           <div class="d_fds">
				<div class="left_fld">
					<label for="name">Name:<span class="validcol">*</span></label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='name' id='name' value='<?php echo $name;?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			<?php 
				$star_symbol = '<span class="validcol">*</span>';
				$req_class = 'required ip';
				if(isset($url) &&  $url != '')
				{
					$star_symbol = '';
					$req_class = '';
				}	
			 ?>
			<div class="d_fds">
				<div class="left_fld">
				<!--	<label for="logo"><?php //echo $star_symbol;?> Logo:</label> 
				</div>
				<div class="right_fld">
					  <input type='file' data-type='image' name='userfile' id='userfile' value='' class="<?php //echo $req_class;?>"/>
				</div>-->
				<label for="myfile">Upload Files:<span class="validcol">*</span></label>
				</div>
				<div class="right_fld">
                    <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
		   <?php if(isset($url) &&  $url != '')
				 { 	?>
					<!--<a href='<?php //echo site_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
					<span><?php echo attachment($db_file_name,$original_file_name);?></span>
			<?php
				 }?>
				 </div>
				<div class="cb"></div>
			</div>
			
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="languages_id"> Mode:<span class="validcol">*</span></label> 
                            </div>
                            <div class="right_fld">
                                    <!--<input type='text' name='mode' id='mode' value='<?php //echo $mode; ?>' class="required ip"/>-->
                                <select name="mode" id="mode" style="" class="required sl_bx valid">
                                    <option value="">Select Mode</option>
                                    <option value="1" <?php echo $sts = ($mode != '' && $mode == 1 ? 'selected' : ''); ?>>USD</option>
                                    <option value="2" <?php echo $sts = ($mode != '' && $mode == 2 ? 'selected' : ''); ?>>EURO</option>
                                    <option value="3" <?php echo $sts = ($mode != '' && $mode == 3 ? 'selected' : ''); ?>>GOLD</option>    
                                </select>
                            </div>
                            <div class="cb"></div>
                        </div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="flat_fees"> Flat fees:<span class="validcol">*</span></label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='flat_fees' id='flat_fees' value='<?php echo $flat_fees;?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="description">Description:</label> 
                            </div>
                            <div class="right_fld">
                                <textarea class="t_ar " name="description" id="description"><?php if(!empty($description)) echo $description; ?></textarea>
                            </div>
                            <div class="cb"></div>
                        </div>
			<div class="d_fds">
				<div class="left_fld">
					<label for="status_id"> Status:<span class="validcol">*</span></label> 
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
             	<input type='button' name='save' value='Save' class="alt_btn jsave_ec" />
				<input type='button' name='cancel' value='Cancel' class="alt_btn jcancel" />
				<span class="jerror_msg"></span>
				<?php echo $this->formtoken->getField();?>	
             </div>
        </form>
    </div>
</section>
<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
var site_url='<?php echo site_url()?>';
$(document).ready(function() {
	$("#save_ec").validate({
                rules: {
                    name: "required",
                    userfile: { 
                            <?php if(isset($url) &&  $url == '')
                            {?>
                            required: true, 
                            <?php } ?>
                            accept: "png|jpe?g|gif"
                    },
                    mode: "required",
                    //flat_fees: "required",
                    flat_fees: {
                    required: true,
                    number: true
                    },
                    status: "required"
                },
                messages: {
                    name: "Please enter Name",
                    userfile: { 
                            <?php if(isset($url) &&  $url == '')
                            {?>
                            required: "Please select Attachment", 
                            <?php } ?>
                            accept: "File must be JPG, GIF or PNG"
                    },
                    mode: "Please select Mode",
        //flat_fees: "Please enter Flat_Fees",
                    flat_fees: {
                        required: "Please enter Flat fees",
                        number: "Flat Fees Should be Number"
                    },
                    status: "Please select Status",
                },
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		submitHandler: function()
		{
                    var data = $('#save_ec').serialize();
                    $.ajax({
                            type: "POST",	
                            data: data,
                            url: site_url+"adminecurrency/save_ec", 
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

                                          window.location = site_url+'adminecurrency';
                                }
                                else
                                {
									jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
/*                                    var error_msg = 'Unable to process.. please check the data';
                                    $('.jerror_msg').html(error_msg);
*/                                }
                            },
                            complete : function()
                            {
                                    //$("#sub_grid_tbl").trigger("reloadGrid");
                            }
                    });
		}
	});
        
	$('.jsave_ec').live('click',function(){
		$("#save_ec").submit();
	})
	$('.jcancel').live('click',function(){
		window.location = site_url+'adminecurrency';
	})	
});
</script>
<script type="text/javascript">
  var app_name = '<?php echo $this->config->item('app_name') ?>';
        $(function(){
            
           $('.myfile').uploadify({
                    'uploader'  : site_url+'uploadify/uploadify.swf',
                    'script'    : '<?php echo site_url();  ?>uploadify/uploadify.php',
                    //'script'    : '<?php //echo site_url('uploadify');  ?>',
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
            
        });
</script>
</div>
</body>
</html>