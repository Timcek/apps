<?php
/* @var $this yii\web\View */
/* @var $model Cars */

use yii\helpers\Html;
use frontend\models\Cars;
use yii\bootstrap\ActiveForm;
use frontend\models\car_info;
use frontend\assets\display_carsAsset;
display_carsAsset::register($this);

?>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
<div class="site-display_cars">
    <div class="filtering">
        <?php $form = ActiveForm::begin(['id' => 'filter']); ?>
        <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->textInput(["style"=>"display:none"]) ?>
        <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->textInput(["style"=>"display:none"]) ?>
        <p class="p-filter" style="margin-top: 20px;">Price to</p>
        <?= $form->field($model, 'price',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Price_to"=>"Price to","€500"=>"€500","€1000"=>"€1000","€1500"=>"€1500","€2000"=>"€2000","€2500"=>"€2500","€3000"=>"€3000","€4000"=>"€4000","€5000"=>"€5000","€6000"=>"€6000","€7000"=>"€7000","€8000"=>"€8000","€9000"=>"€9000","€10000"=>"€10000","€125000"=>"€12500","€15000"=>"€15000","€17500"=>"€17500","€17500"=>"€17500","€20000"=>"€20000","€25000"=>"€25000","€30000"=>"€30000","€40000"=>"€40000","€50000"=>"€50000","€75000"=>"€75000","€100000"=>"€100000"]) ?>
        <?php
        $years=["First_registration"=>"First registration"];
        for($a=0;$a<121;$a++){
            $years[2020-$a]=2020-$a;
        }
        ?>
        <p class="p-filter">First registration</p>
        <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->dropDownList($years) ?>
        <p class="p-filter">Gearing type</p>
        <?= $form->field($model, "gearing_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","manual"=>"Manual","automatic"=>"Automatic"])?>
        <p class="p-filter">Dors</p>
        <?= $form->field($model, "dors",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        <p  class="p-filter">Seats</p>
        <?= $form->field($model, "seats",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number"])?>
        <p  class="p-filter">Fuel type</p>
        <?= $form->field($model, "fuel_type",['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["all"=>"All","diesel"=>"Diesel","gasoline"=>"Gasoline"])?>
        <p  class="p-filter">Engine power to (kW):</p>
        <?= $form->field($model, "engine_power",['template'=>"{input}\n{hint}\n{error}"])->textInput(["type"=>"number","style"=>"margin-bottom:30px"])?>
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button',"style"=>"display:block;margin:0 auto 20px auto"]) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="cars">
        <?php
        $all_filtering=["car_company"=>$model->car_company,"model"=>$model->model];
        if($model->price!="Price_to"){
            $price_filtering=["<=","price",$model->price];
        }else{
            $price_filtering=[];
        }
        if($model->year!="First_registration"){
            $all_filtering["year"]=$model->year;
        }
        if($model->gearing_type && $model->gearing_type!="all"){
            $all_filtering["gearing_type"]=$model->gearing_type;
        }
        if($model->dors!=""){
            $all_filtering["dors"]=$model->dors;
        }
        if($model->seats!=""){
            $all_filtering["seats"]=$model->seats;
        }
        if($model->fuel_type && $model->fuel_type!="all"){
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
        if(count($cars)==0){
            echo '<h1>No cars match your filters<h1>';
        }else{
            foreach($cars as $car){echo
                
                '<a href="/sola-avto-stran/yii-appli/frontend/web/index.php?r=site%2Fcar_info&id='?><?=$car->id?><?='"><div class="car">
                    <div class="main-heading"><h2 style="margin-left: 2%; padding-top: 15px">'?><?php echo $car->car_company . " " . $car->model . " <span class='user_span'>(From user: </span>" . $car->user;?><?='<span class="user_span">)</span></h2></div>
                    <div class="picture"></div>
                    <div class="cars_content">
                        <div class="row" style="margin: 0">
                            <div class="col-sm-3">
                                <h2 style="margin-block-start: 0!important;margin: 0!important;height: 40px">'?><?= $car->price ?><?='</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>Engine power: <span>'?><?= $car->engine_power ?><?='</span></p></div>
                            <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>Number of dors: <span>'?><?= $car->dors ?><?='</span></p></div>
                            <div class="col-sm-4" style="border-bottom: 1px solid grey"><p>Gearing type: <span>'?><?= $car->gearing_type ?><?='</span></p></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" style="margin-right: 2%""><p>Fuel type: <span>'?><?= $car->fuel_type ?><?='</span></p></div>
                            <div class="col-sm-4" style="margin-right: 2%""><p>Number of seats: <span>'?><?= $car->seats ?><?='</span></p></div>
                            <div class="col-sm-4"><p>First registration: <span>'?><?= $car->year?><?='</span></p></div>
                        </div>'?>
                        <?php
                        if(Yii::$app->user->isGuest){
                        }else{
                            echo 
                                '<div class="row">
                                    <div class="col-sm-12 booking_message">'?><?php $books_in_history = car_info::find()->where(["car_id"=>$car->id])->andWhere(['<=', 'booking_date', date("Y-m-d")])->andWhere(['>=', 'booking_date', date("Y-m-d")])->all();
                                    if($books_in_history!=null){
                                        echo "<h4 style='line-height:100%'>Currently booked, but you can book it for later</h4>";
                                    }else{
                                        echo "<h4 style='line-height:100%'>Not booked currently</h4>";
                                    }?><?='</div>
                                </div>';
                        }
                        ?>
                <?='</div>
            </div></a>';}
        }?>
    </div>
</div>
