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
                url:'<?php echo site_url(); ?>userpages/get_walletlog',
                datatype: "json",
                mtype:'POST',
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                colNames:['ID','Amount','Log Description'],
                colModel:[
                    {name:'id',index:'id'},
                    {name:'amount',index:'amount'},
                    {name:'message',index:'message'}
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
                loadtext:'<img src="<?php echo base_url(); ?>public/images/36.gif"/>'
            });
            
            $(".flip").click(function(){
                $(".panel").slideToggle("slow");
                $(this).toggleClass("dwn");
            });

            
                
            $(".japply_filter").live('click',function(){
                postData={};
                var filterFieldNames=['message'];
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
    <body class="app mywallet_update new_mywallet_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div id="main-menu" class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">My Wallet: <?php echo ($mywallet!='')?$mywallet:'0';?></div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">My Wallet Log
						<?php if($account_for!='2') $deposit='depositmt4'; else $deposit='depositnew';?>
                        <a class="button blue" href="<?php echo site_url('userpages/'.$deposit);?>">Deposit</a> 
                        <a class="button blue" href="<?php echo site_url('userpages/withdrawalnew');?>">Withdrawl</a>
						<?php //}?>
                        </div>
            
        <section id="main" class="column section">
            <div class="flip col_white">Filters</div>
            <div class="panel flt_panel">
                <div class="d_fds">
			<div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="f_un">Log Description:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="message" id="message" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
			<a class="nblu_btn japply_filter">
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
        </style>
    </body>
</html>