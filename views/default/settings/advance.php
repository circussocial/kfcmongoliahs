<div class="formRow">
<div class="grid3"><label for="enableFbMobile"   >Facebook Mobile Version to be enabled </label></div>
<div class="grid4"><input onclick="saveBasicSettings('enableFbMobile'); $('#enableFbMobileSettings').toggle();" type="checkbox" id="enableFbMobile" <?php echo (@$setting['enableFbMobile']->value1 == "true")?"checked='checked'":""; ?> />

<div id="enableFbMobileSettings" class="<?php echo (@$setting['enableFbMobile']->value1 == "true")?"":"hide"; ?> subSubTab"   >
     <?php
    
    $this->widget('application.components.ApplicationImageGrid', array(
	'user_global_id'=>Yii::app()->session['globalUserID'],
	
	'uploaderButtonId'=>'uploaderImg3',
	 'imageUploadDestination'=>'user_assets/application_images/mobile_browser_images',
	 'imageUploadSize'=>'100x100', //multiple size
	 'imagePreviewSize'=>'100x100',
	 'applicationImageNameHolderValue'=>@$setting['enableFbMobile']->value4_text,

	 'type'=>'Mobile Browser Image',
	 'application_name'=>$this->moduleName
	
	
    )); 
    
    
    ?>
</div>

</div>
</div>





<div class="formRow">
<div class="grid3"><label for="customThankYouScreen" >Custom Thank You Screen</label></div>
<div class="grid4"><select id="customThankYouScreen" onchange="saveBasicSettings('customThankYouScreen'); customThankYouScreenCall(this);" >
	<option value="Default" <?php echo (@$setting['customThankYouScreen']->value1 == "Default")?"selected='selected'":""; ?> >Default</option>
	<option value="Custom Image" <?php echo (@$setting['customThankYouScreen']->value1 == "Custom Image")?"selected='selected'":""; ?>>Custom Image</option>
	<option value="Custom HTML" <?php echo (@$setting['customThankYouScreen']->value1 == "Custom HTML")?"selected='selected'":""; ?>>Custom HTML</option>
    </select>

<div id="enableCustomThankYouScreenSettingsCustomImage" class="<?php echo (@$setting['customThankYouScreen']->value1 == "Custom Image")?"":"hide"; ?> subSubTab customThankYouScreenSettings"   >
    
	<?php
    
    $this->widget('application.components.ApplicationImageGrid', array(
	'user_global_id'=>Yii::app()->session['globalUserID'],
	
	'uploaderButtonId'=>'uploaderImg2',
	 'imageUploadDestination'=>'user_assets/application_images/thank_you_image',
	 'imageUploadSize'=>'100x100', //multiple size
	 'imagePreviewSize'=>'100x100',
	 'applicationImageNameHolderValue'=>@$setting['customThankYouScreen']->value4_text,

	 'type'=>'Thank You Image',
	 'application_name'=>$this->moduleName
	
	
    )); 
    
    
    ?>
    
    </div>
    
<div style="clear:both"></div>     
    
    
<div id="enableCustomThankYouScreenSettingsCustomHTML" class="<?php echo (@$setting['customThankYouScreen']->value1 == "Custom HTML")?"":"hide"; ?> subSubTab customThankYouScreenSettings"   >
    
 

    <textarea id="customThankYouScreenSettingsCustomHTML" class="editor"   ><?php echo @$setting['customThankYouScreen']->value5_text; ?></textarea>

    
    <div style="clear:both"></div>
    </div>
    
    
    <div style="clear:both"></div> 

</div>
</div>


    
<!--    
<label for="enableSelectiveAccess"  ><span>Selective access to be enabled </span><input onclick="saveBasicSettings('enableSelectiveAccess'); $('#enableSelectiveAccessSettings').toggle();" type="checkbox" id="enableSelectiveAccess" <?php echo (@$setting['enableSelectiveAccess']->value1 == "true")?"checked='checked'":""; ?> />


    <div id="enableSelectiveAccessSettings" class="hide subSubTab"  >
    Image upload for folks not eligible
    </div>
    

</label>
-->



<script>

    
    function customThankYouScreenCall(obj)
    {
	$(".customThankYouScreenSettings").hide();

	if(obj.value == "Custom Image")
	{
	    $("#enableCustomThankYouScreenSettingsCustomImage").slideDown();
	}
	
	if(obj.value == "Custom HTML")
	{
	    $("#enableCustomThankYouScreenSettingsCustomHTML").slideDown();
	}
	
    }    
    
    
//application images grid js//////////////
    function uploaderImg3Callback(outObj)
    {
	 $.ajax({
            type: "POST",
            url: "index.php?r=site/saveApplicationName&imageName="+outObj.filename+"&appName=<?php echo $this->moduleName; ?>&imageTitle=&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&type=Mobile+Browser+Image&isDefault=0"
        }).done(function( out ) {
            var outObjImg = jQuery.parseJSON(out);
            
            if(outObjImg.msg == "added")
	    {
		$("#uploaderImg3Container ul").append('<li id="uploaderImg3-appImg'+outObjImg.entryId+'" class="applicationGridImg" ><img src="user_assets/application_images/mobile_browser_images/100x100/'+outObj.filename+'" class="appImg" /><span><a href="javascript:;" onclick="deleteAppImg(\'uploaderImg3\', \''+outObjImg.entryId+'\')" >(delete)</a></span></li>');
	    }

        });		
    }
    
    $("#uploaderImg3Container .appImg").live("click", function(){
	
	appImgClick('uploaderImg3',this);
		
	 saveBasicSettings('enableFbMobile');
    });
    ////////////////////////
    

    //application images grid js//////////////
    function uploaderImg2Callback(outObj)
    {
	 $.ajax({
            type: "POST",
            url: "index.php?r=site/saveApplicationName&imageName="+outObj.filename+"&appName=<?php echo $this->moduleName; ?>&imageTitle=&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&type=Thank+You+Image&isDefault=0"
        }).done(function( out ) {
            var outObjImg = jQuery.parseJSON(out);
            
            if(outObjImg.msg == "added")
	    {
		$("#uploaderImg2Container ul").append('<li id="uploaderImg2-appImg'+outObjImg.entryId+'" class="applicationGridImg" ><img src="user_assets/application_images/thank_you_image/100x100/'+outObj.filename+'" class="appImg" /><span><a href="javascript:;" onclick="deleteAppImg(\'uploaderImg2\', \''+outObjImg.entryId+'\')" >(delete)</a></span></li>');
	    }

        });		
    }
    
    $("#uploaderImg2Container .appImg").live("click", function(){
	
	appImgClick('uploaderImg2',this);		
	saveBasicSettings('customThankYouScreen');
    });
    ////////////////////////
   
    
    function savePrelikeHtml()
    {
	//alert("")
    }
    
    function customThankYouScreenSettingsCustomHTMLblur()
    {
	saveBasicSettings('customThankYouScreen');
    }
    
</script>    