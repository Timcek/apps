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
use common\models\User;
use frontend\models\Add_new_car;

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

        if($model->load(Yii::$app->request->post())){
            $model->price="€".$model->price;
            $model->Booking="not_booked";
            $model->user=Yii::$app->user->identity->username;
            $model->save();
            $model=new Add_new_car();
            return $this->render("add_cars", ["model"=>$model]);
        }else{
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
        return $this->render("car_info");
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
