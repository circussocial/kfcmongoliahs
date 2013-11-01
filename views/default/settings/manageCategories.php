


<?php

$subTab = (isset($_REQUEST['subTab']))?$_REQUEST['subTab']:"admin";

$this->renderPartial("settings/category/".$subTab);

?>