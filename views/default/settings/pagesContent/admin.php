<?php 
$model = new PagesContent();
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'pages-content-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
        'id',
        'page_title',
        'page_content',
        //'agency',
        //'user_global_id',
        //'theme_id',
        //'app_local_id',
array(
	  'class'=>'CButtonColumn',
	  'template'=>'{update}{view}',
	  'buttons'=>array
	  (
	    'update' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=managepagesContent&themeId=$data->theme_id&localAppId=$_REQUEST[localAppId]&subTab=create&nowAction=Update&id=$data->id#tabs-4"'
	    ),
		 'view' => array
	    (
	     'url'=>'"index.php?r=kfcmongoliahs/default/settings&tab=managepagesContent&themeId=$data->theme_id&localAppId=$_REQUEST[localAppId]&subTab=view&nowAction=View&id=$data->id#tabs-4"'
	    ),
	  ),
	 ),

	),
	'itemsCssClass' => 'tDefault'

)); ?>
<script>

function addHash()
{
 $('.previous a').attr("href",$('.previous a').attr("href")+"#tabs-4");
 $('.page a').each(function(){  $(this).attr("href",$(this).attr("href")+"#tabs-4"); });
 $('.next a').attr("href",$('.next a').attr("href")+"#tabs-4");
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