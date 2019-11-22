<?php

/** @var \app\models\Article $article */

use yii\helpers\Url;

?>

<div class="container">
    <div class="card-body">
        <div class="text-center">
            <h5> Are you sure you want to delete this article? </h5>
            <dl>
                <br>
                <dd><?= $article->title; ?></dd>
            </dl>
            <br>
            <form method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <input type="hidden" name="Article[id]" value="<?= $article->id; ?>" />
                <div>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <a href="<?= Url::to('index'); ?>" class="btn btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

