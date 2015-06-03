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
                url:'<?php echo site_url(); ?>adminusers/get_adminusers',
                datatype: "json",
                mtype:'POST',
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                colNames:['Name','Email','Login','Group Name','Add Wallet', 'Phone', 'Address', 'Country','State', 'Status','Email Verified' ,'Docs/Account Verified','Registration Type', 'View'],
                colModel:[
                    {name:'name',index:'name'},
                    {name:'email',index:'email'},
                    {name:'login',index:'login'},
                    {name:'group_name',index:'group_name'},
                    {name:'wallet',index:'wallet'},
                    {name:'phone',index:'phone'},
                    {name:'address',index:'address'},
                    {name:'country',index:'country'},
                    {name:'state',index:'state'},
                    {name:'status',index:'status'},			
                    {name:'varification_status',index:'varification_status'},			
                    {name:'account_verification',index:'account_verification'},			
                    {name:'registration_type',index:'registration_type'},
                    {name:'view',index:'view'}
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
                var filterFieldNames=['login','fname','email','documents_filter','account_verification','group'];
                for(i in filterFieldNames){
                    postData[filterFieldNames[i]]=$('[name="'+filterFieldNames[i]+'"]').val();
                }
                $("#sub_grid_tbl").setGridParam({
                    postData: postData
                }).trigger("reloadGrid");
            });

            
            $('.j_multi_authenticate').live('click',function(){
                selectedUserIds=jQuery("#sub_grid_tbl").getGridParam('selarrrow');
                if(selectedUserIds.length){
                    $.ajax({
                        type: "POST",
                        data:'user_ids='+selectedUserIds.toString(),
                        url: site_url+"users/multi_authenticate_users",
                        dataType: "json",
                        beforeSend: function(){
                            jNotify('Updating Users...',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                        },
                        success: function(dataD){
                            jSuccess('Users Updated Successfully',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                            jQuery("#sub_grid_tbl").trigger('reloadGrid')
                        },
                        error: function(){
                            jError('Unable to update users. Please try again.',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                            return "<div class='error'>Unable to retrieve data</div>";
                        }
                    });
                }else{
                    jError('Please select users to authenticate',{HorizontalPosition : 'center', VerticalPosition : 'center'});
                    // alert('Please select users to authenticate');
                }
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
                            <input type="text" name="login" id="fname" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
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
                            <select id="documents_filter" class="sl_bx " name="documents_filter" title="Please choose an Option">
                                <option value="">Verification Documents Filter</option>
                                <option value="1">Documents Submitted</option>
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
                            <select id="account_verification" class="sl_bx " name="account_verification" title="Please choose an Option">
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="cb"></div>
                    </div><div class="fl">
                        <div class="left_fld">
                            <label for="f_tn">Group Name:</label>
                        </div>
                        <div class="right_fld">
                            <select id="group" name="group" placeholder="Group" class="required" >
                                <?php if(!empty($form_data['group_id'])){ $group_id= $form_data['group_id']; }else{ $group_id=0; } ?>
                                <?php echo selectBox('Select', 'groups', 'id,name', '', '', ''); ?>
                            </select>
                        </div>
                        <div class="cb"></div>
                    </div>
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