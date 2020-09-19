<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\BaseHtml;

//$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <h2>Register</h2>
    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username',['template'=>"<h1>First name</h1>\n{input}\n{hint}\n{error}"])->textInput(['autofocus' => true, 'style'=>'border:0; border-bottom:1px solid black; border-radius:0;']) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
