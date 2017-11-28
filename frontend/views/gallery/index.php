<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.08.2017
 * Time: 15:21
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?/*= \frontend\components\Header::widget() */?>

<div class="container" id="main-content" style="min-height: 700px; width: 100%;">
    <br>
    <div class="row">
        <div class="col-md-3" style="border: 0px solid black;">
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left1']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left2']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left3']) ?>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default" style="border-bottom: none;">
                <div class="panel-heading">
                    <span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;"><?= $pageText ?></span>
                </div>
                <div class="panel-body">
                    <?php foreach($galleries as $gallery): ?>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php $img = $gallery->gallery_path. "/" . $gallery->gallery_preview; ?>
                                <?= Html::img("@web/img/galleries/" . $img,
                                    ['alt' => ""
                                        , 'title' => "Image"
                                        //, 'style' => 'width: 30%'
                                        , 'class' => 'img-responsive'])
                                ?>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= Url::to(['gallery/view', 'id'=>$gallery->id])?>"><?=$gallery->gallery_name?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>



                    <?php
                     // echo "<pre>";
                     // print_r($galleries);
                     // echo "</pre>";
                    ?>



                </div>
            </div>
        </div>

    </div>

</div>
