<?php
namespace app\models\forms;

use Yii;
use app\models;
use \yii\base\Model;

class Password extends Model
{
    public $password;
    public $passwordConfirm;

    const SCENARIO_CREATE = 'create';

    public function rules()
    {
        return [
            [['password', 'passwordConfirm'], 'required', 'on' => self::SCENARIO_CREATE],
            ['password', 'string', 'min' => 6],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Введенные пароли не совпадают.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
            'passwordConfirm' => 'Подтверждение пароля',
        ];
    }
}
