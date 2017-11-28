<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.07.2017
 * Time: 14:15
 */

namespace frontend\components;
use yii\base\Widget;
use Yii;


class MyPagination extends Widget{

    public $pagination;

    public function init(){
        parent::init();
    }


    public function run(){

        $pageCount = $this->pagination->getPageCount();
        $link = '';
        for($i=0; $i < $pageCount; $i++){
          $hRef = mb_substr($this->pagination->createUrl($i), 0, mb_strpos($this->pagination->createUrl($i), '?'));
          $n = $i + 1;
          $class = ($this->pagination->getPage() == $i) ? 'active' : '';
          $link .= '<li class="page-item ' . $class . '"><a class="page-link" href="' . $hRef . '">' . $n . '</a></li>';

        }

        $getLinks = $this->pagination->getLinks();
        foreach($getLinks as $k=>$v){
          $getLinks[$k] = mb_substr($v, 0, mb_strpos($v, '?'));
        }

        // $getPage = $this->pagination->getPage($recalculate = false);
        $getPage = $this->pagination->getPage();

        $nextLink    = '#';
        $nextDisable = 'disabled';

        if( isset($getLinks['next']) ){
          $nextLink = $getLinks['next'];
          $nextDisable = '';
        }

        $prevLink    = '#';
        $prevDisable = 'disabled';
        if( isset($getLinks['prev']) ){
            $prevLink = $getLinks['prev'];
            $prevDisable = '';
        }

        $blockHtml = '<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item ' . $prevDisable . '">
      <a class="page-link" href="' . $prevLink . '" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>';

        $blockHtml .= $link;

        $blockHtml .= '<li class="page-item ' . $nextDisable . '">
      <a class="page-link" href="' . $nextLink . '" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>';

// <h2><pre>' . print_r($getLinks, true) . '</pre></h2>

/*
<h2>'.$pageCount.'</h2>
<h2>' . $link . '</h2>
<h2>get Page: ' . $getPage . '</h2>
<h2><pre>' . print_r($getLinks, true) . '</pre></h2>';
*/

        return $blockHtml;
    }
}

/*
[self] => /news
[next] => /news/page/2
[last] => /news/page/5


    [self] => /news/page/2
    [first] => /news
    [prev] => /news
    [next] => /news/page/3
    [last] => /news/page/5

    [self] => /news/page/5
    [first] => /news
    [prev] => /news/page/4

*/