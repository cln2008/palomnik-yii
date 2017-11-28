<?php

    use yii\helpers\Html;
    use frontend\assets\AppAsset;

    AppAsset::register($this);
    $this->title = 'Паломническая служба «Святыни Православия» при храме Свв. Косьмы и Дамиана Киевской епархии';
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Храм Святого Георгия Победоносца Ирпень, с. Романовка">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>

    <?php
        // echo "<script language=\"Javascript\" src=\"http://script.days.ru/calendar.php?advanced=1&date=" . date('md') . "&dayicon=1&feofan=1\"></script>";

        // виджет отображения заголовка страницы
        // echo \frontend\components\Header::widget();

    ?>

    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>