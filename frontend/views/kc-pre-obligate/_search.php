<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KcPreObligateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kc-pre-obligate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'obligate_id') ?>

    <?= $form->field($model, 'pr_no') ?>

    <?= $form->field($model, 'alobs_no') ?>

    <?= $form->field($model, 'encoder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
