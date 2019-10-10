<?php
/**
 * @var \app\models\Article $article
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="child"><h3><a href="<?= Url::to(['/news']) ?>">All</a></h3></div>
<?php foreach($categories as $category): ?>
    <div class="child">
        <h3><a href="<?= Url::to(['/news', 'id' => $category->id]); ?>"><?=$category->name?></a></h3>
    </div>
<?php endforeach; ?>

<div>
    <h2><?= $article->title; ?></h2>
    <p><?= $article->content; ?></p>
</div>
