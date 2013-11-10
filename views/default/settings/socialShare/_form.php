<?php
if(!empty($_REQUEST['id']))
{
    $model =  SocialShare::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new SocialShare;
}

$action = (isset($_REQUEST['nowAction']))?$_REQUEST['nowAction']:"Create";


if($action == "Delete")
{
     $model->delete();
    Yii::app()->user->setFlash('success', "Deleted Successfully!");	    
    //sending to report
    $this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageSocialShare&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-5");
   
}


if (isset($_POST['SocialShare']))
{
 
    $model->setAttributes($_POST['SocialShare']);
    $model->theme_id = (int)$_REQUEST['themeId'];
    $model->app_local_id = (int)$_REQUEST['localAppId'];
   // $model->user_global_id = Yii::app()->session['globalUserID'];
    $model->agency = Yii::app()->session['nowAgency']->identifier;
    
    
    try
    {
	if ($model->save())
	{
	    if($action == "Create")
	    {
		Yii::app()->user->setFlash('success', "Added Successfully!");	    
		//send to form again
		
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageSocialShare&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-5");
	    }
	    else
	    {
		Yii::app()->user->setFlash('success', "Updated Successfully!");	    
		//sending to report
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageSocialShare&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-5");
	    }
		}
    }
    catch (Exception $e)
    {
	$model->addError('', $e->getMessage());
    }
}
elseif (isset($_GET['SocialShare']))
{
    $model->attributes = $_GET['SocialShare'];
}

//  $this->render('create',array( 'model'=>$model));
?>
<style type="text/css">
.uploading_image{
	float:left;
	padding-left:15px;
	width:100px;
}
.uploaded_image{
	float:left;
	padding-left:15px;
	width:100px;
}
.upload_image_btn{
	float:left;
}
.Image_preview_box{
	float:left;
}
.ui-widget-content a {
    color: #636363 !important;
}
#fb_msg_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#pinterest_share_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#public_prize3_to_prize5_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#public_prize6_to_prize45_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#aia_prize1_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#aia_prize3_to_prize5_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
#aia_prize6_to_prize45_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}

</style>
<style type="text/css">
.upload_image_btn{
float: left;
width: 120px;
}
</style>
<script type="text/javascript" src="app_themes/kfcmongoliahs/basic/vendors/validateForm/dist/jquery.validate.js"></script>
<link type="text/css" rel="stylesheet" href="app_themes/kfcmongoliahs/basic/vendors/validateForm/demo/css/screen.css" />
<script>
$().ready(function() {
	// validate the comment form when it is submitted
	$("#social-share-form").validate();	
});
</script>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#social-share-form").validationEngine();
		});

		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>


<div class="widget fluid">
	<div class="whead"><h6>Input fields</h6></div>
	<div class="row">
			<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
	</div>
	
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'social-share-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'action' => '',
	'method' => "post"
    ));
	
    echo $form->errorSummary($model);
    ?>
    
		 <div class="row">
            <?php echo $form->labelEx($model,'fb_msg_caption'); ?>
            <?php echo $form->textField($model,'fb_msg_caption',array('size'=>60,'maxlength'=>250,'class'=>'validate[required] text-input')); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'fb_msg_title'); ?>
            <?php echo $form->textField($model,'fb_msg_title',array('size'=>60,'maxlength'=>250,'class'=>'validate[required] text-input')); ?>
            <?php echo $form->error($model,'fb_msg_title'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'fb_msg_detail'); ?>
            <?php echo $form->textArea($model,'fb_msg_detail',array('rows'=>6, 'cols'=>50,'class'=>'validate[required] text-input')); ?>
            <?php echo $form->error($model,'fb_msg_detail'); ?>
        </div>
      
       
		
        <div class="row">
			<?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
		if(isset($_GET['nowAction']) && $_GET['nowAction']!='Update'){
		echo CHtml::resetButton('Reset',array('id'=>'reset-button','class'=>'butDef'));
		}
		echo CHtml::Button(Yii::t('app', 'Cancel'), array('onclick' => 'goBack();'));
	?>
		</div>
<?php	$this->endWidget(); ?>
</div> <!-- form -->


    
<style>
.ui-tabs .ui-tabs-nav li {
    border-bottom: 1px solid #DEDEDE !important;
    border-left: 0 none !important;
    border-right: 1px solid #D5D5D5 !important;
    float: left !important;
    list-style: none outside none !important;
    padding: 0 !important;
    position: relative !important;
    top: 0 !important;
    white-space: nowrap !important;
    width: 161px !important;
}
ul.yiiPager li a {
    font-weight: normal;
	color:#0066FF !important;
}
ul.yiiPager .selected a {
    background: none repeat scroll 0 0 #2E6AB1;
    color: #FFFFFF !important;
    font-weight: bold;
}
</style>