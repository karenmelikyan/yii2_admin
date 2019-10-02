<?php
/**
 * @var \app\models\Article[] $articles
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<?php foreach($categories as $category): ?>
        <div class="parent">
            <div class="child">
                <h3><?=$category->name?></h3>
            </div>
        </div>
<?php endforeach; ?>

<?php foreach($articles as $article): ?>
<div>
    <h5><a href="<?= Url::to(['news/show', 'id' => $article->id]); ?>"><?= $article->title; ?></a></h5>
    <p><?= StringHelper::truncateWords($article->content, 20); ?></p>
</div>
<?php endforeach; ?>

