<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Нанять';
$this->params['breadcrumbs'][] = 'Моя компания';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные нового сотрудника</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">

                        <?= $this->render('_form', [
                            'model' => $model,
                            'passwordModel' => $passwordModel,
                            'modelProfile' => $modelProfile,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
