<?php
if(!empty($_REQUEST['id']))
{
    $model =  Stickers::model()->findByPk($_REQUEST['id']);
}
else
{
    $model = new Stickers;
}

$action = (isset($_REQUEST['nowAction']))?$_REQUEST['nowAction']:"Create";


if($action == "Delete")
{
     $model->delete();
    Yii::app()->user->setFlash('success', "Deleted Successfully!");	    
    //sending to report
    $this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageStickers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-1");
   
}


if (isset($_POST['Stickers']))
{
 
    $model->setAttributes($_POST['Stickers']);
    $model->theme_id = (int)$_REQUEST['themeId'];
    $model->app_local_id = (int)$_REQUEST['localAppId'];
    $model->user_global_id = Yii::app()->session['globalUserID'];
    $model->agency = Yii::app()->session['nowAgency']->identifier;
    
    
    try
    {
	if ($model->save())
	{
	    if($action == "Create")
	    {
		Yii::app()->user->setFlash('success', "Added Successfully!");	    
		//send to form again
		
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageStickers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-1");
	    }
	    else
	    {
		Yii::app()->user->setFlash('success', "Updated Successfully!");	    
		//sending to report
		$this->redirect("index.php?r=kfcmongoliahs/default/settings&tab=manageStickers&themeId=".(int)$_REQUEST['themeId']."&localAppId=".(int)$_REQUEST['localAppId']."#tabs-1");
	    }
		}
    }
    catch (Exception $e)
    {
	$model->addError('', $e->getMessage());
    }
}
elseif (isset($_GET['Stickers']))
{
    $model->attributes = $_GET['Stickers'];
}
?>
<style type="text/css">
.progressImg_default_image{
	display:none;
}
.uploading_image{
	display:none;
	float:left;
	padding-left:15px;
	width:100px;
}
.uploaded_image{
	float:left;
	padding-left:15px;
	width:100px;
}
.upload_image_btn{
	float:left;
}
.Image_preview_box{
	float:left;
}
.ui-widget-content a {
    color: #636363 !important;
}
#sticker_image{
	background-color: #FFC256;
    border: medium none;
    box-shadow: none;
    height: 0;
    left: 130px;
    position: relative;
    width: 0 !important;
    padding-left:0 !important;
    padding-right:0 !important
}
</style>

<div class="widget fluid">
 <div class="whead"><h6>Input fields</h6></div>
  <div class="row">
	<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
  </div>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'stickers-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
	'action' => '',
	'method' => "post"
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'sticker_name'); ?>
            <?php echo $form->textField($model,'sticker_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'sticker_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'sticker_image'); ?>
             <input type="text" id="sticker_image" value="<?php echo $model->sticker_image; ?>" name="Stickers[sticker_image]" class="validate[required] text-input">
          <div class="upload_image_btn">
             <img src="protected/modules/kfcmongoliahs/themes/basic/images/upload.png" id="uploaderImg1">
             <div class="progressImg_default_image"><img src="protected/modules/kfcmongoliahs/themes/basic/images/progress.gif" /></div>
          </div> 
            <?php echo $form->error($model,'sticker_image'); ?>
		<div class="uploading_image" ><img id="photoPreview" width="50px" height="50px" src="user_assets/uploads/kfcmongoliahs/100x100/" /></div>
        <?php if($model->sticker_image !=''){?>
        <div class="uploaded_image"><img src="user_assets/uploads/kfcmongoliahs/100x100/<?php echo $model->sticker_image; ?>" width="50px" height="50px" /></div>
        <?php }?>
        </div>
		<input type="hidden" value="user_assets/uploads/kfcmongoliahs"  id="uploaderImg1imageUploadDestination" name="uploaderImg1imageUploadDestination" size="100" />
		<input type="hidden" value="" id="uploaderImg1applicationImageNameHolder" name="uploaderImg1applicationImageNameHolder"  size="100" />
		<input type="hidden" value="100x100" id="uploaderImg1imageUploadSize" name="uploaderImg1imageUploadSize"  />
		<input type="hidden" value="100x100" id="uploaderImg1imagePreviewSize" name="uploaderImg1imagePreviewSize" />
		<input type="hidden" value="10x10" id="uploaderImg1imageMinSize" name="uploaderImg1imageMinSize" />  
        </div>
        <div class="row">
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
			?>
            </div>
            
<?php $this->endWidget(); ?>
</div> <!-- form -->

<script>
	$(".progressImg_default_image").css("display","none");
	function uploaderImg1Callback(outObj)
    {
	$(".progressImg_default_image").css("display","block");
	 $.ajax({
             type: "POST",
            url: "index.php?r=site/saveApplicationName&imageName="+outObj.filename+"&appName=<?php echo $this->moduleName; ?>&imageTitle=&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&type=kfcmongoliahs+Image&isDefault=0"
        }).done(function( out ) {
            var outObjImg = jQuery.parseJSON(out);
            
            if(outObjImg.msg == "added")
	    {
				$(".uploading_image").css("display","block");
				$(".progressImg_default_image").css("display","none");
                $("#photoPreview").attr("src","user_assets/uploads/kfcmongoliahs/100x100/"+outObj.filename);
                $("#sticker_image").val(outObj.filename);
									 
	    }

        });		
    }
</script>