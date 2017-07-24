<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lib-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'item_id') ?>

    <?php // echo $form->field($model, 'item_category_id') ?>

    <?php // echo $form->field($model, 'generic_id') ?>

    <?php // echo $form->field($model, 'subgeneric_id') ?>

    <?= $form->field($model, 'item_description') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'uacs_id') ?>

    <?php // echo $form->field($model, 'barcode') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <?php // echo $form->field($model, 'encoder') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
