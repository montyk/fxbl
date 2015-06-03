<!--alert-->
<div class="tab-pane " id="left_tab6">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/alerts'); ?>" id="alert_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="6" />
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
            
            
            <div class="alert_wrap">
                <div class="alert_view">
                    
                    <!-- Select Type -->
                    <div class="control-group">
                        <label class="control-label">Select Alert Type</label>
                        <div class="controls">
                            <select id="alert_type" name="alert_type" class="input-xlarge required" title="Please Select Alert Type">
                                <option value="">Choose an option</option>
                                <option value="alert-block" <?php if(isset($form_data['alert_type']) && $form_data['alert_type']=='alert-block'){ echo 'selected'; } ?> >Normal Alert</option>
                                <option value="alert-info" <?php if(isset($form_data['alert_type']) && $form_data['alert_type']=='alert-info'){ echo 'selected'; } ?> >Info Alert</option>
                                <option value="alert-error" <?php if(isset($form_data['alert_type']) && $form_data['alert_type']=='alert-error'){ echo 'selected'; } ?> >Error Alert</option>
                                <option value="alert-success" <?php if(isset($form_data['alert_type']) && $form_data['alert_type']=='alert-success'){ echo 'selected'; } ?> >Success Alert</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Alert Header</label>
                        <div class="controls">
                            <input name="alert_header" type="text" placeholder="Please enter the Alert Header" class="input-xlarge " title="Please enter the Alert Header" value="<?php if(isset($form_data['alert_header'])){ echo $form_data['alert_header']; } ?>" />
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Alert Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="alert_content" class="textarea">
                                <textarea style="width: 270px;" class=" required" name="alert_content" id='alert_content' cols="15" rows="2" title="Please enter the Alert Content"><?php if(isset($form_data['alert_content'])){ echo $form_data['alert_content']; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                
            </div><!--alerts view div-->
            
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_alert_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="alert_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs alert_save" type="submit">Save Widget</button> 
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>
<!--/alert-->
