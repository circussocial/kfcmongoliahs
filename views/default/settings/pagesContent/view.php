<?php 
if(!empty($_REQUEST['id']))
{
    $model =  PagesContent::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new PagesContent();
}
$this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
					array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'),
						'page_title',
						'page_content',
						//'agency',
						//'user_global_id',
						//'theme_id',
						//'app_local_id',
						)
						)
						);?>