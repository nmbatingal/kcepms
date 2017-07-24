<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use common\models\LibItemCategory;
use common\models\LibItemGeneric;
use common\models\LibItemSubgeneric;
use common\models\LibItemUnit;

/* @var $this yii\web\View */
/* @var $model common\models\LibItem */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Items & Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content-header page-heading white-bg">
    <?php if (isset($this->blocks['content-header'])) { ?>
        <h1><?= $this->blocks['content-header'] ?></h1>
    <?php } else { ?>
        <h1>
            <?php
            if ($this->title !== null) {
                echo \yii\helpers\Html::encode($this->title);
            } else {
                echo \yii\helpers\Inflector::camel2words(
                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                );
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            } ?>
        </h1>
    <?php } ?>

    <?= Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
    ) ?>
</section>

<div class="lib-item-create content-body">

    <?php 
        $model->date_added = date("Y-m-d H:i:s");
        $model->encoder    = Yii::$app->user->identity->id;
        $model->status     = 1;
    ?>

    <?php $form = ActiveForm::begin(); ?>

        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'item_category_id')
                                ->dropDownList(ArrayHelper::map(LibItemCategory::find()->orderBy('account_title ASC')->all(), 'item_category_id', 'account_title'), 
                                    ['prompt' => 'select item category ...']) 
                                ->label('Item Category') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'generic_id')
                                ->dropDownList(ArrayHelper::map(LibItemGeneric::find()->orderBy('description ASC')->all(), 'generic_id', 'description'), 
                                    ['prompt' => 'select item generic name ...']) 
                                ->label('Item Generic Name') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'subgeneric_id')
                                ->dropDownList(ArrayHelper::map(LibItemSubgeneric::find()->orderBy('description ASC')->all(), 'subgeneric_id', 'description'), 
                                    ['prompt' => 'select item subgeneric name ...']) 
                                ->label('Item Subgeneric Name') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'unit_id')
                                ->dropDownList(ArrayHelper::map(LibItemUnit::find()->orderBy('name ASC')->all(), 'unit_id', 'name'), 
                                    ['prompt' => 'select item unit of measurement ...']) 
                                ->label('Unit of Measurement') ?>
                    </div>
                </div>
                        
            </div>
        </div>

    

    <?= $form->field($model, 'uacs_id')->textInput() ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'date_added')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'encoder')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
