<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrTrackerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pr-tracker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pr_tracker_id') ?>

    <?= $form->field($model, 'tracker_no') ?>

    <?= $form->field($model, 'tracker_year') ?>

    <?= $form->field($model, 'tracker_month') ?>

    <?= $form->field($model, 'tracker_seq') ?>

    <?php // echo $form->field($model, 'proposal_no') ?>

    <?php // echo $form->field($model, 'tracker_title') ?>

    <?php // echo $form->field($model, 'unit_responsible') ?>

    <?php // echo $form->field($model, 'responsibility_code') ?>

    <?php // echo $form->field($model, 'proponent') ?>

    <?php // echo $form->field($model, 'encoder') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
