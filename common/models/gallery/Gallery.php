<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.2017
 * Time: 13:23
 */

namespace common\models\gallery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use Yii;

class Gallery extends ActiveRecord
{

    public $imageFile;

    public static function tableName()
    {
        return 'galleries';
    }

/*    public function behaviors()
    {
        return [
            'imageFile' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }*/


    public function rules()
    {
        return [
            [['gallery_name', 'gallery_title', 'gallery_path', 'gallery_preview'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            // [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            // $path = Yii::getAlias('@common') . '/upload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $path = Yii::getAlias('@common') . '/upload/' . $fileName;
            $this->imageFile->saveAs($path);
            // $this->attachImage($path, true);
            // return true;
            return $fileName;
        } else {
            return false;
        }
    }

    public function getImages()
    {
        return $this->hasMany(GalleryImages::className(), ['gallery_id' => 'id'])->andWhere(['is_active' => '1']);
    }
}