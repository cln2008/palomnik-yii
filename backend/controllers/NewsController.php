<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.07.2017
 * Time: 16:04
 */

namespace backend\controllers;

use Yii;
use app\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
// use yii\web\NotFoundHttpException;
// use yii\filters\VerbFilter;

class NewsController extends Controller{

    // отображает список разделов
    public function actionList(){

        $this->layout = 'start';
        // $pages = Pages::find()->all();
        return $this->render('list');
    }
}