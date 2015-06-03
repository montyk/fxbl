<?php // echo '<pre>'; print_r($dropdown_data); echo '</pre>'; ?>

<div class="bootstrap-scope">
    
    <div class="d_fds hide" id="new_record">
        <form class="form-inline ei-form edit-mode" action="<?php echo site_url('adminsettings/save_dropdown'); ?>">
            <input type="hidden" name="id" value="" />
            <input type="hidden" name="status_copy" class="j_status_copy" value="" />
            <label class="dropdown_name ei-view j_ei_name">
                
            </label>
            <label class="dropdown_name ei-edit">
                <input type="text" class="input-large j_ei_name_ip required" placeholder="Enter a Dropdown Name" title="Enter a Dropdown Name" value="" name="name"/>
            </label>
            <label class="dropdown_name ei-view j_ei_status">
                Active
            </label>
            <label class="dropdown_status ei-edit">
                <select id="" class="span2 j_status" name="status" title="Please select a Dropdown">
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>
            </label>
            <label class="edit_inline ei-view j_ei_edit">
                <i class="icon-pencil" title="Edit"></i>
            </label>
            <label class="loading_inline ei-loading hide ">
                <img src="<?php echo base_url(); ?>/misc/css/images/loading.gif"/>
            </label>
            <label class="cancel_inline ei-edit j_ei_cancel">
                <i class="icon-remove" title="Cancel"></i>
            </label>
            <label class="save_inline ei-edit j_ei_save">
                <button type="button" class="btn bs"><i class="icon-check"></i> Save</button>
            </label>
            
        </form>
    </div>
    
    <?php if(!empty($dropdown_data)) foreach($dropdown_data as $k=>$v){ ?>
    <div class="d_fds" id="">
        <form class="form-inline ei-form " action="<?php echo site_url('adminsettings/save_dropdown'); ?>">
            <input type="hidden" name="id" value="<?php echo $v->id; ?>" />
            <input type="hidden" name="status_copy" class="j_status_copy" value="<?php echo $v->status; ?>" />
            <label class="dropdown_name ei-view j_ei_name">
                <?php echo $v->name; ?>
            </label>
            <label class="dropdown_name ei-edit">
                <input type="text" class="input-large j_ei_name_ip required" placeholder="Enter a Dropdown Name" title="Enter a Dropdown Name" value="<?php echo $v->name; ?>" name="name"/>
            </label>
            <label class="dropdown_name ei-view j_ei_status">
                <?php echo $v->status=='1'?'Active':'In-Active'; ?>
            </label>
            <label class="dropdown_status ei-edit">
                <select id="" class="span2 j_status" name="status" title="Please select a Dropdown">
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>
            </label>
            <label class="edit_inline ei-view j_ei_edit">
                <i class="icon-pencil" title="Edit"></i>
            </label>
            <label class="loading_inline ei-loading hide ">
                <img src="<?php echo base_url(); ?>/misc/css/images/loading.gif"/>
            </label>
            <label class="cancel_inline ei-edit j_ei_cancel">
                <i class="icon-remove" title="Cancel"></i>
            </label>
            <label class="save_inline ei-edit j_ei_save">
                <button type="button" class="btn bs"><i class="icon-check"></i> Save</button>
            </label>
            
        </form>
    </div>
    <?php } ?>
    
    
    <div class="d_fds">
        <button class="btn btn-small btn-primary bs j_ei_add_new" type="button"><i class="icon-plus"></i> Add </button>
    </div>
</div>