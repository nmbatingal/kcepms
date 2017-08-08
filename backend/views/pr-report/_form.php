<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PrReport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pr-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pr_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tracker_id')->textInput() ?>

    <?= $form->field($model, 'purpose')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'total_pr_amount')->textInput() ?>

    <?= $form->field($model, 'requested_by')->textInput() ?>

    <?= $form->field($model, 'noted_by')->textInput() ?>

    <?= $form->field($model, 'reviewed_by')->textInput() ?>

    <?= $form->field($model, 'approved_by')->textInput() ?>

    <?= $form->field($model, 'encoder')->textInput() ?>

    <?= $form->field($model, 'pr_type')->textInput() ?>

    <?= $form->field($model, 'ppmp_mode')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
