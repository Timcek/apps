<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>


<div class="site-contact" style="margin-top:60px">
    <h1 style="width: 80%; text-align: center;margin: 0 auto 20px auto"><?= Html::encode($this->title) ?></h1>

    <p style="width:80%;margin:0 auto; text-align:center; margin-bottom:20px;background-color: rgb(209, 202, 202);padding:4px">
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true,"style"=>"margin:0 auto"]) ?>

                <?= $form->field($model, 'email')->input("email",["style"=>"margin:0 auto"]) ?>

                <?= $form->field($model, 'subject')->textInput() ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6,"style"=>"border-radius:0!important;"]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3" style="display: inline-block;margin-left: 30px;">{image}</div><div class="col-lg-6" style="display: inline-block;float: right;margin-right: 30px;">{input}</div></div>',
                    "options"=>["placeholder"=>"Enter verification code"]
                ])->error(["style"=>"float:right;margin-right:30px"]) ?>

                <div class="form-group" style="text-align:center">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button',"style"=>"margin:0 auto"]) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<style>
    body{
        background-color: #E0E0E0;;
    }

    .site-contact{
        padding-top: 20px;
        background-color: white;
        margin: 0 auto;
        max-width: 800px;
    }

    input{
        border-radius: 0!important;
        border: 0!important;
        border-bottom: 1px solid black!important;
        box-shadow: 0 4px 2px -2px #ccc!important;
    }


    #contact-form{
        width: 80%;
        margin: 0 auto;
    }
</style>
