<?php
/* @var $model update_profile */
/* @var $model2 update_profile_username */

use frontend\models\ResendVerificationEmailForm;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div>
    <h1>Change Email</h1>
    <p>Enter your old email</p>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'email',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"Current email"]) ?>
    <p>Enter your new email</p>
    <?= $form->field($model, 'email_update',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"New email"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div>
    <h1>Change Username</h1>
    <?php $form2 = ActiveForm::begin(); ?>
    <?= $form2->field($model2, 'username',['template'=>"{input}\n{hint}\n{error}"])->input("text",["placeholder"=>"Current username"]) ?>
    <p>Enter your new email</p>
    <?= $form2->field($model2, 'username_update',['template'=>"{input}\n{hint}\n{error}"])->input("text",["placeholder"=>"New username"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div>
    <h1>Change password</h1>
    <?php $form3 = ActiveForm::begin(); ?>
    <p>Enter your email</p>
    <?= $form3->field($model3, 'email',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"New email"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>