<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = 'Создать контрагента';
$this->params['breadcrumbs'][] = ['label' => 'Контрагенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные нового контрагента</h5></div>
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
