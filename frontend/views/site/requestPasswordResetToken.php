<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


<div class="site-request-password-reset">

    <p>Please fill out your email. A link to reset password will be sent there.</p>
    <div id="modal-reset-password" class="box box-solid">
            
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <div class="box-body">
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        </div>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-success btn-flat pull-right']) ?>
                <?= Html::button('Cancel', ['class' => 'btn btn-default btn-flat pull-right', 'data-dismiss' => 'modal']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <!-- <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div> -->

    </div>

</div>
