<?php
/**
 * Контроллер для отображения галереи
 * Created by PhpStorm.
 * Date: 20.08.2017 15:19
 */

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\gallery\Gallery;
use common\models\gallery\GalleryImages;


class GalleryController extends Controller
{

    public function actionIndex()
    {
        // $galleries = Gallery::find()->with('images')->where(['is_active' => '1'])->all();
        $galleries = Gallery::find()->where(['is_active' => '1'])->all();
        return $this->render('index', ['pageText' => 'Отображение галерей', 'galleries' => $galleries]);
    }

    public function actionView($id)
    {
        $images = Gallery::find()->with('images')->where(['is_active' => '1', 'id' => $id])->one();
        // echo "<h2>SHOW GALLERY: " . $id . "</h2>";
        return $this->render('view', compact('images'));

    }

}