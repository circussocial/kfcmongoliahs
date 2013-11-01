<?php

/**
 * This is the model base class for the table "tbl_category".
 *
 * Columns in table "tbl_category" available as properties of the model:
 
      * @property integer $id
      * @property string $name
      * @property integer $parent_category
      * @property string $description
      * @property string $image
      * @property integer $app_local_id
      * @property integer $theme_id
      * @property string $agency
      * @property string $user_global_id
 *
 * There are no model relations.
 */
abstract class BaseCategory extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tbl_category';
    }

    public function rules() {
        return array(
            array('name, parent_category, description, image, app_local_id, theme_id, agency, user_global_id', 'required'),
            array('parent_category, app_local_id, theme_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('image, agency, user_global_id', 'length', 'max' => 100),
            array('id, name, parent_category, description, image, app_local_id, theme_id, agency, user_global_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->name;
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
            'name' => Yii::t('app', 'Name'),
            'parent_category' => Yii::t('app', 'Parent Category'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'app_local_id' => Yii::t('app', 'App Local'),
            'theme_id' => Yii::t('app', 'Theme'),
            'agency' => Yii::t('app', 'Agency'),
            'user_global_id' => Yii::t('app', 'User Global'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('parent_category', $this->parent_category);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image, true);


        //TODO: change like this
        $criteria->compare('app_local_id', (int)$_REQUEST['localAppId']);
        $criteria->compare('theme_id', (int)$_REQUEST['themeId']);
        $criteria->compare('agency', Yii::app()->session['nowAgency']->identifier, true);
        $criteria->compare('user_global_id', Yii::app()->session['globalUserID'], true);


        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}