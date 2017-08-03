<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use common\models\PpmpCategory;
use common\models\PpmpMode;

/* @var $this yii\web\View */
/* @var $model common\models\Ppmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppmp-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-7">
            <?= $form->field($model, 'ppmp_category_id')->dropDownList(
                ArrayHelper::map(PpmpCategory::find()->orderBy('description ASC')->all(), 'ppmp_category_id', 'description'), 
                [
                    'id'        => 'ppmp_category_id',
                    'prompt'    => 'Select category ...',
                ])->label('Category') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ppmp_mode_id')->dropDownList(
                ArrayHelper::map(PpmpMode::find()->orderBy('mode ASC')->all(), 'ppmp_mode_id', 'description'), 
                [
                    'id'        => 'ppmp_mode_id',
                    'prompt'    => 'Select mode of procurement ...',
                ])->label('Mode of Procurement') ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'size_quantity')->input('number', ['min' => 0, 'step' => 1])->label('Quantity/Size') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'budget')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'date_created')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'ppmp_unit_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'deduction')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'encoder')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
