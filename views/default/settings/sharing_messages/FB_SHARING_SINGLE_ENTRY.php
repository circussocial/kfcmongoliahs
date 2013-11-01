



<div class="formRow">
<div class="grid3"><label for="<?php echo $varName; ?>" ><?php echo $title; ?></label></div>
<div class="grid9"> 
<label>Title </label> <input id="<?php echo $varName; ?>_TITLE" onblur="saveBasicSettings('<?php echo $varName; ?>');" value="<?php echo @$setting[''.$varName.'']->value4_text; ?>" /> <br />
<label>Details</label><input id="<?php echo $varName; ?>_DETAILS" onblur="saveBasicSettings('<?php echo $varName; ?>');" value="<?php echo @$setting[''.$varName.'']->value5_text; ?>" /> <br />

</div>  
</div>