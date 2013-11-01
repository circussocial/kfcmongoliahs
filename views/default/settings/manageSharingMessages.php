<?php

$setting = array();

 

foreach ($settings as $s)
{
    $setting["{$s->var_name}"] = $s;
}

 
 
?>

<fieldset>

        


	<div class="widget fluid sharingMessages">
	    <div class="whead"><h6>Facebook Sharing Messages</h6></div>


	    <?php echo $this->renderPartial("settings/sharing_messages/FB_SHARING_SINGLE_ENTRY", array("title" => "Application Details", "varName" => "APP_DETAILS", "setting" => $setting)); ?>		

	    <?php //echo $this->renderPartial("settings/sharing_messages/FB_SHARING_SINGLE_ENTRY", array("title" => "Auto Sharing Messages on Entry Submission", "varName" => "FB_AUTO_MSG_ON_ENTRY_SUBMISSION", "setting" => $setting)); ?>		
	    <?php echo $this->renderPartial("settings/sharing_messages/FB_SHARING_SINGLE_ENTRY", array("title" => "Auto Sharing Messages on Rating", "varName" => "FB_AUTO_MSG_ON_RATING", "setting" => $setting)); ?>		
            <?php echo $this->renderPartial("settings/sharing_messages/FB_SHARING_SINGLE_ENTRY", array("title" => "Auto Sharing Messages on Adding to Wishlist", "varName" => "FB_AUTO_MSG_ON_WISHLIST", "setting" => $setting)); ?>		
	    <?php echo $this->renderPartial("settings/sharing_messages/FB_SHARING_SINGLE_ENTRY", array("title" => "Sharing Popup Box (Individual Entry)", "varName" => "FB_SHARING_SINGLE_ENTRY", "setting" => $setting)); ?>		

	</div>
    </fieldset>
    
    <br />
    <a href="javascript:;" onclick="$.jGrowl('Settings saved successfully.');" class="buttonM bGreen bwhite"><span style="color:white;">Save</span></a>