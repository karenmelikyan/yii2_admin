<?php

/** @var \app\models\Company[] $company */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="<?= Url::to(['update', 'id' => $company->id]); ?>" method="post">

                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">

                    <div class="form-group has-error">
                        <label for="inputTitle"><?= $company->getAttributeLabel('name'); ?></label>
                        <input id="inputTitle" name="Article[title]" type="text" class="form-control" value="<?= $company->name; ?>" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




