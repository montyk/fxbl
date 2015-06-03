<div class="" style="padding: 10px;">
    <?php // echo '<pre>'; print_r($menus); echo '</pre>'; ?>
    <?php $this->load->view('common/notifications'); ?>
    <?php $formToken=$this->formtoken->getField(); ?>

    <?php if(!empty($menus)){ foreach($menus as $k=>$v){  ?>

    <div class="add_menu_form_wrap">
        <p><div class="h_2">Home Page Section <?php echo $k+1; ?></div></p>
        <form name="add_menu" id="add_menu<?php echo $k; ?>" action="<?php echo site_url('adminhomepage/add_menu')  ?>" method="post" class="add_home_page_form">
            <input type='hidden' name='id' id='id<?php echo $k; ?>' value='<?php echo $v->id; ?>'/> 
            <input type='hidden' name='language_id' id='language_id<?php echo $k; ?>' value='<?php echo $v->language_id; ?>'/> 
            <div class="d_fds">
                <div class="left_fld">
                    <label for="page_id<?php echo $k; ?>"><span class="validcol">*</span> Page:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <div>
                        <input type="text" name="page_id" id="page_id<?php echo $k; ?>" value="" class="  " />
                    </div>
                    <div id="selected_page_link<?php echo $k; ?>">
                        <?php 
                            if(!empty($v->href)) echo anchor($v->href,'Check Page Link','target="_blank"'); 
                        ?>
                    </div>
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="custom_url<?php echo $k; ?>"></label> 
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
                    <label for="custom_url<?php echo $k; ?>"><span class="validcol">*</span> Custom URL:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <div>
                        <input type="text" name="custom_url" id="custom_url<?php echo $k; ?>" value="<?php if(!empty($v->custom_url)) echo $v->custom_url; ?>" class=" ip " />
                    </div>
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="read_more_link<?php echo $k; ?>">Read More URL:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <div>
                        <input type="text" name="read_more_link" id="read_more_link<?php echo $k; ?>" value="<?php if(!empty($v->read_more_link)) echo $v->read_more_link; ?>" class=" ip " />
                    </div>
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds" style="display: none;">
                <div class="left_fld">
                    <label for="order_num<?php echo $k; ?>">Order Number:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <input type="text" name="order_num" id="order_num<?php echo $k; ?>" value="<?php if (!empty($v->order_num)) echo $v->order_num; ?>" class=" ip " />
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="name<?php echo $k; ?>">Section Name:</label> 
                </div>
                <div class="right_fld">
                    <input type="text" name="name" id="name<?php echo $k; ?>" value="<?php if (!empty($v->name)) echo $v->name; ?>" class="required ip " />
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">
                <div class="left_fld">
                    <label for="status<?php echo $k; ?>"><span class="validcol">*</span>Status:</label> 
                </div>
                <div class="right_fld">
                    <select name="status" id="status<?php echo $k; ?>" style="" class="required sl_bx "> 
                        <option value="">Select status</option>
                        <option value="1" <?php echo ((!empty($v->status) && $v->status=='1')?'selected="selected"':'') ?>>Active</option>
                        <option value="2" <?php echo ((!empty($v->status) && $v->status=='0')?'selected="selected"':'') ?>>Inactive</option>       
                    </select>
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">	
                <input type='button' name='save' value='Save' class="alt_btn j_save_menu" />
<!--                                <input type='button' name='cancel' value='Cancel' class="alt_btn j_cancel" />-->
                <span class="jerror_msg"></span>
                <?php echo $formToken; ?>		
            </div>
        </form>
    </div>

    <?php } }else{ ?>
        <div class="big_info">Please add home sections in DB.</div>
    <?php } ?>

</div>



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
        
        postData=$('#language_id').serialize();
        
        <?php foreach($menus as $k=>$v){  ?>
            
            
        $("#page_id<?php echo $k; ?>").autoSuggest(
            "<?php echo site_url('adminhomepage/get_pages');  ?>", 
            {
                asHtmlID:'page_id<?php echo $k; ?>',
                selectionLimit:1,
                startText:'Search Page Name',
                selectedItemProp: "name",
                searchObjProps: "name",
                queryParam:'search_term',
                disableTabPress:true,
                resultClick: function(data){
                    $('#name<?php echo $k; ?>').val(data.attributes.name);
                    $('#selected_page_link<?php echo $k; ?>').html('Check Page Link: '+data.attributes.page_link);
                },
                selectionRemoved: function(elem){ 
                    $('#add_menu<?php echo $k; ?> [name="page_id"]').val('');
                    $('#name<?php echo $k; ?>').val('');
                    $('#selected_page_link<?php echo $k; ?>').html('');
                    elem.remove();
                    $('#add_menu<?php echo $k; ?> [name="page_id"]').show();
                    $('#as-selections-page_id<?php echo $k; ?>').removeClass('no_border');
                },
                selectionAdded:function(elem){
                    $('#add_menu<?php echo $k; ?> [name="page_id"]').hide();
                    $('#as-selections-page_id<?php echo $k; ?>').addClass('no_border');
                    $('#as-selections-page_id<?php echo $k; ?> label.error').hide();
                },
                preFill:[
                    <?php if(!empty($v->url_key)){ ?>
                    {'name':'<?php echo $v->title; ?>','value':'<?php echo $v->page_id; ?>','page_link':'<?php echo anchor($v->href,'Check Page Link','target="_blank"'); ?>'}
                    <?php } ?>
                ],
                extraParams:'&'+postData
            }
        );
            
                            
        $("#add_menu<?php echo $k; ?>").validate({
            rules: {
                name: {
                    required:true
                },
                custom_url:{
                    url:true,
                    required:function(element){
                        // console.log(!($.trim($(element).val())!='' || $('#as-values-page_id').val().replace(',','')!=''));
                        return !($.trim($(element).val())!='' || $('#as-values-page_id<?php echo $k; ?>').val().replace(',','')!='');
                    }
                },
                read_more_link:{
                    url:true
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
                read_more_link:{
                    url:'Please enter a valid URL.'
                },
                status: "Please Select Status"
            }            
        });
          
            
        <?php } ?>
        
        
    });
</script>