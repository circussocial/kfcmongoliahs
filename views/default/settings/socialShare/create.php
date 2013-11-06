<?php
$model = new SocialShare();
$this->renderPartial('settings/socialShare/_form', array(
			'model' => $model,
			'buttons' => 'create'));
?>
<style>
.ui-tabs .ui-tabs-nav li {
    border-bottom: 1px solid #DEDEDE !important;
    border-left: 0 none !important;
    border-right: 1px solid #D5D5D5 !important;
    float: left !important;
    list-style: none outside none !important;
    padding: 0 !important;
    position: relative !important;
    top: 0 !important;
    white-space: nowrap !important;
    width: 161px !important;
}
ul.yiiPager li a {
    font-weight: normal;
	color:#0066FF !important;
}
ul.yiiPager .selected a {
    background: none repeat scroll 0 0 #2E6AB1;
    color: #FFFFFF !important;
    font-weight: bold;
}
</style>