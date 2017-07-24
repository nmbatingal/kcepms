<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPurchaseRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-purchase-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pr_no') ?>

    <?= $form->field($model, 'doc_type_id') ?>

    <?= $form->field($model, 'div_id') ?>

    <?= $form->field($model, 'unit_id') ?>

    <?= $form->field($model, 'doc_date') ?>

    <?php // echo $form->field($model, 'purpose') ?>

    <?php // echo $form->field($model, 'tot_amount') ?>

    <?php // echo $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'date_encoded') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'responsible') ?>

    <?php // echo $form->field($model, 'prov_code') ?>

    <?php // echo $form->field($model, 'city_code') ?>

    <?php // echo $form->field($model, 'brgy_code') ?>

    <?php // echo $form->field($model, 'encoded_by') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
