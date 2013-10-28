<div class="widget fluid">
    <div class="whead"><h6>Add New Category</h6></div>
    <div class="row">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </div>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'category-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'action' => "index.php?r=kfcmongoliahs/category/create&tab=manageCategories&themeId=7&localAppId=23&subTab=create#tabs-2",
    ));

    echo $form->errorSummary($model);
    ?>




    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'parent_category'); ?>
        <?php echo $form->textField($model,'parent_category'); ?>
        <?php echo $form->error($model,'parent_category'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'image'); ?>
    </div>

    <div class="row">
        <?php



        echo CHtml::submitButton(Yii::t('app', 'Save'));

        ?>
    </div>
    <?php $this->endWidget(); ?>

</div> <!-- form -->

