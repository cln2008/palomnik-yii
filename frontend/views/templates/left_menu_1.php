<div class="panel panel-default"  style="min-height: 400px;">
    <div class="panel-heading"><span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;">Храм</span></div>
    <div class="panel-body">
        <ul>
            <?php foreach($data as $item): ?>
                <li><a href="<?= \yii\helpers\Url::to(['/hram/info', 'alias'=> $item->page_alias]) ?>"><?= $item->page_title ?></a></li>
            <?php endforeach; ?>
<!--
            <li>История храма</li>
            <li>Храмовые праздники</li>
            <li>Клир</li>
            <li>Воскресная школа</li>
            <li><a href="/novon.php">Прихожанам</a></li>
            <li>Статьи</li>
            <li>Видео</li>
            <li>Аудио</li>
-->
        </ul>
    </div>
</div>