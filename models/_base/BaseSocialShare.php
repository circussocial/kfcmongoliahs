<?php

/**
 * This is the model base class for the table "tbl_social_share".
 *
 * Columns in table "tbl_social_share" available as properties of the model:
 
      * @property integer $id
      * @property string $fb_msg_caption
      * @property string $fb_msg_title
      * @property string $fb_msg_detail
      * @property string $app_local_id
      * @property string $theme_id
      * @property string $agency
 *
 * There are no model relations.
 */
abstract class BaseSocialShare extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tbl_social_share';
    }

    public function rules() {
        return array(
            array('fb_msg_caption, fb_msg_title, fb_msg_detail, app_local_id, theme_id, agency', 'required'),
            array('fb_msg_caption, fb_msg_title', 'length', 'max' => 250),
            array('app_local_id, theme_id, agency', 'length', 'max' => 150),
            array('id, fb_msg_caption, fb_msg_title, fb_msg_detail, app_local_id, theme_id, agency', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->fb_msg_caption;
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
            'fb_msg_caption' => Yii::t('app', 'Fb Msg Caption'),
            'fb_msg_title' => Yii::t('app', 'Fb Msg Title'),
            'fb_msg_detail' => Yii::t('app', 'Fb Msg Detail'),
            'app_local_id' => Yii::t('app', 'App Local'),
            'theme_id' => Yii::t('app', 'Theme'),
            'agency' => Yii::t('app', 'Agency'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('fb_msg_caption', $this->fb_msg_caption, true);
        $criteria->compare('fb_msg_title', $this->fb_msg_title, true);
        $criteria->compare('fb_msg_detail', $this->fb_msg_detail, true);
        $criteria->compare('app_local_id', $this->app_local_id, true);
        $criteria->compare('theme_id', $this->theme_id, true);
        $criteria->compare('agency', $this->agency, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}