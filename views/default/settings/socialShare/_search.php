<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fb_msg_caption'); ?>
		<?php echo $form->textField($model,'fb_msg_caption',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fb_msg_title'); ?>
		<?php echo $form->textField($model,'fb_msg_title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fb_msg_detail'); ?>
		<?php echo $form->textArea($model,'fb_msg_detail',array('rows'=>6, 'cols'=>50)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model, 'app_local_id'); ?>
		<?php echo $form->textField($model,'app_local_id',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'theme_id'); ?>
		<?php echo $form->textField($model,'theme_id',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'agency'); ?>
		<?php echo $form->textField($model,'agency',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->