<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

use kartik\widgets\DatePicker;

use common\models\Assignatories;
use common\models\PrReport;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\PrReport */

$this->title = 'PR '.$model->pr_no;
$this->params['breadcrumbs'][] = ['label' => 'Trackers', 'url' => ['pr-tracker/index']];
$this->params['breadcrumbs'][] = ['label' => $model->tracker->tracker_no, 'url' => ['pr-tracker/view', 'id' => $model->tracker_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .table-pr th,
    .table-pr td {
        border: 1px solid #d6d6d6 !important;
        padding: 0 !important;
    }

    .table-pr th {
        background-color: #525252;
        color: #fff;
    }

    .table-pr th.col-1,
    .table-pr th.col-2,
    .table-pr th.col-4 {
        width: 8%;
    }
    

    .table-pr th.col-3 {
        width: 45%;
    }

    .table-pr th.col-5,
    .table-pr th.col-6 {
        width: 10%;
    }

    .table-pr th.col-7 {
        width: 6%;
    }

    .table-pr td.td-label {
        vertical-align: middle;
        padding-left: 5px !important;
        font-weight: bold;
    }

    .table-pr tr.pr-header th {
        text-align: center !important;
        vertical-align: middle !important;
        padding: 5px !important;
    }

    .table-pr-items td.col-1,
    .table-pr-items td.col-2,
    .table-pr-items td.col-4 {
        width: 8%;
        text-align: center;
        vertical-align: middle;
    }

    .table-pr-items td.col-3 {
        width: 45%;
        text-align: center;
        vertical-align: middle;
    }

    .table-pr-items td.col-5,
    .table-pr-items td.col-6 {
        width: 10%;
        text-align: right;
        vertical-align: middle;
    }

    .table-pr-items td.col-7 {
        width: 6%;
        text-align: center;
        vertical-align: middle;
    }

    input.item {
        width: 100%;
        border: none !important;
        outline: none !important;
    }

    .table-pr-items input {
        width: 100%;
        border: none !important;
        outline: none !important;
    }

    .table-pr-items input.item {
        display: none;
    }

    .table-foot td.col-1 {
        width: 80%;
        font-weight: bold;
        text-align: right;
        vertical-align: middle;
    }

    .table-foot td.col-2 {
        width: 20%;
    }

    .table-foot td.col-2 input {
        text-align: center;
    }

    tr.tr-label {
        background-color: #f2f2f2;
    }

    td.pr-col-item-center {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
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
    $scroll ='$(".box-height").slimScroll({
            size: "8px",
            width: "100%",
            height: "450px",
            allowPageScroll: true, 
            alwaysVisible: false,     
        });'; 

    $this->registerJs($scroll, $this::POS_END);
?>

<div class="pr-report-view content-body">

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Purchase Report</b> <?= $model['pr_type'] === 1 ? '(Supplemental)' : '' ?></h3>
            <div class="box-tools pull-right">
                <?= Html::button('Update', ['id' => '', 'data-toggle' => 'modal', 'data-target' => '#modal-update-pr', 'data-backdrop' => 'static', 'data-keyboard' => false, 'class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-print"></i> Print PR', ['print-pr', 'id' => $model['pr_id']], ['id' => 'btn-print-pr', 'class' => 'btn bg-gray', 'target' => '_blank']) ?>
                <?= $model['pr_type'] === 1 ? Html::a('<i class="fa fa-print"></i> Print SPPMP', ['print-sppmp', 'id' => $model['pr_id']], ['id' => 'btn-print-sppmp', 'class' => 'btn bg-gray', 'target' => '_blank']) : '' ?>
            </div>
        </div>
        <div class="box-body no-padding">
            <table class="table table-pr">
                <tr>
                    <td class="td-label">Office/Section</td>
                    <td class="td-label">PR No.</td>
                    <td>
                        <?= Html::textInput('pr_no', $model['pr_no'], ['class' => 'form-control item', 'readonly' => 'readonly']) ?>
                    </td>
                    <td class="td-label">Date</td>
                    <td>
                        <?= Html::textInput('pr_date', date("M d, Y", strtotime($model['date_created'])), ['class' => 'form-control item', 'readonly' => 'readonly']) ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= Html::textInput('office_section', $model->tracker['unit_responsible'], ['class' => 'form-control item', 'readonly' => 'readonly']) ?>
                    </td>
                    <td class="td-label">Tracking No.</td>
                    <td>
                        <?= Html::textInput('tracking_no', $model->tracker['tracker_no'], ['class' => 'form-control item', 'readonly' => 'readonly']) ?>
                    </td>
                    <td class="td-label">Fund Cluster</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-label">Purpose</td>
                    <td colspan="4">
                        <?= Html::textInput('purpose', $model['purpose'], ['class' => 'form-control item', 'readonly' => 'readonly']) ?>
                    </td>
                </tr>
            </table>
            <table class="table table-pr">
                <thead>
                    <tr class="pr-header">
                        <th class="col-1">Stock/Property No.</th>
                        <th class="col-2">Unit</th>
                        <th class="col-3">Item Description</th>
                        <th class="col-4">Quantity</th>
                        <th class="col-5">Unit Cost</th>
                        <th class="col-6">Total Cost</th>
                        <th class="col-7"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="box-body no-padding box-height">
            <table class="table table-hover table-pr-items">
                <tbody>
                    <?php
                        $no       = 0;
                        $total_pr = 0;
                        $label    = '';
                        foreach ($pr_items as $i => $item) {
                            $total_pr += $item['total_amount'];

                            if( !empty($item['item_description']) )
                            {
                                if ( $label != $item['group_label'] ) {

                                    $label = $item['group_label'];

                                    echo 
                                    "<tr class='tr-label'>
                                        <td></td>
                                        <td></td>
                                        <td class='pr-col-item-center'>". $item['group_label'] ."</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>";
                                }
                            }

                            echo '
                            <tr data-id="'.$item['pr_item_id'].'">
                                <td class="col-1">'.++$no.'</td>
                                <td class="col-2">'.
                                    Html::textInput('unit_id', $item['unit_id'], ['id' => 'unit-'.$item['pr_item_id'], 'class' => 'form-control item row-'.$item['pr_item_id']]) .
                                    '<span class="item unit-'.$item['pr_item_id'].'">'.$item['unit_id'].'</span>
                                </td>
                                <td class="col-3">'.
                                    Html::textInput('item_description', $item['item_description'], ['id' => 'description-'.$item['pr_item_id'], 'class' => 'form-control item row-'.$item['pr_item_id']]) .
                                    '<span class="item description-'.$item['pr_item_id'].'">'.$item['item_description'].'</span>
                                </td>
                                <td class="col-4">'.
                                    Html::textInput('quantity', $item['quantity'], ['id' => 'quantity-'.$item['pr_item_id'], 'class' => 'form-control item row-'.$item['pr_item_id']]) .
                                    '<span class="item quantity-'.$item['pr_item_id'].'">'.$item['quantity'].'</span>
                                </td>
                                <td class="col-5">'.
                                    Html::textInput('item_price', $item['item_price'], ['id' => 'price-'.$item['pr_item_id'], 'class' => 'form-control item row-'.$item['pr_item_id']]) .
                                    '<span class="item price-'.$item['item_price'].'">'. number_format($item['item_price'], 2).'</span>
                                </td>
                                <td class="col-6">'.
                                    Html::textInput('total_amount', $item['total_amount'], ['id' => 'amount-'.$item['pr_item_id'], 'class' => 'form-control item row-'.$item['pr_item_id']]) .
                                    '<span class="item total-'.$item['total_amount'].'">'. number_format($item['total_amount'], 2).'</span>
                                </td>
                                <td class="col-7">'.
                                    Html::button('<i class="fa fa-pencil"></i>', ['class' => 'btn btn-sm btn-primary']) . ' ' .
                                    Html::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger']) .
                                '</td>
                            </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer no-padding">
            <table class="table table-hover table-foot">
                <tfoot>
                    <tr>
                        <td class="col-1">TOTAL</td>
                        <td class="col-2">
                            <?= Html::textInput('total_pr', number_format($total_pr, 2), ['id' => 'input-total-pr', 'class' => 'form-control', 'readonly' => 'readonly']) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- CREATE NEW TRACKER MODAL -->
<div id="modal-update-pr" class="fade modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <?= Html::button('<i class="fa fa-close"></i>', ['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => true]) ?>
                <h4 class="box-title"><b>UPDATE PR</b></h4>
            </div>
 
            <?php 
                $pr = PrReport::findOne(['pr_id' => $model['pr_id']]);
                $pr->date_created = date("Y-m-d", strtotime($model['date_created']));

                $form  = ActiveForm::begin([
                    'id'    => 'frm-update-pr',
                    'action'=> Url::toRoute(['update', 'id' => $model['pr_id']]),
                ]);
            ?>

                <div class="modal-body">
                    <div id="modal-content">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <?= $form->field($model, 'date_created')->widget(DatePicker::classname(), [
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
                                ])->label(false); ?>
                            </div>

                            <div class="col-md-12">
                                <?= $form->field($pr, 'pr_no')->textInput(['placeholder' => 'PR Number', 'readonly' => 'readonly'])->label('PR Number') ?>
                                <hr>
                                <?= $form->field($pr, 'purpose')->textArea(['rows' => 3, 'placeholder' => 'Purpose'])->label('Purpose') ?>

                                <?php

                                    if ( $model['pr_type'] == 0 ) { // PPMP PR

                                        echo $form->field($pr, 'requested_by')
                                                ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Requested by']);

                                        echo $form->field($pr, 'approved_by')
                                                ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Approved by']);
                                    } else { // SPPMP PR

                                        echo $form->field($pr, 'requested_by')
                                                ->dropDownList(ArrayHelper::map(User::find()->all(), 'id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Prepared by'])
                                                ->label('Prepared by');

                                        echo $form->field($pr, 'noted_by')
                                                ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Noted by']);

                                        echo $form->field($pr, 'reviewed_by')
                                                ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Reviewed by']);

                                        echo $form->field($pr, 'approved_by')
                                                ->dropDownList(ArrayHelper::map(Assignatories::find()->all(), 'contact_id', function($model) {
                                                        $name = $model['firstname'].' '.$model['mi'][0].'. '.$model['lastname'];
                                                        return $name;
                                                    }), [
                                                    'placeholder' => 'Approved by']);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <?= Html::submitButton($pr->isNewRecord ? 'Submit' : 'Update', ['class' => $pr->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>