<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

class update_profil_username extends Model
{
    public $username;
    public $username_update;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [["username","username_update"],"string"],
            [["username","username_update"],"required",'message'=>'{attribute} is required']
        ];
    }

    public function check_if_in_db(){
        $user = User::findOne(["username"=>$this->username_update]);
        //with this method we check if this method is already in databese
        if($user==null){
            return true;
        }else{
            $this->addError("username_update",'This username is already in use.');
            return false;
        }
    }

}