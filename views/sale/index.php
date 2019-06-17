<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Срздать продажу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'status',
                'value' => function ($model) { return $model::getStatuses()[$model->status]; }
            ],
            'created_at:date',
            'start_at:date',
            'end_at:date',
            'close_at:date',
            'number',
            'company',
            'partner_id',
            'budget',
            'spend',

            ['class' => 'app\widgets\grid\ActionColumn'],
        ],
    ]); ?>


</div>
