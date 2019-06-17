<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $user = new models\Identity();
        $user->setPassword('iddqdidkfa');
        $user->username = 'admin';
        $user->email = 'admin@admin.ru';
        $user->status = models\Identity::STATUS_ACTIVE;
        $user->generateAuthKey();
        $user->save();

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->assign($admin, 1);
    }
}
