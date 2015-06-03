<?php $uniqueID=time(); ?>

<div class="bootstrap-scope ">
    <?php if(isset($select_type) && $select_type=='btn'){ ?>
    <a href="#myModal_<?php echo $uniqueID; ?>" role="button" class="btn bs" data-toggle="modal"><?php if(!empty($widget_text)){ echo $widget_text; } ?></a>
    <?php }else if(isset($select_type) && $select_type=='anchor'){ ?>
    <a href="#myModal_<?php echo $uniqueID; ?>" data-toggle="modal"><?php if(!empty($widget_text)){ echo $widget_text; } ?></a>
    <?php } ?>
    <!-- Modal -->
    <div id="myModal_<?php echo $uniqueID; ?>" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
            <button type="button" class="close modal_close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
            <h3 id="myModalLabel"><?php if(!empty($modal_header)){ echo $modal_header; } ?></h3>
      </div>
      <div class="modal-body">
            <?php if(!empty($modal_content)){ echo $modal_content; } ?>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn bs modal_close" data-dismiss="modal" aria-hidden="true">Close</button>
<!--            <button class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
</div>