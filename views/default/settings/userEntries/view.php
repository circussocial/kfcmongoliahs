<?php 
if(!empty($_REQUEST['id']))
{
    $model =  UserEntries::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new UserEntries();
}
$this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
					array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'),
						'user_fb_id',
						'user_name',
						array(
                        'name'=>'email_address',
                        'type'=>'email'
						),
						'phone_number',
						'user_photo',
						'user_uploaded_photo',
						)
						)
						);
					?>