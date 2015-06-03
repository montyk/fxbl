<?php $this->load->view('common/admin/main_header'); ?>
	
    <script type="text/javascript">
        var site_url = '<?php echo site_url(); ?>'
        $(document).ready(function(){
            
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });

            jQuery("#sub_grid_tbl").jqGrid431({
                url:'<?php echo site_url('adminwidgets/widgets_grid'); ?>',
                mtype:'POST',
                datatype: "JSON",
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                colNames:['Name','Widget Type','Widget Embed Code','Status','Edit', 'Delete'],
                colModel:[
                    {name:'name',index:'name'},
                    {name:'widget_type_id',index:'widget_type_id'},
                    {name:'embed_code',index:'embed_code', sortable:false},
                    {name:'status',index:'status'},
                    {name:'edit',index:'edit', sortable:false},
                    {name:'delete',index:'delete', sortable:false}	
                ],
                rowNum:10,
                //rowList:[10,20,30],
                pager: '#sub_grid_pager',
                sortname: 'name',
                viewrecords: true,
                sortorder: "desc",
                multiselect: false,
                childGrid: true,
                childGridIndex: "rows",
                loadtext:'<img src="<?php echo base_url(); ?>public/images/36.gif"/>'
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
            
            $('.jdelete_widget').live('click',function(){
               if(confirm('Do you want to delete this widget.?')){
                   id=$(this).attr('id');
                   window.location='<?php echo site_url('adminwidgets/delete_widget'); ?>/'+id;
               }
            });
            
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
                    <a class="current">Widget Gallery</a>
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
            
            <div>
                <?php $this->load->view('common/notifications'); ?>
            </div>
            
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