<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pr-tracker-form">

    <?php $form = ActiveForm::begin([
        'id' => 'frm-update-tracker',
    ]); ?>

    <?= $form->field($model, 'tracker_year')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tracker_month')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tracker_seq')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tracker_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposal_no')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'tracker_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unit_responsible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proponent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'encoder')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_updated')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <h>

</div>
