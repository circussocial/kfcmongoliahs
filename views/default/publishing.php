<?php
$this->pageTitle = "Publishing";

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default">App Central</a></li>';

if (SiteController::checkPermission("CAN_ADD_NEW_APPLICATION",$this->moduleName))
{
    $this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default/selectTheme">Design</a></li>';
}

if (SiteController::checkPermission("CAN_CUSTOMIZE_THEME",$this->moduleName))
{
    $this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default/customizeTheme&localAppId=' . $_REQUEST['localAppId'] . '&themeId=' . $_REQUEST['themeId'] . '">Customize</a></li>';
}

$this->breadcrumbs[] = '<li class="current"><a href="#">Publish</a></li>';
?>




<div class="grid_12 omega" style="width: 100%">
<?php $setting = $this->getSettings(); ?>




<form action="" class="main1" id="tabForm" method="post">
    <fieldset>

	<div class="widget fluid">
	    <div class="whead"><h6>Publishing</h6></div>
	    <?php echo $this->renderPartial("settings/publishing", array("localApp" => $localApp, "nowTheme" => $nowTheme, "setting" => $setting)); ?>
	</div>
    </fieldset> 


    
    
<br />
 


<?php if (SiteController::checkPermission("CAN_CUSTOMIZE_THEME",$this->moduleName))
{ ?>    
        <a href="javascript:;" onclick="document.location='index.php?r=kfcmongoliahs/default/settings&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>'" class="buttonM bGreen"><span class="icon-arrow-left-3"></span><span>Back</span></a>
<?php }
else
{ ?>
        <a href="javascript:;" onclick="document.location='index.php?r=kfcmongoliahs/default'" class="buttonM bGreen"><span class="icon-arrow-left-3"></span><span>Back</span></a>
<?php } ?>


<?php if (SiteController::checkPermission("CAN_PUBLISH_APPLICATION",$this->moduleName)){ ?>
<a href="javascript:;" onclick="addToTab();" class="buttonM bGreen"><span class="icon-checkmark-3"></span><span>Publish</span></a>
<?php } ?>





</form>	

    <img src="images/progress.gif" style="margin-left: 10px; display: none;" id="saveProgress" />
    
    
   
 


<?php
$this->renderPartial("settings/settings_js",array("localApp"=>$localApp, "nowTheme"=>$nowTheme, "settings"=>$setting));
?>

 



<script>
    
    
    //application images grid js//////////////
    function uploaderImg1Callback(outObj)
    {
	 $.ajax({
            type: "POST",
            url: "index.php?r=site/saveApplicationName&imageName="+outObj.filename+"&appName=<?php echo $this->moduleName; ?>&imageTitle=&localAppId=<?php echo $_REQUEST['localAppId']; ?>&themeId=<?php echo $_REQUEST['themeId']; ?>&type=Tab+Icon&isDefault=0"
        }).done(function( out ) {
            var outObjImg = jQuery.parseJSON(out);
            
            if(outObjImg.msg == "added")
	    {		
		$("#uploaderImg1Container ul").append('<li id="uploaderImg1-appImg'+outObjImg.entryId+'" ><img src="user_assets/application_images/tab_icons/111x74/'+outObj.filename+'" class="appImg" /><span><a href="javascript:;" onclick="deleteAppImg(\'uploaderImg1\', \''+outObjImg.entryId+'\')" >(delete)</a></span></li>');
	    }

        });		
    }
    
    $("#uploaderImg1Container .appImg").live("click", function(){
	
	appImgClick('uploaderImg1',this);

	$("#tabIcon").val($("#uploaderImg1applicationImageNameHolder").val());
		
	 saveBasicSettings('tabIcon');
    });
    ////////////////////////
    
    
     
    function addToTab()
    {      
        if($("#uploaderImg1applicationImageNameHolder").val()=="")
        {
            $.jGrowl("Please choose tab image");
            return;
        }
    
	$('#progressImg').show();	    
	$("#tabForm").submit();
    }
  
</script>  



 
<?php

$footerData = $this->renderPartial("//site/upclickScript",array("uploaderID"=>"1"),true);

$this->footerData = $footerData;

?>
