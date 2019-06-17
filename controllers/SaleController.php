<?php

namespace app\controllers;

use Yii;
use app\models;
use \yii\data\ActiveDataProvider;
use \yii\web\Controller;
use \yii\web\NotFoundHttpException;
use \yii\filters\VerbFilter;
use \yii\helpers\ArrayHelper;

/**
 * SaleController implements the CRUD actions for Sale model.
 */
class SaleController extends Controller
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
     * Lists all Sale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => models\Sale::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sale model.
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
     * Creates a new Sale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new models\Sale();
        // $model->populateRelation('taskUser', new models\TaskUser());
        $modelUsers = models\User::find()->all();
        $modelPartners = models\Partner::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Продажа создана успешно');

            return $this->redirect(['view', 'id' => $model->id]);
        }

        var_dump($model->getErrors());

        return $this->render('create', [
            'model' => $model,
            'modelUsers' => ArrayHelper::map($modelUsers, 'id', function ($model) { return $model->getFullName(); }),
            'modelPartners' => ArrayHelper::map($modelPartners, 'id', function ($model) { return $model->getFullName(); }),
        ]);
    }

    /**
     * Updates an existing Sale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUsers = models\User::find()->all();
        $modelPartners = models\Partner::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelUsers' => ArrayHelper::map($modelUsers, 'id', function ($model) { return $model->getFullName(); }),
            'modelPartners' => ArrayHelper::map($modelPartners, 'id', function ($model) { return $model->getFullName(); }),
        ]);
    }

    /**
     * Deletes an existing Sale model.
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
     * Finds the Sale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = models\Sale::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
