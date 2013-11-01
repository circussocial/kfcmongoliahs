<?php
if(!empty($_REQUEST['id']))
{
    $model =  UserEntries::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new UserEntries;
}

$action = (isset($_REQUEST['nowAction']))?$_REQUEST['nowAction']:"Create";


if($action == "Delete")
{
     $model->delete();
    Yii::app()->user->setFlash('success', "Deleted Successfully!");	    
    //sending to report
    $this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-2");
   
}


if (isset($_POST['UserEntries']))
{
 
    $model->setAttributes($_POST['UserEntries']);
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
		
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-2");
	    }
	    else
	    {
		Yii::app()->user->setFlash('success', "Updated Successfully!");	    
		//sending to report
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-2");
	    }
		}
    }
    catch (Exception $e)
    {
	$model->addError('', $e->getMessage());
    }
}
elseif (isset($_GET['UserEntries']))
{
    $model->attributes = $_GET['UserEntries'];
}
?>
<div class="widget fluid">
 <div class="whead"><h6>Input fields</h6></div>
  <div class="row">
	<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
  </div>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-entries-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
	'action' => '',
	'method' => "post"
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'user_name'); ?>
            <?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'user_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'email_address'); ?>
            <?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'email_address'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'phone_number'); ?>
            <?php echo $form->textField($model,'phone_number',array('size'=>16,'maxlength'=>16)); ?>
            <?php echo $form->error($model,'phone_number'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'user_photo'); ?>
            <?php echo $form->textField($model,'user_photo',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'user_photo'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'user_uploaded_photo'); ?>
            <?php echo $form->textField($model,'user_uploaded_photo',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'user_uploaded_photo'); ?>
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