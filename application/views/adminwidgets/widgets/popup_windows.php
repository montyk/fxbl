<!--popup_window-->
<div class="tab-pane " id="left_tab3">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/popup_windows'); ?>" id="popup_window_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="3" />
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
            
            
            <div class="popup_window_wrap">
                <div class="popup_window_view">
                    
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
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Widget Text</label>
                        <div class="controls">
                            <input name="widget_text" type="text" placeholder="Please enter the Widget Text" class="input-xlarge required" title="Please enter the Widget Text" value="<?php if(isset($form_data['widget_text'])){ echo $form_data['widget_text']; } ?>" />
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Modal Window Header</label>
                        <div class="controls">
                            <input name="modal_header" type="text" placeholder="Please enter the Modal Window Header" class="input-xlarge required" title="Please enter the Modal Window Header" value="<?php if(isset($form_data['modal_header'])){ echo $form_data['modal_header']; } ?>" />
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Modal Window Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="modal_content" class="textarea">
                                <textarea class="jquery_ckeditor required" name="modal_content" id='modal_content' cols="10" rows="2" title="Please enter the Modal Window Content"><?php if(isset($form_data['modal_content'])){ echo $form_data['modal_content']; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                
            </div><!--popup_windows view div-->
            
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_popup_window_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="popup_window_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs popup_window_save" type="submit">Save Widget</button> 
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>
<!--/popup_window-->
