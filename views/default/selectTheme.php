<?php

$this->pageTitle = "Select Themes - ".CHtml::decode($this->nowModule->name);

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r='.$this->moduleName.'/default">'.CHtml::decode($this->nowModule->name).'</a></li>';
$this->breadcrumbs[] = '<li class="current"><a href="index.php?r='.$this->moduleName.'/default">Design</a></li>';

//

?> 


<?php $this->renderPartial("//site/list_themes",array("moduleName"=>$this->moduleName)); ?>



 