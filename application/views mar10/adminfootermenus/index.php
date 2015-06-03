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
        
        $("#page_id").autoSuggest(
            "<?php echo site_url('adminfootermenus/get_pages');  ?>", 
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
                }
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
                    url:'<?php echo site_url('adminfootermenus/deletemenu');  ?>',
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
            dataP='ajax_update=1&id='+thisObj.attr('rel')+'&show_in_main_menu='+((thisObj.is(':checked'))?'1':'0');
//            console.log('------- In Ajax Function START ::: ');
//            console.log(thisObj);
//            console.log(dataP);
//            console.log('------- In Ajax Function END ::: ');
            
            $.ajax({
                url:"<?php echo site_url('adminfootermenus/add_menu'); ?>",
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
        
        $('.add_menu').live('click',function(){
            $('#parent_id').val($(this).attr('rel'));
            $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        });
        
        $('#order_num').val($('.menus_list ul:first>li').length+1);

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

                
                <?php 
                
                    function buildSubMenu($menuArray){
                        $html='';
                        if(!empty($menuArray)){
                            $html.='<ul>';
                                foreach($menuArray as $k=>$v){
                                    $html.='<li>'.anchor($v['href'],$v['label'],'target="_blank"').'
                                                <span class="show_in_menu" title="Show in Footer Menu">
                                                    <input type="checkbox" rel="'.$k.'" name="show_in_main_menu['.$k.']" class="show_in_main_menu" '.((!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1')?'checked="checked"':'').' />
                                                </span> 
                                                <span class="edit_menu" rel="<?php echo $k;  ?>" title="Edit Menu Item"><a href="'.site_url('adminfootermenus/edit_menu/'.$k).'"><img src="'.base_url().'/public/images/edit.gif"/></a></span>
                                                <span class="remove_menu" rel="'.$k.'" title="Remove Menu Item"><img src="'.base_url().'/public/images/delete3.png"/></span>
                                            ';
                                    if(!empty($v['submenu'])){
                                        $html.=buildSubMenu($v['submenu']);
                                    }
                                    // $html.='<div class="add_menu" rel="'.$k.'" title="Remove Menu Item">+ Add Menu under this menu</div>';
                                    $html.='</li>';
                                }
                            $html.='</ul>';
                        }
                        return $html;
                    }

                ?>
                
                
                <div class="menus_list_wrapper">
                    <div class="menus_list">
                        <?php // echo '<pre>'; print_r($menus); echo '</pre>';  ?>
                        <?php if(!empty($menus)){  ?>
                        <ul>
                            <?php foreach($menus as $k=>$v){  ?>

                            <li>
                                <?php echo anchor($v['href'],$v['label'],'target="_blank"');  ?> 
                                <span class="show_in_menu" title="Show in Footer Menu">
                                    <input type="checkbox" rel="<?php echo $k;  ?>" name="show_in_main_menu[<?php echo $k;  ?>]" class="show_in_main_menu" <?php if(!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1'){ echo 'checked="checked"'; }  ?>/>
                                </span> 
                                <span class="edit_menu" rel="<?php echo $k;  ?>" title="Edit Menu Item"><a href="<?php echo site_url('adminfootermenus/edit_menu/'.$k); ?>"><img src="<?php echo base_url(); ?>/public/images/edit.gif"/></a></span>
                                <span class="remove_menu" rel="<?php echo $k;  ?>" title="Remove Menu Item"><img src="<?php echo base_url(); ?>/public/images/delete3.png"/></span>
                                <?php if(!empty($v['submenu'])){ echo buildSubMenu($v['submenu']); }  ?>
                                
                            </li>

                            <?php }  ?>
                        </ul>
                        <?php }else{  ?>
                        <div class="big_info">No Menus added.</div>
                        <?php }  ?>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <hr/>
                
                <div class="" style="padding: 10px;">
                    
                    <div class="add_menu_form_wrap">
                        <p><div class="h_2">Add menu</div></p>
                        <form name="add_menu" id="add_menu" action="<?php echo site_url('adminfootermenus/add_menu')  ?>" method="post">
                            <input type='hidden' name='id' id='id' value='<?php if(!empty($id)) echo $id;?>'/> 
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="page_id"><span class="validcol">*</span> Page:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <div>
                                        <input type="text" name="page_id" id="page_id" value="" class="  " />
                                    </div>
                                    <div id="selected_page_link">
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
                                        <input type="text" name="custom_url" id="custom_url" value="" class=" ip " />
                                    </div>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds" style="display:none;">
                                <div class="left_fld">
                                    <label for="page_id">Parent Menu:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <select id="parent_id" class="sl_bx " name="parent_id" title="">
                                        <?php echo selectBox('Select parent if required','footer_menus','id,name',' status=1 ','','');  ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="show_in_main_menu">Show in Main Menu:</label> 
                                </div>
                                <div class="right_fld" style="position:relative;">
                                    <input type="checkbox" name="show_in_main_menu" id="show_in_main_menu" value="1" class=" ip " style="width: 15px;" checked />
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
                                    <label for="name"><span class="validcol">*</span> Menu Name:</label> 
                                </div>
                                <div class="right_fld">
                                    <input type="text" name="name" id="name" value="" class="required ip " />
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
                                        <option value="1" selected>Active</option>
                                        <option value="2">Inactive</option>       
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">	
                                <input type='button' name='save' value='Save' class="alt_btn j_save_menu" />
<!--                                <input type='button' name='cancel' value='Cancel' class="alt_btn j_cancel" />-->
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