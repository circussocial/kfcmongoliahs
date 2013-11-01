<?php

$this->pageTitle = "App Central - ".CHtml::decode($this->nowModule->name);

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li class="current"><a href="index.php?r='.$this->moduleName.'/default">App Central</a></li>';




$tabSubmittedStatus = Yii::app()->user->getFlash('tabSubmitted');


if($tabSubmittedStatus)
{
    //echo "<b style='color:green'>Tab ".$tabSubmittedStatus." Successfully.</b><br /><br />";    
    echo '<script>$(document).ready(function() { showMsg("successMsg","Tab '.$tabSubmittedStatus.' successfully. <a href=https://facebook.com/'.@$_REQUEST['pageId'].' target=\'_blank\' style=\"text-decoration:none;\" >(view)</a>  ",12000); });</script>';
    
    
}

 



?>




    

<br />
<?php




if(SiteController::checkPermission("CAN_ADD_NEW_APP")){ ?>

<div style="margin-left: 20px;">
<a href="javascript:;" onclick="addNew();" class="buttonM bGreen"><span class="icol-add"></span><span>Add New</span></a>
</div>

<?php } ?>    
    
    

<div class="widget tdCenter" id="fbPageTabs">    
<div class="whead"><h6>Installed Apps</h6></div>
<?php 


if(!empty($_REQUEST['del']))
{
    GlobalThemes::model()->deleteByPk($_REQUEST['del']);
}



$this->renderPartial("//site/list_themes",array("moduleName"=>$this->moduleName)); ?>
</div>


<br />

<script>
    function addNew()
    {
	document.location = "index.php?r=<?php echo $this->moduleName; ?>/default/selectTheme";
    }
</script>