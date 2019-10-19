<?php
/**
 * @var \app\models\Article[] $articles
 * @var \app\models\Category[] $categories
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>


<?php foreach($articles as $article): ?>
<hr class="invis">
<div class="blog-box row">
    <div class="blog-meta big-meta col-md-8">
        <h4><a href="<?= Url::to(['news/show', 'id' => $article->id]); ?>"><?= $article->title; ?></a></h4>
        <p><?= StringHelper::truncateWords($article->content, 20); ?></p>
        <small class="firstsmall"><a class="bg-orange"><?= $article->category->name ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->
<?php endforeach; ?>



