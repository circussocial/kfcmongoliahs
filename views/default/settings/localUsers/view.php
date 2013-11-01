<?php 
if(!empty($_REQUEST['id']))
{
    $model =  LocalUsers::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new LocalUsers();
}
$this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
					array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'),
						'user_fb_id','full_name',
						array(
                        'name'=>'email_address',
                        'type'=>'email'),
						//'age',
						'gender',
						//'city',
						//'country',
						//'nric',
						//'mobile_number',
						//'landline_number',
						'contact_number',
						//'timezone',
						//array(
                        //'name'=>'url',
                        //'type'=>'url'),
						//'visits',
						//'last_login',
						//'is_active',
						//'app_local_id',
						//'fb_tab_id',
						)
						)
						);?>