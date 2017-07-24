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

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrTrackerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'PR Tracker', 'url' => ['index']];
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

    .table th {
        text-align: center;
        vertical-align: middle !important;
    }

    .table-items thead > tr {
        background-color: #525252;
    }

    .table-items thead > tr th {
        color: #fff;
    }

    .table-items td {
        border-left: none !important;
        border-right: none !important;
    }

    .table-items td.col-1 {
        width: 10%;
    }

    .table-items td.col-3 {
        width: 40%;
    }

    .table-items td.col-2,
    .table-items td.col-4,
    .table-items td.col-6,
    .table-items td.col-7 {
        width: 8%;
    }

    .table-items td.col-5,
    .table-items td.col-8 {
        width: 2%;
    }

    .table-items tbody > tr.tab-option {
        background: #e2e2e2;
    }

    .table-items tfoot > tr > td.col-total {
        text-align: right;
        vertical-align: middle;
        font-weight: bold;
    }

    .table-items tfoot > tr > td {
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
    input[class=quantity] {
        text-align: center !important;
    }

    input[type=number] {
        text-align: right;
    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        -moz-appearance: none; 
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

<?php
    Modal::begin([
        'id' => 'modal-pr-ppmp',
        'size' => 'modal-wide',
        'header' => '<h4>PPMP</h4>',
        'headerOptions' => [
            'class' => 'bg-primary header-inspinia',
        ],
        'footer' => Html::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']),
        'clientOptions' => [
            'backdrop' => 'static', 
            'keyboard' => FALSE,
        ],
        'options' => [
            'tabindex' => false,
        ],
    ]);

    echo '<div id="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">' .
                                    Html::dropDownList('program', 0, 
                                        ArrayHelper::map(PpmpUnit::find()->all(), 'ppmp_unit_id', 'unit_description'), 
                                        [
                                            'id'        => 'select-program',
                                            'class'     => 'form-control',
                                            'prompt'    => 'select program / unit',
                                            'onchange'  => 'selectProgram(this)',
                                        ]) .
                                '</div>
                                <div class="col-md-2">' .
                                    Html::dropDownList('category', 0, 
                                        ['1' => 'Goods and Supplies', '2' => 'Catering Services', '3' => 'Consulting Services', '4' => 'Non-consulting Services'],
                                        [
                                            'id'        => 'select-category',
                                            'class'     => 'form-control',
                                            'prompt'    => 'select item category',
                                            'onchange'  => 'selectItemType(this)',
                                            'data-href' => Url::toRoute('ppmp/ppmp-list'),
                                            'disabled'  => 'disabled',
                                        ]) .
                                '</div>
                                <div class="col-md-2">' .
                                    Html::textInput('date', date("Y"), ['id' => 'input-date', 'class' => 'form-control', 'placeholder' => 'year', 'onkeyup'  => 'selectItemType(this)', 'data-href' => Url::toRoute('ppmp/ppmp-list'), 'style' => 'text-align:center']) .
                                '</div>
                                <div class="col-md-6">' .
                                    Html::dropDownList('ppmp_item_id', '', [], 
                                        [
                                            'id'        => 'select-ppmp',
                                            'class'     => 'form-control',
                                            'prompt'    => 'select ppmp',
                                            'disabled'  => 'disabled',
                                            'onchange'  => 'ppmpListItems(this, "'.Url::toRoute('ppmp/ppmp-list-items').'")',
                                        ]) .
                                '</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="ppmp-table" class="no-padding"></div>
                </div>
            </div>
        </div>';

    Modal::end();
?>

<div class="create-form-ppmp content-body">

    <?php
        $pr_model->tracker_id   = $tracker->pr_tracker_id;
        $pr_model->pr_type      = $pr_type;
        $pr_model->encoder      = Yii::$app->user->identity->id;
        $pr_model->date_created = date("Y-m-d");
        $pr_model->requested_by = 1;
        $pr_model->approved_by  = 2;
    ?>

    <?php $form = ActiveForm::begin([
        'id'    => 'frm-pr',
        'fieldConfig' => [
            'template'  => '{label}{input}{error}',
        ],
        'action'=> Url::toRoute(['pr-report/create']),
    ]); ?>

        <div class="box box-solid">
            <div class="box-header with-border header-inspinia">
                <h3 class="box-title">Purchase Report (with PPMP)</h3>
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
                    <div class="col-md-4">
                        <?= $form->field($pr_model, 'requested_by')
                            ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                    $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                    return $name;
                                }), [
                                'placeholder' => 'Requested by']) ?>

                    </div>
                    <div class="col-md-4">
                        <?= $form->field($pr_model, 'approved_by')
                            ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
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
                <h3 class="box-title">Items</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-items">
                    <thead>
                        <tr>
                            <th class="col-1">Item Category</th>
                            <th class="col-2">Unit of Measurement</th>
                            <th class="col-3" colspan="2">Item Description</th>
                            <th class="col-4">Quantity</th>
                            <th class="col-5">Unit Cost</th>
                            <th class="col-6">Total Cost</th>
                            <th class="col-7"></th>
                        </tr>
                    </thead>
                    <tbody id="pr-details">
                        <?= Html::hiddenInput('count', 0, ['id'=>'row-count']) ?>
                        <tr class="tab-option">
                            <td class="col-1">
                                <?= Html::dropDownList('tab-select', null, ['0' => 'insert options', '1' => 'Insert New Group Label', '2' => 'Insert New Item'], ['class' => 'select-label']) ?>

                            </td>
                            <td colspan="7"></td>
                        </tr>
                        <!-- <tr class="pr-items">
                            <td class="col-1">
                                < Html::dropDownList('PrItemDetails[item_type][]', null, ['0' => 'Goods and Supplies', '1' => 'Catering Services', '2' => 'Consulting Services', '3' => 'Non-consulting Services'], ['prompt' => 'Item Category']) ?>
                                < Html::hiddenInput('PrItemDetails[group_label][]', null, []) ?>
                            </td>
                            <td class="col-2">
                                < Html::textInput('PrItemDetails[unit_id][]', null, ['placeholder' => 'unit']) ?>
                            </td>
                            <td class="col-3">
                                < Html::hiddenInput('PrItemDetails[ppmp_item_original_id][]', null, []) ?>
                                < Html::textInput('PrItemDetails[item_description][]', null, ['class'=>'item-description', 
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => 'item_description']) ?>
                            </td>
                            <td class="col-4">
                                < Html::textInput('PrItemDetails[add_description][]', null, ['class' => 'add-description', 
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => '(no. of dates)']) ?>
                            </td>
                            <td class="col-5">
                                < Html::input('number', 'PrItemDetails[quantity][]', null, ['class'=>'quantity', 
                                    'min' => 0, 'step' => 1,
                                    'placeholder' => 'quantity']) ?>
                            </td>
                            <td class="col-6">
                                < Html::input('number', 'PrItemDetails[item_price][]', null, [
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => 'item_price']) ?>
                            </td>
                            <td class="col-7">
                                < Html::input('number', 'PrItemDetails[total_amount][]', null, [
                                    'min' => 0, 'step' => 0.01,
                                    'placeholder' => 'total_amount']) ?>
                            </td>
                            <td class="col-8">
                                < Html::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-sm btn-danger btn-remove-item']) ?>
                            </td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="col-total" colspan="4">Total</td>
                            <td colspan="3">
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
