<?php
namespace frontend\controllers;

use frontend\models\Cars;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\update_profil;
use frontend\models\update_profil_username;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\car_info;
use common\models\User;
use frontend\models\Add_new_car;
use frontend\models\TempPhotos;
use frontend\models\BookingHistory;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout ="index";
        $model = new Cars();
        if($model->load(Yii::$app->request->post())){
            //Yii::$app->session->setFlash('success', $model->price." ".$model->year);
            $this->layout="display_cars_layout";
           return $this->render('display_cars',['model' => $model]);
        }

        return $this->render('index',['model' => $model]);
    }
    

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    public function actionAdd_cars(){
        $model = new Add_new_car();

        //ce smo pritisnili Crop and Save mora biti v getu photo: true (settamo jo v URL-ju)
        if(isset($_GET["photo"])){
            //Ko izberemo ali spremenimo sliko pridemo sem notri (zaradi photo)
            $model->setSessionItems();

            //da dobimo ime slike, ki je shranjena v $_FILES
            $croppedImage = $_FILES["cropped_image"];
            $to_be_upload = $croppedImage["tmp_name"];

            $randomString = $model->generateRandomString();
            $model->savingToTemporary($to_be_upload,$randomString);
        }elseif($model->load(Yii::$app->request->post())){
            //ker dobimo samo stevilo iz forma mu dodamo € da podatek nato shranimo s tem znakom
            $model->price="€".$model->price;
            $model->Booking="not_booked";
            $model->user=Yii::$app->user->identity->username;
            //da premestimo sliko iz temporery loc v assets/car_photos
            $model->saveLinkToPhoto();

            $_SESSION["adding"]= "jep";
            $this->refresh();
        }else{
            if(isset($_SESSION['temp_photo_loc'])&& !isset($_SESSION["incomming"])){
                //v to vstopimo, če imamo nastavljeno temp_photo_loc(vendar nismo kliknili na select image(nismo spreminjali temp_photo_loc))
                unset($_SESSION['temp_photo_loc']);
                unset($_SESSION['select_change']);
            }else{
                if(isset($_SESSION["adding"])){
                    //ko smo pritisnili submit, lahko izbrisemo select change and adding(je samo zato da pridemo sem notri)
                    unset($_SESSION["adding"]);
                    unset($_SESSION['select_change']);
                    //unset($_SESSION['tmp_photo_loc']);
                    //poglej ko pridemo sem s sliko
                }elseif(isset($_SESSION["incomming"])){//changing image
                    unset($_SESSION["fist_time"]);
                    //da spremenimo button iz Select image v Change image
                    $_SESSION["select_change"] = "change";
                }else{
                    unset($_SESSION["select_change"]);
                    //tukaj notri pridemo, če v session ni settano adding ali pa temp_photo_loc
                    //da vemo da renderamo prvič
                    $_SESSION["fist_time"]="first";
                }
            }
            
            $model->setDataToModel();

            return $this->render("add_cars", ["model"=>$model]);
        }
    }



//this metod renders all of my cars
    public function actionYour_cars(){
        return $this->render("your_cars");
    }


