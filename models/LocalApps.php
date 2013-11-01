<?php

/**
 * This is the model class for table "tbl_local_apps".
 *
 * The followings are the available columns in table 'tbl_local_apps':
 * @property integer $id
 * @property string $agency
 * @property string $user_global_id
 * @property integer $theme_id
 * @property string $title
 * @property string $fb_tab_id
 * @property string $html_body
 * @property string $page_bg_color
 * @property string $page_bg_image
 */
class LocalApps extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LocalApps the static model class
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
		return 'tbl_local_apps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agency, user_global_id, theme_id, title, html_body', 'required'),
			array('theme_id', 'numerical', 'integerOnly'=>true),
			array('agency', 'length', 'max'=>50),
			array('user_global_id', 'length', 'max'=>200),
			array('title, fb_tab_id, page_bg_image', 'length', 'max'=>250),
			array('page_bg_color', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, agency, user_global_id, theme_id, title, fb_tab_id, html_body, page_bg_color, page_bg_image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'agency' => 'Agency',
			'user_global_id' => 'User Global',
			'theme_id' => 'Theme',
			'title' => 'Title',
			'fb_tab_id' => 'Fb Page',
			'html_body' => 'Html Body',
			'page_bg_color' => 'Page Bg Color',
			'page_bg_image' => 'Page Bg Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('agency',$this->agency,true);
		$criteria->compare('user_global_id',$this->user_global_id,true);
		$criteria->compare('theme_id',$this->theme_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('fb_tab_id',$this->fb_tab_id,true);
		$criteria->compare('html_body',$this->html_body,true);
		$criteria->compare('page_bg_color',$this->page_bg_color,true);
		$criteria->compare('page_bg_image',$this->page_bg_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}