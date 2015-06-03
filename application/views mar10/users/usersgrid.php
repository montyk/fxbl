 	 <?php $this->load->view('common/admin/main_header'); ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    jsonp: null,
                    jsonpCallback: null
                });

                var x = new Date()
                var timeZone = currentTimeZoneOffsetInHours = x.getTimezoneOffset();
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('home/setUserTimeZone');?>',
                    data: 'tz_offset='+timeZone,
                    beforeSend : function(){
                    },
                    success: function(){
                    },
                    complete: function(){
                    }
                });

                $('.jsave_cust').click(function(){
                    $("#adduser").submit();
                });

                jQuery("#sub_grid_tbl").jqGrid431({
                    url:'<?php echo site_url();?>users/getusersdata',
                    datatype: "json",
                    mtype:"POST",
                    height: $('#sidebar').height()-24,
                    width: $('.form_prp').width()-10,
                    colNames:['Name','Email', 'Phone', 'Address', 'Country', 'State','Edit'],
                    colModel:[
                        {name:'firstname',index:'firstname'},
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
                    var userid = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url();?>users/useredit',
                        data: 'id='+userid,
                        beforeSend : function(){
                        },
                        success: function(res){
                            if(res == 'error')
                            {
                                alert('Invalid User, Please contact Administrator')
                            }
                            else
                            {
                                $('#addpayment').html(res);
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
                            }
                        },
                        complete: function(){
                           
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
                
                $(".flip").click(function(){
                    $(".panel").slideToggle("slow");
                    $(this).toggleClass("dwn");
                });
                
                
                $(".japply_filter").live('click',function(){
                    postData={};
                    var filterFieldNames=['fname','email','documents_filter','account_verification'];
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
            <article class="article breadcrumbs">
                <a href="#">FOREXRAY Admin</a>
                <div class="breadcrumb_divider"></div>
                <a class="current">Users List</a>
            </article>
        </div>
    </section><!-- end of secondary bar -->

   
   
    <section id="main" class="column section">

        <div class="flip">Filters</div>
        <div class="panel flt_panel">
        	<div class="d_fds">
            	<div class="fl m_r_10">
                    <div class="left_fld">
                        <label for="f_un">Name:</label> 
                    </div>
                    <div class="right_fld">
                          <input type="text" name="fname" id="fname" value="" class="ip">
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="fl">
                    <div class="left_fld">
                        <label for="f_tn">Email:</label>
                    </div>
                    <div class="right_fld">
                          <input type="text" name="email" id="email" value="" class="ip">
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="cb"></div>
            </div>
            
            
            <div>
                <div class="fl m_r_10">
                    <div class="left_fld">
                        <label for="f_tn">Documents Filter:</label>
                    </div>
                    <div class="right_fld">
                        <select id="documents_filter" class="sl_bx " name="documents_filter" title="Please choose a Option">
                            <option value="">Select Documents Filter</option>
                            <option value="1">All Documents Submitted</option>
                            <option value="2">No Documents Submitted</option>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="fl">
                    <div class="left_fld">
                        <label for="f_tn">Account Verified:</label>
                    </div>
                    <div class="right_fld">
                        <select id="account_verification" class="sl_bx " name="account_verification" title="Please choose a Option">
                            <option value="">Select</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="cb"></div>
<!--                
                <select id="payment_methods_id" class="sl_bx required" name="payment_methods_id" title="Please choose a Payment Method">
                    <?php echo selectBox('Select Payment Method','payment_methods','id,name',' status=1 ','','');  ?>
                </select>
                -->
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


    </div>

    <!--Start@@code for the Modal Window-->
    <!-- append ajax request form to addpayment div-->
    <div id="addpayment" class="m_w">
        
    </div>

	</section>
	</div>
    <!--End@@code for the Modal Window-->
</body>

</html>