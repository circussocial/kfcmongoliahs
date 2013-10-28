

<div class="formRow">
<div class="grid3"><label for="adminEmail"  >Email ID where queries need to be sent</label></div>
<div class="grid4"><input type="text" id="adminEmail" onblur="saveBasicSettings('adminEmail');" value="<?php echo @CHtml::encode($setting['adminEmail']->value4_text); ?>" /></div>
</div>

<div class="formRow">
<div class="grid3"><label for="emailSubject"  >Subject of the Emails</label></div>
<div class="grid4"><input type="text" id="emailSubject" onblur="saveBasicSettings('adminEmail');" value="<?php echo @CHtml::encode($setting['adminEmail']->value5_text); ?>" /></div>
</div>


<!--
<div class="formRow">
<div class="grid3"><label for="maintainDb" >Database to be maintained</label></div>
<div class="grid4"><input type="checkbox" id="maintainDb" onclick="saveBasicSettings('maintainDb');" <?php echo (@$setting['maintainDb']->value1 == "true")?"checked='checked'":""; ?> /></div>
</div>

<div class="formRow">
<div class="grid3"><label for="downloadExcel" >Excel download to be enabled</label></div>
<div class="grid4"><input type="checkbox" id="downloadExcel" onclick="saveBasicSettings('downloadExcel');" <?php echo (@$setting['downloadExcel']->value1 == "true")?"checked='checked'":""; ?> /></div>
</div>

-->


<div class="formRow">
<div class="grid3"><label for="enablePrelikePage" >Fan Gate to be enabled?</label></div>
<div class="grid4"><select onchange="saveBasicSettings('enablePrelikePage'); enablePrelikePageSettingsCall(this); " id="enablePrelikePage" name="enablePrelikePage" >
    <option value="Disabled" <?php echo (@$setting['enablePrelikePage']->value1 == "Disabled")?"selected='selected'":""; ?> >Disabled</option>
    <option value="Custom Image" <?php echo (@$setting['enablePrelikePage']->value1 == "Custom Image")?"selected='selected'":""; ?>>Custom Image</option>
    <option value="Custom HTML" <?php echo (@$setting['enablePrelikePage']->value1 == "Custom HTML")?"selected='selected'":""; ?>>Custom HTML</option>
</select>




<div id="enablePrelikePageSettingsCustomImage" class="<?php echo (@$setting['enablePrelikePage']->value1 == "Custom Image")?"'":"hide"; ?> subSubTab enablePrelikePageSettings"  >
    <br />
    
    
    <?php
  
    $this->widget('application.components.ApplicationImageGrid', array(
	'user_global_id'=>Yii::app()->session['globalUserID'],
	
	'uploaderButtonId'=>'uploaderImg1',
	 'imageUploadDestination'=>'user_assets/application_images/prelike_images',
	 'imageUploadSize'=>'100x100', //multiple size
	 'imagePreviewSize'=>'100x100',
	 'applicationImageNameHolderValue'=>@$setting['enablePrelikePage']->value4_text,

	 'type'=>'Prelike Image',
	 'application_name'=>$this->moduleName
	
	
    )); 
    
	
    
    ?>
    
</div>
    
    <div style="clear:both"></div>
<div id="enablePrelikePageSettingsCustomHTML" class="<?php echo (@$setting['enablePrelikePage']->value1 == "Custom HTML")?"'":"hide"; ?> subSubTab enablePrelikePageSettings"  >
     

<textarea id="prelikePageSettingsCustomHTML" class="editor"  ><?php echo @$setting['enablePrelikePage']->value5_text; ?></textarea>

<div style="clear:both"></div>
</div>
    
    

    
    

</div>
</div>






<script>
    
    
    
    function enablePrelikePageSettingsCall(obj)
    {
	$(".enablePrelikePageSettings").hide();
	
	if(obj.value == "Custom Image")
	{
	    $("#enablePrelikePageSettingsCustomImage").slideDown();
	}
	
	if(obj.value == "Custom HTML")
	{
	    $("#enablePrelikePageSettingsCustomHTML").slideDown();
	}
	
    }
    
    
    //application images grid js//////////////
    function uploaderImg1Callback(outObj)
    {
	
	
	 $.ajax({
            type: "POST",
            url: "index.php?r=site/saveApplicationName&imageName="+outObj.filename+"&appName=<?php echo $this->moduleName; ?>&imageTitle=&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&type=Prelike+Image&isDefault=0"
        }).done(function( out ) {
            var outObjImg = jQuery.parseJSON(out);
            
            if(outObjImg.msg == "added")
	    {
		$("#uploaderImg1Container ul").append('<li id="uploaderImg1-appImg'+outObjImg.entryId+'" class="applicationGridImg"><img src="user_assets/application_images/prelike_images/100x100/'+outObj.filename+'" class="appImg" /><span><a href="javascript:;" onclick="deleteAppImg(\'uploaderImg1\', \''+outObjImg.entryId+'\')" >(delete)</a></span></li>');
									 
	    }

        });		
    }
    
    $("#uploaderImg1Container .appImg").live("click", function(){
	
	appImgClick('uploaderImg1',this);
		
	 saveBasicSettings('enablePrelikePage');
    });
    ////////////////////////
    
    function savePrelikeHtml()
    {
	//alert("")
    }
    
    function prelikePageSettingsCustomHTMLblur()
    {
	saveBasicSettings('enablePrelikePage');
    }
   
</script>    

