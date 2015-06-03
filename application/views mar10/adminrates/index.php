<?php $this->load->view('common/admin/main_header'); ?>
	
	<link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />

    <script>
		$(document).ready(function(){
			$.ajaxSetup({
				 jsonp: null,
				 jsonpCallback: null
			  });
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url();?>adminrates/getratesdata',
				datatype: "json",
				mtype: 'POST', 
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['From', 'To', 'Fees', 'Payment Method','Ecurrency type', 'Edit'],
				colModel:[
					{name:'from',index:'from'},
					{name:'to',index:'to'},
					{name:'fee',index:'fee'},
					{name:'paymtd',index:'paymtd'},
					{name:'ecurtyp',index:'ecurtyp'},
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
				/*subGrid : true,
				
				subGridUrl: 'data/data_sub_0.php',
				subGridModel: [
					{ 
						name  : ['No','Item','Qty', "Grade"], 
						width : [55, 90,100,80] 
					} 
				],
				subGridOptions: {
					//expandOnLoad: true,
					showHeader: false,
					width: "100%",
				}*/
				//caption: "Subgrid Example"
				
			});
			$('.jedit_rate,.jadd_rate').live('click',function(){
				var ec_title = 'Edit Rate';
				if($(this).hasClass('jadd_rate'))
				{
					var ec_title = 'Add Rate';
				}
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: "<?php echo site_url();?>adminrates/rates_view", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addrates').html(data);
							$('.j_ae_ecur_txt').text(ec_title);
								$.blockUI({ 
									message: $('#addrates'), 
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
			
			/*$('.edit_ecur').live('click',function(){
				$('.j_ae_ecur_txt').text('Edit Rate');
				$.blockUI({ 
					message: $('#addrates'), 
					css: { 
						marginTop:  -($('.m_w').height())/2,
						marginLeft: '-225px', 
						left:'50%',
						top:'50%',
						width: '450px',
						height: 'auto'
					} 
				}); 
			});
			
			$('.add_ecur').live('click',function(){
				$('.j_ae_ecur_txt').text('Add Rate');
				$.blockUI({ 
					message: $('#addrates'), 
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
			
			$(".flip").click(function(){
				$(".panel").slideToggle("slow");
				//$('.flip').toggleClass("bod_top");
				//$('.panel').toggleClass("bod_bot");
			 });
			 
			 $(".japply_filter").live('click',function(){
				var payment_method = $('#payment_method').val();
				var ecurrencies = $('#ecurrencies').val();
				$("#sub_grid_tbl").setGridParam({
				url: '<?php echo site_url();?>adminrates/getratesdata',
				postData: {"payment_method":payment_method,"ecurrencies":ecurrencies}
				}).trigger("reloadGrid");
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

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	<section id="secondary_bar" class="section">
        <div class="breadcrumbs_container">
            <article class="breadcrumbs article">
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Rates</a>
             </article>
             <a class="nblu_btn fr " href="<?php echo site_url();?>adminrates/rates_view">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url();?>public/images/spacer.gif">
                            Add Rate
                        </span>
                    </span>
                </a>
        </div>
        
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column section">
    	<?php //echo '<pre>';print_r($payment_methods);print_r($ecurrencies);?>
        <div class="flip">Filters</div>
        <div class="panel">
            <select class="sl_bx" name='payment_method' id='payment_method'>
                <option value="">Select Payment Method</option>
                <?php foreach($payment_methods as $pm_k=>$pm_v){?>
					<option value="<?php echo $pm_v->id;?>"><?php echo $pm_v->name;?></option>
				<?php }?>
            </select>
            <select class="sl_bx" name='ecurrencies' id='ecurrencies'>
                <option value="">Select eCurrency Type </option>
                <?php foreach($ecurrencies as $ec_k=>$ec_v){?>
					<option value="<?php echo $ec_v->id;?>"><?php echo $ec_v->name;?></option>
				<?php }?>    
            </select>
            <a class="nblu_btn japply_filter">
                    <span class="inner-btn">
                        <span class="label">Apply Filter</span>
                    </span>
                </a>
        </div>
        
        
    
        <div class="form_prp mar0">
        
            <table id="sub_grid_tbl" class="cs_gd"></table>
			<div id="sub_grid_pager"></div>
        
        
        </div>
    
		
	</section>
    
    <!--Start@@code for the Modal Window-->
	
    <div id="addrates" class="m_w">
    	
    </div>
</div>
    <!--End@@code for the Modal Window-->
</body>

</html>