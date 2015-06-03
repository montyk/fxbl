<?php $uniqueID=time(); ?>

<div class="bootstrap-scope ">
    <div class="tab_wrapper tabbable <?php if(!empty($select_type)){ echo $select_type; } ?>" style="color:<?php if(!empty($color)){ echo $color; } ?>;background-color:<?php if(!empty($bg_color)){ echo $bg_color; } ?>;">

        <?php if(!empty($select_type) && $select_type!='tabs-below'){  ?>
        <ul class="nav nav-tabs" id="tabs_<?php if(!empty($name)){ echo str_replace(' ','',$name); } ?>">
            <?php foreach($tname as $k=>$v){ ?>
                <li class="<?php if($k=='0'){ echo 'active'; } ?>">
                    <a href="#tab_<?php echo $uniqueID.'_'.$k; ?>" data-toggle="tab"><?php if(!empty($v)){ echo $v; } ?></a>
                </li>
            <?php } ?>
        </ul>
        <?php } ?>

        <div class="tab-content">
            <?php foreach($tname as $k=>$v){ ?>
            <div class="tab-pane <?php if($k=='0'){ echo 'active'; } ?>" id="tab_<?php echo $uniqueID.'_'.$k; ?>">
                <?php if(!empty($content[$k])){ echo $content[$k]; } ?>
            </div>
            <?php } ?>
        </div>

        <?php if(!empty($select_type) && $select_type=='tabs-below'){  ?>
        <ul class="nav nav-tabs" id="tabs_<?php if(!empty($name)){ echo str_replace(' ','',$name); } ?>">
            <?php foreach($tname as $k=>$v){ ?>
                <li class="<?php if($k=='0'){ echo 'active'; } ?>">
                    <a href="#tab_<?php echo $uniqueID.'_'.$k; ?>" data-toggle="tab"><?php if(!empty($v)){ echo $v; } ?></a>
                </li>
            <?php } ?>
        </ul>
        <?php } ?>

        <script>
            $(function() {
                $('#tabs_<?php if(!empty($name)){ echo str_replace(' ','',$name); } ?> a:first').tab('show');
            })
        </script>
    </div>
</div>