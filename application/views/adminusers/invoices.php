 	 <?php $this->load->view('common/admin/main_header'); ?>
	 
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/adapters/jquery.js"></script>

    <script>
        var site_url = '<?php echo site_url(); ?>'
        $(document).ready(function(){
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });
            //contact us messages grid view
            jQuery("#sub_grid_tbl").jqGrid431({
                url:'<?php echo site_url(); ?>adminusers/get_invoicelist',
                datatype: "json",
                mtype:'POST',
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                colNames:['Name','Login','Amount','Sender', 'Bank', 'Date Added','DOwnload'],
                colModel:[
                    {name:'name',index:'name'},
                    {name:'login',index:'login'},
                    {name:'amount',index:'amount'},
                    {name:'sender',index:'sender'},
                    {name:'bank',index:'bank'},
                    {name:'date_added',index:'date_added '},
                    {name:'download',index:'download'}
                ],
                rowNum:13,
                //rowList:[10,20,30],
                pager: '#sub_grid_pager',
                sortname: 'id',
                viewrecords: true,
                sortorder: "desc",
                multiselect: false,
                childGrid: true,
                childGridIndex: "rows",
                loadtext:'<img src="<?php echo base_url(); ?>public/images/36.gif"/>'
            });
            
            $(".flip").click(function(){
                $(".panel").slideToggle("slow");
                $(this).toggleClass("dwn");
            });

            
                
            $(".japply_filter").live('click',function(){
                postData={};
                var filterFieldNames=['login','name','bank'];
                for(i in filterFieldNames){
                    postData[filterFieldNames[i]]=$('[name="'+filterFieldNames[i]+'"]').val();
                }
                $("#sub_grid_tbl").setGridParam({
                    postData: postData
                }).trigger("reloadGrid");
            });

            

        });
    </script>
    <style type="text/css">
        .app select.sl_bx {
            width: 180px;
        }
    </style>

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
                    <a class="current">Users</a>
                </article>
                <a class="button blue" href="<?php echo site_url('adminusers/get_report');?>">Get User Email CSV Reports</a>
                    
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            <div class="flip">Filters</div>
            <div class="panel flt_panel">
                <div class="d_fds">
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="f_un">Acc No:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="login" id="nloginame" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="f_un">Name:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="name" id="name" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl">
                        <div class="left_fld">
                            <label for="f_tn">Bank:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="bank" id="bank" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                   
                    <div class="cb"></div>
					
					<div class="cb"></div>
                    <!--                
                                    <select id="payment_methods_id" class="sl_bx required" name="payment_methods_id" title="Please choose a Payment Method">
                                        <option value=''>Select Payment Method</option><option value='2' >HSBC HONG KONG (BANK WIRE)</option><option value='3' >SCB</option><option value='1' >TECHNOCASH</option>                </select>
                    -->
                    <a class="nblu_btn japply_filter">
                        <span class="inner-btn">
                            <span class="label">Apply Filter</span>
                        </span>
                    </a>
                </div>
                
                
               </div>
            <div class="form_prp mar20" style="margin-top: 0px;">
                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>
            </div>
        </section>
            
        <script>
            $(function(){
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