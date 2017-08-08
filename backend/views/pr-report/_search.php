<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pr-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pr_id') ?>

    <?= $form->field($model, 'pr_no') ?>

    <?= $form->field($model, 'tracker_id') ?>

    <?= $form->field($model, 'purpose') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'total_pr_amount') ?>

    <?php // echo $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'noted_by') ?>

    <?php // echo $form->field($model, 'reviewed_by') ?>

    <?php // echo $form->field($model, 'approved_by') ?>

    <?php // echo $form->field($model, 'encoder') ?>

    <?php // echo $form->field($model, 'pr_type') ?>

    <?php // echo $form->field($model, 'ppmp_mode') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
