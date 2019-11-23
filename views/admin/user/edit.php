
<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/** @var \app\models\User $user */
?>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">

                <?php $form = ActiveForm::begin(); ?>

                <div class="form-group">
                    <?= $form->field($user, 'username'); ?>
                </div>

                <div class="form-group">
                    <?= $form->field($user, 'mail'); ?>
                </div>

                <div class="form-group">
                    <?= $form->field($user, 'password')->passwordInput(); ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>