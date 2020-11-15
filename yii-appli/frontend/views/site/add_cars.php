<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\assets\Add_cars;
Add_cars::register($this);
use yii\widgets\Pjax;
?>



<link  href="/sola-avto-stran/yii-appli/frontend/web/css/croppie.css" rel="stylesheet">
<script src="/sola-avto-stran/yii-appli/frontend/web/js/croppie.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        
    <!--This is for taking picture input form user -->
<div class="row">
    <div class="col-lg-12 col-md-12 text-center">
        <h3>Image Cropper</h3>
    </div>
    <div class="col-lg-12">
        <div class="jumbotron text-center">
            <div class="row">
                <div class="col-lg-12">
                <?php Pjax::begin(['id'=>'id-pjax']); ?>
                    <?php 
                    if(isset($_SESSION["temp_photo_loc"])){
                        echo '<img id="uploaded-image" src="/sola-avto-stran/yii-appli/frontend/web/assets/temp/'?><?=$_SESSION["temp_photo_loc"]?><?='.png" height="300px" width="600px">';
                    }?> 
                <?php Pjax::end(); ?>
                </div>
                <div class="input-group mt-3">
                    <div class="custom-file">
                        <input type="file" accept="image/*" id="cover_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div style="text-align: center">
  <?= Html::submitButton('Add', ['class' => 'btn btn-primary submitting-btn', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>


    <script>
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 600,
                height: 300,
                type:'square'
            },
            boundary:{
                width: 650,
                height: 350
            }
        });
        
        /*$(".close-btn").click(function(){
          debugger
          $('#uploadimageModal').modal('hide');
        })*/

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