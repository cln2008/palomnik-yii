
<?= \frontend\components\SiteBlock::widget(['blockName' => 'header']) ?>

<div class="container" id="main-content" style="min-height: 700px; width: 100%;">

    <br>
    <div class="row">
        <?= \frontend\components\SiteBlock::widget(['blockName' => 'main_top']) ?>
    </div>
    <br>

    <div class="row">
        <div class="col-md-3" style="border: 0px solid black;">
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left1']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left2']) ?>
            <?= \frontend\components\SiteBlock::widget(['blockName' => 'left3']) ?>

        </div>

        <div class="col-md-9" style="border: 0px solid black;">
            <?= \frontend\components\NewsBlock3::widget() ?>
            <?= \frontend\components\ScheduleBlock::widget() ?>
            <h1 style="color: navy;">TEST 123</h1>
        </div>

    </div>

</div>
