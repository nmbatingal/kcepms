<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PpmpItemOriginalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppmp-item-original-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ppmp_item_original_id') ?>

    <?= $form->field($model, 'ppmp_id') ?>

    <?= $form->field($model, 'ppmp_item_cat_id') ?>

    <?= $form->field($model, 'ppmp_item_subcat_id') ?>

    <?= $form->field($model, 'item_description') ?>

    <?php // echo $form->field($model, 'inventory_id') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'addtitional_number') ?>

    <?php // echo $form->field($model, 'item_price') ?>

    <?php // echo $form->field($model, 'january') ?>

    <?php // echo $form->field($model, 'february') ?>

    <?php // echo $form->field($model, 'march') ?>

    <?php // echo $form->field($model, 'april') ?>

    <?php // echo $form->field($model, 'may') ?>

    <?php // echo $form->field($model, 'june') ?>

    <?php // echo $form->field($model, 'july') ?>

    <?php // echo $form->field($model, 'august') ?>

    <?php // echo $form->field($model, 'september') ?>

    <?php // echo $form->field($model, 'october') ?>

    <?php // echo $form->field($model, 'november') ?>

    <?php // echo $form->field($model, 'december') ?>

    <?php // echo $form->field($model, 'total_count') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
