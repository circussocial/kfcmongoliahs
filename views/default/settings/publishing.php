<div class="formRow">
    <div class="grid3"><label>Page Name</label></div>
    <div class="grid4"><a href="https://facebook.com/<?php echo Yii::app()->session['nowPageId']; ?>" target="_blank" ><h3><?php echo Yii::app()->session['nowPageName']; ?></h3></a><a href="javascript:" onclick="$('#fbPages').slideToggle();" >(change)</a><div id="fbPages" style="display: none;">


            <?php
            $statusFlagArr = array();

            $statusFlagArr['Active'] = 'status_available';
            $statusFlagArr['Expired'] = 'status_away';
            $statusFlagArr['Stopped'] = 'status_off';
            $statusFlagArr['Blocked'] = 'status_off';


            $globalUser = GlobalUsers::model()->findByAttributes(array("global_user_id" => Yii::app()->session['globalUserID']));

            $userData = unserialize($globalUser->user_data);



            $l = 1;
            foreach ($userData['facebookPages'] as $page)
            {

                $cacheId = "fbDataStringCached" . $page['fb_page_id'];


                $fbDataString = Yii::app()->cache->get($cacheId);

                if ($fbDataString === false)
                {
                    $fbDataString = @file_get_contents("http://graph.facebook.com/" . $page['fb_page_id']);
                    Yii::app()->cache->set("$cacheId", $fbDataString, 86400); //1 day
                }

                $fbData = @json_decode($fbDataString);


                $pageImg = ZarrImageResizer::cache('https://graph.facebook.com/' . $page['fb_page_id'] . '/picture?type=large', 'page-160x160-' . $page['fb_page_id'], 'jpg', '160x160');

                $alreadyExists = DashboardApps::model()->findByAttributes(array("fb_tab_id" => $page['fb_page_id'], "app"=>$this->moduleName));

                if (!isset($alreadyExists))
                {
                    ?>

                    <a href="index.php?r=<?php echo $this->moduleName; ?>/default/publishing&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId=<?php echo $_REQUEST['localAppId']; ?>&nowPageId=<?php echo $page['fb_page_id']; ?>&nowPageName=<?php echo $page['fb_page_name']; ?>&nowPageAccessToken=<?php echo $page['access_token']; ?>" >	
                        <img src="<?php echo $pageImg; ?>" width="65" align="left" style="padding:5px;" />	
                        <br />
                        <strong><?php echo CHtml::decode($page['fb_page_name']); ?></strong>
                    </a>

                    <div style="clear:both"></div>



    <?php }
} ?>

        </div>

    </div>
</div>


<div class="formRow">
    <div class="grid3"><label>Enter Tab Name</label></div>
    <div class="grid4"><input type="text" value="<?php echo @$setting['tabIcon']->value2; ?>" id="tabName" name="tabName" onblur="saveBasicSettings('tabIcon')"  /></div>
</div>



<div class="formRow">
    <div class="grid3"><label>Choose Tab Image</label></div>
    <div class="grid4">

        <div class="subSubTab">
<?php
$this->widget('application.components.ApplicationImageGrid', array(
    'user_global_id' => Yii::app()->session['globalUserID'],
    'uploaderButtonId'                => 'uploaderImg1',
    'imageUploadDestination'          => 'user_assets/application_images/tab_icons',
    'imageUploadSize'                 => '111x74', //multiple size
    'imagePreviewSize'                => '111x74',
    'imageMinSize'=>'111x74',
    'applicationImageNameHolderValue' => @$setting['tabIcon']->value1,
    'type'             => 'Tab Icon',
    'application_name' => $this->moduleName
));
?>
        </div>

    </div>
</div>