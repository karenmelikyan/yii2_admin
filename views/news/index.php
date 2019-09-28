<?php
/**
 * @var \app\models\Article[] $news
 */

$str = '';

foreach($news as $article) {
   $str .= '<h5>' . $article['title'] . '</h5><br/>' . $article['content'] . '<br/><br/>';
}

echo $str;