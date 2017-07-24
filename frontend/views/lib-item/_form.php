<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LibItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lib-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_category_id')->textInput() ?>

    <?= $form->field($model, 'generic_id')->textInput() ?>

    <?= $form->field($model, 'subgeneric_id')->textInput() ?>

    <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'uacs_id')->textInput() ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'date_added')->textInput() ?>

    <?= $form->field($model, 'encoder')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
