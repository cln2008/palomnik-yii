<?php
use yii\helpers\Url;
use yii\helpers\Html;

// echo "<pre>";
// print_r($pages);
// echo "</pre>";
?>

<p>
    <?= Html::a('Создать галерею', ['create'], ['class' => 'btn btn-info']) ?>
</p>

<table class="table table-bordered table-hover">
    <thead>
    <th>ID</th>
    <th>Название</th>
    <th>Заголовок</th>
    <th>Расположение</th>
    <th>Файл</th>
    <th>Создана</th>
    <th>Активна</th>
    <th></th>
    </thead>
    <?php if($galleries): ?>
        <?php foreach($galleries as $gallery): ?>
            <?php $color = ($gallery->is_active) ? 'navy' : 'gray'; ?>
            <tr id="pageRow<?= $gallery->id ?>" style="color: <?= $color ?>">
                <td><?= $gallery->id ?></td>
                <td><?= $gallery->gallery_name ?></td>
                <td><?= $gallery->gallery_title ?></td>
                <td><?= $gallery->gallery_path ?></td>
                <td><?= $gallery->gallery_preview ?></td>
                <td><?= $gallery->create_at ?></td>
                <td>
                    <input class="actPage" page_id="<?= $gallery->id ?>" type="checkbox" <?= ($gallery->is_active) ? 'checked' : ''  ?> >

                </td>
                <!-- <td><i class="fa fa-edit"></i></td> -->
                <!-- <td><i class="fa fa-pencil-square-o"></i></td> -->
                <td><a href="<?= Url::to(['gallery/view', 'id' => $gallery->id]) ?>"><i class="fa fa-id-card"></i></a></td>

            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>