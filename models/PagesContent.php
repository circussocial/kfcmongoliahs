<?php

Yii::import('application.modules.kfcmongoliahs.models._base.BasePagesContent');

class PagesContent extends BasePagesContent{
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