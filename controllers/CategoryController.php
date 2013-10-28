<?php
class CategoryController extends CWidget
{
    //USED:
    protected $moduleName = "kfcmongoliahs";
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
        //$this->layout = "webroot.themes.circussocial.views.layouts.column3";


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


    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Category');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        /*
        $model = new Category;


        if (isset($_POST['Category'])) {

            $model->setAttributes($_POST['Category']);

            //TODO: you must set like this
            $model->app_local_id = $_REQUEST['localAppId'];
            $model->theme_id = $_REQUEST['themeId'];
            $model->agency = Yii::app()->session['nowAgency']->identifier;
            $model->user_global_id = Yii::app()->session['globalUserID'];

            try {
                if ($model->save()) {
                    Yii::app()->user->setFlash('showMsg', "Added Successfully!");
                    //rediret to grid
                    $this->redirect("index.php?r=".$this->moduleName."/default/settings&tab=manageCategories&themeId=".$_REQUEST['themeId']."&localAppId=".$_REQUEST['localAppId']."#tabs-2");
                }
                else{
                    Yii::app()->user->setFlash('showMsg', json_encode($model->getErrors()));
                    $this->redirect("index.php?r=".$this->moduleName."/default/settings&tab=manageCategories&themeId=".$_REQUEST['themeId']."&localAppId=".$_REQUEST['localAppId']."#tabs-2");
                }

            } catch (Exception $e) {
                print_r($e->getErorrs());
            }
        }
        */

        $model = new Category;
        if (isset($_POST['Category'])) {

            $model->setAttributes($_POST['Category']);


            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif(isset($_GET['Category'])) {
            $model->attributes = $_GET['Category'];
        }
        $this->render('create',array( 'model'=>$model));
              //echo $this->render("application.modules.".$this->moduleName.".views.default.settings.category.create");
            //$this->render("settings/category/create",array("model"=>$model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['Category'])) {
            $model->setAttributes($_POST['Category']);
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }

        }

        $this->render('update', array(
            'model' => $model,
        ));
    }


    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(array('admin'));
            }
        } else
            throw new CHttpException(400,
                Yii::t('app', 'Invalid request.'));
    }

    public function actionAdmin()
    {
        $model = new Category('search');
        $model->unsetAttributes();

        if (isset($_GET['Category']))
            $model->setAttributes($_GET['Category']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    public function loadModel($id)
    {
        $model = Category::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}