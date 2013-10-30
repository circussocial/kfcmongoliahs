<?php

/**
 * This is the model base class for the table "tbl_stickers".
 *
 * Columns in table "tbl_stickers" available as properties of the model:
 
      * @property integer $id
      * @property string $sticker_name
      * @property string $sticker_image
      * @property string $agency
      * @property string $user_global_id
      * @property string $theme_id
      * @property string $app_local_id
 *
 * There are no model relations.
 */
abstract class BaseStickers extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tbl_stickers';
    }

    public function rules() {
        return array(
            array('sticker_name, sticker_image, agency, user_global_id, theme_id, app_local_id', 'required'),
            array('sticker_name, sticker_image, agency, user_global_id, theme_id, app_local_id', 'length', 'max' => 255),
            array('id, sticker_name, sticker_image, agency, user_global_id, theme_id, app_local_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->sticker_name;
    }

    public function behaviors() {
        return array();
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'sticker_name' => Yii::t('app', 'Sticker Name'),
            'sticker_image' => Yii::t('app', 'Sticker Image'),
            'agency' => Yii::t('app', 'Agency'),
            'user_global_id' => Yii::t('app', 'User Global'),
            'theme_id' => Yii::t('app', 'Theme'),
            'app_local_id' => Yii::t('app', 'App Local'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('sticker_name', $this->sticker_name, true);
        $criteria->compare('sticker_image', $this->sticker_image, true);
        $criteria->compare('agency', $this->agency, true);
        $criteria->compare('user_global_id', $this->user_global_id, true);
        $criteria->compare('theme_id', $this->theme_id, true);
        $criteria->compare('app_local_id', $this->app_local_id, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}