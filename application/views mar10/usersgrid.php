<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>EDEALSPOT Admin Panel</title>
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/layout.css" type="text/css" media="screen" />
        <!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        <script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/js/hideshow.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
        <!--<link href="js/jqGrid-4.3.1/src/css/ui/jquery-ui-1.8.css" rel="stylesheet"  />-->
        <link rel="stylesheet" href="<?php echo base_url();?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
        <link href="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
        <script src="<?php echo base_url();?>public/js/hideshow.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.equalHeight.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.blockUI.js"></script>
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    jsonp: null,
                    jsonpCallback: null
                });
                $('.jsave_cust').click(function(){
                    $("#adduser").submit();
                });
                $("#adduser").validate({
                    rules: {
                        name:"required",
                        logo:"required",
                        flat_fees:"required"
                    },
                    messages: {
                        name: "Please enter name",
                        logo:"Please upload Logo",
                        flat_fees:"Please Enter Flat Fees"
                    },
                    errorPlacement: function(error, element) {
                        console.log(error);
                        console.log(element);
                        if (element.attr("name") == "accept_tc" || element.attr("name") == "accept_policy" )
                            error.insertAfter("#accept_errors");
                        else
                            error.insertAfter(element);
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                jQuery("#sub_grid_tbl").jqGrid431({
                    url:'<?php echo base_url();?>users/getusersdata',
                    datatype: "json",
                    mtype:"POST",
                    height: $('#sidebar').height()-24,
                    width: $('.form_prp').width()-10,
                    colNames:['UserName','Email', 'Phone', 'Address', 'Country', 'State','Edit'],
                    colModel:[
                        {name:'username',index:'username'},
                        {name:'email',index:'email'},
                        {name:'phone',index:'phone'},
                        {name:'address',index:'address'},
                        {name:'country',index:'country'},
                        {name:'state',index:'state'},
                        {name:'edit',index:'edit'}
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
                
                $('.edit_ecur').live('click',function(){
                    $('.j_ae_ecur_txt').text('Edit eCurrency');
                    $.blockUI({
                        message: $('#addpayment'),
                        css: {
                            marginTop:  -($('.m_w').height())/2,
                            marginLeft: '-225px',
                            left:'50%',
                            top:'50%',
                            width: '450px',
                            height: 'auto'
                        }
                    });
                });

                $('.add_ecur').live('click',function(){
                    $('.j_ae_ecur_txt').text('Add eCurrency');
                    $.blockUI({
                        message: $('#addpayment'),
                        css: {
                            marginTop:  -($('.m_w').height())/2,
                            marginLeft: '-225px',
                            left:'50%',
                            top:'50%',
                            width: '450px',
                            height: 'auto'
                        }
                    });
                });

                $('.j_u_m').live('click',function(){
                    $.unblockUI();
                });

                <!--Start@@ajax-->
                function generateCron()
                {
                    $.ajax({
                        type: "POST",
                        url: "settings/get_crons",
                        dataType: "json",
                        beforeSend: function(){
                            $("#"+active_section).html($.spinner());
                        },
                        success: function(dataD){
                            $("#"+active_section).html(dataD);
                        },
                        error: function(){
                            return "<div class='error'>Unable to retrieve data</div>";
                        }
                    });
                }
                <!--End@@ajax-->
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
    </head>

    <body>

    <header id="header">
        <hgroup>
            <h1 class="site_title"><a href="dashboard.php">EDEALSPOT Admin</a></h1>
            <h2 class="section_title">E-Currency Type</h2><div class="btn_view_site"><a href="#">Logout</a></div>
        </hgroup>
    </header> <!-- end of header bar -->

    <section id="secondary_bar">
        <?php $this->load->view('common/admin/menu_header');  ?>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs">
                <a href="#">EDEALSPOT Admin</a>
                <div class="breadcrumb_divider"></div>
                <a class="current">E-Currency Type</a>
            </article>
            <a class="nblu_btn add_ecur fr">
                <span class="inner-btn">
                    <span class="label"><img class="small_plus_icon" height="16" width="16" src="images/spacer.gif">
                        	Add eCurrency
                    </span>
                </span>
            </a>
        </div>
    </section><!-- end of secondary bar -->

    <?php include 'common/leftnav.php'; ?>

    <section id="main" class="column">

        <div class="form_prp mar0">

            <table id="sub_grid_tbl" class="cs_gd"></table>
            <div id="sub_grid_pager"></div>


        </div>


    </section>

    <!--Start@@code for the Modal Window-->
    <!-- append ajax request form to addpayment div-->
    <div id="addpayment" class="m_w">
        
    </div>


    <!--End@@code for the Modal Window-->
</body>

</html>