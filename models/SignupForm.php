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
            [['username', 'pass', 'pass_repeat'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            [['pass', 'pass_repeat'], 'string', 'min' => 8, 'max' => 32],
            [['pass_repeat'], 'compare', 'compareAttribute' => 'pass']
        ];
    }

    public function  signup()
    {
        $user= new User();
        $user->nombre_usuario = $this->username;
        $user->pass= $this->pass;
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