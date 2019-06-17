<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контрагенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать контрагента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'name',
            'specialization',
            'person',
            //'phone',
            //'email:email',
            //'address',
            //'www',

            ['class' => 'app\widgets\grid\ActionColumn'],
        ],
    ]); ?>


</div>
