<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\PpmpUnit;

/* @var $this yii\web\View */
/* @var $model frontend\models\PpmpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppmp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'ppmp_unit_id')
                            ->dropDownList(ArrayHelper::map(PpmpUnit::find()->all(), 'ppmp_unit_id', 'unit_description'), [
                                'placeholder' => 'select program / unit',]) 
                            ->label('Program / Unit')
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'year') ?>
                </div>

                <div class="col-md-4">
                    <div class="form-group pull-right">
                        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php // echo $form->field($model, 'ppmp_id') ?>

    <?= $form->field($model, 'ppmp_unit_id') ?>

    <?php // echo $form->field($model, 'ppmp_category_id') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'size_quantity') ?>

    <?php // echo $form->field($model, 'budget') ?>

    <?php // echo $form->field($model, 'deduction') ?>

    <?php // echo $form->field($model, 'ppmp_mode_id') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'encoder') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
