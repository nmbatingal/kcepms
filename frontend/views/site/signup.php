<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .register-box {
        width: 800px;
    }
</style>

<?php
    $email = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => "{input}<span class='fa fa-envelope form-control-feedback'></span>"
    ];
    $cog = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => "{input}<span class='fa fa-cog form-control-feedback'></span>"
    ];
    $password = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
    ];
?>

<div class="register-box">

    <div class="register-box-body bg-shadow">

        <p class="login-box-msg">Please fill out the following fields to signup:</p>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'username')->hiddenInput(['id' => 'username'])->label(false) ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'firstname')->textInput(['id' => 'fname', 'autofocus' => true, 'placeholder' => 'First name', 'class' => 'form-control input_username'])->label(false) ?>
                <?= $form->field($model, 'mi')->textInput(['id' => 'mi', 'placeholder' => 'Middle name', 'class' => 'form-control input_username'])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lastname')->textInput(['id' => 'lname', 'placeholder' => 'Last name', 'class' => 'form-control input_username'])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'position_abr', $cog)->textInput(['autofocus' => true, 'placeholder' => 'Position'])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email', $email)->textInput(['placeholder' => 'Email'])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'password', $password)->passwordInput(['placeholder' => 'Password'])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'password_repeat', $password)->passwordInput(['placeholder' => 'Repeat password'])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            </div>

            <div class="col-md-6">
                <div class="social-auth-links text-center">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'signup-button']) ?>
                    <?= Html::a('Back', ['login'], ['class' => 'btn btn-block btn-flat btn-default']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>

<?php
    $js ="

        $(document).on('change', '.input_username', function(event, jqXHR, settings) {

            var fname = $('input#fname').val();
            var mi = $('input#mi').val();
            var lname = $('input#lname').val();

            var username_string = fname.charAt(0) + mi.charAt(0) + lname;

            $('input#username').val(username_string.toLowerCase());
            
        });    
    ";

    $this->registerJs($js, $this::POS_END);
?>