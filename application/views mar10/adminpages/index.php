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
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url();?>adminpages/getpagesdata',
				datatype: "json",
				mtype:'POST',
				height: 'auto',
				width: $('.form_prp').width()-20,
				colNames:['Page name','Language','Status','Edit','Link'],
				colModel:[
					{name:'name',index:'name'},
					{name:'language_id',index:'language_id'},
					{name:'status',index:'status'},
					{name:'edit',index:'edit'},
					{name:'link',index:'link'}				
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
                
                
                /**
                 * Filter Interactions
                 */
                $(".flip").click(function(){
                    $(".panel").slideToggle("slow");
                    $(this).toggleClass("dwn");
                });
                
                
                $(".japply_filter").live('click',function(){
                    postData={};
                    var filterFieldNames=['name','title','url_key','language_id'];
                    for(i in filterFieldNames){
                        postData[filterFieldNames[i]]=$('[name="'+filterFieldNames[i]+'"]').val();
                    }
                    $("#sub_grid_tbl").setGridParam({
                        postData: postData
                    }).trigger("reloadGrid");
                });
                
                
	});
    </script>
    <script type="text/javascript">
        $(function(){
            //$('.column').equalHeight();
        });
    </script>
    <style type="text/css">
        div.panel select {
            width: 180px !important;
        }
    </style>

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
                <a class="current">Pages</a>
             </article>
             <a class="nblu_btn add_ecur fr jadd_page" href="<?php echo site_url();?>adminpages/add_page">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url();?>public/images/spacer.gif">
                        	Add Page
                        </span>
                    </span>
                </a>
		</div>
	</section><!-- end of secondary bar -->
	

	
	<section id="main" class="column">
            <div class="flip">Filters</div>
            <div class="panel flt_panel">
                    <div class="d_fds">
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="name">Page Name:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="name" id="name" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl">
                        <div class="left_fld">
                            <label for="title">Title:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="title" id="title" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="cb"></div>
                </div>


                <div>
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="url_key">Page URL:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="url_key" id="url_key" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="url_key">Language:</label> 
                        </div>
                        <div class="right_fld">
                            <select id="language_id" class="sl_bx required" name="language_id" title="Please choose a Language">
                                <?php echo selectBox('Select Language','languages','id,name',' status=1 ',((!empty($language_id))?$language_id:0),'');  ?>
                            </select>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="cb"></div>
    
                    <a class="nblu_btn japply_filter">
                        <span class="inner-btn">
                            <span class="label">Apply Filter</span>
                        </span>
                    </a>
                </div>

            </div>
            
            <div class="form_prp mar0">

                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>


            </div>
	</section>
    
    <!--Start@@code for the Modal Window-->
	
    <div id="addpayment" class="m_w">
    	
    </div>

	
    <!--End@@code for the Modal Window-->

<!-- End of RTE Files -->

</div>

</body>

</html>