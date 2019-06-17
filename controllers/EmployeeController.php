<?php

namespace app\controllers;

use Yii;
use app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for User model.
 */
class EmployeeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => models\User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new models\User();
        $model->populateRelation('profile', new models\Profile());
        $modelProfile = $model->profile;
        $modelPassword = new models\forms\Password(['scenario' => models\forms\Password::SCENARIO_CREATE]);

        if ($model->load(Yii::$app->request->post())
            && $modelProfile->load(Yii::$app->request->post())
            && $modelPassword->load(Yii::$app->request->post())
        ) {
            if (!empty($modelPassword->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($modelPassword->password);
            }

            $model->username = $model->email;

            $identity = new models\Identity();
            $identity->generateAuthKey();

            $model->auth_key = $identity->auth_key;

            if (Model::validateMultiple([$model, $modelProfile, $modelPassword])) {
                if ($model->save()) {
                    $modelProfile->user_id = $model->id;

                    if ($modelProfile->save()) {
                        Yii::$app->session->setFlash('success', 'Данные сотрудника сохранены успешно');

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'passwordModel' => $modelPassword,
            'modelProfile' => $modelProfile,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelProfile = $model->profile;
        $modelPassword = new models\forms\Password();

        if ($model->load(Yii::$app->request->post())
            && $modelProfile->load(Yii::$app->request->post())
            && $modelPassword->load(Yii::$app->request->post())
        ) {
            if (!empty($modelPassword->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($modelPassword->password);
            }

            if (Model::validateMultiple([$model, $model->profile, $modelPassword])) {
                if ($model->save() && $modelProfile->save()) {
                    Yii::$app->session->setFlash('success', 'Данные сотрудника сохранены успешно');

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'passwordModel' => $modelPassword,
            'modelProfile' => $modelProfile,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = models\User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
