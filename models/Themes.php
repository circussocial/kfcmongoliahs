<?php

/**
 * This is the model class for table "tbl_kfcmongoliahs".
 *
 * The followings are the available columns in table 'tbl_kfcmongoliahs':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property integer $created_by
 * @property string $created_on
 * @property integer $is_active
 * @property integer $is_public
 * @property string $published_page
 * @property string $published_date
 */
class Themes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Themes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	public function getDbConnection()
	{
	    $db = Yii::app()->controller->module->db;
	    return Yii::createComponent($db);
	}
    
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_themes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, created_by, created_on, is_active, is_public', 'required'),
			array('created_by, is_active, is_public', 'numerical', 'integerOnly'=>true),
			array('page_bg_color, page_bg_image, name, title, published_page,user_global_id', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, created_by, created_on, is_active, is_public, published_page, published_date, html_body', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'title' => 'Title',
			'created_by' => 'Created By',
			'created_on' => 'Created On',
			'is_active' => 'Is Active',
			'is_public' => 'Is Public',
			'published_page' => 'Published Page',
			'published_date' => 'Published Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($calledFrom,$fb_user,$agency)
	{
		
		
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_public',$this->is_public);
		$criteria->compare('published_page',$this->published_page,true);
		$criteria->compare('published_date',$this->published_date,true);
		
		
		
		
		$criteria->condition = "user_global_id = '".$fb_user."' and agency = '".$agency."' and  base_theme_id!=0 and is_public = 0";
		
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id DESC',
			),
		));
	}
	
	
	function showFormImage($data)
	{
	    
	    echo '<img src="app_themes/kfcmongoliahs/'.@$data->parent->name.'/images/screenshot.png" width=80 /><br /><b>'.@$data->title.'</b>';
	}
	
	function showTabs($data)
	{
	    //echo "Shahid";
	    
	    $tabs = FbTabs::model()->findByAttributes(array("theme_id"=>$data->id));
	    
	    //echo '<a href="https://www.facebook.com/'.@$tabs->page_id.'/app_'.@$tabs->app_id.'" target="_blank" >'.CHtml::decode(@$tabs->name)."</a>";
	    
	    echo '<a href="https://www.facebook.com/pages/-/'.@$tabs->page_id.'?sk=app_'.@$tabs->app_id.'" target="_blank" >'.CHtml::decode(@$tabs->name)."</a>";
	    
	    
	    
	}
	
	function showPage($data)
	{
	    //echo "Shahid";
	    
	    $page = FbTabs::model()->findByAttributes(array("theme_id"=>$data->id));


	    echo '<a href="https://www.facebook.com/'.@$page->page_id.'" target="_blank" >'.CHtml::decode(@$page->page_name)."</a>";
	    
	}
	
	
	
	function getThemesEditLink($data)
	{
	    echo '<a href="index.php?r=kfcmongoliahs/default/customizeTheme&baseThemeId='.$data->base_theme_id.'&nowThemeId='.$data->id.'" >Edit</a>';
	}
	

	
	function getThemesDeleteLink($data)
	{
	    echo '<a href="index.php?r=kfcmongoliahs/default&delForm='.$data->id.'" >Delete</a>';
	}
	
	
	function getThemesSettingLink($data)
	{
	    echo '<a href="index.php?r=kfcmongoliahs/default/settings&tab=basic&baseThemeId='.$data->base_theme_id.'&nowThemeId='.$data->id.'" >Settings</a>';
	}
	
	function getSubmissionReportsLink($data)
	{
	    $tabs = FbTabs::model()->findByAttributes(array("theme_id"=>$data->id));
	    
	    echo '<a href="index.php?r=kfcmongoliahs/default/submissionReports&tabId='.@$tabs->id.'" >Reports</a>';
	}
	
	
	function getDownloadRecordsLink($data)
	{
	    $tabs = FbTabs::model()->findByAttributes(array("theme_id"=>$data->id));
	    
	    echo '<a href="index.php?r=kfcmongoliahs/default/DownloadCSV&pageId='.@$tabs->id.'" target="_blank" >Download</a>';
	}

	function getManageUsersLink($data)
	{
	    echo '<a href="index.php?r=kfcmongoliahs/default/manageAppUsers&appId='.$data->id.'&appName='.$data->title.'" >Manage</a>';
	}
	
}