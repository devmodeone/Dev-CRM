<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = 'Моя компания';
$this->params['breadcrumbs'][] = $this->title;

$models = $dataProvider->getModels();

?>

<div class="user-index">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h5>Список сотрудников</h5></div>
                <div class="row card-block">
                    <div class="col-md-12">

                        <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group">
                                <?php if (!empty($models)): ?>
                                    <?= Html::a('<i class="icofont icofont-ui-add"></i>&nbsp;Нанять', ['create'], ['class' => 'btn btn-primary btn-md waves-effect waves-light']) ?>
                                <?php endif ?>
                            </div>
                        </div>

                        <ul class="list-view">
                            <?php if (empty($models)): ?>

                                <li>
                                    <div class="alert alert-info border-info d-flex justify-content-between align-items-center">
                                        <strong>Увас пока еще нет сотрудников!</strong>&nbsp;<?= Html::a('<i class="icofont icofont-user-alt-3"></i>&nbsp;Нанять?', ['create'], ['class' => 'btn btn-out-dashed btn-primary btn-square']) ?>
                                    </div>
                                </li>

                            <?php endif; ?>

                            <?php foreach ($models as $model): ?>

                                <li>
                                    <div class="card list-view-media">
                                        <div class="card-block">
                                            <div class="media">

                                                <a href="<?= Url::toRoute(['view', 'id' => $model->id]) ?>"
                                                    class="media-left"
                                                    title="<?= Html::encode($model->getFullName()) ?>">
                                                    <img class="media-object card-list-img" src="http://via.placeholder.com/100" alt="Generic placeholder image">
                                                </a>

                                                <div class="media-body">
                                                    <div class="col-xs-12">
                                                        <h6 class="d-inline-block">
                                                            <a href="<?= Url::toRoute(['view', 'id' => $model->id]) ?>"
                                                                title="<?= Html::encode($model->getFullName()) ?>">
                                                                <?= Html::encode($model->getFullName()) ?>
                                                            </a>
                                                        </h6>
                                                        <!-- <label class="label label-info">Agent</label> -->
                                                    </div>
                                                    <div class="f-13 text-muted m-b-15">#Отдел#</div>
                                                    <p><?= Html::encode($model->profile->about) ?></p>
                                                    <!-- <div class="m-t-15">
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-facebook btn-mini waves-effect waves-light" data-original-title="Facebook">
                                                            <span class="icofont icofont-social-facebook"></span>
                                                        </button>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-twitter btn-mini waves-effect waves-light" data-original-title="Twitter">
                                                            <span class="icofont icofont-social-twitter"></span>
                                                        </button>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-linkedin btn-mini waves-effect waves-light" data-original-title="Linkedin">
                                                            <span class="icofont icofont-brand-linkedin"></span>
                                                        </button>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-dribbble btn-mini waves-effect waves-light" data-original-title="Drible">
                                                            <span class="icofont icofont-social-dribble"></span>
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
