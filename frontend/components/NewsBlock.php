<?php

namespace frontend\components;
use yii\base\Widget;
use yii\widgets\LinkPager;
use frontend\models\News;
use Yii;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;


class NewsBlock extends Widget{

    public $isBreadCrumb;
    public $breadCrumbArray;

    public function init(){
        parent::init();
        // $this->isBreadCrumb = ($this->isBreadCrumb === null) ? 'yes' : $this->isBreadCrumb;
        $this->isBreadCrumb = ($this->isBreadCrumb === null) ? true : $this->isBreadCrumb;
        // $this->isBreadCrumb = ($this->isBreadCrumb === null) ? true : $this->isBreadCrumb;
        // $this->tpl .= '.php';

    }

    public function run(){
        // $items = News::find()->all();

        $query = News::find();
        $pages = new Pagination(['totalCount' => $query->count()
            , 'pageSize'       => 3
            , 'forcePageParam' => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
            , 'pageSizeParam'  => false   // опция для отображения ссылок в формате ЧПУ для пагтнации
        ]);

        $items = $query->offset($pages->offset)->limit($pages->limit)->all();

        $menu  = $this->getHtmlBlock($items, $pages);

        return $menu;
    }

    private function getHtmlBlock($items, $pages){

        Yii::$app->formatter->timeZone = 'UTC';

        $breadCrumb = (!$this->isBreadCrumb) ? "" : '<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="' . Url::home() . '">На главную</a></li>
                        <li class="breadcrumb-item active">Новости</li>
                    </ol><hr>';

        $s1 = '<div class="panel panel-default">
                <div class="panel-heading"><span style="font-family: \'Conv_cyrillic_old\'; font-size: 22px; color: #006400;">Новости</span></div>
                 <div class="panel-body">' . $breadCrumb;

        foreach($items as $item){

            $img = Html::img("@web/img/news/{$item->news_image}", ['alt' => '', 'title' => $item->news_title, 'class' => 'img-responsive']);
            $s1 .= '<div class="row" style="padding-left: 15px; ">
                     <div class="col-sm-4">
                      <a href="#" class="">
                       ' . $img . '
                      </a>
                     </div>
                     <div class="col-sm-8">
                       <h3 class="title">'.$item->news_title.'</h3>
                       <p class="text-muted">'.Yii::$app->formatter->asDate($item->news_date, 'php:d.m.Y').'</p>
                       <p style="text-indent: 15px;">'.$item->news_description.'</p>
                       <p class="text-muted">
                         <a href="' . Url::to(['news/index', 'id' => $item->id]) . '">Читать далее ...</a>
                       </p>
                     </div>
                    </div>
                    <hr>';
        }

        // display pagination
        // $s1 .=  LinkPager::widget(['pagination' => $pages]);

        $s1 .= '</div>
               </div>';
        return $s1;

    }
}