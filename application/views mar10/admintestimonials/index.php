<?php $this->load->view('common/admin/main_header'); ?>
	
    <script>
	var site_url = '<?php echo site_url();?>'
		$(document).ready(function(){
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url('admintestimonials/getTMdata');?>',
                                mtype:'POST',
				datatype: "json",
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['Name','Testimonial','Status','Edit', 'Delete'],
				colModel:[
					{name:'pagename',index:'pagename'},
					{name:'message',index:'message'},
					{name:'status',index:'status'},
					{name:'edit',index:'edit'},
					{name:'delete',index:'delete'}	
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
                        
			$('.jedit_tm').live('click',function(){
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: site_url+"admintestimonials/testimonial_view", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addpayment').html(data);
							$('.j_ae_ecur_txt').text('Edit Testimonial');
								$.blockUI({ 
									message: $('#addpayment'), 
									css: { 
										marginTop:  -($('.m_w').height())/2,
										marginLeft: '-295px', 
										left:'50%',
										top:'50%',
										width: '650px',
										height: 'auto'
									} 
								}); 
					},
					complete : function()
					{
					}
				});
			});
			$('.jconfirm_delete').live('click',function(){
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: site_url+"admintestimonials/delete_tm", 
					beforeSend : function(){
					},
					success: function(data)
					{
						if(data)
						{
							var return_msg = '<div class="m_c"><label for="content">Record Deleted Successfully</label></div>';
						}
						else
						{
							var return_msg = '<div class="m_c"><label for="content">Record Not Deleted... Please try again later</label></div>';
						}
						$('#addpayment').html(return_msg);
						$.blockUI({ 
							message: $('#addpayment'), 
							css: { 
								marginTop:  -($('.m_w').height())/2,
								marginLeft: '-225px', 
								left:'50%',
								top:'50%',
								width: '450px',
								height: '100px'
							} 
						}); 
						setTimeout($.unblockUI, 2000); 
						$("#sub_grid_tbl").trigger("reloadGrid");
					},
					complete : function()
					{
					}
				});
			});
			
			$('.jdelete_tm').live('click',function(){
				var $this= $(this);
				var id = $(this).attr('id');
				var cm = '<div class="m_c"><div class=""><label for="content">This Testimonial will be permanently deleted and cannot be recovered. Are you sure?</label></div></div><div class="m_f ed_img"><a class="prybtn fl jconfirm_delete" id='+id+'><span class="inner-btn"><span class="label">Delete</span></span></a><a class="secbtn fl j_u_m"><span class="inner-btn"><span class="label">Cancel</span></span></a></div>';
				$('#addpayment').html(cm);
				$.blockUI({ 
					message: $('#addpayment'), 
					css: { 
						marginTop:  -($('.m_w').height())/2,
						marginLeft: '-225px', 
						left:'50%',
						top:'50%',
						width: '450px',
						height: '100px'
					} 
				}); 
			});
			$('.j_u_m').live('click',function(){
				$.unblockUI();
			});
			
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
                    <a class="current">Testimonials</a>
                </article>
                <?php /* ?><a class="nblu_btn add_ecur fr">
                  <span class="inner-btn">
                  <span class="label"><img class="small_plus_icon" height="16" width="16" src="images/spacer.gif">
                  Add Testimonial
                  </span>
                  </span>
                  </a><?php */ ?>
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            
            <div class="form_prp mar20">
                
                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>
                    
            </div>
                
        </section>
            
        <!--Start@@code for the Modal Window-->
            
        <div id="addpayment" class="m_w">
            
        </div>
            
        <!--End@@code for the Modal Window-->
    </div>
</body>

</html>