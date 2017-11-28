<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.07.2017
 * Time: 11:10
 */

namespace frontend\components;
use yii\base\Widget;


class Header extends Widget{

    public function init(){
        parent::init();
    }

    public function run(){

        // $newsList = News::find()->orderBy(['news_date' => SORT_DESC])->limit(3)->all();
        // $blockHtml = $this->getHtmlBlock($newsList);

        return $this->renderFile('@app/views/templates/header.php');
    }
}