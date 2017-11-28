<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.07.2017
 * Time: 09:46
 */

namespace frontend\models;
use yii\db\ActiveRecord;


class SchedeleEvents extends ActiveRecord{

    public static function tableName(){
        return 'schedule_events';
    }

}