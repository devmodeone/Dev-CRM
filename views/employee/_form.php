<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
$formatter = \Yii::$app->formatter;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
    ]); ?>

        <ul class="nav nav-tabs md-tabs tab-icon" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#employee" role="tab"><i class="icofont icofont-ui-user"></i>Данные сотрудника</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icofont icofont-ui-settings"></i>Настройки</a>
                <div class="slide"></div>
            </li>
        </ul>
        <div class="tab-content card-block">
            <div class="tab-pane active" id="employee" role="tabpanel">

                <?= $form->field($model, 'status', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => ['placeholder' => $model->getAttributeLabel('status')],
                ])->dropDownList($model->getStatuses()) ?>

                <div class="form-group row">
                    <div class="accordion col" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="user-password">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#user-password-tab" aria-expanded="true" aria-controls="user-password-tab">
                                    <?php if ($model->isNewRecord): ?>

                                        <i class="icofont icofont-ui-lock"></i>&nbsp;Задать пароль

                                    <?php else: ?>

                                        <i class="icofont icofont-ui-lock"></i>&nbsp;Изменить пароль

                                    <?php endif ?>
                                </a>
                            </h3>
                            </div>
                            <div id="user-password-tab"
                                class="panel-collapse collapse in <?php if ($model->isNewRecord || $passwordModel->hasErrors()): ?>show<?php endif ?>"
                                role="tabpanel"
                                aria-labelledby="user-password"
                            >
                                <div class="accordion-content z-depth-bottom-0 px-3 pt-3 pb-1">

                                    <?= $form->field($passwordModel, 'password', [
                                        'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                                        'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                                        'inputOptions' => ['placeholder' => $passwordModel->getAttributeLabel('password')],
                                    ])->passwordInput() ?>

                                    <?= $form->field($passwordModel, 'passwordConfirm', [
                                        'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                                        'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                                        'inputOptions' => ['placeholder' => $passwordModel->getAttributeLabel('passwordConfirm')],
                                    ])->passwordInput() ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $form->field($model, 'email', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => ['placeholder' => $model->getAttributeLabel('email')],
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($modelProfile, 'lastname', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => ['placeholder' => $modelProfile->getAttributeLabel('lastname')],
                ]) ?>

                <?= $form->field($modelProfile, 'firstname', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => ['placeholder' => $modelProfile->getAttributeLabel('firstname')],
                ]) ?>

                <?= $form->field($modelProfile, 'middlename', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => ['placeholder' => $modelProfile->getAttributeLabel('middlename')],
                ]) ?>

                <?= $form->field($modelProfile, 'birth_date', [
                    'template' => '{label}
                    {beginWrapper}
                        {input}<span class="input-group-addon"><span class="icofont icofont-ui-calendar"></span></span>
                    {endWrapper}
                    {error}{hint}',
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'input-group col-sm-8 col-lg-10 date', 'data' => ['provide' => 'datepicker']],
                    'inputOptions' => [
                        'placeholder' => $modelProfile->getAttributeLabel('birth_date'),
                        'class' => 'form-control',
                        'value' => $formatter->asDate($modelProfile->birth_date, 'php:d.m.Y'),
                    ],
                    'enableClientValidation' => false,
                ]) ?>

                <?= $form->field($modelProfile, 'about', [
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                    'inputOptions' => [
                        'placeholder' => $modelProfile->getAttributeLabel('about'),
                        'maxlength' => 255,
                        'class' => 'form-control max-textarea',
                    ],
                ])->textarea(['rows' => '6']) ?>

            </div>
            <div class="tab-pane" id="settings" role="tabpanel">
                <p class="m-0"></p>
            </div>
        </div>

        <div class="row m-t-30">
            <div class="col-md-12 d-flex justify-content-between">

                <?= Html::a('<i class="icofont icofont-close"></i>&nbsp;Отмена', ['index'], [
                    'class' => 'btn btn-danger btn-md waves-effect waves-light text-center m-b-20'
                ]); ?>

                <?= Html::submitButton('<i class="icofont icofont-check"></i>&nbsp;Сохранить', [
                    'class' => 'btn btn-primary btn-md waves-effect waves-light text-center m-b-20',
                    'name' => 'save-button'
                ]) ?>

            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
