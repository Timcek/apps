<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html; 
use frontend\assets\Add_cars;
Add_cars::register($this);
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"]) ?>

                <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["50"=>"50","60"=>"60","80"=>"80","90"=>"90","100"=>"100","200"=>"200","A1"=>"A1","A2"=>"A2","A3"=>"A3","A4"=>"A4","A4 Allroad"=>"A4 Allroad","A5"=>"A5","A6"=>"A6","A6 Allroad"=>"A6 Allroad","A7"=>"A7","A8"=>"A8","Co"=>"Coupe","Cabriolet"=>"Cabriolet","E-Tron"=>"E-Tron","Q1"=>"Q1","Q2"=>"Q2","Q3"=>"Q3","Q5"=>"Q5","Q7"=>"Q7","Q8"=>"Q8","R8"=>"R8","RS2"=>"RS2","RS3"=>"RS3","RS4"=>"RS4","RS5"=>"RS5","RS6"=>"RS6","RS7"=>"RS7","RS Q3"=>"RS Q3","RS Q5"=>"RS Q5","RS Q8"=>"RS Q8","S1"=>"S1","S2"=>"S2","S3"=>"S3","S4"=>"S4","S5"=>"S5","S6"=>"S6","S7"=>"S7","S8"=>"S8","SQ2"=>"SQ2","SQ5"=>"SQ5","SQ7"=>"SQ7","SQ8"=>"SQ8","TT"=>"TT","V8"=>"V8"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"]) ?>
                <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"])->input('text', ['placeholder' => "Year"]) ?>
                <?= $form->field($model, 'price',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"])->input('text', ['placeholder' => "Price"]) ?>
                <?= $form->field($model, 'engine_power',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"])->input('text', ['placeholder' => "Engine power"]) ?>
                <?= $form->field($model, 'dors',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"])->input('text', ['placeholder' => "Dors"]) ?>
                <?= $form->field($model, 'seats',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"])->input('text', ['placeholder' => "Seats"]) ?>
                <?= $form->field($model, 'gearing_type',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["manual"=>"Manual","automatic"=>"Automatic"]) ?>
                <?= $form->field($model, 'fuel_type',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["diesel"=>"Diesel","gasoline"=>"Gasoline"]) ?>
                <div style="text-align: center">
                    <?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
<?php ActiveForm::end(); ?>




