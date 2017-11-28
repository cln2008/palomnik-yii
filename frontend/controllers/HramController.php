<?php
namespace frontend\controllers;

use frontend\models\Common;
use frontend\models\Schedule;
use Yii;
// use yii\base\InvalidParamException;
// use yii\web\BadRequestHttpException;
use yii\web\Controller;
// use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
// use common\models\LoginForm;
// use frontend\models\PasswordResetRequestForm;
// use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
// use frontend\models\ContactForm;
use frontend\models\Pages;
use frontend\models\News;

/**
 * Site controller
 */
class HramController extends Controller
{


    public function actionIndex(){
        return $this->render('index');
    }

    public function actionInfo(){

        $alias = yii::$app->request->get('alias');
        $page = Pages::find()->where(['page_alias' => $alias])->one();

        return $this->render('page', compact('page'));
    }

    public function actionGeorg(){

        $page = Pages::find()->where(['page_type' => 1])->one();

        return $this->render('page', compact('page'));
    }

    public function actionSchedule(){
        $schedule = Schedule::find()->where(['sch_month' => 7, 'sch_year' => 2017])->all();
        // echo "<pre>";
        // print_r($schedule);
        // echo "</pre>";

        foreach($schedule as $row){
            echo "<p>".$row->sch_day . "-" . $row->sch_month . "-" . $row->sch_year . "</p>";
            echo "<h3>" . Common::getFullDate($row->id) . "</h3 >";
            echo "<h3>MONTH NUMBER: " . print_r(Common::getMonthName($row->id), true) . "</h3 >";
            echo "<h3>WEEK DAY NUMBER: " . print_r(Common::getWeekDayName($row->id), true) . "</h3 >";

            // echo "<pre>";
            // print_r($row->events);
            // echo "</pre>";


        }
    }


/*
    public function actionNews($id = null){
        $header  = $this->renderPartial('header');

        $items = Pages::find()->where(['page_type' => 2])->all();
        $left[1] = $this->renderPartial('left_menu_1', compact('items'));
        $left[2] = $this->renderPartial('left_menu_2');
        $left[3] = $this->renderPartial('left_menu_3');

        $news = News::find()->where(['id' => $id])->one();
        return $this->render('news', compact('news', 'left', 'header'));

    }
*/

}
