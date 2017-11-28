<?php


namespace app\models;
use yii\db\ActiveRecord;


class ScheduleEvents extends ActiveRecord{

    public static function tableName(){
        return 'schedule_events';
    }
}