<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>

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
                url:'<?php echo site_url(); ?>pamm_manager/get_managers',
                datatype: "json",
                mtype:'POST',
                height: $('#sidebar').height()-24,
                width: $('.form_prp').width()-10,
                colNames:['ID','Account','Name', 'Minimum Deposit (USD)','Success Fee (%)', 'Penaulty Fee (%)','Trading Period'],
                colModel:[
                    {name:'id',index:'id'},
                    {name:'login',index:'login'},
                    {name:'trading_name',index:'trading_name'},
                    {name:'minimum_deposit',index:'minimum_deposit'},
                    {name:'success_fee',index:'success_fee'},
                    {name:'penalty_fee',index:'penalty_fee'},
                    {name:'trading_period',index:'trading_period'}
                ],
                rowNum:6,
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

<div class="outside modify">
<!--	PAGE content -->
            <div class="contents pg_width">
                <div class="overlay_bg rel">
                    <div class="fore_ca">
                        <div class="fore_content">
                            <div class="content_wrap fl">
                                <h1 class="h_1">PAMM Managers</h1>
							
                                <?php $this->load->view('common/notifications'); ?>
                                
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>">Forexray </a></li>
                                        <li><a class="current">PAMM Managers</a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        
                                            <div class="post  pad10 newsbox" style="">
                                                <div class="story bootstrap-scope">
                                                    
                                                    <div class="registration_wrapper tab_wrapper tabbable tabs-top" style="color:#333333;background-color:#ffffff;">
                                                        <?php 
                                                            $formToken=formtoken::getField();
                                                            $form_data=array(); 
                                                            if ($this->session->flashdata('reg_form_data')){
                                                                $form_data=$this->session->flashdata('reg_form_data');
                                                            }
                                                        ?>
                                                        <div class="">
                                                            <div class="tab-pane active" id="Real_Acc_Tab">
                                                                <div style="">
                                                                    
       










 <div class="right_content">
        
        <?php //$this->load->view('common/admin/menu_header'); ?>
             
        <section id="secondary_bar" class="section">
            
            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">PAMM Managers</a>
                </article>
                    
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            <div class="flip">Filters</div>
            <div class="panel flt_panel">
                <div class="d_fds">
					<div class="m_r_10">
                        <div class="left_fld">
                            <label for="f_un">Account:</label> 
                        </div>
                        <div class="right_fld">
                            <input type="text" name="login" id="login" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="">
                        <div class="left_fld">
                            <label for="f_tn">Trading Name:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="trading_name" id="trading_name" value="" class="ip">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="cb"></div>
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




















	   </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                        
                        
                                                        <script>
                                                            $(function() {
                                                                $('#tabs_Ads a').click(function (e) {
                                                                    e.preventDefault();
                                                                    window.location.hash=$(this).attr('href');
                                                                    $(this).tab('show');
                                                                })
                                                                
                                                                if(window.location.hash!='')
                                                                    $('#tabs_Ads').find('a[href="'+window.location.hash+'"]').tab('show');
                                                                else
                                                                    $('#tabs_Ads a:first').tab('show');
                                                            })
                                                        </script>
                                                    </div>
                                                    
                                                    
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
										
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <div class="right_ca fl">
                                
                                <?php $this->load->view('common/sidebar_1'); ?>
                                
                                <?php $this->load->view('common/sidebar_terminal'); ?>
                                
                                <?php // $this->load->view('common/sidebar_news');?>
    
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<style type="text/css">
    .req{
        color:#D83B39;
    }
    .app .registration_wrapper .nav li a {
        color:#4C5463;
    }
    .bootstrap-scope .registration_wrapper .nav li.active > a{
        color: #555555;
    }
    .error-label{
        color: #ff0000;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
<?php if(isset($form_data['account_for']) && $form_data['account_for']=='3'){?>
<script type="text/javascript">
     
            $('#group_accountfor').hide();
           
</script>
<?php }?>

<script type="text/javascript">
    $(function(){
        
        jQuery.validator.addMethod("password_format", function(value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/.test(value);
        }, "Password must be at least 4 characters, not more than 15 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.");
        
       $('#registration_form').validate({
           rules:{
               password:{
                   password_format:true
               },
               confirm_password:{
                    equalTo: "#password"
               },
               email:{
                   /*remote:'<?php echo site_url('registration/check_email'); ?>'*/
               }
           },
           messages:{
               firstname:{
                   required:'Please enter your name'
               },
               email:{
                   required:'Please enter your email ID',
                   email:'Please enter a valid email ID',
                   remote:'This email is already registered. Please enter other email.'
               },
               group_id:{
                   required:'Please select your group'
               },
               leverage_id:{
                   required:'Please select Leverage'
               },
               password:{
                   required:'Please enter your password'
               },
               confirm_password:{
                   required:'Please enter your password',
                   equalTo:'Please enter the same password as above'
               },
               city:{
                   required:'Please enter your city'
               },
               zip:{
                   required:'Please enter your zip code'
               },
               state:{
                   required:'Please enter your state'
               },
               country_id:{
                   required:'Please select your country'
               },
               verification_code:{
                   required:'Please enter the verification code'
               },
               start_date:{
                   required:'Please enter From Date'
               },
               exp_date:{
                   required:'Please enter To Date'
               }
                   
                
           }
       });
       
       $('#dob').datepicker({ yearRange: "1940:2010", changeYear: true, changeMonth:true, dateFormat: "yy-mm-dd" }); 
       
       
       
        $( "#start_date" ).datepicker({
                minDate: 0,
                changeMonth: true,
                dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                 $( "#exp_date" ).datepicker( "option", "minDate", selectedDate );
                }
        });
        $( "#exp_date" ).datepicker({
                changeMonth: true,
                 dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                 $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
                }
        });
        
        $('#group_id').live('change',function(){
        if($(this).val()=='7'){
            $('#group_date').show();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#group_date').hide();
            // $('#nature_of_business').remoevClass('required');
        }
       })
       
	   $('#account_for').live('change',function(){
        if($(this).val()=='3'){
            $('#group_accountfor').hide();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#group_accountfor').show();
            // $('#nature_of_business').remoevClass('required');
        }
       })
	   
	   
       $('#nature_of_business_id').live('change',function(){
        if($(this).val()=='2'){
            $('#j_nature_of_business_other').show();
            // $('#nature_of_business').addClass('required');
        }else{
            $('#j_nature_of_business_other').hide();
            // $('#nature_of_business').remoevClass('required');
        }
       })
       
    });
</script>

<?php $this->load->view('common/footer');?>




