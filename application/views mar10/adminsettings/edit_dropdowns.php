<?php $this->load->view('common/admin/main_header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/autoSuggest.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.autoSuggest_custom.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-for-pages.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>misc/widgets/css/bootstrap-responsive-for-pages.css" />

<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>'
    $(document).ready(function(){
        $.ajaxSetup({
            jsonp: null,
            jsonpCallback: null
        });
        
        // $("#settings_form").validate();
        
        
        
        
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
        
        $('#dropdown').live('change',function(){
            dataP=$('#dropdown').serialize();
            if($('#dropdown').val()!=''){
                $.ajax({
                    url:site_url+'adminsettings/edit_dropdowns',
                    data:dataP,
                    type:'POST',

                    beforeSend:function(){

                    },
                    success:function(dataR){
                        $('#system_dropdown_form_wrap').html(dataR);
                        $("#system_dropdown_form_wrap form").validate();
                    }
                });
            }else{
                $('#system_dropdown_form_wrap').html('');
            }
        });
        
        /*
         * Edit Inline Functionalities
         */
        
        
        $('.j_ei_edit').live('click',function(){
            $(this).parents('form').addClass('edit-mode');
        });
        
        $('.j_ei_cancel').live('click',function(){
            $(this).parents('form').removeClass('edit-mode');
            $(this).parents('form').find('.j_ei_name_ip').val($.trim($(this).parents('form').find('.j_ei_name').html()));
            $(this).parents('form').find('.j_status').val($(this).parents('form').find('.j_status_copy').val());
        });
        
        
        $('.j_ei_save').live('click',function(){
            var url=$(this).parents('form').attr('action'),
            dataP=$(this).parents('form').serialize()+'&dropdown='+$('#dropdown').val(),
            thisObj=$(this);
            if($(this).parents('form').valid())
            $.ajax({
                url:url,
                data:dataP,
                type:'POST',
                beforeSend:function(){
                    // console.log(thisObj.parents('form'))
                    thisObj.parents('form').find('.ei-loading').show();
                },
                success:function(dataR){
                    if(dataR!='0'){
                        thisObj.parents('form').find('[name="id"]').val(dataR);
                    }
                    thisObj.parents('form').find('.ei-loading').hide();
                    thisObj.parents('form').removeClass('edit-mode');
                    thisObj.parents('form').find('.j_ei_name').html($.trim(thisObj.parents('form').find('.j_ei_name_ip').val()));
                    thisObj.parents('form').find('.j_ei_status').html($.trim(thisObj.parents('form').find('.j_status option:selected').text()));
                    thisObj.parents('form').find('.j_status_copy').val(thisObj.parents('form').find('.j_status').val());
                }
            });
            
        });
        
        $('.j_ei_add_new').live('click',function(){
            newRecord=$('<div class="d_fds" />').html($('#new_record').html()).clone();
            $(newRecord).insertBefore($(this));
            $("#system_dropdown_form_wrap form").validate();
        });
        
    });
</script>
<style type="text/css">
    div.panel select {
        width: 180px !important;
    }
    .menus_list{
        padding: 5px;
    }
    .no_border{
        border: none !important;
        box-shadow: none !important;
    }
    .as-selections{
        width:310px;
    }
    .remove_menu, .edit_menu, .add_menu{
        margin: 0px 5px;
        padding: 1px 5px;
        font-weight: bold;
        font-size: 9px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow:1px 1px 1px #ccc;
        cursor: pointer;
    }
    .add_menu{
        padding: 2px 8px;
        font-size: 12px;
        color: green;
        margin: 5px 0;
        font-weight: normal;
    }
    .menus_list{
        float:left;
    }
    .menus_list ul li{
        cursor: pointer;
        margin: 5px;
        padding: 3px;
        border:1px solid #ccc;
        border-radius: 4px;
        box-shadow:1px 1px 1px #ccc;
    }
    .add_menu_form_wrap{
        margin: 5px;
        margin-bottom: 50px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 1px 1px 1px #ccc;
    }
    ul.as-list{
        max-height: 270px;
        overflow: auto;
    }
    .dropdown_name{
        width: 230px;
    }
    
    /*Edit Inline Styles*/
    .ei-form .ei-edit{
        display: none !important;
    }
    .ei-form.edit-mode .ei-edit{
        display: inline !important;
    }
    .ei-form.edit-mode .ei-view{
        display: none !important;
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
					<img src="<?php echo base_url();  ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">System Dropdowns</a>
                </article>
                <!--                
                <a class="nblu_btn add_ecur fr jadd_page" href="<?php echo site_url(); ?>adminpages/add_page">
                    <span class="inner-btn">
                        <span class="label"><img class="small_plus_icon" height="16" width="16" src="<?php echo base_url(); ?>public/images/spacer.gif">
                            Add Page
                        </span>
                    </span>
                </a>
                -->
            </div>
        </section><!-- end of secondary bar -->



        <section id="main" class="column">
            
            <div class="form_prp mar0">
                <?php // echo '<pre>'; print_r($settings); echo '</pre>';  ?>
                
                
                <div class="" style="padding: 10px;">
                    <?php $this->load->view('common/notifications'); ?>
                    <?php $formToken=$this->formtoken->getField(); ?>
                    
                    <div class="add_menu_form_wrap">
                        <p><div class="h_2">System Dropdowns</div></p>
                        <!--<form name="settings_form" id="settings_form" action="<?php echo site_url('adminsettings/save_settings')  ?>" method="post" class="save_settings_form">-->
                            
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="dropdown"> Dropdown:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <select id="dropdown" class="sl_bx " name="dropdown" title="Please select a Dropdown">
                                        <?php echo selectBox('Select a Dropdown to View/Edit', 'sb_dropdown_tables', 'id,name', ' status=1 ','', ((!empty($v->value))?$v->value:'')); ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds dropdown_group" id="system_dropdown_form_wrap">
                                
                            </div>
                            <div class="d_fds dropdown_group hide">	
                                <input type='button' name='save' value='Save' class="alt_btn j_save_menu" />
<!--                                <input type='button' name='cancel' value='Cancel' class="alt_btn j_cancel" />-->
                                <span class="jerror_msg"></span>
                                <?php echo $formToken; ?>		
                            </div>
                        <!--</form>-->
                    </div>
                    
                </div>

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