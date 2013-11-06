<?php
if(!empty($_REQUEST['id']))
{
    $model =  SocialShare::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new SocialShare;
}
?>
<style>
.edit_btn {
	cursor: pointer;
	padding-bottom: 5px;
	background: -moz-linear-gradient(center top, #96C161 0%, #609C3D 100%) repeat scroll 0 0 transparent;
	border: 1px solid #68A341;
	box-shadow: 0 1px 2px 0 #A4CA6C inset;
	width: 100px;
	text-align: center;
	font-weight: bold;
	font-size: 15px;
}
</style>
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
	color: #0066FF !important;
}
ul.yiiPager .selected a {
	background: none repeat scroll 0 0 #2E6AB1;
	color: #FFFFFF !important;
	font-weight: bold;
}
</style>
<h3 style="padding-top:20px; padding-bottom:20px;"><?php //echo $model->designer_id; ?></h3>
<div class="edit_btn"><a href="index.php?r=kfcmongoliahs/default/settings&tab=manageSocialShare&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&subTab=create&nowAction=Update&id=<?php echo $_REQUEST['id']; ?>#tabs-5">Edit</a></div>
<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
array(
                    
                     'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'
                    ),'fb_msg_caption','fb_msg_title','fb_msg_detail',
                    )));?>