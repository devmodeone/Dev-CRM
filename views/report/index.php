<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отчет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', [
        'model' => $searchModel,
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'report_type',
                'value' => function ($model) { return $model->reportType->name; }
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Сотрудник',
                'value' => function ($model) { return $model->user->getFullName(); }
            ],
            'created_at:datetime',
            'end_at:datetime',
            //'description:ntext',

            ['class' => 'app\widgets\grid\ActionColumn'],
        ],
    ]); ?>


</div>
