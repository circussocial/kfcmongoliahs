<?php

/**
 * This is the model class for table "tbl_fb_tabs".
 *
 * The followings are the available columns in table 'tbl_fb_tabs':
 * @property integer $id
 * @property string $fb_user
 * @property string $name
 * @property string $image
 * @property string $page_id
 * @property string $app_id
 * @property string $type
 * @property string $added_on
 * @property integer $base_theme_id
 * @property integer $theme_id
 * @property integer $is_active
 */
class GlobalFbTabs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FbTabs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_global_fb_tabs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fb_user, name, image, page_id, app_id, type, added_on, base_theme_id, theme_id, is_active', 'required'),
			array('base_theme_id, theme_id, is_active', 'numerical', 'integerOnly'=>true),
			array('fb_user, name, image', 'length', 'max'=>200),
			array('page_id, app_id', 'length', 'max'=>100),
			array('type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fb_user, name, image, page_id, app_id, type, added_on, base_theme_id, theme_id, is_active', 'safe', 'on'=>'search'),
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
			'fb_user' => 'Fb User',
			'name' => 'Name',
			'image' => 'Image',
			'page_id' => 'Page',
			'app_id' => 'App',
			'type' => 'Type',
			'added_on' => 'Added On',
			'base_theme_id' => 'Base Theme',
			'theme_id' => 'Theme',
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
		$criteria->compare('fb_user',$this->fb_user,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('base_theme_id',$this->base_theme_id);
		$criteria->compare('theme_id',$this->theme_id);
		$criteria->compare('is_active',$this->is_active);
		
		$criteria->order = "id  desc";
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	function showTabImage($data)
	{
	    $image = "user_assets/application_images/tab_icons/111x74/" . $data->image;

	    return CHtml::link(CHtml::image($image, '', array('width' => '111')), $data->id, array('target' => '_blank'));

	}
}