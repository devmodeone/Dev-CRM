<?php
/* @var $this yii\web\View */

use \yii\helpers\Url;
$formatter = \Yii::$app->formatter;

$this->title = 'Effect24 CRM';

?>

<div class="row">
    <div class="col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h5>Последние задачи</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr><th>Название</th><th>Статус</th><th>Дата постановки</th>
                        </thead>
                        <tbody>

                            <?php foreach ($modelTask as $model): ?>

                                <tr>
                                    <td><?= $model->name ?></td>
                                    <td><?= $model->getStatuses()[$model->status] ?></td>
                                    <td><?= $formatter->asDateTime($model->created_at) ?></td>
                                </tr>

                            <?php endforeach ?>

                        </tbody>
                    </table>
                    <div class="text-right m-r-20">
                        <a href="<?= Url::to('task') ?>" class=" b-b-primary text-primary">Полный список</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h5>Последние продажи</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr><th>Название</th><th>Статус</th><th>Дата начала</th>
                        </thead>
                        <tbody>

                            <?php foreach ($modelSale as $model): ?>

                                <tr>
                                    <td><?= $model->name ?></td>
                                    <td><?= $model->getStatuses()[$model->status] ?></td>
                                    <td><?= $formatter->asDateTime($model->created_at) ?></td>
                                </tr>

                            <?php endforeach ?>

                        </tbody>
                    </table>
                    <div class="text-right m-r-20">
                        <a href="<?= Url::to('sale') ?>" class=" b-b-primary text-primary">Полный список</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h5>Последние отчеты</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr><th>Тип</th><th>Исполнитель</th><th>Дата отчета</th>
                        </thead>
                        <tbody>

                            <?php foreach ($modelReport as $model): ?>

                                <tr>
                                    <td><?= $model->reportType->name ?></td>
                                    <td><?= $model->user->getFullName() ?></td>
                                    <td><?= $formatter->asDateTime($model->created_at) ?></td>
                                </tr>

                            <?php endforeach ?>

                        </tbody>
                    </table>
                    <div class="text-right m-r-20">
                        <a href="<?= Url::to('task') ?>" class=" b-b-primary text-primary">Полный список</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
