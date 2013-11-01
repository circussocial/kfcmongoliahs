<?php
if(!empty($_GET['subTab'])&& $_GET['subTab']!="view"){
	$this->renderPartial("settings/stickers/create");
	 }elseif(!empty($_GET['subTab'])&& $_GET['subTab']=="view"){
 $this->renderPartial("settings/stickers/view");
	}else{
			 
	  echo '<br /><a href="index.php?r=kfcmongoliahs/default/settings&tab='.$_GET['tab'].'&themeId='.(int)$_GET['themeId'].'&localAppId='.(int)$_GET['localAppId'].'&subTab=create#tabs-1" class="buttonS bGreen">Add New Sticker</a>';
  $this->renderPartial("settings/stickers/admin");  
}
?>