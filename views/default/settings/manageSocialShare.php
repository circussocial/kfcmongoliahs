<?php
if(!empty($_GET['subTab'])&& $_GET['subTab']!="view"){
	$this->renderPartial("settings/socialShare/create");
	 }elseif(!empty($_GET['subTab'])&& $_GET['subTab']=="view"){
 $this->renderPartial("settings/socialShare/view");
	}else{
			 
	  echo '<br /><a href="index.php?r=kfcmongoliahs/default/settings&tab='.$_GET['tab'].'&themeId='.(int)$_GET['themeId'].'&localAppId='.(int)$_GET['localAppId'].'&subTab=create#tabs-5" class="buttonS bGreen">Add Social Share</a>';
  $this->renderPartial("settings/socialShare/admin");  
}
?>