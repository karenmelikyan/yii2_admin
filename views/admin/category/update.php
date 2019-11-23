<?php

/** @var \app\models\Article $article */
/** @var \app\models\Category[] $categories */
/** @var \app\models\Company[] $companies */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="<?= Url::to(['update', 'id' => $category->id]); ?>" method="post">

                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">

                    <div class="form-group has-error">
                        <label for="inputTitle"><?= $category->getAttributeLabel('name'); ?></label>
                        <input id="inputTitle" name="Article[title]" type="text" class="form-control" value="<?= $category->name; ?>" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



