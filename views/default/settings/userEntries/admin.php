<?php 
$model = new UserEntries();
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-entries-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
        'id',
        'user_fb_id',
		'user_name',
        'email_address',
        'phone_number',
        'user_photo',
        'user_uploaded_photo',
array(
	  'class'=>'CButtonColumn',
	  'template'=>'{delete}{update}{view}',
	  'buttons'=>array
	  (
	    'update' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=create&nowAction=Update&id=$data->id#tabs-2"'
	    ),
	      'delete' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=create&nowAction=Delete&id=$data->id#tabs-2"'
	    ),
		 'view' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=manageuserEntries&themeId=$_REQUEST[themeId]&localAppId=$_REQUEST[localAppId]&subTab=view&nowAction=View&id=$data->id#tabs-2"'
	    ),
	  ),
	 ),

	),
	'itemsCssClass' => 'tDefault'

)); ?>
<script>

function addHash()
{
 $('.previous a').attr("href",$('.previous a').attr("href")+"#tabs-2");
 $('.page a').each(function(){  $(this).attr("href",$(this).attr("href")+"#tabs-2"); });
 $('.next a').attr("href",$('.next a').attr("href")+"#tabs-2");
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