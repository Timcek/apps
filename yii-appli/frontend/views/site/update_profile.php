<?php
/* @var $model update_profile */
/* @var $model2 update_profile_username */

use frontend\models\ResendVerificationEmailForm;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div style="background-color: white;box-shadow: 3px 3px 5px 6px #ccc;">
    <h1 style="width:fit-content;padding-top:20px;margin-left:50px;margin-bottom:35px;border-bottom: 2px solid rgb(104, 98, 98)!important; border-radius:5px; padding-bottom:3px">Change Email</h1>
    <h4 style="margin-left: 50px">Enter your old email</h4>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'email',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"Current email","style"=>"width:85%; margin-left: 50px;margin-bottom:35px"])->error(["style"=>"margin-left:50px"]) ?>
    <h4 style="margin-left: 50px">Enter your new email</h4>
    <?= $form->field($model, 'email_update',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"New email", "style"=>"margin-left:50px; width:85%;margin-bottom:25px"])->error(["style"=>"margin-left:50px"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',"style"=>"margin-left:50px; margin-bottom: 20px"]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div style="background-color: white;box-shadow: 3px 3px 5px 6px #ccc;">
    <h1 style="width:fit-content;padding-top:20px;margin-left:50px;margin-bottom:35px;border-bottom: 2px solid rgb(104, 98, 98)!important; border-radius:5px; padding-bottom:3px">Change Username</h1>
    <?php $form2 = ActiveForm::begin(); ?>
    <h4 style="margin-left: 50px">Enter your current usernam</h4>
    <?= $form2->field($model2, 'username',['template'=>"{input}\n{hint}\n{error}"])->input("text",["placeholder"=>"Current username","style"=>"width:85%; margin-left: 50px;margin-bottom:35px"])->error(["style"=>"margin-left:50px"]) ?>
    <h4 style="margin-left: 50px">Enter your new usernam</h4>
    <?= $form2->field($model2, 'username_update',['template'=>"{input}\n{hint}\n{error}"])->input("text",["placeholder"=>"New username","style"=>"width:85%; margin-left: 50px;margin-bottom:25px"])->error(["style"=>"margin-left:50px"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',"style"=>"margin-left:50px; margin-bottom: 20px"]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div style="background-color: white;box-shadow: 3px 3px 5px 6px #ccc;">
    <h1 style="width:fit-content;padding-top:20px;margin-left:50px;margin-bottom:35px;border-bottom: 2px solid rgb(104, 98, 98)!important; border-radius:5px; padding-bottom:3px">Change password</h1>
    <?php $form3 = ActiveForm::begin(); ?>
    <h4 style="margin-left: 50px">Enter your email</h4>
    <?= $form3->field($model3, 'email',['template'=>"{input}\n{hint}\n{error}"])->input("email",["placeholder"=>"New email","style"=>"width:85%; margin-left: 50px;margin-bottom:25px"]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',"style"=>"margin-left:50px; margin-bottom: 20px"]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<style>
    body{
        background-color: #E0E0E0;
    }
    .container{
        width: 60%;
        min-width: 800px;
        max-width: 1000px   ;
    }

    h4{
        margin-bottom: 5px;
    }

    input{
        border: 0!important;
        border-bottom: 1px solid rgba(104, 98, 98,0.63154)!important;
        border-radius: 0!important;
        box-shadow: 0 4px 2px -2px #ccc!important;
        background-color: rgba(241, 241, 241,0.58484)!important;
    }
</style>