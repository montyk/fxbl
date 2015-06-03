 	 <?php $this->load->view('common/admin/main_header'); ?>
	 
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/ckeditor/adapters/jquery.js"></script>

    <script>
	var site_url = '<?php echo site_url();?>'
		$(document).ready(function(){
		$.ajaxSetup({
			 jsonp: null,
			 jsonpCallback: null
		  });
			//contact us messages grid view
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url();?>admincontactus/getcontactusdata',
				datatype: "json",
				mtype:'POST',
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['Email','Name', 'Date', 'View', 'Reply'],
				colModel:[
					{name:'email',index:'email'},
					{name:'name',index:'name'},
					{name:'date',index:'date'},
					{name:'view',index:'view'},
					{name:'reply',index:'reply'}				
				],
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'id',
				viewrecords: true,
				sortorder: "desc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows",
                                loadtext:'<img src="<?php echo base_url();  ?>public/images/36.gif"/>'
			});
			
			//For getting contact us message view
			$('.jview').live('click',function(){
			$('.ui-jqgrid-hdiv').hide();
			$('#sub_grid_tbl').hide();
			$('#sub_grid_pager').hide();
			var id = $(this).attr('id');
			qry_str = 'id='+id;		
					$.ajax({
					type: "POST",	
					data: qry_str,
					url: '<?php echo site_url();?>admincontactus/contactus_view', 
					beforeSend : function(){
					},
					success: function(data)
					{
					$('#sub_grid_tbl').html(data).show();
					$('#sub_grid_tbl').removeClass('ui-jqgrid-btable');
					},
					complete : function()
					{
					}
				});
				
			});
			
			//For getting reply email form
			/*$('.jreply_mail').live('click',function(){
			$('.ui-jqgrid-hdiv').hide();
			$('#sub_grid_tbl').hide();
			$('#sub_grid_pager').hide();
			var id = $(this).attr('id');
			var email = $(this).attr('email');
			var subject = $(this).attr('subject');
			qry_str = 'id='+id+'&email='+email+'&subject='+subject;		
					$.ajax({
					type: "POST",	
					data: qry_str,
					url: '<?php echo site_url();?>admincontactus/reply_mail', 
					beforeSend : function(){
					},
					success: function(data)
					{
					$('#sub_grid_tbl').html(data).show();
					$('#sub_grid_tbl').removeClass('ui-jqgrid-btable');
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
					},
					complete : function()
					{
					}
				});
				
			});*/
			
		//for cancel action	
		$('.jcon_us_cancel').live('click',function(){
			window.location = site_url+'admincontactus';
		});
		
		//sending reply mail
		/*$('.jsend_mail').live('click',function(){
			var mail_data = $('#reply_mail').serialize();
			var email = $('#email').val();
			var subject = $('#subject').val();
			var content = $('#content').val();
			
			var mail_data = 'email='+email+'&subject='+subject+'&content='+content;	
				$.ajax({
					type: "POST",	
					data: mail_data,
					url: site_url+"admincontactus/send_mail", 
					beforeSend : function(){
					},
					success: function(data)
					{
						//window.location = site_url+'admincontactus';
					},
					complete : function()
					{
						//$("#sub_grid_tbl").trigger("reloadGrid");
					}
				});
			});	*/
			/*$("#reply_mail").validate({
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
					var mail_data = $('#reply_mail').serialize();
					var email = $('#email').val();
					var subject = $('#subject').val();
					var content = $('#content').val();
					var mail_data = 'email='+email+'&subject='+subject+'&content='+content;	
					$.ajax({
						type: "POST",	
						data: mail_data,
						url: site_url+"admincontactus/send_mail", 
						beforeSend : function(){
						},
						success: function(data)
						{
							//window.location = site_url+'admincontactus';
						},
						complete : function()
						{
							//$("#sub_grid_tbl").trigger("reloadGrid");
						}
					});
				}
			});
				
			$('.jsend_mail').live('click',function(){
				$("#reply_mail").submit();
			});*/
			
			
			
		});
	</script>
	<script type="text/javascript">

	$(document).ready(function() {
		
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
    
    <?php $this->load->view('common/leftnav'); ?>
             
    <div class="right_content">
        
        <?php $this->load->view('common/admin/menu_header'); ?>
             
        <section id="secondary_bar" class="section">
            
            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Contact Us</a>
                </article>
                    
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            <div class="form_prp mar20">
                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>
            </div>
        </section>
            
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
    </div>
</body>

</html>