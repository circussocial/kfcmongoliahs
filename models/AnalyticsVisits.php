<?php

/**
 * This is the model class for table "analytics_visits".
 *
 * The followings are the available columns in table 'analytics_visits':
 * @property integer $id
 * @property string $date_time
 * @property string $session_id
 * @property integer $ip_address
 * @property string $url
 * @property string $app_id
 * @property string $fb_tab_id
 * @property integer $page_impressions
 */
class AnalyticsVisits extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AnalyticsVisits the static model class
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
		return 'tbl_analytics_visits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_time, session_id, ip_address, url, app_id, fb_tab_id, page_impressions', 'required'),
			array(' page_impressions', 'numerical', 'integerOnly'=>true),
			array('ip_address,session_id, app_id, fb_tab_id', 'length', 'max'=>50),
			array('url', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_time, session_id, ip_address, url, app_id, fb_tab_id, page_impressions', 'safe', 'on'=>'search'),
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
			'date_time' => 'Date Time',
			'session_id' => 'Session',
			'ip_address' => 'Ip Address',
			'url' => 'Url',
			'app_id' => 'App',
			'fb_tab_id' => 'Page',
			'page_impressions' => 'Page Impressions',
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
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('ip_address',$this->ip_address);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('fb_tab_id',$this->fb_tab_id,true);
		$criteria->compare('page_impressions',$this->page_impressions);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}