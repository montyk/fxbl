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
				url:'<?php echo site_url();?>adminwithdrawal_requests/get_withdrawal_requests',
				datatype: "json",
				mtype:'POST',
				height: $('#sidebar').height()-24,
				width: $('.form_prp').width()-10,
				colNames:['User Name','Email ID', 'Phone', 'Amount', 'Message','Request Date','Status'],
				colModel:[
					{name:'firstname',index:'firstname'},
					{name:'email',index:'email'},
					{name:'phone',index:'phone'},
					{name:'amount',index:'amount'},
					{name:'message',index:'message', sortable:false},
					{name:'date_added',index:'date_added'},
					{name:'status',index:'status'}				
				],
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'date_added',
				viewrecords: true,
				sortorder: "desc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows",
                                loadtext:'<img src="<?php echo base_url();  ?>public/images/36.gif"/>'
			});
			
                        //for cancel action	
                        $('.jcon_us_cancel').live('click',function(){
                                window.location = site_url+'admincontactus';
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
                    <a class="current">Withdrawal Requests</a>
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