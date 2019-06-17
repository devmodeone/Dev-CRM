<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */

$this->title = 'Новая продажа';
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные новой задачи</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">

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
