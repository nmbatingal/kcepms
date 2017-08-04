<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php
    $fieldOptions2 = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
    ];
?>

<div class="login-box">

    <!-- <div class="login-logo">
        <a href="#"><b>KC</b>ePMS</a>
    </div> -->
    
    <div class="login-box-body bg-shadow">
        <p class="login-box-msg">Please choose your new password</p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password', $fieldOptions2)->passwordInput(['autofocus' => true])->label(false) ?>

        <div class="row">
            <div class="col-xs-4 pull-right">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block btn-flat']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>