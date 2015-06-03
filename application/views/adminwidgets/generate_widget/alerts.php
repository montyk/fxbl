<div class="bootstrap-scope ">
    <div class="alert <?php if(!empty($alert_type)){ echo $alert_type; } ?> ">
        <button type="button" class="close " data-dismiss="alert">&times;</button>
        <?php if(!empty($alert_header) && trim($alert_header)!=''){ echo '<h4>'.$alert_header.'</h4>'; } ?>
        <div><?php if(!empty($alert_content)){ echo nl2br($alert_content); } ?></div>
    </div>
</div>