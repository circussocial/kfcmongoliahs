<?php

/**
 * This controller contains all necessary methods used for a module.
 */
class DefaultController extends Controller
{

    //USED:
    protected $moduleName = "kfcmongoliahs";
    public $moduleAppId = "440958892676429";
    private $maxFileSize = 5242880; //5 MB
    
    public $facebook;
    public $fbUser;
    protected $fb_user; 
    public $pages;
 
    public $nowGlobalUser;    
    protected $nowAgency;
    protected $nowPermissions;
    public $nowModule;
    public $url;
    
    public $headData;
    public $footerData;
   

    //USED:
    public function __construct($id, $module = null)
    {
	//Required in every controller where auth system is applicable.
	$this->checkAuthToken();
		
	
	$this->url = Yii::app()->baseUrl;

	//loading base theme
	$this->layout = "webroot.themes.circussocial.views.layouts.column3";

 
	//call fb api
	$facebook = new FacebookSimpleController(); //not used auth because we only want it for fb like

	$this->facebook = $facebook;

	$this->fbUser = $facebook->getFbUser();

	$fbUserID = $facebook->getFbUser();

	$this->fb_user = $fbUserID['id'];

	$this->nowGlobalUser = GlobalUsers::model()->findByAttributes(array('global_user_id' => Yii::app()->session['globalUserID']));

	$this->nowAgency = Yii::app()->session['nowAgency'];

	$this->nowModule = Apps::model()->findByAttributes(array("identifier" => $this->moduleName));

	
	//setting page data
	if (isset($_REQUEST['nowPageAccessToken']))
	{
	    Yii::app()->session['nowPageId'] = $_REQUEST['nowPageId'];
	    Yii::app()->session['nowPageName'] = $_REQUEST['nowPageName'];
	    Yii::app()->session['nowPageAccessToken'] = $_REQUEST['nowPageAccessToken'];
	}
	

	parent::__construct($id, $module);
    }

   

    //USED: app specific
    public function actionLoadObject($type, $value, $object)
    {
	echo $this->renderPartial("objects/" . $type, array("value" => $value, "object" => $object));
    }

    //USED: app specific
    public function actionSubmissionReportsDetails($id)
    {
	$model = KfcmongoliahsSubmissions::model()->findByPk($id);


	$data = unserialize($model->data);

	foreach ($data as $key => $value)
	{
	    $key = str_replace("__REQUIRED", "", $key);
	    $key = str_replace("_", " ", $key);

	    if ($key != 'submit')
	    {
		echo "<b>$key : </b>" . $value . "<br/><br/>";
	    }
	}

	//echo $this->render("submission_reports");
    }

    //USED: app specific
    public function actionReports()
    {
	echo $this->render("reports/submission_reports");
    }
     

    //MODULE SPECIFIC METHODS////////////////////////////////////////////////////
    //USED: app specific
    private function filterSubmissionDetails($details)
    {
	$row = array();
	foreach ($details as $key => $val)
	{
	    if ($key != 'submit')
	    {
		$row[] = $val;
	    }
	}

	return $row;
    }

    //USED: app specific
    private function getDetailsAttr($details)
    {
	$row = array();
	foreach ($details as $key => $val)
	{
	    $key = str_replace("__REQUIRED", "", $key);
	    $key = str_replace("_", " ", $key);

	    if ($key != 'submit')
	    {
		$row[] = $key;
	    }
	}

	return $row;
    }

    //user submit entries report
    public function actionDownloadCSV($pageId)
    {

//	$submissions =Yii::app()->db
 //   ->createCommand('SELECT * FROM appscirc_kfcmongoliahs.tbl_user_entries ')
//	->queryAll();
	$submissions = UserEntries::model()->findAll();


	if (!isset($submissions[0]->id))
	{
	    echo "Records are not available";
	    exit;
	}


	$list = array();
	$mainAttr = array('User FB ID', 'Name', 'Email Address','Phone No.','IP Address', 'Image','Date');

	$list[] = $mainAttr;


	foreach ($submissions as $entry)
	{
	   
	    $mainCols = array($entry->user_fb_id, $entry->user_name, $entry->email_address,$entry->phone_number,$entry->user_ip_address,'https://apps.circussocial.com/protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/'.$entry->user_uploaded_photo,$entry->uploaded_date);

	    //print_r($details);
	    $list[] = $mainCols;
	}

	$fileName = 'User_entries_'.date('d-m-Y H:i:s').'.csv';

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment;filename=' . $fileName);
	$fp = fopen('php://output', 'w');

	foreach ($list as $fields)
	{
	    fputcsv($fp, $fields);
	}


	fclose($fp);
    }
	
	 //user report
    public function actionDownloadUserReport($pageId)
    {

    $submissions =Yii::app()->db
    ->createCommand('SELECT * FROM appscirc_kfcmongoliahs.tbl_local_users ')
	->queryAll();
	//$submissions = UserEntries::model()->findAll();


	if (!isset($submissions[0]['id']))
	{
	    echo "Records are not available";
	    exit;
	}


	$list = array();
	$mainAttr = array('User FB ID', 'Name', 'Email Address','Gender');

	$list[] = $mainAttr;


	foreach ($submissions as $entry)
	{
	   
	    $mainCols = array($entry['user_fb_id'], $entry['full_name'], $entry['email_address'],$entry['gender']);

	    //print_r($details);
	    $list[] = $mainCols;
	}

	$fileName = 'User_Detail'.date('d-m-Y H:i:s').'.csv';

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment;filename=' . $fileName);
	$fp = fopen('php://output', 'w');

	foreach ($list as $fields)
	{
	    fputcsv($fp, $fields);
	}


	fclose($fp);
    }

