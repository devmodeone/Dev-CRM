<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Профиль: ' . $model->getFullName();
$this->params['breadcrumbs'][] = 'Моя компания';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullName(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';

?>

<div class="user-update">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные сотрудника: <?= Html::encode($model->getFullName()) ?></h5></div>
                <div class="row card-block">
                    <div class="col-md-12">
                        <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group">
                                <?= Html::a('<i class="icofont icofont-eye-alt"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-md waves-effect waves-light']) ?>
                            </div>
                        </div>

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
