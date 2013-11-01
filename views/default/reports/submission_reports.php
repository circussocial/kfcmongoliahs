<?php
$tabSubmittedStatus = Yii::app()->user->getFlash('tabSubmitted');

if($tabSubmittedStatus)
{
    //echo "<b style='color:green'>Tab ".$tabSubmittedStatus." Successfully.</b><br /><br />";    
    echo '<script>showMsg("infoMsg","Tab '.$tabSubmittedStatus.' successfully. <a href=https://facebook.com/'.@$_REQUEST['pageId'].' target=\'_blank\' >(view)</a>  ");</script>';
    
}

?>
   


<?php //echo $this->renderPartial("fb_tabs",array("type"=>"Form"));

echo $this->renderPartial("reports/submission_reports_list");

?>