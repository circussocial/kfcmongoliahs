



<div class="formRow">
<div class="grid3"><label for="fb_sharing_on_entry_submit" >On Entry Submission</label></div>
<div class="grid9"> 
    <label>Entry Title </label> <input id="fb_sharing_on_entry_submit_title" onblur="saveSingleField('fb_sharing_on_entry_submit');" value="<?php echo @$setting['fb_sharing_on_entry_submit']->value1; ?>" /> <br />
<label>Entry Details </label> <input id="fb_sharing_on_entry_submit_details" onblur="saveSingleField('fb_sharing_on_entry_submit');" value="<?php echo @$setting['fb_sharing_on_entry_submit']->value4_text; ?>" /> <br />
<label>App Details</label><input id="fb_sharing_on_entry_submit_app_details" onblur="saveSingleField('fb_sharing_on_entry_submit');" value="<?php echo @$setting['fb_sharing_on_entry_submit']->value5_text; ?>" /> <br />

</div>  
</div>