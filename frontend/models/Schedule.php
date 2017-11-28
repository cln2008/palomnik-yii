<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.07.2017
 * Time: 09:46
 */

namespace frontend\models;
use yii\db\ActiveRecord;


class Schedule extends ActiveRecord{

    public static function tableName(){
        return 'schedule';
    }

    public function getEvents(){
        return $this->hasMany(SchedeleEvents::className(), ['schedule_id' => 'id']);
    }

    public function getMonth(){
        return $this->hasOne(MonthNames::className(), ['month_number' => 'sch_month', ])->where(['month_lang' => 'ua']);
    }
}