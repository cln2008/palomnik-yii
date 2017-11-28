<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
//use Yii;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Lumino - Dashboard</title>

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        .nav > li > a:hover
        {
            /* text-decoration: underline; */
            /* background-color: pink; */
            background-color: #CCC !important;
        }


    </style>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Храм Святого Георгия Победоносца</span> Admin</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown count-info">
                    <a href="<?= Url::to(['/site/index']) ?>"> На главную</a>


                </li>
                <li class="dropdown">
                    <?php if(Yii::$app->user->isGuest): ?>
                      <a href="<?= Url::to(['/site/login']) ?>"> Вход</a>
                    <?php else: ?>
                      <a href="<?= Url::to(['/site/logout']) ?>"> Выход (<?= Yii::$app->user->identity->userfio ?>)</a>
                    <?php endif;?>

                    <?php
                    /*
                    echo '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                        // 'Logout (' . Yii::$app->user->identity->username . ')',
                            'Выход (' . Yii::$app->user->identity->userfio . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                    */
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>



<?php
/*
NavBar::begin([
    'brandLabel' => 'Храм Святого Георгия Победоносца (Администратор)',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        // 'class' => 'navbar-inverse navbar-fixed-top',
        'class' => 'navbar navbar-custom navbar-fixed-top'
    ],
]);
$menuItems = [
    ['label' => 'На главную', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
        // 'Logout (' . Yii::$app->user->identity->username . ')',
            'Выход (' . Yii::$app->user->identity->userfio . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    // 'options' => ['class' => 'navbar-nav navbar-right'],
    'options' => ['nav navbar-top-links navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
*/

/*
  file_put_contents("_base_url_01.txt", Url::current() );
  file_put_contents("_base_url_02.txt", Url::to() );
  file_put_contents("_base_url_03.txt", Yii::$app->controller->route );
  file_put_contents("_base_url_04.txt", Yii::$app->controller->action->id );
*/

?>

<?php if(!Yii::$app->user->isGuest): ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                Username
            </div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <?php
         $links = [
                    ['url' => 'pg/list', 'name' => 'Страницы', 'fa_class' => 'fa-book'],
                    ['url' => 'news/list', 'name' => 'Новости', 'fa_class' => 'fa-newspaper-o'],
                    ['url' => 'schedule/list', 'name' => 'Расписание', 'fa_class' => 'fa-calendar'],
                    ['url' => 'gallery/list', 'name' => 'Галереи', 'fa_class' => 'fa-calendar'],
                  ];
        ?>

        <?php foreach($links as $link): ?>
            <li class="<?= ($link['url'] == Yii::$app->controller->route) ? "active" : "" ?>">
               <a href="<?= Url::to([$link['url']])?>">
                   <em class="fa <?= $link['fa_class'] ?>">&nbsp;</em> <?= $link['name'] ?>
               </a>
            </li>
        <?php endforeach; ?>


    </ul>
</div><!--/.sidebar-->
<?php endif;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Name</h1>
        </div>



    </div><!--/.row-->
    <?= $content ?>
</div>	<!--/.main-->

<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>