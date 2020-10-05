<?php
/* @var $this yii\web\View */
/* @var $model Cars */

use yii\helpers\Html;
use frontend\models\Cars;
use yii\bootstrap\ActiveForm;
use frontend\assets\display_carsAsset;
display_carsAsset::register($this);

?>

<div class="site-display_cars">
    <div class="filtering">
        <?php $form = ActiveForm::begin(['id' => 'filter']); ?>
        <p>Price to</p>
        <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->textInput(["style"=>"display:none"]) ?>
        <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->textInput(["style"=>"display:none"]) ?>
        <?= $form->field($model, 'price',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Price_to"=>"Price to","€500"=>"€500","€1000"=>"€1000","€1500"=>"€1500","€2000"=>"€2000","€2500"=>"€2500","€3000"=>"€3000","€4000"=>"€4000","€5000"=>"€5000","€6000"=>"€6000","€7000"=>"€7000","€8000"=>"€8000","€9000"=>"€9000","€10000"=>"€10000","€125000"=>"€12500","€15000"=>"€15000","€17500"=>"€17500","€17500"=>"€17500","€20000"=>"€20000","€25000"=>"€25000","€30000"=>"€30000","€40000"=>"€40000","€50000"=>"€50000","€75000"=>"€75000","€100000"=>"€100000"]) ?>
        <?php
        $years=["First_registration"=>"First registration"];
        for($a=0;$a<121;$a++){
            $years[2020-$a]=2020-$a;
        }
        ?>
        <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->dropDownList($years) ?>
        <?= $form->field($model, "gearing_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","manual"=>"Manual","Automatic"=>"Automatic"])?>
        <p>Dors</p>
        <?= $form->field($model, "dors",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        <p>Seats</p>
        <?= $form->field($model, "seats",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        <p>Fuel type</p>
        <?= $form->field($model, "fuel_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","diesel"=>"Diesel","gasoline"=>"Gasoline"])?>
        <p>Engine power to(kW):</p>
        <?= $form->field($model, "engine_power",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="cars">
        <?php
        $all_filtering=["car_company"=>$model->car_company,"model"=>$model->model];
        if($model->price){
            $price_filtering=["<=","price",$model->price];
        }
        if($model->year!="First_registration"){
            $all_filtering["year"]=$model->year;
        }
        if($model->gearing_type!="all"){
            $all_filtering["gearing_type"]=$model->gearing_type;
        }
        if($model->dors!=""){
            $all_filtering["dors"]=$model->dors;
        }
        if($model->seats!=""){
            $all_filtering["seats"]=$model->seats;
        }
        if($model->fuel_type!="all"){
            $all_filtering["fuel_type"]=$model->fuel_type;
        }
        if($model->engine_power!=""){
            $engine_filtering=["<=","engine_power",$model->engine_power];
        }else{
            $engine_filtering="noething";
        }
        if($engine_filtering!="noething"){
            $cars = Cars::find()->where($all_filtering)->andWhere($price_filtering)->andWhere($engine_filtering)->all();
        }else {
            $cars = Cars::find()->where($all_filtering)->andWhere($price_filtering)->all();
        }
        foreach($cars as $car){echo
        '<div class="car">
            <div class="main-heading"><h2 style="margin-left: 2%; padding-top: 15px">Sportback 40 TFSI NAVI+ UPE 47.228,59</h2></div>
            <div class="picture"></div>
            <div class="cars_content">
                <div class="row" style="margin: 0">
                    <div class="col-sm-3">
                        <h2 style="margin-block-start: 0!important;margin: 0!important;height: 40px">'?><?= $car->price ?><?='</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>'?><?= $car->engine_power ?><?='</p></div>
                    <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>'?><?= $car->dors ?><?='</p></div>
                    <div class="col-sm-4" style="border-bottom: 1px solid grey"><p>'?><?= $car->gearing_type ?><?='</p></div>
                </div>
                <div class="row">
                    <div class="col-sm-4" style="margin-right: 2%""><p>'?><?= $car->fuel_type ?><?='</p></div>
                    <div class="col-sm-4" style="margin-right: 2%""><p>'?><?= $car->seats ?><?='</p></div>
                    <div class="col-sm-4">'?><?= $car->year?><?='</div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-sm-4"></div>-->
<!--                    <div class="col-sm-4"></div>-->
<!--                    <div class="col-sm-4"></div>-->
<!--                </div>-->
            </div>
        </div>';}
        ?>
    </div>
</div>
