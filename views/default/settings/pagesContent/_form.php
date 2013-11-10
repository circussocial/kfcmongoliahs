<?php
if(!empty($_REQUEST['id']))
{
    $model =  PagesContent::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new PagesContent;
}

$action = (isset($_REQUEST['nowAction']))?$_REQUEST['nowAction']:"Create";


if($action == "Delete")
{
     $model->delete();
    Yii::app()->user->setFlash('success', "Deleted Successfully!");	    
    //sending to report
    $this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managepagesContent&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-4");
   
}


if (isset($_POST['PagesContent']))
{
 
    $model->setAttributes($_POST['PagesContent']);
    $model->theme_id = (int)$_REQUEST['themeId'];
    $model->app_local_id = (int)$_REQUEST['localAppId'];
    $model->user_global_id = Yii::app()->session['globalUserID'];
    $model->agency = Yii::app()->session['nowAgency']->identifier;
    
    
    try
    {
	if ($model->save())
	{
	    if($action == "Create")
	    {
		Yii::app()->user->setFlash('success', "Added Successfully!");	    
		//send to form again
		
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managepagesContent&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-4");
	    }
	    else
	    {
		Yii::app()->user->setFlash('success', "Updated Successfully!");	    
		//sending to report
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managepagesContent&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-4");
	    }
		}
    }
    catch (Exception $e)
    {
	$model->addError('', $e->getMessage());
    }
}
elseif (isset($_GET['PagesContent']))
{
    $model->attributes = $_GET['PagesContent'];
}
?>
<div class="widget fluid">
 <div class="whead"><h6>Input fields</h6></div>
  <div class="row">
	<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
  </div>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'pages-content-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
	'action' => '',
	'method' => "post"
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'page_title'); ?>
            <?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'page_title'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'page_content'); ?>
             <?php echo $form->textArea($model,'page_content',array('rows'=>6, 'cols'=>50 , 'class'=>'editor validate[required] text-input')); ?>
           
            <?php echo $form->error($model,'page_content'); ?>
        </div>
        
        <div class="row">
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
			?>
            </div>
<?php $this->endWidget(); ?>
</div> <!-- form -->