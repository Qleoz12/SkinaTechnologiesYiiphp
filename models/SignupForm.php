<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $pass;
    public $pass_reapeat;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 8, 'max' => 32],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function  signup()
    {
        $user= new User();
        $user->nombre_usuario = $this->username;
        $user->pass= \Yii::$app->security->generatePasswordHash($this->pass);
        $user->access_token=\Yii::$app->security->generateRandomString();
        $user->rol=1;
        $user->estado=1;
        $user->auth_key=\Yii::$app->security->generateRandomString();

        if($user->save()){
            return true;
        }
        \Yii::error("no se pudo guardar el usuario ".VarDumper::dumpAsString($user->errors));
        return false;
    }

}