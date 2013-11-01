<?php

/**
 * This controller contains all necessary methods used for a module.
 */
class ExtraController extends Controller
{

    //USED:
    protected $moduleName = "gnossemspotlight";
    public $moduleAppId = "525956834093490";
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

	parent::__construct($id, $module);
    }

    //USED: done
    private function checkAuthToken()
    {
	SiteController::checkAuthToken();
    }

    /////////////////////////////////////////////////////////////////////////////
    
    
    
    
}