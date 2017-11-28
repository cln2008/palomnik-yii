<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.2017
 * Time: 13:27
 */

namespace common\models\gallery;
use yii\db\ActiveRecord;

class GalleryImages extends ActiveRecord
{

    public static function tableName()
    {
        return 'gallery_images';
    }
}