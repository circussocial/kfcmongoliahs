<?php

/**
 * This is the model class for table "tbl_local_users".
 *
 * The followings are the available columns in table 'tbl_local_users':
 * @property integer $id
 * @property string $full_name
 * @property string $email_address
 * @property integer $age
 * @property string $gender
 * @property string $city
 * @property string $country
 * @property string $nric
 * @property string $mobile_number
 * @property string $landline_number
 * @property string $timezone
 * @property string $url
 * @property integer $visits
 * @property string $last_login
 * @property integer $is_active
 
 
 
 */
class LocalUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LocalUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table full_name
	 */
	
	
	public function tableName()
	{
		return 'tbl_local_users';
	}
	
	
	public function getDbConnection()
	{
	    $db = Yii::app()->controller->module->db;
	    return Yii::createComponent($db);
	}
	
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_fb_id, email_address', 'required'),
			array('age, visits, is_active', 'numerical', 'integerOnly'=>true),
			array('full_name, email_address, city', 'length', 'max'=>200),
			array('gender, mobile_number, landline_number', 'length', 'max'=>20),
			array('country', 'length', 'max'=>100),
			array('nric', 'length', 'max'=>15),
			array('timezone', 'length', 'max'=>10),
			array('url, last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, full_name, email_address, age, gender, city, country, nric, mobile_number, landline_number, timezone, url, visits, last_login, is_active, global_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation full_name and the related
		// class full_name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (full_name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'full_name' => 'Name',
			'email_address' => 'Email',
			'age' => 'Age',
			'gender' => 'Gender',
			'city' => 'City',
			'country' => 'Country',
			'nric' => 'Nric',
			'mobile_number' => 'Mobile Number',
			'landline_number' => 'Landline Number',
			'timezone' => 'Timezone',
			'url' => 'Url',
			'visits' => 'Visits',
			'last_login' => 'Last Login',
			'is_active' => 'Is Active',
		 
		 
		
		
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
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('nric',$this->nric,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('landline_number',$this->landline_number,true);
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('visits',$this->visits);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('is_active',$this->is_active);
 
 
  
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}