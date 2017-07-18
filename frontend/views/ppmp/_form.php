<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ppmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppmp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppmp_unit_id')->textInput() ?>

    <?= $form->field($model, 'ppmp_category_id')->textInput() ?>

    <?= $form->field($model, 'size_quantity')->textInput() ?>

    <?= $form->field($model, 'budget')->textInput() ?>

    <?= $form->field($model, 'deduction')->textInput() ?>

    <?= $form->field($model, 'ppmp_mode_id')->textInput() ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'encoder')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
