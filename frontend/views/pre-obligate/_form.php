<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PreObligate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pre-obligate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fund_source_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purpose')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'obligate_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amt_release')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alobs_yr')->textInput() ?>

    <?= $form->field($model, 'alobs_month')->textInput() ?>

    <?= $form->field($model, 'alobs_seq')->textInput() ?>

    <?= $form->field($model, 'alobs_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alobs_date')->textInput() ?>

    <?= $form->field($model, 'accountable')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
