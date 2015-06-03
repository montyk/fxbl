
<div class="tab-pane" id="left_tab1">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/tabs'); ?>" id="tab_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="1" />
        <div class="well well-small">
            <h5>Customize Your Widget</h5>
            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Widget Name</label>
                <div class="controls">
                    <input id="wid_name" name="name" type="text" placeholder="Name" class="input-xlarge" required="" title="Please Enter the Widget Name" value="<?php if(isset($form_data['name'])){ echo $form_data['name']; } ?>"  />
                </div>
            </div>

            <!-- Select Type -->
            <div class="control-group">
                <label class="control-label">Select Type</label>
                <div class="controls">
                    <select id="select_type" name="select_type" class="input-xlarge required" title="Please Select the Tab Positioning">
                        <option value="">Choose an option</option>
                        <option value="tabs-top" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='tabs-top'){ echo 'selected'; } ?> >Top</option>
                        <option value="tabs-below" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='tabs-below'){ echo 'selected'; } ?> >Bottom</option>
                        <option value="tabs-left" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='tabs-left'){ echo 'selected'; } ?> >Left</option>
                        <option value="tabs-right" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='tabs-right'){ echo 'selected'; } ?> >Right</option>
                    </select>
                </div>
            </div>

            <!-- Select color -->
            <div class="control-group">
                <label class="control-label">Select Color</label>
                <div class="controls">
                    <input id="color" name="color" type="color" placeholder="Color" class="input-xlarge" required="" title="Please Select a Color" value="<?php if(isset($form_data['color'])){ echo $form_data['color']; } else { echo '#333333'; }  ?>" />
<!--                    <select id="select_color" name="select_color" class="input-xlarge required" title="Please Select a Color">
                        <option value="">Choose a color</option>
                        <option value="1">red</option>
                        <option value="2">gray</option>
                        <option value="3">blue</option>
                        <option value="4">green</option>
                    </select>-->
                </div>
            </div>

            <!-- Select color -->
            <div class="control-group">
                <label class="control-label">Background Color</label>
                <div class="controls">
                    <input id="bg_color" name="bg_color" type="color" placeholder="Color" class="input-xlarge" required="" title="Please Select a Color" value="<?php if(isset($form_data['bg_color'])){ echo $form_data['bg_color']; } else { echo '#FFFFFF'; }  ?>" />
<!--                    <select id="select_color" name="select_color" class="input-xlarge required" title="Please Select a Color">
                        <option value="">Choose a color</option>
                        <option value="1">red</option>
                        <option value="2">gray</option>
                        <option value="3">blue</option>
                        <option value="4">green</option>
                    </select>-->
                </div>
            </div>
        </div>
        <div class="well well-small">
            <h5>Enter Widget Data</h5>
            
            <?php 
                // echo '<pre>'; print_r($form_data); echo '</pre>';
                if(!isset($form_data['tname'])){ 
                    $form_data['tname']=array(array());
                }
            foreach ($form_data['tname'] as $key => $value) { ?>
            
            <div class="tab_wrap">
                <div class="tab_view">
                    <div>
                        <i class=" fr icon-remove-circle j_remove_section hide"></i>
                        <div class="clear"></div>
                    </div>
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Tab Header Name</label>
                        <div class="controls">
                            <input name="tname[]" type="text" placeholder="Name" class="input-xlarge required" title="Please Enter the Tab Header Name" value="<?php if(isset($value) && !empty($value)){ echo $value; } ?>" />
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Tab Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="textarea" class="textarea">
                                <textarea class="jquery_ckeditor required" name="content[<?php echo $key; ?>]" id='content_<?php echo $key; ?>' cols="10" rows="2" title="Please enter the Tab Content"><?php if(isset($form_data['content'][$key])){ echo $form_data['content'][$key]; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                <hr/>
            </div><!--tabs view div-->
            
            <?php }  ?>
            
            <div id="add_new_tab">
                
            </div>
            
            <div class="form-actions border-none">
                <button id="tabs_add" class="btn btn-small btn-primary" type="button"><i class="icon-plus icon-white"></i>Add Tab</button>
            </div>
        </div>
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="tab_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs tabs_save" type="submit">Save Tab Widget</button>
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>