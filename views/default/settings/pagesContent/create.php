<?php
$model = new PagesContent();
$this->renderPartial('settings/pagesContent/_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>