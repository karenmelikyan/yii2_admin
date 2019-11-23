<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \app\models\SignUpForm $signup */
?>

<?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <label><?= $signupform->getAttributeLabel('username')?></label>
        <?= $form->field($signupform, 'username')->label(false); ?>
    </div>

     <div class="form-group">
         <label><?= $signupform->getAttributeLabel('mail')?></label>
         <?= $form->field($signupform, 'mail')->label(false); ?>
     </div>

     <div class="form-group">
         <label><?= $signupform->getAttributeLabel('password')?></label>
        <?= $form->field($signupform, 'password')->label(false); ?>
     </div>

     <div class="form-group">
         <label><?= $signupform->getAttributeLabel('confirmpassword')?></label>
        <?= $form->field($signupform, 'confirmpassword')->label(false) ?>
     </div>

    <div class="form-group">
         <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>