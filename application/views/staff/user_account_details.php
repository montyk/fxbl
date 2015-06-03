<?php if(!empty($account_details)){ ?>
<div style="box-shadow:1px 1px 18px #ddd; padding:10px;">
    <p> You can select one of your saved Account Details or enter a new one.</p>
    <div class="d_fds">
        <?php foreach($account_details as $k=>$v){  ?>
        <div class="box_select">
            <p><?php echo $v->account_name;  ?></p>
            <p><?php echo $v->account_number;  ?></p>
            <input type="hidden" name="select_account_name" class="select_account_name" value="<?php echo $v->account_name;  ?>" />
            <input type="hidden" name="select_account_number" class="select_account_number" value="<?php echo $v->account_number;  ?>" />
            <input type="hidden" name="select_id" class="select_id" value="<?php echo $v->id;  ?>" />
        </div>
        <?php }  ?>
        <div class="cb"></div>
    </div>
</div>
<?php } ?>