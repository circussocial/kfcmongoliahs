<?php

/**
 * This is the model base class for the table "tbl_user_entries".
 *
 * Columns in table "tbl_user_entries" available as properties of the model:
 
      * @property integer $id
      * @property string $user_name
      * @property string $email_address
      * @property string $phone_number
      * @property string $user_photo
      * @property string $user_uploaded_photo
 *
 * There are no model relations.
 */
abstract class BaseUserEntries extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tbl_user_entries';
    }

    public function rules() {
        return array(
          /*  array('user_fb_id,user_name, email_address, phone_number, user_photo, user_uploaded_photo', 'required'),
            array('email_address', 'email'),
            array('user_fb_id', 'length', 'max' => 150),
			array('user_name, email_address, user_photo, user_uploaded_photo, agency, user_global_id, theme_id, app_local_id', 'length', 'max' => 255),
            array('phone_number', 'length', 'max' => 16),*/
            array('id,user_fb_id, user_name, email_address, phone_number, user_photo, user_uploaded_photo,user_ip_address,uploaded_date, agency, user_global_id, theme_id, app_local_id', 'safe', 'on' => 'search'),
        );
    }
    public function showImage($data)
		{	
			$image = "protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/" . $data->user_uploaded_photo;
			$c= CHtml::link(CHtml::image($image, '', array('width' => '150','height' => '')), $image, array('target' => '_blank'));	
			return $c;
		}
	public function showImagedata($data)
		{	
			$image = "protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/" . $data->user_photo;
			$c= CHtml::link(CHtml::image($image, '', array('width' => '150','height' => '')), $image, array('target' => '_blank'));	
			return $c;
		}
    public function __toString() {
        return (string) $this->user_name;
    }

    public function behaviors() {
        return array();
    }

    public function relations() {
        return array(
        );
    }

	 public function showProfileImage($data)
    	{
		$image = "https://graph.facebook.com/" . $data->user_fb_id . "/picture?type=normal ";
		$profileimage =  CHtml::link(CHtml::image($image, '') , array('target' => '_blank'));
		return $profileimage;
	
    	}
		
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'user_fb_id' => Yii::t('app', 'Facebook Id'),
			'user_name' => Yii::t('app', 'User Name'),
            'email_address' => Yii::t('app', 'Email Address'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'user_photo' => Yii::t('app', 'User Photo'),
            'user_uploaded_photo' => Yii::t('app', 'User Uploaded Photo'),
			'user_ip_address' => Yii::t('app', 'User ip address'),
			'uploaded_date' => Yii::t('app', 'Uploaded Date'),
			
        );
    }

    public function search() {
		$criteria = new CDbCriteria;
		$criteria->order = 'id DESC';

       /* $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('user_fb_id', $this->user_fb_id, true);
		$criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('email_address', $this->email_address, true);
        $criteria->compare('phone_number', $this->phone_number, true);
        $criteria->compare('user_photo', $this->user_photo, true);
        $criteria->compare('user_uploaded_photo', $this->user_uploaded_photo, true);
		$criteria->compare('user_ip_address', $this->user_ip_address, true);
		$criteria->compare('uploaded_date', $this->uploaded_date, true);*/

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}