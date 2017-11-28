
<?= \frontend\components\SiteBlock::widget(['blockName' => 'header']) ?>

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
                    <span style="font-family: 'Conv_cyrillic_old'; font-size: 22px; color: #006400;"><?= $page->page_title?></span>
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::home() ?>">На главную</a></li>
                        <li class="breadcrumb-item active"><?= $page->page_title?></li>
                    </ol>

                    <hr>
                    <?= $page->page_text ?>

                </div>

            </div>
        </div>

    </div>

</div>