 	 <?php $this->load->view('common/admin/main_header'); ?>
	 
	<?php $this->load->view('common/includes.php');?>
    <script>
		$(document).ready(function(){
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'js/data/data_3.php',
				datatype: "json",
				height: $('#sidebar').height(),
				width: $('#main').width()-4,
				colNames:['Flag', 'Transaction Number', 'User Name', 'Payment Method', 'LR Number','Elasped Time','Date','Total Number','Status','More'],
				colModel:[
					{name:'flag',index:'flag'},
					{name:'trannumber',index:'trannumber'},
					{name:'username',index:'username'},
					{name:'paymet',index:'paymet'},
					{name:'lrnum',index:'lrnum'},
					{name:'eltm',index:'eltm'},
					{name:'date',index:'date'},
					{name:'totnum',index:'totnum'},
					{name:'status',index:'status'},
					{name:'more',index:'more'}
				],
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'id',
				viewrecords: true,
				sortorder: "desc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows"
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
		$(function() {
			$( "#tabs" ).tabs();
		});
	</script>
  

</head>

<body class="app">


 	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	<section id="secondary_bar" class="section">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Archived orders</a>
             </article>
            <!-- <input type="button" value="Add Liberty Account" class="add_ecur fr" />-->
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column tab_grid section">
    	
        <ul class="tab_navgts ul_reset">
        	<li>
                <a class="tab_anc  act_nvg" href="archive.php">
                    <span class="inner-btn">
                    	<span class="label"> Buy LR</span>
                    </span>
                </a>
            </li>
            <li>
                <a class="tab_anc" href="archive_sell.php">
                    <span class="inner-btn">
                    	<span class="label"> Sell LR</span>
                    </span>
                </a>
            </li>
        </ul>
        
        <div id="tabs-1" class="grd_pn">
            <table id="sub_grid_tbl" class="cs_gd"></table>
            <div id="sub_grid_pager"></div>
        </div>
            
		
	</section>
    </div>
</body>

</html>