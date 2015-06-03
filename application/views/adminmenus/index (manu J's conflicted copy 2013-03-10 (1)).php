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
            $("#add_menu").submit();
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
                    url:'<?php echo site_url('adminmenus/deletemenu');  ?>',
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
        
        $('input.show_in_main_menu').live('click',function(){
            
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
                   checkBox=$(v).find('input.show_in_main_menu:first');
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
        
        
        function updateFooterMenuShowStatus(thisObj){console.log(thisObj);
            dataP='ajax_update=1&id='+thisObj.attr('rel')+'&show_in_footer_menu='+((thisObj.is(':checked'))?'1':'0');
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
        
        $('input.show_in_footer_menu').live('click',function(){
            
            updateFooterMenuShowStatus($(this));
            
            if($(this).is(':checked')){
                /*
                * To Check the unchecked parent'S, when child is checked.
                */
               checkboxParentLis=$(this).parents('li:first').parents('li');
//                console.log('IF ::: Updating These Parents >>> ');
//                console.log(checkboxParentLis);
//                console.log('<<<<<<<<<<<<');
               $.each(checkboxParentLis,function(k,v){
                   checkBox=$(v).find('input.show_in_footer_menu:first');
                   if(!(checkBox.is(':checked'))){
                       checkBox.attr('checked','checked');
                       updateFooterMenuShowStatus(checkBox);
                   }
               });
            }else{
                /*
                 * To Un-Check the checked childs, when parent is Un-Checked.
                 */
               checkboxChilds=$(this).parents('li:first').find('ul:first').find('.show_in_footer_menu:checked');
               checkboxChilds.removeAttr('checked');
//               console.log('ELSE ::: Updating these Childs >>>');
//               console.log(checkboxChilds);
//               console.log('<<<<<<<<<<<<');
               $.each(checkboxChilds,function(k,v){
                    checkBox=$(v);
                    updateFooterMenuShowStatus(checkBox); 
               });
            }
        });
        
        $('.add_menu').live('click',function(){
            $('#parent_id').val($(this).attr('rel'));
            // console.log($(this).parent('li').find('ul:first>li').length+1)
            $('#order_num').val($(this).parent('li').find('ul:first>li').length+1);
            $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        });
        
        
        $('#language_id').live('change',function(){
            window.location.hash=$(this).val();
            loadMenuList();
        });
        
        function loadMenuList(){
            postData=$('#language_id').serialize();
            $.ajax({
                url:'<?php echo site_url('adminmenus/ajax_menu_list'); ?>',
                data:postData,
                type:'POST',
                beforeSend:function(){
                    $('#ajax_content_wrap').html('<div style="width:90%; text-align:center; margin:0 auto; padding:80px 10px;">\
                            <img src="<?php echo base_url(); ?>public/images/36.gif"/>\
                            <h3>Loading.......... </h3>\
                        </div>\
                    ');
                },
                success:function(dataR){
                    $('#ajax_content_wrap').html(dataR);
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



                    $("#page_id").autoSuggest(
                        "<?php echo site_url('adminmenus/get_pages');  ?>", 
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
                            extraParams:'&'+postData
                        }
                    );
                    
                    $('#language_id_hidden').val($('#language_id').val());
                    $('#order_num').val($('.menus_list ul:first>li').length+1);
                        
                } /* Success End */
            })
        }
        
        if(window.location.hash.substring(1)!=''){
            $('#language_id').val(window.location.hash.substring(1));
        }
        $('#language_id').trigger('change');
        
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
        border:1px solid #ccc;
        border-radius: 4px;
        /*box-shadow:1px 1px 1px #ccc;*/
		
		background: none repeat scroll 0 0 #F9F9F9;
		border-top: 1px solid #CDCDCD;
		border-left: 1px solid #CDCDCD;
		border-right: 1px solid #CDCDCD;
		clear: both;
		margin-top: 16px;
		margin-bottom: 16px;
		position: relative;
    }
    .add_menu_form_wrap{
        margin: 5px;
        margin-bottom: 50px;
        padding: 10px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 1px #ccc;
    }
    ul.as-list{
        max-height: 270px;
        overflow: auto;
    }
	.menus_list ul{
		margin: 0;
		padding: 10px;
	}
	.menus_list .menu_hdr{
		background-color: #efefef;
		background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#fdfdfd), to(#eaeaea));
		background-image: -webkit-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
		background-image: -moz-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
		background-image: -ms-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
		background-image: -o-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
		background-image: -linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fdfdfd', endColorstr='#eaeaea',GradientType=0 ); /* IE6-9 */
		border-bottom: 1px solid #CDCDCD;
		height: 36px;
		color: #666666;
		text-shadow: 0 1px 0 #ffffff;
		font-size: 12px;
		font-weight: bold;
		padding: 12px;
		line-height: 12px;
		margin: 0;
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

                <div class="panel flt_panel" style="display:block; border-bottom: 1px solid #b3b3b3;">
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="url_key">Language:</label> 
                        </div>
                        <div class="right_fld">
                            <select id="language_id" class="sl_bx required" name="language_id" title="Please choose a Language">
                                <?php echo selectBox('Select Language','languages','id,name',' status=1 ',((!empty($language_id))?$language_id:1),'');  ?>
                            </select>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="cb"></div>
                </div>
                
                <div id="ajax_content_wrap">
                    
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