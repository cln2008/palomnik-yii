<?php
// use frontend\components\NewsBlock;
// use yii\data\Pagination;
use yii\helpers\Url;
// use yii\helpers\Html;
// use yii\widgets\LinkPager;
// use Yii;

Yii::$app->formatter->timeZone = 'UTC';

?>

<?/*= \frontend\components\SiteBlock::widget(['blockName' => 'header'])*/ ?>

<div class="container" id="main-content" style="min-height: 700px; width: 100%;">

    <br>


    <div class="row">
        <div class="col-md-3" style="border: 0px solid black;">

            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left1']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left2']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left3']) ?>


        </div>

        <div class="col-md-9">
            <?php if($news): ?>
                <div class="panel panel-default" style="border-bottom: none;">
                    <div class="panel-heading">
                        <span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;"><?= $news->news_title?></span>
                    </div>

                    <div class="panel-body">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= Url::home() ?>">На главную</a></li>
                            <li class="breadcrumb-item"><a href="<?= Url::to(['/news']) ?>">Новости</a></li>
                            <li class="breadcrumb-item active"><?= $news->news_title?></li>
                        </ol>
                        <hr>

                        <?= $news->news_text ?>
                        <!-- gallery here -->
                        <div class="row">
                            <div class=" col-md-12">
                                <a href="/img/galleries/jm/jm_001.jpg" data-toggle="lightboxgallary" data-gallery="multiimages" data-title="strawberries" data-footer="RED" class="col-sm-3" style="margin-top: 15px;">
                                    <img src="/img/galleries/jm/jm_001.jpg" class="img-responsive">
                                </a>

                                <a href="/img/galleries/jm/jm_002.jpg" data-toggle="lightboxgallary" data-gallery="multiimages" data-title="strawberries" data-footer="RED" class="col-sm-3" style="margin-top: 15px;">
                                    <img src="/img/galleries/jm/jm_002.jpg" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>



