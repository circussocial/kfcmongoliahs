<?php
$model = new UserEntries();
$this->renderPartial('settings/userEntries/_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>