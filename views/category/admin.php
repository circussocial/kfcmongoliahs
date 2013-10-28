
<br />

<a href="index.php?r=<?php echo $this->moduleName; ?>/default/settings&tab=manageCategories&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&subTab=create#tabs-2" class="buttonS bGreen bWhite">Add New Category</a>


<?php



//TODO: add like this
$model = new Category();

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'category-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        'name',
        //'parent_category',
        'description',
        'image',
        //'app_local_id',
        //'theme_id',
        //'agency',
        //'user_global_id',
array(
			'class' => 'CButtonColumn',
		),
	),

    //TODO: applying admin panel theme by adding this
    'itemsCssClass' => 'tDefault'
)); ?>