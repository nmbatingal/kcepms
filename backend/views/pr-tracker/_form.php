<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pr-tracker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tracker_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tracker_year')->textInput() ?>

    <?= $form->field($model, 'tracker_month')->textInput() ?>

    <?= $form->field($model, 'tracker_seq')->textInput() ?>

    <?= $form->field($model, 'proposal_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tracker_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unit_responsible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsibility_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proponent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'encoder')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
