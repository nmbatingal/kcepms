<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PreObligateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pre-obligate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'obligate_id') ?>

    <?= $form->field($model, 'fund_source_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'purpose') ?>

    <?= $form->field($model, 'obligate_amount') ?>

    <?php // echo $form->field($model, 'amt_release') ?>

    <?php // echo $form->field($model, 'alobs_yr') ?>

    <?php // echo $form->field($model, 'alobs_month') ?>

    <?php // echo $form->field($model, 'alobs_seq') ?>

    <?php // echo $form->field($model, 'alobs_no') ?>

    <?php // echo $form->field($model, 'alobs_date') ?>

    <?php // echo $form->field($model, 'accountable') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
