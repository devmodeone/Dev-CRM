<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = 'Изменить отчет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="report-update">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные отчета: <?= Html::encode($model->reportType->name) ?></h5></div>
                <div class="row card-block">
                    <div class="col-md-12">
                        <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group">
                                <?= Html::a('<i class="icofont icofont-eye-alt"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-md waves-effect waves-light']) ?>
                            </div>
                        </div>

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
