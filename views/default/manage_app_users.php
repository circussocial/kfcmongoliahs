<?php


$this->pageTitle = "App Central - ".$this->nowModule->name;

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r='.$this->moduleName.'/default">'.$this->nowModule->name.'</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r='.$this->moduleName.'/default">'.DashboardApps::model()->findByPk($_REQUEST['globalAppId'])->app_name.'</a></li>';
$this->breadcrumbs[] = '<li class="current"><a href="#">Manage Users</a></li>';





?>
 
 
 
 
<?php

$this->renderPartial("//site/manage_app_users",array("moduleName"=>$this->moduleName));

?>