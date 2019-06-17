<?php

use yii\helpers\Html;
$formatter = \Yii::$app->formatter;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Html::encode($model->getFullName());
$this->params['breadcrumbs'][] = 'Моя компания';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-view">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Данные сотрудника</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">
                        <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group">
                                <?= Html::a('<i class="icofont icofont-ui-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-md waves-effect waves-light']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xl-6 mt-xl-4 pt-xl-1">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td><?= $this->title ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= $model->getAttributeLabel('email') ?></th>
                                        <td><?= $model->email ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= $model->profile->getAttributeLabel('birth_date') ?></th>
                                        <td><?= $formatter->asDate($model->profile->birth_date) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xl-6 pt-2 pt-xl-0">
                        <div class="sub-title"><?= $model->profile->getAttributeLabel('about') ?></div>
                        <div class="view-desc">
                            <p><?= Html::encode($model->profile->about) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
