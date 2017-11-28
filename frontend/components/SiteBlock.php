<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.07.2017
 * Time: 11:26
 */

namespace frontend\components;

use yii\base\Widget;
use yii\widgets\LinkPager;
use frontend\models\Pages;
use Yii;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;

class SiteBlock extends Widget{

    public $blockName;

    public function init(){
        parent::init();
        $this->blockName = ($this->blockName === null) ? 'undefined' : $this->blockName;
    }

    /**
     * @return string
     */
    public function run(){

        $items = Pages::find()->where(['page_type' => 2])->all();

        $blocks = [
            'header'   => ['name' => 'header.php'],
            'main_top' => ['name' => 'main_top.php'],
            'left1'    => ['name' => 'left_menu_1.php', 'data' => $items],
            'left2'    => ['name' => 'left_menu_2.php'],
            'left3'    => ['name' => 'left_menu_3.php'],
        ];

        if( !array_key_exists($this->blockName, $blocks) ) return '';

        $data = (isset($blocks[$this->blockName]['data'])) ? $blocks[$this->blockName]['data'] : false;
        return $this->renderFile('@app/views/templates/' . $blocks[$this->blockName]['name'], compact('data'));
    }
}