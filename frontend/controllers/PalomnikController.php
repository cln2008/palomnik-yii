<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.11.2017
 * Time: 21:41
 */

namespace frontend\controllers;

// use frontend\models\Common;
// use frontend\models\Schedule;
use Yii;
use yii\web\Controller;
// use frontend\models\Pages;
// use frontend\models\News;

class PalomnikController extends Controller
{

    public function actionIndex(){
        return $this->render('index');
    }
}