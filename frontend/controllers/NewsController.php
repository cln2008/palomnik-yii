<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Pages;
use frontend\models\News;
use yii\data\Pagination;

/**
 * News controller
 */
class NewsController extends Controller{

    // отображение всего списка новостей
    public function actionIndex(){
        $id = (yii::$app->request->get('id')) ? yii::$app->request->get('id') : 0;

        $query = News::find();
        $pages = new Pagination(['totalCount' => $query->count()
            , 'pageSize'       => 3
            , 'forcePageParam' => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
            , 'pageSizeParam'  => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
        ]);

        $items = $query->offset($pages->offset)->limit($pages->limit)->all();

        $news = false;
        if($id){
          // отобразить страницу новостей
          $news  = News::find()->where(['id' => $id])->one();
        }

        return $this->render('news', compact('news',  'items', 'pages'));

    }

    public function actionView($id){
        $id = (yii::$app->request->get('id')) ? yii::$app->request->get('id') : 0;
        $news  = News::find()->where(['id' => $id])->one();

        return $this->render('news_view', compact('news'));
    }

    public function actionShow(){
        $query = News::find();

        $pages = new Pagination(['totalCount' => $query->count()
            , 'pageSize'       => 2
            , 'route' => 'news/show'
            , 'forcePageParam' => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
            , 'pageSizeParam'  => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
        ]);

        $items = $query->offset($pages->offset)->limit($pages->limit)->all();

        $news  = false;
        // $pages = false;

        // echo "<pre>";
        // print_r($pages);
        // echo "</pre>";

        return $this->render('news', compact('news',  'items', 'pages'));

    }


}
