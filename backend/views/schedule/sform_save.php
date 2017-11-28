<?php
use frontend\models\SchedeleEvents;

/*
 $s[1] = ['name' => 'Понедельник'];
 $s[2] = ['name' => 'Вторник'];
 $s[3] = ['name' => 'Среда'];
 $s[4] = ['name' => 'Четверг'];
 $s[5] = ['name' => 'Пятница'];
 $s[6] = ['name' => 'Суббота'];
 $s[7] = ['name' => 'Воскресенье'];

 $a[1] = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 7 => 'Воскресенье'];
 $a[2] = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0];
*/
// $a = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 7 => 'Воскресенье'];
$a = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
$y = 0;
$aw[$y] = array();
$days = count($schedule);
$i = 0;
echo "<h2>COUNT: " . $days . "</h2>";

foreach($schedule as $sch){
    $week = \frontend\models\Common::getWeekDayName1($sch->id);
    $weekDayNum  = $week['week_day_num'];
    $weekDate    = $week['week_date'];
    $monthName   = \frontend\models\Common::getMonthName($sch->id);
    $eventList = "";
    foreach($sch->events as $events){
        $eventList[] = ['time' => $events->event_time, 'name' => $events->event_name];
        /*
                     [id] => 1
                     [schedule_id] => 1
                     [event_time] => 17:00
                     [event_name] => Вечірня. Утреня
                     [is_active] => 1
        */
    }

    if(!isset($aw[$y][$weekDayNum])){
        $aw[$y][$weekDayNum] = [
            'date'      => $weekDate
            , 'id'        => $sch->id
            , 'holiday'   => $sch->sch_holiday
            , 'events'    => $eventList
            , 'monthName' => $monthName
        ];
        if($weekDayNum  == 7 and $i+1 != $days){
            $y++;
            $aw[$y]= array();
        }
    }
    else{
        $y++;
        $aw[$y] = array();
        // $aw[$y][$weekDayNum] = ['date' => $weekDate, 'id' => $sch->id, 'holiday' => $sch->sch_holiday, 'events' => $eventList];
        $aw[$y][$weekDayNum] = [
            'date'      => $weekDate
            , 'id'        => $sch->id
            , 'holiday'   => $sch->sch_holiday
            , 'events'    => $eventList
            , 'monthName' => $monthName
        ];

    }

    $i++;
}


foreach($aw as $key => $val){
    for($i=1;$i<=7;$i++){
        $val[$i] = (isset($val[$i])) ? $val[$i] : "";
    }
    ksort($val);
    $aw[$key] = $val;
}

/*
  echo "<pre>";
  // print_r($schedule);
  print_r($aw);
  echo "</pre>";
*/
?>

    <table border="1">
        <tr>
            <?php foreach($a as $item): ?>
                <td style="width: 150px;"><?= $item ?></td>
            <?php endforeach; ?>
        </tr>

        <?php foreach($aw as $weekItems): ?>
            <tr>
                <?php foreach($weekItems AS $item): ?>
                    <td style="width: 150px; vertical-align: top; text-align: center;">
                        <?php
                        $date = isset($item['date']) ? $item['date'] : "";
                        $monthName = isset($item['monthName']) ? $item['monthName'] : "";
                        $holiday = isset($item['holiday']) ? $item['holiday'] : "";
                        $eventText = '';
                        if( isset($item['events']) and is_array($item['events'])){
                            foreach($item['events'] AS $event){
                                $eventText .= $event['time'] . ' ' . $event['name'] . '<br>';
                            }
                        }
                        echo "<p style='border: 0px solid red;'><b>" . $date . " " . $monthName . "</b></p>";
                        echo "<p><b>" . $holiday . "</b></p>";
                        echo "<p style='text-align: left; padding-left: 5px;'>" . $eventText . "</p>";
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

    </table>

<?php
/*
[5] => Array(
        [date] => 7
        [id] => 4
        [holiday] => РІЗДВО ІОАННА ХРЕСТИТЕЛЯ
        [events] => Array(
            [0] => Array(
                    [time] => 8:40
                    [name] => Лігургія
                        )
              )
      )
*/
?>