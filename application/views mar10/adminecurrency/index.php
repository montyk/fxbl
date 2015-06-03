<?php $this->load->view('common/admin/main_header'); ?>

    <script>
		$(document).ready(function(){
		$.ajaxSetup({
			 jsonp: null,
			 jsonpCallback: null
		  });
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url('adminecurrency/getecdata');?>',
				datatype: "json",
				mtype:'POST',
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['eCurrency Name','Logo', 'Currency mode', 'Edit'],
				colModel:[
					{name:'name',index:'name'},
					{name:'logo_image',index:'logo_image',align:"center"},
					{name:'mode',index:'mode'},
					{name:'edit',index:'edit'}				
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
			$('.jedit_ec,.jadd_ec').live('click',function(){
				var ec_title = 'Edit eCurrency';
				if($(this).hasClass('jadd_ec'))
				{
					var ec_title = 'Add eCurrency';
				}
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: "<?php echo site_url('adminecurrency/ecurrency_view');?>", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addecurrency').html(data);
							$('.j_ae_ecur_txt').text(ec_title);
								$.blockUI({ 
									message: $('#addecurrency'), 
									css: { 
										marginTop:  -($('.m_w').height())/2,
										left:'50%',
										top:'50%',
										width:'450px',
										marginLeft:'-225px',
										height: 'auto'
									} 
								}); 
					},
					complete : function()
					{
					}
				});
			});
			
			/*$('.jadd_ec').live('click',function(){
				$('.j_ae_ecur_txt').text('Add eCurrency');
				$.blockUI({ 
					message: $('#addecurrency'), 
					css: { 
						marginTop:  -($('.m_w').height())/2,
						marginLeft: '-225px', 
						left:'50%',
						top:'50%',
						width: '450px',
						height: 'auto'
					} 
				}); 
			});*/
			
			$('.j_u_m').live('click',function(){
				$.unblockUI();
			});
			
			<!--Start@@ajax-->
			function generateCron()
			{
			 $.ajax({
			   type: "POST",
			   url: "settings/get_crons",
			   dataType: "json",
			   beforeSend: function(){
				$("#"+active_section).html($.spinner());
			   },
			   success: function(dataD){
				$("#"+active_section).html(dataD);
			   },
			   error: function(){
				return "<div class='error'>Unable to retrieve data</div>"; 
			   }
			 });
			}
			<!--End@@ajax-->
			
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
    
        <div class="form_prp mar0">
        
            <table id="sub_grid_tbl" class="cs_gd"></table>
			<div id="sub_grid_pager"></div>
        
        
        </div>
    
		
	</section>
    
    <!--Start@@code for the Modal Window-->
	
    <div id="addecurrency" class="m_w">
    	
    </div>
	
    <!--End@@code for the Modal Window-->
	</div>
</body>

</html>