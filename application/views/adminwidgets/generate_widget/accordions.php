<div class="bootstrap-scope ">
    <div class="accordion " id="accordion_<?php if(!empty($name)){ echo str_replace(' ','',$name); } ?>">
        <?php foreach($tname as $k=>$v){ 
                $accId=time().'_'.$k;
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_<?php if(!empty($name)){ echo str_replace(' ','',$name); } ?>" href="#acc_<?php echo $accId; ?>">
                        <?php if(!empty($v)){ echo $v; } ?>
                    </a>
                </div>
                <div id="acc_<?php echo $accId; ?>" class="accordion-body collapse ">
                    <div class="accordion-inner">
                        <?php if(!empty($accordion_content[$k])){ echo $accordion_content[$k]; } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>