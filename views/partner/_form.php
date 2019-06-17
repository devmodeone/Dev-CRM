<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">

    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
    ]); ?>

        <div class="card-block">
            <div class="tab-pane active" id="partner" role="tabpanel">


            <?= $form->field($model, 'type')->dropDownList([
                $model::TYPE_CLIENT => $model::getTypes()[$model::TYPE_CLIENT],
                $model::TYPE_CONTRACTOR => $model::getTypes()[$model::TYPE_CONTRACTOR],
            ], ['prompt' => 'Укажите тип контрагента']) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'specialization')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'person')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'www')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

        </div>

    <?php ActiveForm::end(); ?>

</div>
