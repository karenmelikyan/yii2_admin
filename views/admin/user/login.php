<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \app\models\LoginForm $loginForm */
?>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">

                <?php $form = ActiveForm::begin(); ?>

                <div class="form-group">
                    <?= $form->field($loginForm, 'username'); ?>
                </div>

                <div class="form-group">
                    <?= $form->field($loginForm, 'password')->passwordInput(); ?>
                </div>

                <div><?= $form->errorSummary($loginForm); ?></div>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>