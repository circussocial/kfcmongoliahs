<?php
$model = new Stickers();
$this->renderPartial('settings/stickers/_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>