<?php
 use yii\helpers\Url;
 use yii\helpers\Html;

// echo "<pre>";
// print_r($pages);
// echo "</pre>";
?>

<p>
    <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-info']) ?>
</p>

<table class="table table-bordered table-hover">
    <thead>
     <th>ID</th>
     <th>Алиас</th>
     <th>Название</th>
     <th>Активна</th>
     <th></th>
    </thead>
    <?php if($pages): ?>
        <?php foreach($pages as $page): ?>
            <?php $color = ($page->is_active) ? 'navy' : 'gray'; ?>
            <tr id="pageRow<?= $page->id ?>" style="color: <?= $color ?>">
                <td><?= $page->id ?></td>
                <td><?= $page->page_alias ?></td>
                <td><?= $page->page_title ?></td>
                <td>
                    <input class="actPage" page_id="<?= $page->id ?>" type="checkbox" <?= ($page->is_active) ? 'checked' : ''  ?> >

                </td>
                <!-- <td><i class="fa fa-edit"></i></td> -->
                <!-- <td><i class="fa fa-pencil-square-o"></i></td> -->
                <td><a href="<?= Url::to(['pg/view', 'id' => $page->id]) ?>"><i class="fa fa-id-card"></i></a></td>

            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
