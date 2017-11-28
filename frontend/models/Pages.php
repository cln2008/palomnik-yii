<?php


namespace frontend\models;
use yii\db\ActiveRecord;


class Pages extends ActiveRecord{

    public static function tableName(){
        return 'pages';
    }

}