<!DOCTYPE html >
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"   >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?> 
<?php 
	    $baseUrl = Yii::app()->baseUrl; 
	    $cs = Yii::app()->getClientScript();
	    //$cs->registerScriptFile($baseUrl.'/js/main.js');
	    /*$cs->registerCssFile($baseUrl.'/css/reset.css');
	    $cs->registerCssFile($baseUrl.'/css/main.css');
	    $cs->registerCssFile($baseUrl.'/css/style.css');
	    $cs->registerCssFile($baseUrl.'/css/960.css');
	    $cs->registerCssFile($baseUrl.'/css/text.css');*/
		
		$cs->registerCssFile($this->themeUrl.'/css/style.css');
		$cs->registerCssFile($this->themeUrl.'/css/reset.css');
		
		$cs->registerScriptFile($this->themeUrl.'/js/jquery.min.js');
		

	     $cs->registerScriptFile($this->themeUrl.'/js/facebook.js');
		$cs->registerScriptFile($this->themeUrl.'/js/main.js');
		
		//slim scroll
		$cs->registerScriptFile($this->themeUrl.'/js/prettify.js');
		$cs->registerScriptFile($this->themeUrl.'/js/jquery.slimscroll.js');
		
		//jquery fileuploader
	  $cs->registerScriptFile($baseUrl.'/js/upclick.js');
		
		//form validation
		$cs->registerScriptFile($this->themeUrl.'/vendors/jQuery-Validation/js/languages/jquery.validationEngine-en.js');
	    $cs->registerScriptFile($this->themeUrl.'/vendors/jQuery-Validation/js/jquery.validationEngine.js');	    
		$cs->registerCssFile($this->themeUrl.'/vendors/jQuery-Validation/css/validationEngine.jquery.css');
		
	    //$cs->registerScriptFile($baseUrl.'/js/jquery.ocupload-1.1.2.js');
	    echo $this->headData;
	?>
</head>
</script><?php $this->renderPartial('fbjs'); ?>
<body>
<?php 
echo $content; 
?>
</body>
<?php echo $this->renderPartial("upclickScript",array("uploaderID"=>"1")) ?>
<?php 
echo $this->footerData;
?>
</html>