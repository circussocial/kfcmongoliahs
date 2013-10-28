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
	    $cs->registerCssFile($baseUrl.'/css/reset.css');
	    $cs->registerCssFile($baseUrl.'/css/main.css');
	    
	    $cs->registerCssFile($baseUrl.'/css/style.css');
	    $cs->registerCssFile($baseUrl.'/css/960.css');
	    $cs->registerCssFile($baseUrl.'/css/text.css');

	    $cs->registerScriptFile($baseUrl.'/js/main.js');
		
	    //jquery fileuploader
	    $cs->registerScriptFile($baseUrl.'/js/upclick-min.js');
	    //$cs->registerScriptFile($baseUrl.'/js/jquery.ocupload-1.1.2.js');
	    echo $this->headData;
	?>
</head>

<body>

this text is in layouts/main.php <br /><br /><br />

<?php echo $content; ?>

    
</body>
<?php 
echo $this->footerData;
?>
</html>