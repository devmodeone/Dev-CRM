<?php
namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models;

class Login extends Model
{
    public $username;
    public $password;
    public $remember = true;
    public $expires = 3600 * 24 * 30;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['remember', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'remember' => 'Запомнить меня',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверные логин или пароль.');
            }
        }
    }

    public function login()
    {
        if (!$this->remember) {
            $this->expires = 0;
        }

        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->expires);
        }

        return false;
    }

    protected function getUser()
    {
        return models\Identity::findByUsername($this->username);
    }
}
