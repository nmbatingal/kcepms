<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblLogsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-logs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'log_id') ?>

    <?= $form->field($model, 'encoder') ?>

    <?= $form->field($model, 'action') ?>

    <?= $form->field($model, 'tbl_name') ?>

    <?= $form->field($model, 'tbl_col') ?>

    <?php // echo $form->field($model, 'tbl_id') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
