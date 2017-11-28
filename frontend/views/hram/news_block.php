<div class="panel panel-default">
    <div class="panel-heading"><span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;">Новости</span></div>
    <div class="panel-body">

        <?php foreach($news as $item): ?>
        <div class="row" style="padding-left: 15px; ">
            <div class="col-sm-4"><a href="#" class=""><img src="img/news/jen-mironosec.jpg" class="img-responsive"></a></div>
            <div class="col-sm-8">
                <h3 class="title"><?= $item->news_title ?></h3>
                <p class="text-muted">
                    <?php
                    Yii::$app->formatter->timeZone = 'UTC';
                    echo Yii::$app->formatter->asDate($item->news_date, 'php:d.m.Y');
                    ?>
                </p>

                <p style="text-indent: 15px;"><?= $item->news_description ?></p>
                <p class="text-muted"><a href="news_page.php?news_id=3">Читать далее ...</a></p>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>

    </div>
</div>
