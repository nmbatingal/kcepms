<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PpmpItemOriginal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppmp-item-original-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppmp_id')->textInput() ?>

    <?= $form->field($model, 'ppmp_item_cat_id')->textInput() ?>

    <?= $form->field($model, 'ppmp_item_subcat_id')->textInput() ?>

    <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inventory_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'addtitional_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_price')->textInput() ?>

    <?= $form->field($model, 'january')->textInput() ?>

    <?= $form->field($model, 'february')->textInput() ?>

    <?= $form->field($model, 'march')->textInput() ?>

    <?= $form->field($model, 'april')->textInput() ?>

    <?= $form->field($model, 'may')->textInput() ?>

    <?= $form->field($model, 'june')->textInput() ?>

    <?= $form->field($model, 'july')->textInput() ?>

    <?= $form->field($model, 'august')->textInput() ?>

    <?= $form->field($model, 'september')->textInput() ?>

    <?= $form->field($model, 'october')->textInput() ?>

    <?= $form->field($model, 'november')->textInput() ?>

    <?= $form->field($model, 'december')->textInput() ?>

    <?= $form->field($model, 'total_count')->textInput() ?>

    <?= $form->field($model, 'total_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
