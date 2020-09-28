<?php

use frontend\models\Cars;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model Cars */

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\IndexAsset;
IndexAsset::register($this);

$this->title = 'Najem avtomobilov';
?>

<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?php Pjax::begin(['id' => 'second_form_pjax'])?>
            <?php
                $models = ["Audi"=>["A1"=>"A1","A2"=>"A2","A3"=>"A3","A4"=>"A4","A5"=>"A5","A6"=>"A6","A7"=>"A7","A8"=>"A8"],"BMW"=>["Serija1"=>"Serija1","Serija2"=>"Serija2","Serija3"=>"Serija3"]];
                $car_com ="Audi";
                if(isset($_GET["name"])) {
                    $car_com= $_GET["name"];
                }
                ?>
                <div class="col-sm-6">
                    <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"],["class"=>"form-control company","selected",'style'=>'border:0; border-bottom:1px solid black; border-radius:0;'])->label('')?>
                </div>
            <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->dropDownList($models[$car_com],['style'=>'border:0; border-bottom:1px solid black; border-radius:0;']) ?>
            <script type="text/javascript">changediv(<?php echo(json_encode($car_com))?>);</script>
            <?php Pjax::end() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" >-->
            <!--
            <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->input('email', ['placeholder' => " Email"]) ?>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-sm-6">            --><?//= $form->field($model, 'password',['template'=>"{input}\n{hint}\n{error}"])->passwordInput(["placeholder"=>" Password"]) ?>
<!--        </div>-->
<!--        <div class="col-sm-6">-->
<!--            --><?//= $form->field($model, 'confirm_password',['template'=>"{input}\n{hint}\n{error}"])->passwordInput(["placeholder"=>" Confirm Password"]) ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row" style="padding-bottom: 50px; margin-top: 20px">-->
<!--        <div class="form-group col-lg-12">-->
<!--            --><?//= Html::submitButton('Sign up', ['class' => 'btn btn-primary', 'name' => 'signup-button', "style"=>"background-color:#78B0B7; border:0; width:100%; border-radius:0; line-height:35px;"]) ?>
<!--        </div>-->
<!--    </div>-->
    <?php ActiveForm::end(); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function changediv(c){$('.company option[value='+c+']').replaceWith('<option value='+c+' selected>'+c+'</option>')}
    console.log(<?php echo json_encode($_GET["name"])?>)
    changediv(<?php echo json_encode($_GET["name"])?>);
</script>
