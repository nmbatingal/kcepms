<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblLogs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-logs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'encoder')->textInput() ?>

    <?= $form->field($model, 'action')->textInput() ?>

    <?= $form->field($model, 'tbl_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_id')->textInput() ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
