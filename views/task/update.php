<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = 'Изменить задачу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="task-update">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные задачи: <?= Html::encode($model->name) ?></h5></div>
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
