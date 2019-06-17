<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = 'Создать задачу';
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные новой задачи</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">

                        <?= $this->render('_form', [
                            'model' => $model,
                            'modelUsers' => $modelUsers,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
