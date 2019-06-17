<?php

use \yii\helpers\Html;
use \yii\bootstrap4\ActiveForm;
use \yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */

$formatter = \Yii::$app->formatter;
?>

<div class="report-form">

    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
    ]); ?>

        <div class="tab-content card-block">
            <div class="tab-pane active" id="task" role="tabpanel">

                <?php /*= $form->field($model, 'report_type')->textInput()*/ ?>
                <?= $form->field($model, 'report_type')->dropDownList(ArrayHelper::map(app\models\ReportType::find()->all(), 'id', 'name'), ['prompt' => 'Укажите тип отчета']) ?>

                <?php /* = $form->field($model, 'user_id')->textInput() */ ?>

                <?= $form->field($model, 'created_at', [
                    'template' => '{label}
                    {beginWrapper}
                        {input}<span class="input-group-addon"><span class="icofont icofont-ui-calendar"></span></span>
                    {endWrapper}
                    {error}{hint}',
                    'labelOptions' => ['class' => 'col-sm-4 col-lg-2 col-form-label'],
                    'wrapperOptions' => ['class' => 'input-group col-sm-8 col-lg-10 date', 'data' => ['provide' => 'datepicker']],
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('created_at'),
                        'class' => 'form-control',
                        'value' => $formatter->asDate($model->created_at, 'php:d.m.Y'),
                    ],
                    'enableClientValidation' => false,
                ]) ?>

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

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>

            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
