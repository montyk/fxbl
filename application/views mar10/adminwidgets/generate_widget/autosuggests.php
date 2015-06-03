<div class="bootstrap-scope ">
    <input type="text" class="" name="<?php if(!empty($name_attr)){ echo $name_attr; } ?>" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source='[<?php if(!empty($autosuggest_values)){ echo '"'.implode('","', $autosuggest_values).'"'; } ?>]' />
</div>