<?php
use yii\helpers\Url;
use yii\helpers\Html;


 // echo "<pre>";
 // print_r($sch);
 // echo "</pre>";
?>

<h2>Работа со списком РАСПИСАНИЙ</h2>


<p>
    <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-info']) ?>
</p>

<table class="table table-bordered table-hover">
    <thead>
      <th>Год</th>
      <th>Месяц</th>
      <th>Месяц</th>
      <!-- <th>Акт</th> -->
      <th></th>
      <th></th>
    </thead>
    <?php if($sch): ?>
        <?php foreach($sch as $schedule): ?>
            <tr>
                <td><?= $schedule['sch_year'] ?></td>
                <td><?= $schedule['sch_month'] ?></td>
                <td><?= $schedule['month_name'] ?></td>
                <td><a href="<?= Url::to(['schedule/sform', 'month' => $schedule['sch_month'], 'year' => $schedule['sch_year'] ]) ?>"><i class="fa fa-id-card"></i></a></td>
                <td><a href="<?= Url::to(['schedule/spdf', 'month' => $schedule['sch_month'], 'year' => $schedule['sch_year'] ]) ?>" title="PDF файл"><i class="fa fa-file-pdf-o"></i></a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

