<!--accordian-->
<div class="tab-pane accordion-pane" id="left_tab2">
<!--    <a class="back_widgets"><i class="icon-hand-left"></i>Back</a>
    <br/><br class="clear"/>-->
    
    <form action="<?php echo site_url('adminwidgets/generate_widget/accordions'); ?>" id="accordion_form" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php if(isset($widget_data->id)){ echo $widget_data->id; } ?>" />
        <input type="hidden" name="widget_type_id" value="2" />
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
            
            <?php 
                // echo '<pre>'; print_r($form_data); echo '</pre>';
                if(!isset($form_data['tname'])){ 
                    $form_data['tname']=array(array());
                }
            foreach ($form_data['tname'] as $key => $value) { ?>
            
            <div class="accordion_wrap">
                <div class="accordion_view">
                    <div>
                        <i class=" fr icon-remove-circle j_remove_section hide"></i>
                        <div class="clear"></div>
                    </div>
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Accordion Header Name</label>
                        <div class="controls">
                            <input name="tname[]" type="text" placeholder="Name" class="input-xlarge required" title="Please enter the Accordion Name" value="<?php if(isset($value) && !empty($value)){ echo $value; } ?>" />
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label">Accordion Content</label>
                        <div class="controls">                     
                            <div id="textarea" name="textarea" class="textarea">
                                <textarea class="jquery_ckeditor required" name="accordion_content[<?php echo $key; ?>]" id='accordion_content_<?php echo $key; ?>' cols="10" rows="2" title="Please enter the Accordion Content"><?php if(isset($form_data['accordion_content'][$key])){ echo $form_data['accordion_content'][$key]; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                <hr/>
            </div><!--accordions view div-->
            
            <?php }  ?>
            
            <div id="add_new_accordian">
                
            </div>
            
            <div class="form-actions border-none">
                <button id="accordion_add" class="btn btn-small btn-primary" type="button"><i class="icon-plus icon-white"></i>Add Accordion</button>
            </div>
        </div>
        
        
        
        <!-- Preview Button -->
        <div class="form-actions border-none">
            <button type="button" id="preview_accordian_widget" class="btn btn-mini"><i class="icon-eye-open"></i> Preview</button>
        </div>
        
        <div id="accordian_preview" class="well hide"></div>
        
        <div class="form-actions">
            <button class="btn-primary btn bs accordion_save" type="submit">Save Accordion Widget</button> 
            <button class="btn bs" type="button">Cancel</button>
        </div>

    </form>
</div>
<!--/accordian-->
