<?php


namespace frontend\models;
use yii\db\ActiveRecord;


class mMainMenu extends ActiveRecord{

    public static function tableName(){
        return 'main_menu';
    }

}