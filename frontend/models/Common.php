<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.07.2017
 * Time: 10:40
 */

namespace frontend\models;
use yii\db\Query;
// use frontend\models\Schedule;
use Yii;


class Common {

    public static function getFullDate($scheduleId){
        Yii::$app->formatter->timeZone = 'UTC';
        $schedule = Schedule::findOne($scheduleId);
        $date = $schedule->sch_year . "-" . $schedule->sch_month . "-" . $schedule->sch_day;
        return Yii::$app->formatter->asDate($date, 'php:d.m.Y');
    }

    public static function getMonthName($scheduleId){
        $schedule = Schedule::findOne($scheduleId);
        // $month = $schedule->sch_month;

        $rows = (new Query())
            ->select(['month_name_2'])
            ->from('months_name')
            ->where(['month_number' => $schedule->sch_month, 'month_lang' => 'ua'])
            ->one();

        return ($rows['month_name_2'] and isset($rows['month_name_2'])) ? $rows['month_name_2'] : 'undefined';
    }

    public static function getMonthName1($scheduleMonth){
        // $schedule = Schedule::findOne($scheduleId);
        // $month = $schedule->sch_month;

        $rows = (new Query())
            ->select(['month_name_1'])
            ->from('months_name')
            ->where(['month_number' => $scheduleMonth, 'month_lang' => 'ua'])
            ->one();

        return ($rows['month_name_1'] and isset($rows['month_name_1'])) ? $rows['month_name_1'] : 'undefined';
    }

    public static function getWeekDayName($scheduleId){
        $schedule = Schedule::findOne($scheduleId);
        // $date = $schedule->sch_year . "-" . $schedule->sch_month . "-" . $schedule->sch_day;
        $date =  $schedule->sch_day. "." . $schedule->sch_month . "." . $schedule->sch_year;

        $weekDayNumber = date_format((new \DateTime($date)), 'w');
        $weekDayNumber = ($weekDayNumber == 0) ? 7 : $weekDayNumber;


        $rows = (new Query())
            ->select(['week_day_name_1'])
            ->from('week_days_name')
            ->where(['week_day_number' => $weekDayNumber, 'week_day_lang' => 'ua'])
            ->one();
        // return $weekDayNumber;
        // $wd['week_day_num'] = $weekDayNumber;
        // $wd['week_day_name'] = ($rows['week_day_name_1'] and isset($rows['week_day_name_1'])) ? $rows['week_day_name_1'] : 'undefined';

        return ($rows['week_day_name_1'] and isset($rows['week_day_name_1'])) ? $rows['week_day_name_1'] : 'undefined';
        // return $wd;
    }

    public static function getWeekDayName1($scheduleId){
        $schedule = Schedule::findOne($scheduleId);

        $date =  $schedule->sch_day. "." . $schedule->sch_month . "." . $schedule->sch_year;

        $weekDayNumber = date_format((new \DateTime($date)), 'w');
        $weekDayNumber = ($weekDayNumber == 0) ? 7 : $weekDayNumber;


        $rows = (new Query())
            ->select(['week_day_name_1'])
            ->from('week_days_name')
            ->where(['week_day_number' => $weekDayNumber, 'week_day_lang' => 'ua'])
            ->one();
        $wd['week_date']     = $schedule->sch_day;
        $wd['week_day_num']  = $weekDayNumber;
        $wd['week_day_name'] = ($rows['week_day_name_1'] and isset($rows['week_day_name_1'])) ? $rows['week_day_name_1'] : 'undefined';

        return $wd;
    }

}