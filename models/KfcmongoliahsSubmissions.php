<?php

/**
 * This is the model class for table "tbl_kfcmongoliahs_submissions".
 *
 * The followings are the available columns in table 'tbl_kfcmongoliahs_submissions':
 * @property integer $id
 * @property string $data
 * @property string $ip_address
 * @property string $date
 * @property string $fb_tab_id
 * @property string $app_id
 */
class KfcmongoliahsSubmissions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return KfcmongoliahsSubmissions the static model class
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
		return 'tbl_kfcmongoliahs_submissions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, ip_address, date, fb_tab_id, app_id', 'required'),
			array('ip_address', 'length', 'max'=>50),
			array('fb_tab_id, app_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data, ip_address, date, fb_tab_id, app_id', 'safe', 'on'=>'search'),
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
			'data' => 'Data',
			'ip_address' => 'Ip Address',
			'date' => 'Date',
			'fb_tab_id' => 'Page',
			'app_id' => 'App',
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
		$criteria->compare('data',$this->data,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('fb_tab_id',$this->fb_tab_id,true);
		$criteria->compare('app_id',$this->app_id,true);
		
		if(isset($_REQUEST['pageId']))
		{
		    $criteria->condition = "fb_tab_id = '".$_REQUEST['pageId']."'";
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id DESC',
			),
		));
	}
	
	
	function getDetails($data)
	{
	    
	    
	    echo '<a href="javascript:;" onclick=showDetails("index.php?r=kfcmongoliahs/default/submissionReportsDetails&id='.$data->id.'") >View</a>';
	    
	    
	}
}