<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model Cars */

use frontend\models\Cars;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\IndexAsset;
IndexAsset::register($this);

$this->title = 'Najem avtomobilov';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="wrapping">
    <div class="row">
        <?php Pjax::begin(['id' => 'second_form_pjax'])?>
        <div class="col-sm-6">
            <?php
            $models = ["Audi"=>["A1"=>"A1","A2"=>"A2","A3"=>"A3","A4"=>"A4","A5"=>"A5","A6"=>"A6","A7"=>"A7","A8"=>"A8"],"BMW"=>["Serija1"=>"Serija1","Serija2"=>"Serija2","Serija3"=>"Serija3"]];
            $car_com ="Audi";
            if(isset($_GET["name"])) {
                $car_com= $_GET["name"];
            }
            ?>
            <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"],["class"=>"form-control company","selected",'style'=>'border:0; border-bottom:1px solid black; border-radius:0;'])->label('')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->dropDownList($models[$car_com],['style'=>'border:0; border-bottom:1px solid black; border-radius:0;']) ?>
            <script type="text/javascript">changediv(<?php echo(json_encode($car_com))?>);</script>
        </div>
        <?php Pjax::end() ?>
    </div>
    <?php
    $years=["First_registration"=>"First registration"];
    for($a=0;$a<121;$a++){
        $years[2020-$a]=2020-$a;

    }
    ?>
    <div class="row">
        <div class="col-sm-6" >
            <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->dropDownList($years) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'price',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Price_to"=>"Price to","€500"=>"€500","€1000"=>"€1000","€1500"=>"€1500","€2000"=>"€2000","€2500"=>"€2500","€3000"=>"€3000","€4000"=>"€4000","€5000"=>"€5000","€6000"=>"€6000","€7000"=>"€7000","€8000"=>"€8000","€9000"=>"€9000","€10000"=>"€10000","€125000"=>"€12500","€15000"=>"€15000","€17500"=>"€17500","€17500"=>"€17500","€20000"=>"€20000","€25000"=>"€25000","€30000"=>"€30000","€40000"=>"€40000","€50000"=>"€50000","€75000"=>"€75000","€100000"=>"€100000"]) ?>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="form-group col-lg-12">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button', "style"=>"background-color:#78B0B7; border:0; width:100%; border-radius:0; line-height:35px;"]) ?>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function changediv(c){$('.company option[value='+c+']').replaceWith('<option value='+c+' selected>'+c+'</option>')}
</script>
