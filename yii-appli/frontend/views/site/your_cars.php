<?php
use frontend\models\Cars;  
use yii\helpers\Html;
use frontend\assets\your_carsAsset;
your_carsAsset::register($this);
use frontend\assets\display_carsAsset;
use frontend\controllers\SiteController;

display_carsAsset::register($this);
?>

<?php
    $my_cars = Cars::find()->where(["user"=>Yii::$app->user->identity->username])->all();

    foreach($my_cars as $car){
        echo '<div class="car">
                    <div class="main-heading"><h2 style="margin-left: 2%; padding-top: 15px; display:inline-block">'?><?php echo $car->car_company . " " . $car->model . " " . $car->user;?><?='</h2><div style="float: right;width:33px;height:33px;padding-top:15px"><a onclick=delete_car('?><?=$car->id?><?=')>x</a></div></div>
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
                            <div class="col-sm-4" style="margin-right: 2%"><p>'?><?= $car->fuel_type ?><?='</p></div>
                            <div class="col-sm-4" style="margin-right: 2%"><p>'?><?= $car->seats ?><?='</p></div>
                            <div class="col-sm-4">'?><?= $car->year?><?='</div>
                        </div>
                    </div>
            </div>';
    }
?>
<div class="alert" style="display: none;"></div>
