<?php $this->load->view('common/admin/main_header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/autoSuggest.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.autoSuggest_custom.js"></script>
<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>'
    $(document).ready(function(){
        $.ajaxSetup({
            jsonp: null,
            jsonpCallback: null
        });
        
        $('.j_save_menu').live('click',function(){
            $(this).parents('form:first').find('[name="page_id"]').val($(this).parents('form:first').find('.as-values').val())
            $(this).parents('form:first').submit();
        });
        
        $("#settings_form").validate();

        
        
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
                    <a class="current">Menus</a>
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
                        <p><div class="h_2">Settings</div></p>
                        <form name="settings_form" id="settings_form" action="<?php echo site_url('adminsettings/save_settings')  ?>" method="post" class="save_settings_form">
                            
                            <?php if(!empty($settings)){ foreach($settings as $k=>$v){  ?>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="setting<?php echo $v->id; ?>"> <?php echo $v->name; ?>:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                <div>
                                    <?php if($v->type=='text'){ ?>
                                        <input type="text" name="setting[<?php echo $v->id; ?>][value]" id="setting<?php echo $v->id; ?>" value="<?php echo $v->value; ?>" class="  <?php echo $v->validation_classes; ?> ip " title="<?php echo $v->title; ?>" />
                                    <?php } else if($v->type=='select'){ ?>
                                        <select id="setting<?php echo $v->id; ?>" class="sl_bx " name="setting[<?php echo $v->id; ?>][value]" title="<?php echo $v->title; ?>">
                                            <?php echo selectBox('Select', $v->select_table, $v->select_fields, ' status=1 ', ((!empty($v->value))?$v->value:0), ''); ?>
                                        </select>
                                    <?php } ?>
                                </div>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <?php } ?>
                            
                            <div class="d_fds">	
                                <input type='button' name='save' value='Save' class="alt_btn j_save_menu" />
<!--                                <input type='button' name='cancel' value='Cancel' class="alt_btn j_cancel" />-->
                                <span class="jerror_msg"></span>
                                <?php echo $formToken; ?>		
                            </div>
                        </form>
                    </div>
                    
                    <?php } else { ?>
                        <div class="big_info">No Settings Found.</div>
                    <?php } ?>
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