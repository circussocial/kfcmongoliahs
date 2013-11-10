<?php 
$model = new LocalUsers();

$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'local-users-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
        'id',
		array(   
	    'header'=>'profile Picture',
	    'type'=>'raw',
	    'value'=>array($model,'showProfileImage'),
	    ),
        'user_fb_id',
        'full_name',
        'email_address',
        //'age',
        'gender',
        //'city',
        //'country',
        //'nric',
        //'mobile_number',
        //'landline_number',
        //'contact_number',
        //'timezone',
        //'url',
        //'visits',
        //'last_login',
        //'is_active',
        //'app_local_id',
        //'fb_tab_id',
array(
	  'class'=>'CButtonColumn',
	  'template'=>'{delete}{update}{view}',
	  'buttons'=>array
	  (
	    'update' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=create&nowAction=Update&id=$data->id#tabs-3"'
	    ),
	      'delete' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=create&nowAction=Delete&id=$data->id#tabs-3"'
	    ),
		 'view' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=managelocalUsers&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=view&nowAction=View&id=$data->id#tabs-3"'
	    ),
	  ),
	 ),

	),
	'itemsCssClass' => 'tDefault'

)); ?>
<script>

function addHash()
{
 $('.previous a').attr("href",$('.previous a').attr("href")+"#tabs-3");
 $('.page a').each(function(){  $(this).attr("href",$(this).attr("href")+"#tabs-3"); });
 $('.next a').attr("href",$('.next a').attr("href")+"#tabs-3");
}
addHash();
</script>
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