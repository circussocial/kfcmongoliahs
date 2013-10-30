<?php

/**
 * This is the model base class for the table "tbl_pages_content".
 *
 * Columns in table "tbl_pages_content" available as properties of the model:
 
      * @property integer $id
      * @property string $page_title
      * @property string $page_content
      * @property string $agency
      * @property string $user_global_id
      * @property string $theme_id
      * @property string $app_local_id
 *
 * There are no model relations.
 */
abstract class BasePagesContent extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tbl_pages_content';
    }

    public function rules() {
        return array(
            array('page_title, page_content, agency, user_global_id, theme_id, app_local_id', 'required'),
            array('page_title', 'length', 'max' => 255),
            array('agency, user_global_id, theme_id, app_local_id', 'length', 'max' => 150),
            array('id, page_title, page_content, agency, user_global_id, theme_id, app_local_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->page_title;
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
            'page_title' => Yii::t('app', 'Page Title'),
            'page_content' => Yii::t('app', 'Page Content'),
            'agency' => Yii::t('app', 'Agency'),
            'user_global_id' => Yii::t('app', 'User Global'),
            'theme_id' => Yii::t('app', 'Theme'),
            'app_local_id' => Yii::t('app', 'App Local'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_title', $this->page_title, true);
        $criteria->compare('page_content', $this->page_content, true);
        $criteria->compare('agency', $this->agency, true);
        $criteria->compare('user_global_id', $this->user_global_id, true);
        $criteria->compare('theme_id', $this->theme_id, true);
        $criteria->compare('app_local_id', $this->app_local_id, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}