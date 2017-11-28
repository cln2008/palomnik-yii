<?php

namespace frontend\components;
use yii\base\Widget;
use frontend\models\mMainMenu;
use Yii;



class MainMenu extends Widget{

    public function init(){
        parent::init();
        // $this->tpl = ($this->tpl === null) ? 'menu' : $this->tpl;
        // $this->tpl .= '.php';

    }

    public function run(){
        // return 'MENU';

        // 1. get cache
        // попытаемся получить данные сначала из кэша
        $m = mMainMenu::find()->where(['is_active' => 1])->all();
        // $m = ['Главная', 'Новости', 'О храме', 'Расписание Богослужений', 'Галерея', 'Контакты'];
        $menu  = '<nav class="navbar navbar-default" style="margin-bottom: 0px;">';
        $menu .=  '<div class="container-fluid">';
        $menu .= '<ul class="nav navbar-nav">';
        foreach($m as $item){
          $menu .= '<li><a href="' . $item->item_route . '" class="mes2">' . $item->item_name . '</a></li>';
        }
        $menu .= '</ul>';
        $menu .=  '</div>';
        $menu .= '</nav>';


        // $this->data = Category::find()->indexBy('id')->asArray()->all();
        // $this->tree = $this->getTree();
        // $this->menuHtml = $this->getMenuHtml($this->tree);

        // debug($this->data);
        // debug($this->tree);
        // return $this->tpl;

        // 2. set cache
        // запишем полученное меню в кэш

        // Yii::$app->cache->set('menu', $this->menuHtml, 60); // задается ключ, данные и время жизни кэша в секундах
        // return $this->menuHtml;

        return $menu;
    }
}