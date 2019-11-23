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
                <form action="<?= Url::to('create'); ?>"method="post">

                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                    <div class="form-group">
                        <label for="inputContent"><?= $company->getAttributeLabel('name'); ?></label>
                        <input id="inputName" name="Company[name]" type="text" class="form-control"  />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>