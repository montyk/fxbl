
<?php 

    function buildSubMenu($menuArray){
        $html='';
        if(!empty($menuArray)){
            $html.='<ul class="submenu_ul">';
                foreach($menuArray as $k=>$v){
                    $html.='<li><div class="menu_hdr">'.anchor($v['href'],$v['label'],'target="_blank"').'
                                 <span class="remove_menu" rel="'.$k.'" title="Remove Menu Item"><img src="'.base_url().'/public/images/delete_icn.png"/></span><span class="edit_menu" rel="<?php echo $k;  ?>" title="Edit Menu Item"><a href="'.site_url('adminmenus/edit_menu/'.$k).'"><img src="'.base_url().'/public/images/edit_icn.png"/></a></span></div><div class="menu_content"><span class="show_in_footer_menu" title="Show in Footer Menu">
                                   <input type="checkbox" rel="'.$k.'" name="show_in_footer_menu['.$k.']" class="show_in_footer_menu" '.((!empty($v['show_in_footer_menu']) && $v['show_in_footer_menu']=='1')?'checked="checked"':'').' />
                                Show in Footer Menu</span> 
                                <span class="show_in_menu" title="Show in Main Menu">
                                    <input type="checkbox" rel="'.$k.'" name="show_in_main_menu['.$k.']" class="show_in_main_menu" '.((!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1')?'checked="checked"':'').' />Show in Main Menu
                                </span> ';
                    if(!empty($v['submenu'])){
                        $html.=buildSubMenu($v['submenu']);
                    }
                    $html.='<div class="add_menu" rel="'.$k.'" title="Remove Menu Item">+ Add Menu under this menu</div></div>';
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
                <div class="menu_hdr"><?php echo anchor($v['href'],$v['label'],'target="_blank"');  ?> <span class="remove_menu" rel="<?php echo $k;  ?>" title="Remove Menu Item"><img src="<?php echo base_url(); ?>/public/images/delete_icn.png"/></span><span class="edit_menu" rel="<?php echo $k;  ?>" title="Edit Menu Item"><a href="<?php echo site_url('adminmenus/edit_menu/'.$k); ?>"><img src="<?php echo base_url(); ?>/public/images/edit_icn.png"/></a></span> </div>
				<div class="menu_content">
                <span class="show_in_footer_menu" title="Show in Footer Menu">
                    <label>
					<input type="checkbox" rel="<?php echo $k;  ?>" name="show_in_footer_menu[<?php echo $k;  ?>]" class="show_in_footer_menu" <?php if(!empty($v['show_in_footer_menu']) && $v['show_in_footer_menu']=='1'){ echo 'checked="checked"'; }  ?>/>  Show in Footer Menu</label>
					
                </span> 
                <span class="show_in_menu" title="Show in Main Menu">
                    <label><input type="checkbox" rel="<?php echo $k;  ?>" name="show_in_main_menu[<?php echo $k;  ?>]" class="show_in_main_menu" <?php if(!empty($v['show_in_main_menu']) && $v['show_in_main_menu']=='1'){ echo 'checked="checked"'; }  ?>/>			Show in Main menu</label>
				 
                </span> 
                <?php if(!empty($v['submenu'])){ echo buildSubMenu($v['submenu']); }  ?>
                <div class="add_menu" rel="<?php echo $k;  ?>" title="Remove Menu Item">+ Add Menu under this menu</div>
				</div>
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
        <form name="add_menu" id="add_menu" action="<?php echo site_url('adminmenus/add_menu')  ?>" method="post">
            <input type='hidden' name='id' id='id' value='<?php if(!empty($id)) echo $id;?>'/> 
            <input type='hidden' name='language_id' id='language_id_hidden' value='<?php if(!empty($language_id)) echo $language_id;?>'/> 
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
            <div class="d_fds">
                <div class="left_fld">
                    <label for="page_id">Parent Menu:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <select id="parent_id" class="sl_bx " name="parent_id" title="">
                        <?php echo selectBox('Select parent if required','menus','id,name',' status=1 '.((!empty($language_id))?' AND language_id='.$language_id:''),'','');  ?>
                    </select>
                </div>
                <div class="cb"></div>
            </div>
            <div class="d_fds">
                <div class="left_fld">
                    <label for="show_in_main_menu">Show in Main Menu:</label> 
                </div>
                <div class="right_fld" style="position:relative;">
                    <input type="checkbox" name="show_in_main_menu" id="show_in_main_menu" value="1" class=" ip " style="width: 15px;" />
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
                        <option value="1">Active</option>
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
