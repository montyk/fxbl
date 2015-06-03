<?php $this->load->view('common/admin/main_header'); ?>

	<link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />

    <script>
		$(document).ready(function(){
			$.ajaxSetup({
				 jsonp: null,
				 jsonpCallback: null
			  });
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url();?>adminpayment/getpaymentdata',
				datatype: "json",
				mtype:'POST',
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['Bank Name','Bank Logo', "Beneficiary's name", 'Edit'],
				colModel:[
					{name:'bankname',index:'bankname'},
					{name:'banklogo',index:'banklogo',align:"center"},
					{name:'accountname',index:'accountname'},
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
			$('.jedit_pm,.jadd_pm').live('click',function(){
				var ec_title = 'Edit Payment';
				if($(this).hasClass('jadd_pm'))
				{
					var ec_title = 'Add Payment';
				}
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: "<?php echo site_url();?>adminpayment/payment_view", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addpayment').html(data);
							$('.j_ae_ecur_txt').text(ec_title);
								$.blockUI({ 
									message: $('#addpayment'), 
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
				$('.j_ae_ecur_txt').text('Edit Payment');
				$.blockUI({ 
					message: $('#addpayment'), 
					css: { 
						marginTop:  -($('.m_w').height())/2,
						left:'50%',
						top:'50%',
						width:'450px',
						marginLeft:'-225px',
						height: 'auto'
					} 
				}); 
			});
			
			$('.add_ecur').live('click',function(){
				$('.j_ae_ecur_txt').text('Add Payment');
				$.blockUI({ 
					message: $('#addpayment'), 
					css: { 
						marginTop:  -($('.m_w').height())/2,
						left:'50%',
						top:'50%',
						width:'450px',
						marginLeft:'-225px',
						height: 'auto'
					} 
				}); 
			});*/
			
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

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	
	<section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Payment Methods</a>
             </article>
             <a class="nblu_btn fr " href="<?php echo site_url();?>adminpayment/payment_view">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url();?>public/images/spacer.gif">
                        	Add Payment
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
	
    <div id="addpayment" class="m_w">
    	
    </div>
	
    <!--End@@code for the Modal Window-->
	</div>
</body>

</html>