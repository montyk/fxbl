<?php $uniqueID=time(); ?>

<div class="bootstrap-scope ">
    <a href="#<?php echo $uniqueID; ?>" class="<?php if(isset($select_type) && $select_type=='btn'){ echo 'btn'; } ?> bs bs_tooltip" data-toggle="tooltip"  data-placement="<?php if(!empty($position)){ echo $position; } ?>"  data-original-title="<?php if(!empty($tooltip_content)){ echo $tooltip_content; } ?>" title=""><?php if(!empty($widget_text)){ echo $widget_text; } ?></a>
</div>
<script type="text/javascript">
    if($){
        $('.bs_tooltip').tooltip();
    }
</script>