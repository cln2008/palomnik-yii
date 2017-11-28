<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $page_alias
 * @property string $page_title
 * @property string $page_text
 * @property integer $page_type
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_text'], 'string'],
            [['page_type'], 'integer'],
            [['page_alias', 'page_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_alias' => 'Page Alias',
            'page_title' => 'Page Title',
            'page_text' => 'Page Text',
            'page_type' => 'Page Type',
        ];
    }
}
