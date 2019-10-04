<?php
/**
 * @var \app\models\Article[] $articles
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<?php foreach($categories as $category): ?>
    <div class="child">
        <h3><a href="<?= Url::to(['news/category', 'id' => $category->id]); ?>"><?=$category->name?></a></h3>
    </div>
<?php endforeach; ?>

<?php foreach($articles as $article): ?>
    <div>
        <h4><a href="<?= Url::to(['news/show', 'id' => $article->id]); ?>"><?= $article->title; ?></a></h4>
        <p><?= StringHelper::truncateWords($article->content, 20); ?></p>
    </div>
<?php endforeach; ?>

