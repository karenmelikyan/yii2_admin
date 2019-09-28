<?php
/**
 * @var \app\models\Article[] $articles
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<?php foreach($articles as $article): ?>
<div>
    <h5><a href="<?= Url::to(['news/show', 'id' => $article->id]); ?>"><?= $article->title; ?></a></h5>
    <p><?= StringHelper::truncateWords($article->content, 20); ?></p>
</div>
<?php endforeach; ?>

