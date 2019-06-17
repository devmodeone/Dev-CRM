<?php

use \yii\helpers\Html;
use \yii\bootstrap4\ActiveForm;
use \yii\helpers\ArrayHelper;

$formatter = \Yii::$app->formatter;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-form">

    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
    ]); ?>

        <div class="tab-content card-block">
            <div class="tab-pane active" id="task" role="tabpanel">

            <?= $form->field($model, 'status', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('status')],
            ])->dropDownList([
                $model::STATUS_START => $model::getStatuses()[$model::STATUS_START],
                $model::STATUS_FINISH => $model::getStatuses()[$model::STATUS_FINISH],
            ], ['prompt' => 'Установите статус продажи']) ?>

            <?= $form->field($model, 'name', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('name')],
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'number', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('number')],
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'end_at', [
                'template' => '{label}
                {beginWrapper}
                    {input}<span class="input-group-addon"><span class="icofont icofont-ui-calendar"></span></span>
                {endWrapper}
                {error}{hint}',
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'input-group col-sm-8 col-lg-10 date', 'data' => ['provide' => 'datepicker']],
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('end_at'),
                    'class' => 'form-control',
                    'value' => $formatter->asDate($model->end_at, 'php:d.m.Y'),
                ],
                'enableClientValidation' => false,
            ]) ?>

            <?= $form->field($model, 'company', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('company')],
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'partner_id', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('partner_id')],
            ])->dropDownList($modelPartners, ['prompt' => 'Выберите клиента']) ?>

            <?= $form->field($model, 'budget', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('budget')],
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'spend', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => $model->getAttributeLabel('spend')],
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'saleUsers', [
                'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                'wrapperOptions' => ['class' => 'col-sm-8 col-lg-10'],
                'inputOptions' => ['placeholder' => ''],
            ])->dropDownList($modelUsers, ['multiple' => true])
            ->label('Исполнители') ?>

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

<? /*
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'start_at')->textInput() ?>

    <?= $form->field($model, 'end_at')->textInput() ?>

    <?= $form->field($model, 'close_at')->textInput() ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partner_id')->textInput() ?>

    <?= $form->field($model, 'budget')->textInput() ?>

    <?= $form->field($model, 'spend')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
*/ ?>
</div>
