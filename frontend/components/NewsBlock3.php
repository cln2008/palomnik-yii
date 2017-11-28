<?php
/**
 * Отображение 3х последних новостей
 * User: user
 * Date: 25.07.2017
 * Time: 10:26
 */

  namespace frontend\components;
  use yii\base\Widget;
  use yii\widgets\LinkPager;
  use frontend\models\News;
  use Yii;
  use yii\data\Pagination;
  use yii\helpers\Html;
  use yii\helpers\Url;

  class NewsBlock3 extends Widget{

      public function init(){
          parent::init();
      }

      public function run(){

          $newsList = News::find()->orderBy(['news_date' => SORT_DESC])->limit(3)->all();
          $blockHtml = $this->getHtmlBlock($newsList);

          return $blockHtml;
      }

      private function getHtmlBlock($newsList){

          Yii::$app->formatter->timeZone = 'UTC';
/*
          $breadCrumb = (!$this->isBreadCrumb) ? "" : '<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="' . Url::home() . '">На главную</a></li>
                        <li class="breadcrumb-item active">Новости</li>
                    </ol><hr>';
*/
          $breadCrumb = '';
          $newsHead = '<p class="text-muted text-right">
                         <a href="' . Url::to(['news/show']) . '"> Все новости</a>
                         <hr>
                       </p>';

          $s1 = '<div class="panel panel-default">
                <div class="panel-heading"><span style="font-family: \'Conv_cyrillic_old\'; font-size: 22px; color: #006400;">Новости</span></div>
                 <div class="panel-body">' . $breadCrumb . $newsHead;

          foreach($newsList as $news){

              $img = Html::img("@web/img/news/{$news->news_image}", ['alt' => '', 'title' => $news->news_title, 'class' => 'img-responsive']);
              $s1 .= '<div class="row" style="padding-left: 15px; ">
                     <div class="col-sm-4">
                      <a href="#" class="">
                       ' . $img . '
                      </a>
                     </div>
                     <div class="col-sm-8">
                       <h3 class="title">' . $news->news_title . '</h3>
                       <p class="text-muted">' . Yii::$app->formatter->asDate($news->news_date, 'php:d.m.Y') . '</p>
                       <p style="text-indent: 15px;">' . $news->news_description.'</p>
                       <p class="text-muted">
                         <a href="' . Url::to(['news/view', 'id' => $news->id]) . '">Читать далее ...</a>
                       </p>
                     </div>
                    </div>
                    <hr>';
          }

          $s1 .= '</div>
               </div>';
          return $s1;

      }

  }