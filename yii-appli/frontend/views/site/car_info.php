<?php 
/* @var $model Cars */


use frontend\models\Cars;
use frontend\models\BookingHistory;
use frontend\assets\car_infoAsset;
car_infoAsset::register($this);

?>
<div style="width:80%; height:300px; background-color: #faf5f5; margin: 0 auto">
    <div style="width: 45%; height:300px; background-color:red; display: inline-block"></div>
    <div style="width: 45%; float: right">
    <?php $informations_of_car = Cars::findOne(["id"=>$_GET["id"]])?>
        <h2 style="text-align:center"><?= $informations_of_car->car_company?> <?= $informations_of_car->model?></h2>
        <h5>year: <?= $informations_of_car->year?></h5>
        <h5>price: <?= $informations_of_car->price?></h5>
        <h5>engine_power: <?= $informations_of_car->engine_power?>kW</h5>
        <h5>doors: <?= $informations_of_car->dors?></h5>
        <h5>seats: <?= $informations_of_car->seats?></h5>
        <h5>gearing type: <?= $informations_of_car->gearing_type?></h5>
        <h5>fuel type: <?= $informations_of_car->fuel_type?></h5>
    </div>
</div>
<?php 
if(Yii::$app->user->isGuest){
}else{
echo    
'<div style="width: 80%; margin:50px auto; background-color:#f2f0f0">
    <div class="row">
        <div class="col-sm-4">Booking date</div>
        <div class="col-sm-4">How long</div>
        <div class="col-sm-4">User who rented it</div>
    </div>'?>
    <?php 
    $history=BookingHistory::findAll(["id"=>$_GET["id"]]);
    foreach($history as $hist_car){
        echo 
        '<div class="row">
            <div class="col-sm-4">'?><?=$hist_car->booking_date?><?='</div>
            <div class="col-sm-4">'?><?=$hist_car->booking_time_days?><?=' days</div>
        <div class="col-sm-4">'?><?=$hist_car->user?><?='</div>
        </div>';
    }
    ?>
<?='</div>';}?>