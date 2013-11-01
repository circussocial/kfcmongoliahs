<?php 
if(!empty($_REQUEST['id']))
{
    $model =  Stickers::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new Stickers();
}
$this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
					array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'),
						'sticker_name',
						'sticker_image',
						//'agency',
						//'user_global_id',
						//'theme_id',
						//'app_local_id',
						)
						)
						);?>