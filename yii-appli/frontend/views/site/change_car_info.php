<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\assets\change_car_infoAsset;
change_car_infoAsset::register($this);

?>


<?php $form = ActiveForm::begin(['id' => 'filter']); ?>
<div class="ogrodje">
    <h2>Update information of this car</h2>
    <!--<h2>In the inputs listed below is stored the information of your car which you can change and update.</h2>-->
    <div class="forms">
        <div class="input-fild-change">
            <h4>Car company:</h4>
            <?=$form->field($model,"car_company",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"],["class"=>"form-control company"])->label("")?>
            <?="<div style='display:none' class='temp_car_model'>"?><?=$model->model?><?="</div>"?>
        </div>
        <div class="input-fild-change">
            <h4>Model:</h4>
            <?=$form->field($model,"model",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["50"=>"50","60"=>"60","80"=>"80","90"=>"90","100"=>"100","200"=>"200","A1"=>"A1","A2"=>"A2","A3"=>"A3","A4"=>"A4","A4 Allroad"=>"A4 Allroad","A5"=>"A5","A6"=>"A6","A6 Allroad"=>"A6 Allroad","A7"=>"A7","A8"=>"A8","Co"=>"Coupe","Cabriolet"=>"Cabriolet","E-Tron"=>"E-Tron","Q1"=>"Q1","Q2"=>"Q2","Q3"=>"Q3","Q5"=>"Q5","Q7"=>"Q7","Q8"=>"Q8","R8"=>"R8","RS2"=>"RS2","RS3"=>"RS3","RS4"=>"RS4","RS5"=>"RS5","RS6"=>"RS6","RS7"=>"RS7","RS Q3"=>"RS Q3","RS Q5"=>"RS Q5","RS Q8"=>"RS Q8","S1"=>"S1","S2"=>"S2","S3"=>"S3","S4"=>"S4","S5"=>"S5","S6"=>"S6","S7"=>"S7","S8"=>"S8","SQ2"=>"SQ2","SQ5"=>"SQ5","SQ7"=>"SQ7","SQ8"=>"SQ8","TT"=>"TT","V8"=>"V8"])?>
        </div>
        <div class="input-fild-change">
            <h4>Year:</h4>
            <?=$form->field($model,"year",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        </div>
        <div class="input-fild-change">
            <h4>Price:</h4>
            <?=$form->field($model,"price",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        </div>
        <div class="input-fild-change"> 
            <h4>Gearing type:</h4>       
            <?=$form->field($model,"gearing_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","manual"=>"Manual","automatic"=>"Automatic"])?>
        </div>
        <div class="input-fild-change">   
            <h4>Dors:</h4> 
            <?=$form->field($model,"dors",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        </div>
        <div class="input-fild-change"> 
            <h4>Seats:</h4>   
            <?=$form->field($model,"seats",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        </div>
        <div class="input-fild-change"> 
            <h4>Fuel type:</h4>   
            <?=$form->field($model,"fuel_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","diesel"=>"Diesel","gasoline"=>"Gasoline"])?>
        </div>
        <div style="margin-bottom:20px"> 
            <h4>Engine power:</h4>   
            <?=$form->field($model,"engine_power",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        </div>    
    </div>
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button',"style"=>"display:block;margin:0 auto 0 auto"]) ?>
</div>
<?php ActiveForm::end(); ?>

<style>
    body{
        background-color: #E0E0E0;
    }

    .ogrodje{
        background-color: white;
        padding-bottom: 20px;
        padding-top: 20px;
        border-radius: 15px;
    }

    .forms{
        width: 80%;
        margin:0 auto;
    }

    h2{
        text-align: center;
        width: fit-content;
        margin: 0 auto 50px auto;
        border-bottom: 1px solid black;
    }

    h4{
        display: inline-block;
        width: 19.9999%;
        height: 34px;
        margin-bottom: 25px;
        margin-top:0;
        line-height: 34px;
        background-color: blanchedalmond;
        box-shadow: 0 4px 2px -2px #ccc!important;
    }
    .form-group{
        width: 80%;
        float: right;
        margin-bottom: 0;
        height: 34px;
        background-color: blanchedalmond;
    }

    .input-fild-change{
        border-bottom: 1px solid black;
        margin-bottom: 15px;
    }

    .form-control{
        border-radius: 0;
        border:0;
        border-bottom: 1px solid black;
        box-shadow: 0 4px 2px -2px #ccc!important;
        background-color: #f2f2f2;
    }
</style>
