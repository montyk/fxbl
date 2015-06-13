<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - My Wallet</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
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
                url:'<?php echo site_url(); ?>userpages/get_managersdata',
                datatype: "json",
                mtype:'POST',
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                 colNames:['Yield','Account','Balance','Name', 'Minimum Deposit (USD)','Success Fee (%)', 'Penaulty Fee (%)','Trading Period'],
               colModel:[
                    {name:'id',index:'id'},
                    {name:'login',index:'login'},
                    {name:'balance',index:'balance'},
                    {name:'trading_name',index:'trading_name'},
                    {name:'minimum_deposit',index:'minimum_deposit'},
                    {name:'success_fee',index:'success_fee'},
                    {name:'penalty_fee',index:'penalty_fee'},
                    {name:'trading_period',index:'trading_period'}
                ],
                rowNum:7,
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
                var filterFieldNames=['login','trading_name'];
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
    <style type="text/css">
        .app select.sl_bx {
            width: 180px;
        }
    </style>

        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/css/pepper-grinder/jquery-ui-1.10.3.custom.min.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
 </head>
    <body class="app getmanager_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">PAMM Managers</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">PAMM Managers List</div>

                        
                        
                        
                        
                        
                      
                        
                        
            
        <section id="main" class="column section">
            <div class="flip col_white">Filters</div>
            <div class="panel flt_panel">
                <div class="d_fds get_updatemanger">
					<div class="fl">
                        <div class="left_fld">
                            <label for="f_un">Account:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="login" id="login" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl second">
                        <div class="left_fld">
                            <label for="f_tn">Trading Name:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="trading_name" id="trading_name" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                   
					<a class="nblu_btn japply_filter fl">
                        <span class="inner-btn">
                            <span class="label">Apply Filter</span>
                        </span>
                    </a>
                     <div class="cb"></div>

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
                </div>
            </div> 
            
            
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        <style type="text/css" rel="stylesheet">
            .app .sum_box .box {
                width: 200px;
            }
            html{background: url(../public/images/fabric-patterns-03.png) repeat  !important;}
        </style>
    </body>
</html>