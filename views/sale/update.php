<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */

$this->title = 'Изменить продажу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="sale-update">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные продажи: <?= Html::encode($model->id) ?></h5></div>
                <div class="row card-block">
                    <div class="col-md-12">
                        <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group">
                                <?= Html::a('<i class="icofont icofont-eye-alt"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-md waves-effect waves-light']) ?>
                            </div>
                        </div>

                        <?= $this->render('_form', [
                            'model' => $model,
                            'modelUsers' => $modelUsers,
                            'modelPartners' => $modelPartners,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
