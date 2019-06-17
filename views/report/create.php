<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = 'Создать отчет';
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные нового отчета</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
