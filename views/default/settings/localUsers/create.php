<?php
$model = new LocalUsers();
$this->renderPartial('settings/localUsers/_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>