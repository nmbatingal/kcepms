<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPurchaseRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-purchase-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pr_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'div_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_date')->textInput() ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requested_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_encoded')->textInput() ?>

    <?= $form->field($model, 'place')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'responsible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prov_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brgy_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'encoded_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
