<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.2017
 * Time: 17:06
 */
 use yii\helpers\Html;
 use yii\helpers\Url;

 // виджет отображения заголовка страницы
 // echo \frontend\components\Header::widget();
?>


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
                    <span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;"><? $images->gallery_name?></span>
                </div>
                <div class="panel-body">
                    <h2>ОТОБРАЖЕНИЕ ГАЛЕРЕИ</h2>
                    <?php foreach($images->images as $image): ?>
                        <?php
                          // $img = '@web/img/galleries/' . $images->gallery_path. "/" . $image->img_name;
                          $img =  Html::img("@web/img/galleries/" . $images->gallery_path. "/" . $image->img_name,
                                  ['alt' => "", 'title' => "Image", 'class' => 'img-responsive']);

                          $url = Url::to(['@web/img/galleries/' . $images->gallery_path . '/' . $image->img_name]);
                        ?>
                        <a href="<?= $url ?>" data-toggle="lightboxgallary" data-gallery="multiimages" data-title="<?= $image->img_title ?>" data-footer="<?= $image->img_title ?>" class="col-sm-3" style="margin-top: 15px;">
                            <?= $img ?>
                        </a>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
 echo "<pre>";
 print_r($images);
 echo "</pre>";
?>
