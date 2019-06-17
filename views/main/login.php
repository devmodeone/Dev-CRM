<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\forms\LoginForm */
/* @var $form ActiveForm */

$this->context->layout = 'simple';

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-login">
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <?php $form = ActiveForm::begin([
                        // 'enableClientValidation' => false,
                        'options' => [
                            'class' => 'md-float-material form-material',
                        ],
                    ]); ?>

                        <div class="text-center">
                            <img src="/favicon-96x96.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center"><?= $this->title ?></h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">

                                    <?= $form->field($model, 'username', [
                                        'enableLabel' => false,
                                        'inputOptions' => [
                                            'placeholder' => $model->getAttributeLabel('username'),
                                        ],
                                    ])->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password', [
                                        'enableLabel' => false,
                                        'inputOptions' => [
                                            'placeholder' => $model->getAttributeLabel('password'),
                                        ],
                                    ])->passwordInput() ?>

                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <?= Html::activeCheckbox($model, 'remember', [
                                                        'template' => '{input}',
                                                        'label' => false,
                                                    ]) ?>
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse"><?= $model->getAttributeLabel('remember') ?></span>
                                                </label>
                                            </div>
<!--
                                            <div class="forgot-phone text-right f-right">
                                                <a href="auth-reset-password.htm" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
-->

                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">

                                            <?= Html::submitButton($this->title, [
                                                'class' => 'btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20',
                                                'name' => 'login-button'
                                            ]) ?>

                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">&copy; Effect24 CRM</p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="/favicon-32x32.png" alt="small-logo.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </section>
</div><!-- site-login -->
