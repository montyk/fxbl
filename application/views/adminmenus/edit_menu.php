<?php $this->load->view('common/admin/main_header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/autoSuggest.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.autoSuggest_custom.js"></script>
<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>'
    $(document).ready(function(){
        $.ajaxSetup({
            jsonp: null,
            jsonpCallback: null
        });
        
        $("#add_menu").validate({
            rules: {
                name: {
                    required:true
                },
                custom_url:{
                    url:true,
                    required:function(element){
                        // console.log(!($.trim($(element).val())!='' || $('#as-values-page_id').val().replace(',','')!=''));
                        return !($.trim($(element).val())!='' || $('#as-values-page_id').val().replace(',','')!='');
                    }
                },
                status: "required"
            },
            messages: {
                name: {
                    required:"Please Enter Menu name"
                },
                page_id: "Please Select a Page",
                as_values_page_id: "Please Select a Page for the menu item",
                custom_url:{
                    required:'Please Select a page or enter a URL.'
                },
                status: "Please Select Status"
            }            
        });
        
        $('.j_save_menu').live('click',function(){
            $("#add_menu").submit();
        });
        
        postData=$('#language_id').serialize();
        
        $("#page_id").autoSuggest(
            "<?php echo site_url('adminmenus/get_pages'); ?>", 
            {
                asHtmlID:'page_id',
                selectionLimit:1,
                startText:'Search Page Name',
                selectedItemProp: "name",
                searchObjProps: "name",
                queryParam:'search_term',
                disableTabPress:true,
                resultClick: function(data){
                    $('#name').val(data.attributes.name);
                    $('#selected_page_link').html('Check Page Link: '+data.attributes.page_link);
                },
                selectionRemoved: function(elem){ 
                    $('[name="page_id"]').val('');
                    $('#name').val('');
                    $('#selected_page_link').html('');
                    elem.remove();
                    $('[name="page_id"]').show();
                    $('#as-selections-page_id').removeClass('no_border');
                },
                selectionAdded:function(elem){
                    $('[name="page_id"]').hide();
                    $('#as-selections-page_id').addClass('no_border');
                    $('#as-selections-page_id label.error').hide();
                },
                preFill:[
                    <?php if(!empty($url_key)){ ?>
                    {'name':'<?php echo $title; ?>','value':'<?php echo $page_id; ?>','page_link':'<?php echo anchor(site_url($abbr.'/'.$url_key),'Check Page Link','target="_blank"'); ?>'}
                    <?php } ?>
                ],
                extraParams:'&'+postData
            }
        );
        
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
                
                
        /**
         * Filter Interactions
         */
        $(".flip").click(function(){
            $(".panel").slideToggle("slow");
            $(this).toggleClass("dwn");
        });
                
        $(".japply_filter").live('click',function(){
            postData={};
            var filterFieldNames=['name','title','url_key'];
            for(i in filterFieldNames){
                postData[filterFieldNames[i]]=$('[name="'+filterFieldNames[i]+'"]').val();
            }
            $("#sub_grid_tbl").setGridParam({
                postData: postData
            }).trigger("reloadGrid");
        });
                
        $('.remove_menu').live('click',function(){
            if(confirm('Do you want to delete this item')){
                dataP='id='+$(this).attr('rel');
                $.ajax({
                    url:'<?php echo site_url('adminmenus/deletemenu'); ?>',
                    data:dataP,
                    type:'POST',
                    beforeSend:function(){
                        
                    },
                    success:function(){
                        window.location.reload();
                    }
                })
            }
        });
        
        function updateMainMenuShowStatus(thisObj){
            dataP='id='+thisObj.attr('rel')+'&show_in_main_menu='+((thisObj.is(':checked'))?'1':'0');
            //            console.log('------- In Ajax Function START ::: ');
            //            console.log(thisObj);
            //            console.log(dataP);
            //            console.log('------- In Ajax Function END ::: ');
            
            $.ajax({
                url:"<?php echo site_url('adminmenus/add_menu'); ?>",
                type:'POST',
                data:dataP,
                dataType:'',
                beforeSend:function(){

                },
                success:function(dataR){

                }
            }) ;
        }
        
        $('.show_in_main_menu').live('click',function(){
            
            updateMainMenuShowStatus($(this));
            
            if($(this).is(':checked')){
                /*
                 * To Check the unchecked parent'S, when child is checked.
                 */
                checkboxParentLis=$(this).parents('li:first').parents('li');
                //                console.log('IF ::: Updating These Parents >>> ');
                //                console.log(checkboxParentLis);
                //                console.log('<<<<<<<<<<<<');
                $.each(checkboxParentLis,function(k,v){
                    checkBox=$(v).find('.show_in_main_menu:first');
                    if(!(checkBox.is(':checked'))){
                        checkBox.attr('checked','checked');
                        updateMainMenuShowStatus(checkBox);
                    }
                });
            }else{
                /*
                 * To Un-Check the checked childs, when parent is Un-Checked.
                 */
                checkboxChilds=$(this).parents('li:first').find('ul:first').find('.show_in_main_menu:checked');
                checkboxChilds.removeAttr('checked');
                //               console.log('ELSE ::: Updating these Childs >>>');
                //               console.log(checkboxChilds);
                //               console.log('<<<<<<<<<<<<');
                $.each(checkboxChilds,function(k,v){
                    checkBox=$(v);
                    updateMainMenuShowStatus(checkBox); 
                });
            }
        });
        
        
        $('.j_cancel').click(function(){
            window.location='<?php echo site_url('adminmenus'); ?>';
        })
        
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
    #as-selections-page_id{
        width:310px;
    }
    .remove_menu, .edit_menu{
        margin: 0px 5px;
        padding: 1px 5px;
        font-weight: bold;
        font-size: 9px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow:1px 1px 1px #ccc;
        cursor: pointer;
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

                <div class="" style="padding: 10px;">
                    <p><div class="h_2">Edit menu</div></p>
                    <div>
                        <form name="add_menu" id="add_menu" action="<?php echo site_url('adminmenus/add_menu') ?>" method="post">
                            <input type='hidden' name='id' id='id' value='<?php if (!empty($id)) echo $id; ?>'/> 
                            <div class="d_fds">
                                <div class="left_fld">
                                        <label for="language_id"><span class="validcol">*</span> Language:</label> 
                                </div>
                                <div class="right_fld">
                                    <select id="language_id" class="sl_bx required" name="language_id" title="Please select a Language">
                                        <?php echo selectBox('Select Language','languages','id,name',' status=1 ',((!empty($language_id))?$language_id:0),'');  ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="page_id"><span class="validcol">*</span> Page:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <div>
                                        <input type="text" name="page_id" id="page_id" value="" class="  valid" />
                                    </div>
                                    <div id="selected_page_link">
                                        <?php if(!empty($url_key)) echo anchor(site_url($abbr.'/'.$url_key),'Check Page Link','target="_blank"'); ?>
                                    </div>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="custom_url"></label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <div>
                                        OR
                                    </div>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="custom_url"><span class="validcol">*</span> Custom URL:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <div>
                                        <input type="text" name="custom_url" id="custom_url" value="<?php if (!empty($custom_url)) echo $custom_url; ?>" class=" ip " />
                                    </div>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="page_id">Parent Menu:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <select id="parent_id" class="sl_bx " name="parent_id" title="">
                                        <?php echo selectBox('Select parent if required', 'menus', 'id,name', ' status=1 ', ((!empty($parent_id))?$parent_id:0), ''); ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="show_in_main_menu">Show in Main Menu:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <input type="checkbox" name="show_in_main_menu" id="show_in_main_menu" value="1" class=" ip " style="width: 15px;" <?php if (!empty($show_in_main_menu)) echo 'checked="checked"'; ?>/>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="order_num">Order Number:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <input type="text" name="order_num" id="order_num" value="<?php if (!empty($order_num)) echo $order_num; ?>" class=" ip " />
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="footer_order_num">Footer Order Number:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <input type="text" name="footer_order_num" id="footer_order_num" value="<?php if (!empty($footer_order_num)) echo $footer_order_num; ?>" class=" ip " />
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="name"><span class="validcol">*</span> Menu Name:</label> 
                                </div>
                                <div class="right_fld">
                                    <input type="text" name="name" id="name" value="<?php if (!empty($name)) echo $name; ?>" class="required ip"/>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="status"><span class="validcol">*</span>Status:</label> 
                                </div>
                                <div class="right_fld">
                                    <select name="status" id="status" style="" class="required sl_bx "> 
                                        <option value="">Select status</option>
                                        <option value="1" <?php echo ((!empty($status) && $status=='1')?'selected="selected"':'') ?>>Active</option>
                                        <option value="2" <?php echo ((!empty($status) && $status=='2')?'selected="selected"':'') ?>>Inactive</option>       
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">	
                                <input type='button' name='save' value='Save' class="alt_btn j_save_menu" />
                                <input type='button' name='cancel' value='Cancel' class="alt_btn j_cancel" />
                                <span class="jerror_msg"></span>
<?php echo $this->formtoken->getField(); ?>		
                            </div>
                        </form>
                    </div>
                </div>



                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>

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