    /////////////////////////////////////////////////////////////////////////////
    //SYSTEM METHODS/////////////////////////////////////////////////////////////
    
     //USED: done
    public function saveBasicDefaultSettings($var_name, $value1, $value2, $value3, $value4_text, $value5_text)
    {
	SiteController::saveBasicDefaultSettings($var_name, $value1, $value2, $value3, $value4_text, $value5_text, $this->moduleName);
    }

    //USED: done
    public function actionSaveBasicSettings()
    {
	SiteController::saveBasicSettings($this->moduleName);
    }

    //USED: done
    protected function getSettings()
    {
	return SiteController::getRuSettings($this->moduleName);
    }
    
    public function actionIndex()
    {	
	$this->render("index");
    }

    //USED:
    public function actionManageAppUsers()
    {
	echo $this->render("manage_app_users");
    }

    //USED:
    public function actionSelectTheme()
    {	
	$this->render("selectTheme");
    }

    //USED:
    public function actionCustomizeTheme($themeId = '', $localAppId = '')
    {

	$nowTheme = DashboardThemes::model()->findByAttributes(array("id" => $themeId, "is_active" => 1));

	$localApp = LocalApps::model()->findByAttributes(array("id" => $localAppId));

	$this->render("customizeTheme", array("nowTheme" => $nowTheme, "localApp" => $localApp));
    }

    //USED: it is used to save the instance of the app
    public function actionSaveApp()
    {
	$requests = Yii::app()->request;


	$appTitle = $requests->getParam('appTitle');
	$localAppId = (int) $requests->getParam('localAppId');

	$pageHtml = $requests->getParam('pageHtml');


	if ($localAppId == 0)
	{
	    $model = new LocalApps();
	    $model->created_on = new CDbExpression('NOW()');
	    $model->user_global_id = Yii::app()->session['globalUserID'];
	    $status = "added";
	}
	else
	{
	    $model = LocalApps::model()->findByAttributes(array("id" => $localAppId, "user_global_id" => Yii::app()->session['globalUserID']));
	    $status = "updated";
	}

	$model->agency = $this->nowAgency->identifier;

        $model->fb_tab_id = Yii::app()->session['nowPageId'];
        $model->fb_tab_name = Yii::app()->session['nowPageName'];
        

	$model->theme_id = (int) $requests->getParam('themeId');

	$model->title = ($appTitle == '') ? "Form - " . time() : $appTitle;
	$model->html_body = $pageHtml;

	$model->page_bg_color = $requests->getParam('pageBgColor');
	$model->page_bg_image = $requests->getParam('pageBgImage');

	$model->save();
	//print_r($model->getErrors());
        

	SiteController::synchronizeLocalApps($model, $this->moduleName);
        

	echo json_encode(array('msg' => $status, 'localAppId' => $model->id));
    }

    //USED:
    public function actionSettings($themeId, $localAppId)
    {

	$nowTheme = DashboardThemes::model()->findByAttributes(array("id" => $themeId, "is_active" => 1));

	$localApp = LocalApps::model()->findByAttributes(array("id" => $localAppId));


	$this->render("settings", array("localApp" => $localApp, "nowTheme" => $nowTheme));
    }
    
    //USED:
    public function actionPublishing($themeId, $localAppId)
    {

	$nowTheme = DashboardThemes::model()->findByAttributes(array("id" => $themeId, "is_active" => 1));

	$localApp = LocalApps::model()->findByAttributes(array("id" => $localAppId));


	if (@$_REQUEST['tab'] == "publishing")
	{
	    $pages = $this->facebook->getPages();
	    $this->pages = $pages['data'];
	}


	if (isset($_REQUEST['tabName']))
	{

	    //USED:
	    $tabAddedStatus = $this->facebook->addAppToTab(Yii::app()->session['nowPageId'], Yii::app()->session['nowPageAccessToken'], stripslashes($_REQUEST['tabName']), $this->moduleAppId, 'user_assets/application_images/tab_icons/111x74/' . $_REQUEST['uploaderImg1applicationImageNameHolder']);

	    //USED:
	    $localApp = LocalApps::model()->findByAttributes(array("id" => $_REQUEST['localAppId']));
	    $localApp->fb_tab_id = Yii::app()->session['nowPageId'];
	    $localApp->fb_tab_name = @$_REQUEST['tabName'];
	    $localApp->fb_tab_icon = @$_REQUEST['uploaderImg1applicationImageNameHolder'];
	    $localApp->save();


	    //USED:
	    SiteController::synchronizeLocalApps($localApp, $this->moduleName);


	    //USED:
	    Yii::app()->user->setFlash('tabPublished', "Application Published Successfully.");

	    $this->redirect("index.php");
	}


	$this->render("publishing", array("localApp" => $localApp, "nowTheme" => $nowTheme));
    }        
    
    
    //fix the method, it will be used to delete the local apps and dashboard apps
    public function actionDelete($globalAppId,$localAppId)
    {

	SiteController::deleteApp();
	
	Yii::app()->user->setFlash('appDeleted', "Application is deleted successfully.");
	
	$this->redirect("index.php");
 
    }

    //USED: done
    private function checkAuthToken()
    {
	SiteController::checkAuthToken();
    }
	
	
    /////////////////////////////////////////////////////////////////////////////
}