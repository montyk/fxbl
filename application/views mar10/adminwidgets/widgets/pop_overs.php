<!--pop_over-->
<div class="tab-pane " id="left_tab4">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/pop_overs'); ?>" id="popover_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="4" />
        <div class="well well-small">
            <h5>Customize Your Widget</h5>
            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Widget Name</label>
                <div class="controls">
                    <input id="wid_name" name="name" type="text" placeholder="Name" class="input-xlarge" required="" title="Please enter the Widget Name"  value="<?php if(isset($form_data['name'])){ echo $form_data['name']; } ?>" />
                </div>
            </div>
        </div>
        
        
        
        <div class="well well-small">
            <h5>Enter Widget Data</h5>
            
            
            <div class="pop_over_wrap">
                <div class="pop_over_view">
                    
                    <!-- Select Type -->
                    <div class="control-group">
                        <label class="control-label">Select Type</label>
                        <div class="controls">
                            <select id="select_type" name="select_type" class="input-xlarge required" title="Please Select the widget type">
                                <option value="">Choose an option</option>
                                <option value="anchor" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='anchor'){ echo 'selected'; } ?> >Anchor Link</option>
                                <option value="btn" <?php if(isset($form_data['select_type']) && $form_data['select_type']=='btn'){ echo 'selected'; } ?> >Button</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Select Type -->
                    <div class="control-group">
                        <label class="control-label">Select Popover Position</label>
                        <div class="controls">
                            <select id="position" name="position" class="input-xlarge required" title="Please Select Popover Position">
                                <option value="">Choose an option</option>
                                <option value="top" <?php if(isset($form_data['position']) && $form_data['position']=='top'){ echo 'selected'; } ?> >Top</option>
                                <option value="right" <?php if(isset($form_data['position']) && $form_data['position']=='right'){ echo 'selected'; } ?> >Right</option>
                                <option value="bottom" <?php if(isset($form_data['position']) && $form_data['position']=='bottom'){ echo 'selected'; } ?> >Bottom</option>
                                <option value="left" <?php if(isset($form_data['position']) && $form_data['position']=='left'){ echo 'selected'; } ?> >Left</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Widget Text</label>
                        <div class="controls">
                            <input name="widget_text" type="text" placeholder="Please enter the Widget Text" class="input-xlarge required" title="Please enter the Widget Text" value="<?php if(isset($form_data['widget_text'])){ echo $form_data['widget_text']; } ?>" />
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Popover Header</label>
                        <div class="controls">
                            <input name="popover_header" type="text" placeholder="Please enter the Popover Header" class="input-xlarge required" title="Please enter the Popover Header" value="<?php if(isset($form_data['popover_header'])){ echo $form_data['popover_header']; } ?>" />
                        </div>
                    </div>
                    

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Popover Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="popover_content" class="textarea">
                                <textarea style="width: 270px;" class=" required" name="popover_content" id='popover_content' cols="15" rows="2" title="Please enter the Popover Content"><?php if(isset($form_data['popover_content'])){ echo $form_data['popover_content']; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                
            </div><!--pop_overs view div-->
            
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_popover_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="popover_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs popover_save" type="submit">Save Widget</button> 
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>
<!--/pop_over-->
