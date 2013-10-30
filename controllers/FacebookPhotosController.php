<?php

class FacebookPhotosController extends Controller
{

    protected $fbUser;
    private $image_folder;
    public $facebook;
    public $fbConfigurations;
    public $agency;
    public $agency_id;
    public $themeUrl;

    /**
     * Declares class-based actions.
     */
    public function __construct($id, $module = null)
    {

	$this->themeUrl = Yii::app()->baseUrl . "/app_themes/kfcmongoliahs/basic";
	$this->layout = '/layouts/main';
	$this->image_folder = Yii::app()->basePath . '/../user_assets/uploads/kfcmongoliahs/';
	$this->agency = "dev";
	$this->agency_id = 10;
	$this->fbConfigurations = Yii::app()->params['facebook'];

	
	
	
	//if tab url is not set in admin panel then take it from facebook settings

	$fbConfig = array(
	    'appId' => '440958892676429',
	    'secret' => '4926ec60db4f94b52e67c601a6a6470b',
	    'fileUpload' => true,
	    'cookie' => true,
	);

	$permissions = "publish_stream, user_photos, email";
	$facebook = new FacebookSimpleController(1, $fbConfig, $permissions);
	
	
	
	
	$this->facebook = $facebook;
	
	
	
	$this->fbUser = $facebook->getFbUser();
	
	
	

	if (empty($_REQUEST['signed_request']))
	{
	    echo "Please provide signed_request";
	    //exit;
	}
	

	parent::__construct($id, $module);
    }

    private function saveUserIntoDb()
    {
	if (IS_LOCAL)
	{
	    return;
	}

	$model = LocalUsers::model()->findByAttributes(array("userid" => $this->fbUser['id']));

	if (!isset($model->id))
	{
	    $model = new LocalUsers();
	}

	$model->userid = $this->fbUser['id'];
	$model->name = $this->fbUser['name'];
	//$model->email = $this->fbUser['email'];
	$model->gender = $this->fbUser['gender'];
	$model->timezone = $this->fbUser['timezone'];
	//$model->locale = $this->fbUser['id'];
	$model->global_user_id = time(); //fake but unique value
	$model->agency_id = $this->agency_id; //fake but unique value
	$model->save();
	$this->localUser = $model;
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {

	$this->saveUserIntoDb();

	//echo $this->localUser->id;

	$this->render("/tab/index");
    }

    public function actionAlbums()
    {
	
	$fbUserID = $this->facebook->getFbUser();
 	$fb_user = $fbUserID['id'];
	$albums = $this->facebook->getFacebookAlbums_kfcmongoliahs('',500,'',$fb_user);
	

	$this->renderPartial('/tab/facebook_photos/list_albums', array("albums" => $albums));
    }

    
    function actionListPhotos($albumID)
    {
	
	 $photos = $this->facebook->getFacebookPhotos($albumID);	     	          

	 $this->renderPartial('/tab/facebook_photos/fb_photos_listing',array("albumID"=>$albumID,"photos"=>$photos));
    }
	
	
	
	
	function actionShowSingleFBPhoto($photoUrl,$logoPosition,$signed_request)
	{
	     $this->renderPartial('/tab/facebook_photos/fb_single_photo',array("photoUrl"=>$photoUrl,'logoPosition'=>$logoPosition));       
	}

	


	function actionChooseFbPhotos($signed_request)
	{
	    $this->render('/tab/facebook_photos/fb_photos');
	}
    
    
    
    
}