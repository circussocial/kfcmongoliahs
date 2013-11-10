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
	public $tabId;
	public $moduleName = 'kfcmongoliahs';
	 
    /**
     * Declares class-based actions.
     */
    public function __construct($id, $module = null)
    {

           
       
	$this->themeUrl = Yii::app()->baseUrl . "/app_themes/kfcmongoliahs/basic";
	$this->layout = '/layouts/main';
	$this->image_folder = Yii::app()->basePath . '/../protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/';
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
	$facebook = new FacebookSimpleControllerkfc(1, $fbConfig, $permissions);
	
	$this->facebook = $facebook;
	
	$this->fbUser = $facebook->getFbUser();
	
	echo '<p style="display:none;">';
	print_r($this->fbUser);
	echo '</p>';
	
	
	
	//------------------------------------------------

	if (empty($_REQUEST['signed_request']))
	{
	  //  echo "Please provide signed_request";
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
	if($fb_user && $fb_user != "")
		{
	
	
	     $albums = $this->facebook->getFacebookAlbums_kfcmongoliahs('',500,'',$fb_user);
	

	     $this->renderPartial('/tab/facebook_photos/list_albums', array("albums" => $albums));
		
		}
		 else
		     {
				 echo 'something going wrong please try again';
			 }
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
    /*private function saveUserIntoDb()
    {
		//$model = SiteController::synchronizeLocalUsers($this->fbUser);			
		//$this->localUser = $model;
		//Yii::app()->session['localUser'] = $model;
    }*/
    
	 public function actionImagepreviewSmall($imageUrl, $imgName)
    {
  		echo $this->resizeAndSaveImageFromURLCropped($imageUrl, $imgName);
    }
	public function resizeAndSaveImageFromURLCropped($imageUrl, $image_name)
    {
       // $thumbFactory = PhpThumbFactory::create($imageUrl);
      //  $thumbFactory->adaptiveResize(178, 129)->save($this->image_folder . '/' . $image_name);
$imageUrl = str_replace(" ", "%20", $imageUrl);
		 $pos = strpos($imageUrl," ");
		 if($pos === false)
		 {
		   $content = file_get_contents($imageUrl);
		   file_put_contents($this->image_folder.'/'.$image_name, $content);
   list($width, $height) = getimagesize(Yii::app()->basePath . "/../protected/modules/".$this->moduleName."/uploads/".$this->moduleName.'/'.$image_name);
   /* if($width<297 && $height<205){
		return 'To small size';  
		exit();
		}*/
	if($width>$height){
			
			if($width==297){
				$width=297;
				if($height>205){
				$height=205;
				}else{
					$height=$height;
					}
				}else{
					
					$ratio = $width/297;
					$width=297;
					$height=$height/$ratio;
					if($height>205){
						$ratio = $height/205;
					$height=205;
					$width=$width/$ratio;
						
						}
				}
			
			
		}else if($width<$height){
			if($height==205){
					$height=205;
				}else{
					$ratio = $height/205;
					$height=205;
					$width=$width/$ratio;
				}
		}else{
			$ratio = $height/205;
			$height=205;
			$width=$width/$ratio;
			
			}
        $thumbFactory = PhpThumbFactory::create($this->image_folder . '/' . $image_name);
        $thumbFactory->adaptiveResize($width,$height)->save($this->image_folder . '/thumbs_big/' . $image_name);
		
		  return $width;
		 }
		  else
		  {
			return 'Server error Please try again later';  
		  }
	
      //  $thumbFactory = PhpThumbFactory::create($imageUrl);
      //  $thumbFactory->adaptiveResize(346, 252)->save($this->image_folder . '/thumbs/' . $image_name);
    }
	
	
}