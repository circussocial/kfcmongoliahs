

<?php
$model = new Category();

$this->renderPartial("application.modules.".$this->moduleName.".views.default.settings.category._form", array(
			'model' => $model,
			'buttons' => 'create'));

?>