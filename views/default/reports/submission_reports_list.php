
<?php


if(!empty($_REQUEST['del']))
{
    KfcmongoliahsSubmissions::model()->deleteByPk($_REQUEST['del']);
}




$model = new KfcmongoliahsSubmissions();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'channels-grid',
	'dataProvider'=>$model->search('search',$this->fb_user),
	

	'columns'=>array(
            
            
	array(
	'header'=>'#',
	'class'=>'IndexColumn',
	    'htmlOptions'=>array('width'=>'40px'),
	),
	    
	    'date',
	    'sent_to',
	    'subject',
	    
	    array(   
	    'header'=>'Details',
	    'type'=>'raw',
	    'value'=>array($model,'getDetails'),
		 //'htmlOptions'=>array('width'=>'100px'),
	    ),
	    
	    
	    array(   
	    'header'=>'Delete',
	    'type'=>'raw',
	    'value'=>'"<a href=\"index.php?r=kfcmongoliahs/default/Reports&pageId='.$_REQUEST['pageId'].'&type=Entries&del=$data->id\" >Delete</a>"',
		 //'htmlOptions'=>array('width'=>'100px'),
	    ),
	    
	    
	    
	    /*
	   array(
			'class'=>'CButtonColumn',
			//'template'=>'{delete}'
		),
	     * 
	     */
	    
	),
    
    
    
	'loadingCssClass'=>'loading-class',
	'itemsCssClass'=>'tDefault'
));


?>

<script>
function showDetails(url)
{
    myWindow=window.open(url,'Details','width=400,height=400,left=200,top=200')    
    myWindow.focus()
    
    myWindow.moveTo(screen.width/2-300,screen.height/2-250)
}
</script>    