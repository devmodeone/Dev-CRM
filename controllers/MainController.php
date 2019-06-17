<?php

namespace app\controllers;

use Yii;
use app\models;

class MainController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $modelTask = models\Task::find()->limit(5)->all();
        $modelSale = models\Sale::find()->limit(5)->all();
        $modelReport = models\Report::find()->limit(5)->all();

        return $this->render('index', [
            'modelTask' => $modelTask,
            'modelSale' => $modelSale,
            'modelReport' => $modelReport,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new models\forms\Login();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return  $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

        // return $this->render('logout');
    }

}
