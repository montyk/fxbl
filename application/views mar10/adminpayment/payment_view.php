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
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Payment Methods</a>
             </article>
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    
        <div class="form_prp">
			<form name="save_pm" id="save_pm" action="<?php //echo site_url('adminpayment/save_pm');?>" enctype="multipart/form-data" method="post" >
			<input type='hidden' name='id' id='id' value='<?php echo $id;?>'/> 	
            <div class="h_2"><?php echo $label;?> Paymenet Method</div>
           <div class="d_fds">
				<div class="left_fld">
					<label for="bname"><span class="validcol">*</span> Bank Name:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='name' id='name' value='<?php echo $name?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			 <div class="d_fds">
				<div class="left_fld">
					<label for="baddress"><span class="validcol">*</span> Bank Address:</label> 
				</div>
				<div class="right_fld">
					  <textarea class="t_ar required" name="bank_address" id="bank_address"><?php echo $bank_address?></textarea>
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
				<!--<div class="left_fld">
					<label for="blogo"><?php //echo $star_symbol;?> Bank Logo:</label> 
				</div>
				<div class="right_fld">
					  <input type='file' name='userfile' id='userfile' value='' class="<?php //echo $req_class;?>"/>
				</div>-->
				<label for="myfile">Upload Files:*</label>
                    <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                    <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
		   <?php if(isset($url) &&  $url != '')
				 { 	?>
					<!--<a href='<?php //echo site_url().'adminnews/fileDownload/'.$att_id;?>'>-->
					<span><?php //echo $original_file_name; 
					echo attachment($db_file_name,$original_file_name); ?></span>
					<!--</a>-->
			<?php
				 }?>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="AccountName"><span class="validcol">*</span> Beneficiary's name:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='account_name' id='account_name' value='<?php echo $account_name; ?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="AccountNumber"><span class="validcol">*</span> Bank Account No. / IBAN:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='account_number' id='account_number' value='<?php echo $account_number; ?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="uniifsc"><span class="validcol">*</span> Bank SWIFT / ABA:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='ifsc_code' id='ifsc_code' value='<?php echo $ifsc_code; ?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="bflat_fees"><span class="validcol">*</span> Flat Fee:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='flat_fee' id='flat_fee' value='<?php echo $flat_fee; ?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="bflat_fees"><span class="validcol">*</span> Flat Fee2:</label> 
				</div>
				<div class="right_fld">
					  <input type='text' name='flat_fee2' id='flat_fee2' value='<?php echo $flat_fee2; ?>' class="required ip"/>
				</div>
				<div class="cb"></div>
			</div>
			
			<div class="d_fds">
				<div class="left_fld">
					<label for="useraddress"><span class="validcol">*</span> Beneficiary's address:</label> 
				</div>
				<div class="right_fld">
					  <textarea class="t_ar required" name="address" id="address"><?php echo $address; ?></textarea>
				</div>
				<div class="cb"></div>
			</div>
                        <div class="d_fds">
                            <div class="left_fld">
                                <label for="description"><span class="validcol">*</span> Description:</label> 
                            </div>
                            <div class="right_fld">
                                <textarea class="t_ar required" name="description" id="description"><?php if(!empty($description)) echo $description; ?></textarea>
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
             	<input type='button' name='save' value='Save' class="alt_btn jsave_pm" />
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
	$("#save_pm").validate({
                rules: {
                    name: "required",
                    description: "required",
                    bank_address: "required",
                    myfile: { 
                            <?php if(isset($url) &&  $url == '')
                            {?>
                            required: true, 
                            <?php } ?>
                            accept: "png|jpe?g|gif"
                    },
                    account_name: "required",
                    account_number: {
                    required: true,
                    number: true
                    },
                    ifsc_code: "required",
                    flat_fee: {
                    required: true,
                    number: true
                    },
                    flat_fee2: {
                    required: true,
                    number: true
                    },
                    address: "required",
                    status: "required"
                },
                messages: {
                    name: "Please enter Bank Name",
                    description: "Please enter a description",
                    bank_address: "Please enter Bank address",
                    myfile: { 
                            <?php if(isset($url) &&  $url == '')
                            {?>
                            required: "Please select Attachment", 
                            <?php } ?>
                            accept: "File must be JPG, GIF or PNG"
                    },
                    account_name: "Please enter Account Name",
                    account_number: {
                    required: "Please enter Account Number",
                    number: "Account Number Should be Number"
                    },
                    ifsc_code : "Please enter Unique/IFSC code",
                    flat_fee: {
                    required: "Please enter Flat fee",
                    number: "Flat fee Should be Number"
                    },
                    flat_fee2: {
                    required: "Please enter Flat fee2",
                    number: "Flat fee2 Should be Number"
                    },
                    address: "Please enter Address",
                    status: "Please select Status"
                },
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#save_pm').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: site_url+"adminpayment/save_pm", 
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

							  window.location = site_url+'adminpayment';
					}
					else
					{
						jError('Page name already exist.. please check the data',{HorizontalPosition : 'center', VerticalPosition : 'center'});
		/*				var error_msg = 'Unable to process.. please check the data';
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
	$('.jsave_pm').live('click',function(){
		$("#save_pm").submit();
	})
	$('.jcancel').live('click',function(){
		window.location = site_url+'adminpayment';
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