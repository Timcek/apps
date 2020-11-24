<?php 
/* @var $model Cars */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
    if($informations_of_car->Booking=="not_booked"){
        echo 
        '<div style="width: 80%;'?><?php if(isset($_SESSION["error"])){echo 'margin:50px auto 0 auto;';}else{echo ' margin:50px auto;';}?><?='background-color:#f2f0f0">
            <div class="row">'?>
            <?php $form = ActiveForm::begin(['id' => 'form-book']); ?>
                <?='<div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6"><h3 style="margin-left:13px;">Start date</h3></div>
                        <div class="col-sm-6"><h3>End date</h3></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">'?><?= $form->field($model,"booking_date")->input("date",["style"=>"margin-left:13px;"])->label("")->error(["style"=>"margin-left:13px"])?><?='</div>
                        <div class="col-sm-6">'?><?= $form->field($model,"booking_date_until")->input("date")->label("")?><?='</div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-4">'?>
                    <?= Html::submitButton('Book car', ['class' => 'btn btn-primary', 'name' => 'search-button', "style"=>"background-color:#78B0B7; border:0; width:100%; border-radius:0; line-height:35px; margin-top:39px"]) ?>
                <?='</div>'?>
            <?php ActiveForm::end(); ?>
            <?='</div>
        </div>  '?><?php if(isset($_SESSION["error"])){
            echo '<div style="width: 80%; margin:0 auto; background-color:#f2f0f0"><h3 style="background-color:#f22e62; margin-top:0;line-height:40px">'?><?=$_SESSION["error"]?><?='</h3></div>';
            unset($_SESSION["error"]);
        };
    }

    echo    
    '<div style="width: 80%; margin:50px auto; background-color:#f2f0f0">
    <div class="row">
        <div class="col-sm-4">Booking date</div>
        <div class="col-sm-4">Until</div>
        <div class="col-sm-4">User who rented it</div>
    </div>'?>
    <?php 
    $history=BookingHistory::findAll(["car_id"=>$_GET["id"]]);

    foreach($history as $hist_car){
        echo 
        '<div class="row">
            <div class="col-sm-4">'?><?=$hist_car->booking_date?><?='</div>
            <div class="col-sm-4">'?><?=$hist_car->booking_date_until?><?=' days</div>
        <div class="col-sm-4">'?><?=$hist_car->user?><?='</div>
        </div>';
    }
    ?>
<?='</div>';}?>