<!--tooltip-->
<div class="tab-pane " id="left_tab5">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/tooltips'); ?>" id="tooltip_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="5" />
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
            
            
            <div class="tooltip_wrap">
                <div class="tooltip_view">
                    
                    <!-- Select Type -->
                    <div class="control-group">
                        <label class="control-label">Select Tooltip Position</label>
                        <div class="controls">
                            <select id="position" name="position" class="input-xlarge required" title="Please Select Tooltip Position">
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

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Tooltip Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="tooltip_content" class="textarea">
                                <textarea style="width: 270px;" class=" required" name="tooltip_content" id='tooltip_content' cols="15" rows="2" title="Please enter the Tooltip Content"><?php if(isset($form_data['tooltip_content'])){ echo $form_data['tooltip_content']; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
            </div><!--tooltips view div-->
            
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_tooltip_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="tooltip_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs tooltip_save" type="submit">Save Widget</button> 
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>
<!--/tooltip-->
