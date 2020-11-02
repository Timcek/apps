<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html; 
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"]) ?>

                <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:15px"]) ?>
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