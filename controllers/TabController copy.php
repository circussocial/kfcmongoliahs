<?php

class TabController extends Controller
{

    protected $fbUser;
    private $image_folder;
    public $facebook;
    public $localUser;
    public $nowUserName;
 
    
    public $moduleName = 'kfcmongoliahs';
    public $nowTheme = 'basic';
    
    
    private $maxFileSize = 5242880; //5 MB
    public $mediumImageWidth = 402;
    public $mediumImageHeight = 425;
    public $agency;
    public $i;
    public $agency_id;
    public $themeUrl;
    public $assetsUrl;
    public $canvasPage;

    public $tabUrl;
    public $appPath;
    

    //fb details
    public $moduleAppId = "134728946700019";
    public $moduleAppSecret = "9ae2d991120598f775c138ca2d3e9fc2";
    
    
    public $tabId;
    
    var $headData;
    var $footerData;
    
    var $signed_request;
    var $showMobileVersion;

        /**
     * Declares class-based actions.
     */
    public function __construct($id, $module = null)
    {
        
        if(!empty($_REQUEST['fbTabId']))
        {
            Yii::app()->session['fb_tab_id'] = $_REQUEST['fbTabId'];
        }
 
	if(isset($_REQUEST['signed_request']))
	{
	    Yii::app()->session['signed_request'] = $_REQUEST['signed_request'];
	}
	
	$this->signed_request = Yii::app()->session['signed_request'];
	
	$this->image_folder = Yii::app()->basePath . '/../photos';
	
	
	$this->layout = '/layouts/main';
	
	$this->appPath = "index.php?r=".$this->moduleName."/tab";
 
	
	$this->themeUrl = Yii::app()->baseUrl . "/app_themes/".$this->moduleName."/".$this->nowTheme;
	
	$this->image_folder = Yii::app()->basePath . '/../user_assets/uploads/'.$this->moduleName;	
 
	
	$this->assetsUrl = 'https://apps.circussocial.com/user_assets/uploads/'.$this->moduleName;

	$this->canvasPage = "https://apps.facebook.com/".$this->moduleName;

        
        
	//if tab url is not set in admin panel then take it from facebook settings

	$fbConfig = array(
	    'appId' => $this->moduleAppId,
	    'secret' => $this->moduleAppSecret,
	    'fileUpload' => true,
	    'cookie' => true,
	);


	$permissions = "publish_stream, user_photos, email";
	$facebook = new FacebookSimpleController(1, $fbConfig, $permissions);


	$this->facebook = $facebook;
	$this->fbUser = $facebook->getFbUser();
        
        if($facebook->getCurrentPageId() != '')
        {
            Yii::app()->session['fb_tab_id'] = $facebook->getCurrentPageId();
        }
        
	$this->tabId = Yii::app()->session['fb_tab_id'];
        
        
        ////////////////////////////////////
        $detect = new Mobile_Detect;

        //it is required if app is opened from ipad facebook app.
        if ($detect->isTablet() and !$detect->is('Safari'))
        {
            $this->showMobileVersion = 1;
        }

        if ($detect->isMobile() and !$detect->isTablet())
        {
            $this->showMobileVersion = 1;
        }
        ///////////////////////////
        
        if ($this->showMobileVersion == 1)
        {
            header("location: index.php?r=" . $this->moduleName . "/mobile");
        }
        
        if(!$facebook->isTab())
        {            
            $this->redirectToTab();
        }
        

	if (empty(Yii::app()->session['signed_request']))
	{
	    echo "Please provide signed_request";
	    //exit;
	}

	if (isset(Yii::app()->session['localUser']))
	{
	    $this->localUser = Yii::app()->session['localUser'];
	}
	
	parent::__construct($id, $module);
    }

    
    public function actionIndex()
    {
	//$this->tabId = "575042275846072";
	
        
        $gallery = new Gallery("");
        
        $gallery->run();
        
        $my = new MyController("");
        
        $my->run();
        
        
        
	echo time();

	$this->saveUserIntoDb();
	
        
        //TODO: make a method to get localApp and set it to class variable.
	
	$localApp = LocalApps::model()->findByAttributes(array("fb_tab_id"=>$this->tabId));
        
	if(!isset($localApp->id))
	{
            $localApp = LocalApps::model()->find(array("order"=>"id desc"));
            if(!isset($localApp->id))
            {
                echo "Application is not installed. Please go to admin panel to publish an application.";
                exit;
            }
	}
		 	
	$setting = SiteController::getRuSettingsForTab($localApp);
	
	//REQUIRED:
	//$this->redirectToTab($localApp);
	
	
	//method to access settings
	$receivers =  @CHtml::encode($setting['adminEmail']->value4_text);

	
	//REQUIRED: record visits
	SiteController::analyticsVisits($this->tabId,$this->moduleAppId,$localApp->id);
 
	$theme = DashboardThemes::model()->findByPk($localApp->theme_id);
	
	$this->render("/tab/index",array("data"=>$localApp,"theme"=>$theme, 'setting'=>$setting));
	
    }
 
    //REQUIRED:
    function redirectToTab()
    {	
	$this->tabUrl = "http://facebook.com/pages/-/".$this->tabId."?sk=app_".$this->moduleAppId;
		
        
        
        $url = $this->tabUrl."&app_data=" . $_REQUEST['goto'];
        echo '<script>window.top.location.href = "' . $url . '"</script>';
        exit;
	 
        
	if (!empty($_REQUEST['goto']))
	{
	    $url = $this->tabUrl."&app_data=" . $_REQUEST['goto'];
	    echo '<script>window.top.location.href = "' . $url . '"</script>';
	    exit;
	}
    }
 
    
    //REQUIRED:
    private function saveUserIntoDb()
    {
	$model = SiteController::synchronizeLocalUsers($this->fbUser);			
	$this->localUser = $model;
	Yii::app()->session['localUser'] = $model;
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////
    //Custom Actions////////////////////////////////////////////////////////////////////////////////
    
    public function actionAnotherAction()
    {
	$this->render("another_page");
    }
    
    
    
    
    
    
}