<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\assets\Add_cars;
Add_cars::register($this);
use yii\widgets\Pjax;
?>


<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link  href="/sola-avto-stran/yii-appli/frontend/web/css/croppie.css" rel="stylesheet">
<script src="/sola-avto-stran/yii-appli/frontend/web/js/croppie.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="sceleton">
    <h1 style="border-bottom: 1px solid grey; margin-top:0; margin-bottom: 30px">Add a car</h1>
    <div class="small-sceleton">
        <div class="names">
            <h4 style="margin-bottom: 106px">Brand & model</h4>
        </div>
        <div class="all_forms">
            <?= $form->field($model, 'car_company',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["Audi"=>"Audi","BMW"=>"BMW","Mercedes-benz"=>"Mercedes-benz"]) ?>
            <?= $form->field($model, 'model',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["50"=>"50","60"=>"60","80"=>"80","90"=>"90","100"=>"100","200"=>"200","A1"=>"A1","A2"=>"A2","A3"=>"A3","A4"=>"A4","A4 Allroad"=>"A4 Allroad","A5"=>"A5","A6"=>"A6","A6 Allroad"=>"A6 Allroad","A7"=>"A7","A8"=>"A8","Co"=>"Coupe","Cabriolet"=>"Cabriolet","E-Tron"=>"E-Tron","Q1"=>"Q1","Q2"=>"Q2","Q3"=>"Q3","Q5"=>"Q5","Q7"=>"Q7","Q8"=>"Q8","R8"=>"R8","RS2"=>"RS2","RS3"=>"RS3","RS4"=>"RS4","RS5"=>"RS5","RS6"=>"RS6","RS7"=>"RS7","RS Q3"=>"RS Q3","RS Q5"=>"RS Q5","RS Q8"=>"RS Q8","S1"=>"S1","S2"=>"S2","S3"=>"S3","S4"=>"S4","S5"=>"S5","S6"=>"S6","S7"=>"S7","S8"=>"S8","SQ2"=>"SQ2","SQ5"=>"SQ5","SQ7"=>"SQ7","SQ8"=>"SQ8","TT"=>"TT","V8"=>"V8"])->error(["style"=>"margin-left:15px; color:grey"]) ?>
        </div>
    </div>
    <div class="small-sceleton">
        <div class="names">
            <h4 style="margin-bottom: 114px">Year & price (per day)</h4>
        </div>
        <div class="all_forms">
            <?= $form->field($model, 'year',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey"])->input('text', ['placeholder' => "Year"]) ?>
            <?= $form->field($model, 'price',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:30px"])->input('text', ['placeholder' => "Price"]) ?>
        </div>
    </div>
    <div class="small-sceleton">
        <div class="names">
            <h4 style="margin-bottom: 163px">Engine power (kW), dors & seats</h4>
        </div>
        <div class="all_forms">
            <?= $form->field($model, 'engine_power',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey"])->input('text', ['placeholder' => "Engine power"]) ?>
            <?= $form->field($model, 'dors',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey"])->input('text', ['placeholder' => "Dors"]) ?>
            <?= $form->field($model, 'seats',['template'=>"{input}\n{hint}\n{error}"])->error(["style"=>"margin-left:15px; color:grey; padding-bottom:30px"])->input('text', ['placeholder' => "Seats"]) ?>
        </div>
    </div>
    <div class="small-sceleton">
        <div class="names">
            <h4 style="margin-bottom: 150px">Transmission & fuel type</h4>
        </div>
        <div class="all_forms">
            <?= $form->field($model, 'gearing_type',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["manual"=>"Manual","automatic"=>"Automatic"]) ?>
            <?= $form->field($model, 'fuel_type',['template'=>"{input}\n{hint}\n{error}"])->dropDownList(["diesel"=>"Diesel","gasoline"=>"Gasoline"],["style"=>"margin-bottom:30px"]) ?>
        </div>
    </div>
    <div class="small-sceleton">
        <div class="names">
            <h4 style="margin-bottom: 25px">Car's image</h4>
            <button style="display:block;width:120px; height:30px;" onclick="document.getElementById('cover_image').click()" id="image_selection"><?php if(isset($_SESSION["select_change"])){echo "Change image";}else{echo "Select image";}?></button>
            <input type='file' accept="image/*" id="cover_image" style="display:none">
        </div>
                <div class="all_forms">
                                    <?php Pjax::begin(['id'=>'id-pjax']); ?>
                                        <?php 
                                        if(isset($_SESSION["temp_photo_loc"])){
                                            echo '<img id="uploaded-image" src="/sola-avto-stran/yii-appli/frontend/web/assets/temp/'?><?=$_SESSION["temp_photo_loc"]?><?='.png" height="400px" width="400px" style="box-shadow: 3px 3px 5px 6px #ccc; margin: 0 auto 0 auto;">';
                                        }?> 
                                    <?php Pjax::end(); ?>

                    <!-- This is the modal -->
                    <div class="modal" tabindex="-1" role="dialog" id="uploadimageModal">
                        <div class="modal-dialog" role="document" style="min-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div id="image_demo"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary crop_image">Crop and Save</button>
                                    <button type="button" class="btn btn-secondary close-btn" >Close</button>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
        <div style="text-align: center; margin-top:25px;padding-top: 10px; border-top: 1px solid black">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary submitting-btn', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>        

    <script>
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 400,
                height: 400,
                type:'square'
            },
            boundary:{
                width: 650,
                height: 650
            }
        });
        
        $(".close-btn").click(function(){
          $('#uploadimageModal').modal('hide');
        })

        $('#cover_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                image_crop.croppie('bind', {
                    url: event.target.result,
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            var formData = new FormData();
            image_crop.croppie('result', {type: 'blob', format: 'png'}).then(function(blob) {
                formData.append('cropped_image', blob);
                ajaxFormPost(formData); /// Calling my ajax function with my blob data passed to it
            });
            debugger
            $('#uploadimageModal').modal('hide');
        });

        function ajaxFormPost(formData){
            $.ajax("/sola-avto-stran/yii-appli/frontend/web/index.php?r=site%2Fadd_cars&photo=true",{
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (){
                       console.log("upload succes");
                   },
                error: function (){
                    console.log("upload error");
                }
            });
            debugger
            $.pjax.reload({container: '#id-pjax'});
        }
    </script>