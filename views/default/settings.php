<?php
$this->pageTitle = "Settings - ";

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default">App Central</a></li>';

if (SiteController::checkPermission("CAN_ADD_NEW_APPLICATION",$this->moduleName))
{
    $this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default/selectTheme">Design</a></li>';
}

if (SiteController::checkPermission("CAN_CUSTOMIZE_THEME",$this->moduleName))
{
    $this->breadcrumbs[] = '<li class="current"><a href="index.php?r=' . $this->moduleName . '/default/customizeTheme&themeId=' . $_REQUEST['themeId'] . '&localAppId=' . $_REQUEST['themeId'] . '">Settings</a></li>';
}
?>


<?php
//save default settings

$this->saveBasicDefaultSettings("adminEmail", "", "", "", $this->fbUser['email'], 'New Message');
$this->saveBasicDefaultSettings("maintainDb", "true", "", "", "", "");
$this->saveBasicDefaultSettings("downloadExcel", "true", "", "", "", "");
$this->saveBasicDefaultSettings("enablePrelikePage", "Disabled", "", "", "", "");

$this->saveBasicDefaultSettings("enableFbMobile", "true", "", "", "", "");
$this->saveBasicDefaultSettings("customThankYouScreen", "Default", "", "", "", "");

?>





<?php

$setting = $this->getSettings();


$tabs = array();

$tabs['manageStickers'] = array("Manage Stickers","settings",array("localApp" => $localApp, "nowTheme" => $nowTheme, "setting" => $setting));
$tabs['manageuserEntries'] = array("Manage user Entries","settings",array("localApp" => $localApp, "nowTheme" => $nowTheme, "setting" => $setting));
$tabs['managelocalUsers'] = array("Manage App Users","settings",array("localApp" => $localApp, "nowTheme" => $nowTheme, "settings" => $setting));
$tabs['managepagesContent'] = array("Manage Pages Content","settings",array("localApp" => $localApp, "nowTheme" => $nowTheme, "settings" => $setting));
$tabs['manageSocialShare'] = array("Manage Social Share","settings",array("localApp" => $localApp, "nowTheme" => $nowTheme, "setting" => $setting));
 //add "s" in settings




?>

<?php $this->renderPartial("//site/render_settings_tabs",array("tabs"=>$tabs)); ?>

<br /><br />



<?php /*?><a href="index.php?r=kfcmongoliahs/default/settings&tab=manageCategories&themeId=7&localAppId=24&uiTab=tabs-2" >tab2</a>
<br /><br /><br />


<a href="index.php?r=kfcmongoliahs/default/settings&tab=manageSharingMessages&themeId=7&localAppId=24&uiTab=tabs-5" >sharing msgs</a>

<br /><br /><br />





<a href="index.php?r=<?php echo $this->moduleName; ?>/default/publishing&themeId=<?php echo (int)$_REQUEST['themeId']; ?>&localAppId=<?php echo (int)$_REQUEST['localAppId']; ?>"  class="buttonM bGreen"><span class="icon-arrow-right-3"></span><span>Next</span></a><?php */?>


<form action="" class="main1">

 

<input type="hidden" id="saveType" value="Individual" />
    


<br /><br />

	 

 
<!--


<?php if (SiteController::checkPermission("CAN_CUSTOMIZE_THEME",$this->moduleName))
{ ?>    
        <a href="javascript:;" onclick="document.location='index.php?r=kfcmongoliahs/default/customizeTheme&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>'" class="buttonM bGreen"><span class="icon-arrow-left-3"></span><span>Back</span></a>
<?php }
else
{ ?>
        <a href="javascript:;" onclick="document.location='index.php?r=kfcmongoliahs/default'" class="buttonM bGreen"><span class="icon-arrow-left-3"></span><span>Back</span></a>
<?php } ?>



    <a href="javascript:;" onclick="saveAllFields('0')" class="buttonM bGreen"><span class="icon-checkmark-3"></span><span>Save</span></a>


    <?php if (SiteController::checkPermission("CAN_PUBLISH_APPLICATION",$this->moduleName))
    { ?>
        <a href="javascript:;" onclick="saveAllFields('1');" class="buttonM bGreen"><span class="icon-arrow-right-3"></span><span>Next</span></a>
<?php } ?>

    <img src="images/progress.gif" style="margin-left: 10px; display: none;" id="saveProgress" />

-->


</form>




<br /><br />



<?php
$this->renderPartial("settings/settings_js", array("localApp" => $localApp, "nowTheme" => $nowTheme, "setting" => $setting));
?>


<script>
    function saveAllFields(gotoNext)
    {
		
	saveBasicSettings('adminEmail');
	saveBasicSettings('maintainDb');
	saveBasicSettings('downloadExcel');
	saveBasicSettings('enablePrelikePage'); 
	
	saveBasicSettings('enableFbMobile');
	saveBasicSettings('customThankYouScreen');
	
	
	
	if(gotoNext == 1)
	{
	    document.location = "index.php?r=kfcmongoliahs/default/publishing&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>";
	}
    }
    
    
    
    $(".editor").cleditor();
    
</script>    

 

<?php

$footerData = $this->renderPartial("//site/upclickScript",array("uploaderID"=>"1"),true);
$footerData .= $this->renderPartial("//site/upclickScript",array("uploaderID"=>"2"),true);
$footerData .= $this->renderPartial("//site/upclickScript",array("uploaderID"=>"3"),true);

$this->footerData = $footerData;

?>



 
		   