<?php
if(!empty($_REQUEST['id']))
{
    $model =  LocalUsers::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new LocalUsers;
}

$action = (isset($_REQUEST['nowAction']))?$_REQUEST['nowAction']:"Create";


if($action == "Delete")
{
     $model->delete();
    Yii::app()->user->setFlash('success', "Deleted Successfully!");	    
    //sending to report
    $this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-3");
   
}


if (isset($_POST['LocalUsers']))
{
 
    $model->setAttributes($_POST['LocalUsers']);
    /*$model->theme_id = (int)$_REQUEST['themeId'];
    $model->app_local_id = (int)$_REQUEST['localAppId'];
    $model->user_global_id = Yii::app()->session['globalUserID'];
    $model->agency = Yii::app()->session['nowAgency']->identifier;*/
    
    
    try
    {
	if ($model->save())
	{
	    if($action == "Create")
	    {
		Yii::app()->user->setFlash('success', "Added Successfully!");	    
		//send to form again
		
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-3");
	    }
	    else
	    {
		Yii::app()->user->setFlash('success', "Updated Successfully!");	    
		//sending to report
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-3");
	    }
		}
    }
    catch (Exception $e)
    {
	$model->addError('', $e->getMessage());
    }
}
elseif (isset($_GET['LocalUsers']))
{
    $model->attributes = $_GET['LocalUsers'];
}
?>
<div class="widget fluid">
 <div class="whead"><h6>Input fields</h6></div>
  <div class="row">
	<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
  </div>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'local-users-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
	'action' => '',
	'method' => "post"
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'user_fb_id'); ?>
            <?php echo $form->textField($model,'user_fb_id',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'user_fb_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'full_name'); ?>
            <?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'full_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'email_address'); ?>
            <?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'email_address'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'gender'); ?>
            <?php echo $form->textField($model,'gender',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'gender'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'contact_number'); ?>
            <?php echo $form->textField($model,'contact_number',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'contact_number'); ?>
        </div>
       
        <div class="row">
            <?php echo $form->labelEx($model,'app_local_id'); ?>
            <?php echo $form->textField($model,'app_local_id'); ?>
            <?php echo $form->error($model,'app_local_id'); ?>
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