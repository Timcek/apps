<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

class update_profil extends Model
{
    public $email;
    public $email_update;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [["email","email_update"],"email"],
            [["email","email_update"],"required",'message'=>'{attribute} is required'],
            [["email_update"],"check_if_in_db"]
        ];
    }

    public function check_if_in_db(){
        $user = User::findOne(["email"=>$this->email_update]);
        //with this method we check if this method is already in databese
        if($user==null){
            return true;
        }else{
            $this->addError("email_update",'This email is already in use.');
            return false;
        }
    }
}