<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;
use kartik\datecontrol\DateControl;
use kartik\widgets\DatePicker;

use common\models\PrTracker;
use common\models\LibDivision;
use common\models\Ppmp;
use common\models\PpmpItemOriginal;
use common\models\PpmpUnit;
use common\models\Assignatories;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrTrackerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tracker->tracker_no, 'url' => ['view', 'id' => $tracker->pr_tracker_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .table {
        border-collapse: collapse;
        border: 1px solid #d6d6d6 !important;
        width: 100%;
    }

    .table th, .table td {
        border-collapse: collapse;
        border: 1px solid #d6d6d6 !important;
        padding: 0;
    }

    .table-sppmp-items th {
        text-align: center !important;
        vertical-align: middle !important;
    }

    .table-sppmp-items thead > tr {
        background-color: #525252;
        color: #fff;
    }

    .table-sppmp-items td {
        border-left: none !important;
        border-right: none !important;
    }

    .table-sppmp-items td.col-1,
    .table-sppmp-items td.col-2 {
        width: 10%;
    }

    .table-sppmp-items td.col-5,
    .table-sppmp-items td.col-6,
    .table-sppmp-items td.col-7,
    .table-sppmp-items td.col-8,
    .table-sppmp-items td.col-9,
    .table-sppmp-items td.col-10,
    .table-sppmp-items td.col-11,
    .table-sppmp-items td.col-12,
    .table-sppmp-items td.col-13,
    .table-sppmp-items td.col-14,
    .table-sppmp-items td.col-15,
    .table-sppmp-items td.col-16,
    .table-sppmp-items td.col-17,
    .table-sppmp-items td.col-20 {
        width: 3%;
    }

    .table-sppmp-items td.col-4,
    .table-sppmp-items td.col-3,
    .table-sppmp-items td.col-18,
    .table-sppmp-items td.col-19 {
        width: 7%;
    }

    .table-sppmp-items tbody > tr.tab-option {
        background: #e2e2e2;
    }

    .table-sppmp-items tfoot > tr > td.col-total {
        text-align: right;
        vertical-align: middle;
        font-weight: bold;
    }

    .table-sppmp-items tfoot > tr > td {
        border-top: 2px solid #000 !important;
    }

    input {
        width: 100%;
        border: none;
        outline: none !important;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

    input[class=group-label] {
        text-align: center;
        font-weight: bold;
    }

    input[class=add-description],
    input[class=unit-id],
    input[class=unit],
    input[class=quantity] {
        text-align: center !important;
    }

    input[type=number] {
        text-align: right;
    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
    }

    input[name=final_total] {
        width: 100%;
        border: none;
        font-weight: bold;
        outline: none !important;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

    select {
        width: 100%;
        border: none;
        outline: none !important;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    }

</style>

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

<div class="create-form-ppmp content-body">

    <?php
        $pr_model->tracker_id   = $tracker->pr_tracker_id;
        $pr_model->pr_type      = $pr_type;
        $pr_model->encoder      = Yii::$app->user->identity->id;
        $pr_model->date_created = date("Y-m-d");
        $pr_model->requested_by = Yii::$app->user->identity->id;
        $pr_model->noted_by     = 5;
        $pr_model->reviewed_by  = 1;
        $pr_model->approved_by  = 2;
    ?>

    <?php $form = ActiveForm::begin([
        'id'    => 'frm-pr',
        'fieldConfig' => [
            'template'  => '{label}{input}{error}',
        ],
        'action'=> Url::toRoute(['pr-report/create-sppmp']),
    ]); ?>

        <div class="box box-solid">
            <div class="box-header with-border header-inspinia">
                <h3 class="box-title">Purchase Report</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">
                        <?= $form->field($pr_model, 'purpose')->textInput() ?>
                        <?= $form->field($pr_model, 'tracker_id')->hiddenInput()->label(false) ?>
                        <?= $form->field($pr_model, 'pr_type')->hiddenInput()->label(false) ?>
                        <?= $form->field($pr_model, 'encoder')->hiddenInput()->label(false) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($pr_model, 'date_created')->widget(DatePicker::classname(), [
                            'type' => DatePicker::TYPE_INPUT,
                            'removeButton' => false,
                            'options' => [
                                'placeholder' => 'Date created',
                                'style' => 'text-align: center',
                            ],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ])->label('Date'); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($pr_model, 'requested_by')
                            ->dropDownList(ArrayHelper::map(User::find()->orderBy('firstname ASC')->all(), 'id', function($model) {
                                    $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                    return $name;
                                }), [
                                'placeholder' => 'Prepared by'])
                                ->label('Prepared by') ?>

                    </div>
                    <div class="col-md-3">
                        <?= $form->field($pr_model, 'noted_by')
                            ->dropDownList(ArrayHelper::map(Assignatories::find()->orderBy('firstname ASC')->all(), 'contact_id', function($model) {
                                    $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                    return $name;
                                }), [
                                'placeholder' => 'Noted by']) ?>

                    </div>
                    <div class="col-md-3">
                        <?= $form->field($pr_model, 'reviewed_by')
                            ->dropDownList(ArrayHelper::map(Assignatories::find()->orderBy('firstname ASC')->all(), 'contact_id', function($model) {
                                    $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                    return $name;
                                }), [
                                'placeholder' => 'Reviewed by']) ?>

                    </div>
                    <div class="col-md-3">
                        <?= $form->field($pr_model, 'approved_by')
                            ->dropDownList(ArrayHelper::map(Assignatories::find()->orderBy('firstname ASC')->all(), 'contact_id', function($model) {
                                    $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                    return $name;
                                }), [
                                'placeholder' => 'Approved by']) ?>
                        <?= Html::hiddenInput('PrReport[program]', $tracker->unit_responsible, []) ?>
                        <?= Html::hiddenInput('PrReport[proponent]', $tracker->proponent, []) ?>
                        <?= Html::hiddenInput('PrReport[encoder]', Yii::$app->user->identity->id, []) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-solid">
            <div class="box-header with-border header-inspinia">
                <h3 class="box-title">Supplemental Items</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-sppmp-items">
                    <thead>
                        <tr>
                            <th rowspan="2">Item Category</th>
                            <th rowspan="2" colspan="2">Item Description</th>
                            <th rowspan="2">Unit of Measurement</th>
                            <th colspan="13">Quantity Requirement</th>
                            <th rowspan="2">Price</th>
                            <th rowspan="2">Total Amount</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="pr-details">
                        <!-- <tr id="row-0" class="pr-items">
                            <td class="col-1">
                                <?= Html::dropDownList('PrItemSppmpDetails[item_type][]', null, ['0' => 'Goods and Supplies', '1' => 'Catering Services', '2' => 'Consulting Services', '3' => 'Non-consulting Services'], ['id' => 'item-type-0', 'prompt' => 'Item Category']) ?>
                                <?= Html::hiddenInput('PrItemSppmpDetails[group_label][]', null, ['id' => 'label-0']) ?>
                            </td>
                            <td class="col-2">
                                <?= Html::textInput('PrItemSppmpDetails[item_description][]', null, [
                                    'id' => 'item-description-0',
                                    'class' => 'item-description', 
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => 'item_description']) ?>
                            </td>
                            <td class="col-3">
                                <?= Html::textInput('PrItemSppmpDetails[add_description][]', null, [
                                    'id' => 'add-description-0',
                                    'class' => 'add-description', 
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => '(no. of dates)',
                                    'onkeyup' => 'sppmpDays(this)' ]) ?>
                            </td>
                            <td class="col-4">
                                <?= Html::textInput('PrItemSppmpDetails[unit_id][]', null, ['id' => 'unit-0','class' => 'unit', 'placeholder' => 'unit']) ?>
                            </td>
                            <td class="col-5">
                                <?= Html::input('number', 'PrItemSppmpDetails[january][]', 0, ['id' => 'january-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-6">
                                <?= Html::input('number', 'PrItemSppmpDetails[february][]', 0, ['id' => 'february-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-7">
                                <?= Html::input('number', 'PrItemSppmpDetails[march][]', 0, ['id' => 'march-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-8">
                                <?= Html::input('number', 'PrItemSppmpDetails[april][]', 0, ['id' => 'april-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-9">
                                <?= Html::input('number', 'PrItemSppmpDetails[may][]', 0, ['id' => 'may-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-10">
                                <?= Html::input('number', 'PrItemSppmpDetails[june][]', 0, ['id' => 'june-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-11">
                                <?= Html::input('number', 'PrItemSppmpDetails[july][]', 0, ['id' => 'july-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-12">
                                <?= Html::input('number', 'PrItemSppmpDetails[august][]', 0, ['id' => 'august-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-13">
                                <?= Html::input('number', 'PrItemSppmpDetails[september][]', 0, ['id' => 'september-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-14">
                                <?= Html::input('number', 'PrItemSppmpDetails[october][]', 0, ['id' => 'october-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-15">
                                <?= Html::input('number', 'PrItemSppmpDetails[november][]', 0, ['id' => 'november-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-16">
                                <?= Html::input('number', 'PrItemSppmpDetails[december][]', 0, ['id' => 'december-0', 'class' => 'month-input month-0', 'step' => 1, 'min' => 0, 'onkeyup' => 'sppmpMonth(this)'])?>
                            </td>
                            <td class="col-17">
                                <?= Html::input('number', 'PrItemSppmpDetails[quantity][]', null, [
                                    'id' => 'quantity-0',
                                    'class'=>'quantity', 
                                    'min' => 0, 'step' => 1,
                                    'placeholder' => '0',
                                    'readonly'    => 'readonly']) ?>
                            </td>
                            <td class="col-18">
                                <?= Html::input('number', 'PrItemSppmpDetails[item_price][]', null, [
                                    'id' => 'item-price-0',
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => '0.00']) ?>
                            </td>
                            <td class="col-19">
                                <?= Html::input('number', 'PrItemSppmpDetails[total_amount][]', null, [
                                    'id' => 'total-amount-0',
                                    'class' => 'item-total',
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => '0.00',
                                    'readonly'    => 'readonly']) ?>
                            </td>
                            <td class="col-20">
                                <?= Html::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-sm btn-danger btn-remove-item']) ?>
                            </td>
                        </tr> -->
                        <?= Html::hiddenInput('count', 0, ['id'=>'row-count']) ?>
                        <tr class="tab-option">
                            <td>
                                <?= Html::dropDownList('tab-select', null, ['0' => 'insert options', '1' => 'Insert New Group Label', '2' => 'Insert New Item'], ['class' => 'select-label-sppmp']) ?>
                            </td>
                            <td colspan="19"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="col-total" colspan="18">Total</td>
                            <td>
                                <?= Html::input('number', 'final_total', '0.00', ['class' => 'form-control final-total']) ?>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="box-footer">
                <div class="form-group pull-right">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>