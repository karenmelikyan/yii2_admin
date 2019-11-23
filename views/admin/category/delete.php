<?php

/** @var \app\models\Category $category */

use yii\helpers\Url;

?>

<div class="container">
    <div class="card-body">
        <div class="text-center">
            <h5> Are you sure you want to delete this category? </h5>
            <dl>
                <br>
                <dd><?= $category->name; ?></dd>
            </dl>
            <br>
            <form method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <input type="hidden" name="Article[id]" value="<?= $category->id; ?>" />
                <div>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <a href="<?= Url::to('index'); ?>" class="btn btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>