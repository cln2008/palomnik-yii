
<?= \frontend\components\Header::widget() ?>

<div class="container" id="main-content" style="min-height: 700px; width: 100%;">

    <br>


    <div class="row">
        <div class="col-md-3" style="border: 0px solid black;">

            <?= $left[1] ?>
            <?= $left[2] ?>
            <?= $left[3] ?>

        </div>

        <div class="col-md-9">
            <?php if(isset($news)): ?>
            <div class="panel panel-default" style="border-bottom: none;">
                <div class="panel-heading">
                    <span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;"><?= $news->news_title?></span>
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::home() ?>">На главную</a></li>
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['hram/news']) ?>">Новости</a></li>
                        <li class="breadcrumb-item active"><?= $news->news_title?></li>
                    </ol>
                    <hr>
                    <?= $news->news_text ?>
                </div>
            </div>
            <?php else: ?>
                <?= \frontend\components\NewsBlock::widget() ?>
            <?php endif; ?>

        </div>

    </div>

</div>
