<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.07.2017
 * Time: 10:12
 */

namespace frontend\components;
use frontend\models\Common;
use yii\base\Widget;
use frontend\models\Schedule;


class ScheduleBlock extends Widget{


    public function init(){
        parent::init();
    }

    public function run(){
        $schedule = Schedule::find()->where(['sch_month' => 7, 'sch_year' => 2017])->with('events')->all();

        $html  = $this->getHtmlBlock($schedule);

        return $html;
    }

    private function getHtmlBlock($schedule){
       $html = '<div class="panel panel-default">
                 <div class="panel-heading"><span style="font-family: \'Conv_cyrillic_old\'; font-size: 22px; color: #006400;">Расписание Богослужений</span></div>
                 <div class="panel-body">

                  <table class="table table-bordered">
                   <thead>
                    <tr>
                     <th colspan="4">
                      <center><i>Порядок звершення служб в храмі  Святого Георгія Побідоносця</i><br>ЛИПЕНЬ 2017 року</center>
                     </th>
                    </tr>
                   </thead>';
       foreach($schedule as $row){
           $holiday = ($row->sch_holiday) ? '<b>' . $row->sch_holiday . '</b><br>' : '';
           $dayShow = $row->sch_day . " " . Common::getMonthName($row->id);

           $eventText = '';
           foreach($row->events as $event){
               $eventText .= '<u>'.$event->event_time.'</u> - ' . $event->event_name . '<br>';
           }

           $html .= '<tr class="active">
                      <td>' . $dayShow . '</td>
                      <td>' . Common::getWeekDayName($row->id) . '</td>
                      <td>' . $holiday . $eventText . '</td>
                     </tr>';

       }

       $html .= '</table>
                 </div>
                 </div>';

    


/*
    <tr>
     <td>2 Липня</td>
     <td>Неділя</td>
     <td><u>8:40</u> - Лігургія<br><u>11:00</u> - Заупокійна літія</td>
    </tr>

    <tr class="active">
     <td>6 Липня</td>
     <td>Четвер</td>
     <td><u>17:00</u> - Вечірня. Утреня</td>
    </tr>

    <tr>
     <td>7 Липня</td>
     <td>П`ятніця</td>
     <td><b>РІЗДВО ІОАННА ХРЕСТИТЕЛЯ</b><br><u>8:40</u> - Лігургія</td>
    </tr>
    
    <tr class="active">
     <td>8 Липня</td>
     <td>Субота</td>
     <td><u>17:00</u> - Вечірня. Утреня</td>
    </tr>    
    
    <tr>
     <td>9 Липня</td>
     <td>Неділя</td>
     <td><u>8:40</u> - Лігургія<br><u>11:00</u> - Заупокійна літія</td>
    </tr>

    <tr class="active">
     <td>11 Липня</td>
     <td>Вівторок</td>
     <td><u>17:00</u> - Вечірня. Утреня</td>
    </tr>
    
    <tr>
     <td>12 Липня</td>
     <td>Середа</td>
     <td><b>АПОСТОЛІВ ПЕТРА І ПАВЛА</b><br><u>8:40</u> - Лігургія</td>
    </tr>

     <tr class="active">
      <td>15 Липня</td>
      <td>Субота</td>
      <td><u>17:00</u> - Вечірня. Утреня</td>
     </tr>

     <tr>
         <td>16 Липня</td>
         <td>Неділя</td>
         <td><u>8:40</u> - Лігургія<br><u>11:00</u> - Заупокійна літія</td>
     </tr>

     <tr class="active">
         <td>22 Липня</td>
         <td>Субота</td>
         <td><u>17:00</u> - Вечірня. Утреня</td>
     </tr>

     <tr>
         <td>23 Липня</td>
         <td>Неділя</td>
         <td><u>8:40</u> - Лігургія<br><u>11:00</u> - Заупокійна літія</td>
     </tr>

     <tr class="active">
         <td>27 Липня</td>
         <td>Четвер</td>
         <td><u>17:00</u> - Вечірня. Утреня</td>
     </tr>

     <tr>
         <td>28 Липня</td>
         <td>П`ятніця</td>
         <td><b>День хрещення Русі Рівноапостольного князя Володимира</b><br><u>8:40</u> - Лігургія</td>
     </tr>

     <tr class="active">
         <td>29 Липня</td>
         <td>Субота</td>
         <td><u>17:00</u> - Вечірня. Утреня</td>
     </tr>

     <tr>
         <td>30 Липня</td>
         <td>Неділя</td>
         <td><u>8:40</u> - Лігургія<br><u>11:00</u> - Заупокійна літія</td>
     </tr>
*/

       return $html;

    }
}