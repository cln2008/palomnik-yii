<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31.07.2017
 * Time: 09:50
 */

namespace frontend\models;
use yii\db\ActiveRecord;


class MonthNames extends ActiveRecord{

    public static function tableName(){
        return "months_name";
    }

}