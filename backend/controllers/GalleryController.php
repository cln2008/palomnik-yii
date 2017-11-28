<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.08.2017
 * Time: 13:16
 */

namespace backend\controllers;
use common\models\gallery\Gallery;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;


class GalleryController extends Controller
{

    public function actionList()
    {
        $galleries = Gallery::find()->all();
        $this->layout = 'start';
        return $this->render('list', compact('galleries'));
    }

    public function actionView($id)
    {
        // echo "<h2>ID: " . $id . "</h2>";
        $gallery = Gallery::find()->where(['id' => $id])->one();

        $this->layout = 'start';

/*        if ( $gallery->load(Yii::$app->request->post()) ) {
           $file = UploadedFile::getInstance($gallery, 'imageFile');
            if ($gallery->upload()) {
                // file is uploaded successfully
                return $this->redirect(['list']);
            }

        }*/

        if ($gallery->load(Yii::$app->request->post()) && $gallery->save()) {
        //if ($gallery->load(Yii::$app->request->post()) ) {

            $gallery->imageFile = UploadedFile::getInstance($gallery, 'imageFile');
            // echo "<pre>";
            // print_r($gallery);
            // echo "</pre>";
            if($gallery->imageFile){
                $gallery->gallery_preview = $gallery->upload();
                // echo $gallery->gallery_preview;

/*                echo "<pre>";
                print_r($gallery);
                echo "</pre>";*/
                $gallery->imageFile = null;
                $gallery->save();
                // die;

/*                if( $gallery->gallery_preview ){
                   $gallery->save();
                }*/

                return $this->redirect(['list']);
            }

            // die();


            return $this->redirect(['list']);
        }
        else{
            return $this->render('view', compact('gallery'));
        }



    }
}