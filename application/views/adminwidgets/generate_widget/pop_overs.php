<?php $uniqueID=time(); ?>

<div class="bootstrap-scope ">
    <a href="#<?php echo $uniqueID; ?>" role="button" class="<?php if(isset($select_type) && $select_type=='btn'){ echo 'btn'; } ?> bs bs_popover" data-toggle="popover"  data-placement="<?php if(!empty($position)){ echo $position; } ?>" data-content="<?php if(!empty($popover_content)){ echo $popover_content; } ?>" title="<?php if(!empty($popover_header)){ echo $popover_header; } ?>"><?php if(!empty($widget_text)){ echo $widget_text; } ?></a>
</div>
<script type="text/javascript">
    if($){
        $('.bs_popover').popover();
    }
</script>