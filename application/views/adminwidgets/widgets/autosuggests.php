<!--autosuggests-->
<div class="tab-pane " id="left_tab7">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/autosuggests'); ?>" id="autosuggests_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="7" />
        
        <div class="well well-small">
            <h5>Customize Your Widget</h5>
            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Widget Name</label>
                <div class="controls">
                    <input id="wid_name" name="name" type="text" placeholder="Name" class="input-xlarge required" required="" title="Please enter the Widget Name"  value="<?php if(isset($form_data['name'])){ echo $form_data['name']; } ?>" />
                </div>
            </div>
        </div>
        
        
        <div class="well well-small">
            <h5>Enter Widget Data</h5>
            
            
            <div class="autosuggests_wrap">
                <div class="autosuggests_view">
                    
                    
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Input tag name attribute value</label>
                        <div class="controls">
                            <input name="name_attr" type="text" placeholder="Please enter the input tag name if required" class="input-xlarge " title="Please enter the input tag name if required" value="<?php if(isset($form_data['name_attr'])){ echo $form_data['name_attr']; } ?>" />
                        </div>
                    </div>
                    
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Autosuggest Values</label>
                        <div class="controls" id="autosuggest_values_wrap">
                            <?php if(empty($form_data['autosuggest_values'])){ $form_data['autosuggest_values']=array('');  } ?>
                            <?php foreach($form_data['autosuggest_values'] as $k=>$v){ ?>
                            <br/><input name="autosuggest_values[]" type="text" placeholder="Please enter the Autosuggests Value" class="input-xlarge required autosuggest_values" title="Please enter the Autosuggests Values" value="<?php if(isset($v)){ echo $v; } ?>" />
                            <?php } ?>
                            <button id="autosuggest_add" class="btn btn-small btn-primary" type="button"><i class="icon-plus icon-white"></i> Add Autosuggest value</button>
                        </div>
                    </div>

                    
                </div> 
                <hr/>
                
            </div><!--autosuggests view div-->
            
            
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_autosuggests_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="autosuggests_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs autosuggests_save" type="submit">Save Widget</button> 
            <button class="btn bs" type="button" class="widget_form_cancel">Cancel</button>
        </div>

    </form>
</div>
<!--/autosuggests-->
