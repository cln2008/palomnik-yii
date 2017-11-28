<?php
 namespace backend\controllers;

 use Yii;
 use app\models\Pages;
 use yii\data\ActiveDataProvider;
 use yii\web\Controller;
 use yii\web\NotFoundHttpException;
 use yii\filters\VerbFilter;

 class PgController extends Controller{

     // отображает список разделов
     public function actionList(){

         $this->layout = 'start';
         $pages = Pages::find()->all();
         return $this->render('list', compact('pages'));
     }

     // редактирует страницу
     public function actionView($id){

         echo "<h2>ID: " . $id . "</h2>";

         $model = Pages::findOne($id);
         $this->layout = 'start';

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['list']);
         }
         else{
             return $this->render("_form", compact('model'));
         }
     }

     // создание нового раздела
     public function actionCreate(){

         $model = new Pages();

         $this->layout = 'start';
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['list']);
         }
         else {
             return $this->render("_form", compact('model'));
             // return $this->render('create', ['model' => $model]);
         }
     }

     public function actionTest(){

         file_put_contents("_get_ajax_data.txt", print_r($_POST, true));
         if(Yii::$app->request->isAjax){
             $page = Pages::findOne(Yii::$app->request->post('pageId'));
             $page->is_active = Yii::$app->request->post('is_active');
             $page->save();
             // $page->update();

         }



     }


 }