//and this method deletes a car that we want to delete in your cars
    public function actionDelete_car(){
        $car = Cars::findOne(["id"=>Yii::$app->request->get("param1")]);
        $car->delete();
        $this->redirect(array('site/your_cars'));
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    

    public function actionCar_info(){
        $model = new car_info();
        if($model->load(Yii::$app->request->post())){
            $books_in_history = car_info::find()->where(["and","car_id=".intval($_GET["id"]),["or",['>=', 'booking_date', date("Y-m-d")],['>=', 'booking_date_until', date("Y-m-d")]]])->all();
            if(count($books_in_history)!=0 && $model->booking_date>=date("Y-m-d")&&$model->booking_date<$model->booking_date_until){
                $not_jet=true;
                foreach($books_in_history as $carsh){
                    if($carsh->booking_date>=$model->booking_date&&$carsh->booking_date<=$model->booking_date_until){
                        $_SESSION["error"]="Car is already reserved from ".$carsh->booking_date . " to " .$carsh->booking_date_until;
                        return $this->refresh();
                    }elseif($carsh->booking_date_until>=$model->booking_date&&$carsh->booking_date_until<=$model->booking_date_until){
                        //datum katerega izberemo se začne z datumom ki je med tem datumom in konča z datumom, ki je zunaj $carsh datuma
                        $_SESSION["error"]="Car is already reserved from ".$carsh->booking_date . " to " .$carsh->booking_date_until;
                        return $this->refresh();
                    }elseif($carsh->booking_date<=$model->booking_date&&$carsh->booking_date_until>=$model->booking_date_until){
                        $_SESSION["error"]="Car is already reserved from ".$carsh->booking_date . " to " .$carsh->booking_date_until;
                        return $this->refresh();
                    }else {
                       $not_jet=false;
                    }
                }
                if(!$not_jet){
                    $model->user = Yii::$app->user->identity->username;
                    $model->car_id=$_GET["id"];
                    $model->save();
                    return $this->refresh();
                }
            }else{
                if(!($model->booking_date<$model->booking_date_until)){
                    $_SESSION["error"] = "End date is smaller than Start date.";
                    return $this->refresh();
                }else if($model->booking_date<date("Y-m-d")){
                    $_SESSION["error"] = "Start date is smaller than today's date.";
                    return $this->refresh();
                }else{
                    $model->user = Yii::$app->user->identity->username;
                    $model->car_id=$_GET["id"];
                    $model->save();
                    return $this->refresh();
                }
            }
        }else{
            return $this->render("car_info", ["model"=>$model]);
        }
    }

    public function actionChange_car_info(){
        $model = new Cars();
        $use_this = false;
        if($model->load(Yii::$app->request->post())){
            $temporery_model = Cars::findOne(["id"=>$_GET["id"]]);
            $temporery_model->car_company=$model->car_company;
            $temporery_model->model=$model->model;
            $temporery_model->year=$model->year;
            $temporery_model->price="€".$model->price;
            $temporery_model->gearing_type=$model->gearing_type;
            $temporery_model->dors=$model->dors;
            $temporery_model->seats=$model->seats;
            $temporery_model->fuel_type=$model->fuel_type;
            $temporery_model->engine_power=$model->engine_power;
            $temporery_model->save();
            return $this->refresh();
        }else{
            if(!$use_this){
                $model = Cars::findOne(["id"=>$_GET["id"]]);
                $model->price = intval(explode("€",$model->price)[1]);
                return $this->render("change_car_info",["model"=>$model]);
            }else{
                return $this->render("change_car_info",["model"=>$model]);
            }
        }
    }

    public function actionUpdate_profile(){
        $model = new update_profil();
        $change_username_model = new update_profil_username();
        $reset_password = new PasswordResetRequestForm();
        if($model->load(Yii::$app->request->post())){
            if(Yii::$app->user->identity->email==$model->email){
                if($model->check_if_in_db()){//checks if the new email is already in database (if not, returns true)
                    $user = User::findOne(["email"=>$model->email]);//we find user with old email and replace it
                    $user->email=$model->email_update;
                    $user->save();
                    Yii::$app->session->setFlash('success', 'You have successfully changed your email address.');
                    $model= new update_profil();
                    return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
                }else{
                    return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
                }
            }else{
                $model->addError("email","This is not your current email.");
                $model->check_if_in_db();
                return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
            }
        }elseif($change_username_model->load(Yii::$app->request->post())){
            if(Yii::$app->user->identity->username==$change_username_model->username){
                if($change_username_model->check_if_in_db()){//checks if the new email is already in database (if not, returns true)
                    $user = User::findOne(["username"=>$change_username_model->username]);//we find user with old email and replace it
                    $user->username=$change_username_model->username_update;
                    $user->save();
                    Yii::$app->session->setFlash('success', 'You have successfully changed your username.');
                    $change_username_model= new update_profil_username();
                    return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
                }else{
                    return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
                }
            }else{
                $change_username_model->addError("username","This is not your current username.");
                $change_username_model->check_if_in_db();
                return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
            }
        }else if($reset_password->load(Yii::$app->request->post()) && $reset_password->validate()){
            if ($reset_password->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
                return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
            }
            
        }else{
            return $this->render("update_profile", ["model"=>$model, "model2"=>$change_username_model,"model3"=>$reset_password]);
        }
    }




    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
