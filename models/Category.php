<?php

//TODO: path must be properly fixed
Yii::import('application.modules.kfcmongoliahs.models._base.BaseCategory');

class Category extends BaseCategory{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    //this is required to connect parent database
    public function getDbConnection()
    {
        $db = Yii::app()->controller->module->db;
        return Yii::createComponent($db);
    }
}