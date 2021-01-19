<?php
use frontend\models\Cars;  
use yii\helpers\Html;
use frontend\assets\your_carsAsset;
your_carsAsset::register($this);
use frontend\assets\display_carsAsset;
use frontend\controllers\SiteController;

display_carsAsset::register($this);
?>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
<?php
    $my_cars = Cars::find()->where(["user"=>Yii::$app->user->identity->username])->all();

    foreach($my_cars as $car){
        echo 
        '
            <div class="car">
                        <div class="main-heading"><h2 style="margin-left: 2%; padding-top: 15px; display:inline-block">'?><?php echo $car->car_company . " " . $car->model;?><?='</h2><div style="cursor: pointer;float: right;width:33px;height:33px;padding-top:15px"><a onclick=delete_car('?><?=$car->id?><?=') style="color:black;">x</a></div></div>
                        <div class="picture"></div>
                        <div class="cars_content">
                            <div class="row" style="margin: 0">
                                <div class="col-sm-3">
                                    <h2 style="margin-block-start: 0!important;margin: 0!important;height: 40px">'?><?= $car->price ?><?='</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>Engine power (kW): <span>'?><?= $car->engine_power ?><?='</span></p></div>
                                <div class="col-sm-4" style="border-bottom: 1px solid grey; margin-right: 2%"><p>Number of doors: <span>'?><?= $car->dors ?><?='</span></p></div>
                                <div class="col-sm-4" style="border-bottom: 1px solid grey"><p>Gearing type: <span>'?><?= $car->gearing_type ?><?='</span></p></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4" style="margin-right: 2%"><p>Fuel type: <span>'?><?= $car->fuel_type ?><?='</span></p></div>
                                <div class="col-sm-4" style="margin-right: 2%"><p>Number of seats: <span>'?><?= $car->seats ?><?='</span></p></div>
                                <div class="col-sm-4"><p>First registration: <span>'?><?= $car->year?><?='</span></p></div>
                            </div>
                            <div class="row" style="margin-top:15px">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8"><a href="/sola-avto-stran/yii-appli/frontend/web/index.php?r=site%2Fchange_car_info&id='?><?=$car->id?><?='" class="path_to_changeinfo">'?><?="Change car's information</a></div>
                                <div class'col-sm-2'></div>
                            </div>
                        </div>
            </div>";
    }
?>
<div class="alert" style="display: none;"></div>