<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
];
?>

<div class="login-box">

    <?php
        foreach (Yii::$app->session->getAllFlashes() as $message) {

            echo Alert::widget();
        }
    ?>

    <div class="login-box-body bg-shadow">
        <p class="login-box-msg">Login to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php /*echo Html::dropDownList('user_select', 1, 
                ['0' => 'User', '1' => 'Admin'], 
                [ 
                    'id'       => 'select-form',
                    'class'    => 'form-control',
                    'onchange' => 'changeUrl(this)',
                ])*/ ?>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <hr>
            <?= Html::button('Login as user', ['class' => 'btn btn-block btn-flat btn-default', 'onclick' => 'changeUrl(this)' ]) ?>
        </div>

    </div>
</div>

<script>
    function changeUrl(thisInput) {
        window.open('/kc-epms/frontend/web/index.php?r=site/login', '_self');
    }
</script>