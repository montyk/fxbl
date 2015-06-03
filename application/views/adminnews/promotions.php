<?php $this->load->view('common/admin/main_header'); ?>

    <script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>
    <script>
		$(document).ready(function(){
			$.ajaxSetup({
			 jsonp: null,
			 jsonpCallback: null
		  });
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url();?>adminnews/promotions',
				datatype: "json",
				mtype:'POST',
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['Name', 'Description', 'From','To', 'Edit'],
				colModel:[
					{name:'name',index:'name',width:'450'},
					{name:'description',index:'description'},
					{name:'from',index:'from'},
					{name:'to',index:'to'},
					{name:'edit',index:'edit',sortable:false}				
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
			
			
			$('.j_u_m').live('click',function(){
				//$('.jquery_ckeditor').ckeditorGet().destroy();
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
                <img src="<?php echo base_url();  ?>misc/css/images/fav.png" class="fl bread_logo" />
                <div class="breadcrumb_divider"></div>
                <a class="current">News</a>
             </article>
             <a class="nblu_btn add_ecur fr jadd_news1" href="<?php echo site_url();?>adminnews/news_view">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url();?>public/images/spacer.gif">
                        	Add News
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
	
    <div id="addnews" class="m_w">
    	
    </div>
	
    <!--End@@code for the Modal Window-->
	</div>
</body>

</html>