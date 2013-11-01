



<div class="formRow">
<div class="grid3"><label for="<?php echo $varName; ?>" ><?php echo $title; ?></label></div>
<div class="grid9"> 
<input id="<?php echo $varName; ?>_DATA" onblur="saveSingleField('<?php echo $varName; ?>');" value="<?php echo @$setting[''.$varName.'']->value4_text; ?>" /> <br />


</div>  
</div>