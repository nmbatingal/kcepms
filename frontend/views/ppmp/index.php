<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

use common\models\PpmpUnit;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PpmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PPMP';
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

<div class="ppmp-index content-body">

    <div class="box box-solid">
        <div class="box-body">
            <div class="pull-right">
                <?= Html::a('Add New PPMP', Url::toRoute(['create']), ['id' => '', 'class' => 'btn btn-success btn-link-page']) ?>
            </div>
        </div>
    </div>

    <?php
        $column = [
            //'ppmp_id',
            [
                'label' => 'Code',
                'mergeHeader' => true,
                'value' => 'ppmpCategory.code',
                'value' => function($model){
                    $code = $model->ppmpCategory['code'];

                    return !empty($code) ? $code : '-';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            [
                'label' => 'Description',
                'mergeHeader' => true,
                'value' => 'ppmpCategory.description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left',
                    'style'=>'font-weight: bold',
                ],
                'pageSummary'=>'Total',
                'pageSummaryOptions'=>['class'=>'text-left text-warning'],
                'vAlign'=>'top',
            ],
            //'ppmp_category_id',
            [
                'label' => 'Quantity/Size',
                'mergeHeader' => true,
                'value' => function($model){
                    $size = $model['size_quantity'];
                    return !empty($size) ? $size : '-';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center',
                ],
                'vAlign'=>'top',
                'width' => '150px',
            ],
            [
                'label' => 'Budget',
                'mergeHeader' => true,
                'value' => function($model){

                    $deduct = $model['deduction'];
                    $budget = $model['budget'];

                    if (!empty($deduct)) {
                        $budget = $budget - $deduct;
                    }

                    return $budget;
                },
                'format' => ['decimal', 2],
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => function($model) {
                    $deduct = $model['deduction'];
                    $class  = 'kv-align-right';

                    if (!empty($deduct)) {
                        $class = 'kv-align-right text-red';
                    }

                    return [
                        'class' => $class,
                    ];

                },
                'vAlign'=>'top',
                'width' => '150px',
                'pageSummary'=>true,
                'pageSummaryOptions'=>['class'=>'text-right text-warning', 'id' => 'budget'],
            ],
            [
                'label' => 'Deduction',
                'mergeHeader' => true,
                'value' => 'deduction',
                'format' => ['decimal', 2],
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right',
                ],
                'vAlign'=>'top',
                'width' => '150px',
            ],
            //'deduction',
            [
                'label' => 'Mode',
                'mergeHeader' => true,
                'value' => function($model){
                    $mode = $model->ppmpMode['mode'];
                    return !empty($mode) ? $mode : '-';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center',
                ],
                'vAlign'=>'top',
                'width' => '150px',
            ],
            [
                'attribute' => 'ppmp_unit_id',
                'label' => 'Program / Unit',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(PpmpUnit::find()->orderBy('unit_description')->asArray()->all(), 'ppmp_unit_id', 'unit_description'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>false],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'search program',
                    'style' => 'display: block;',
                ],
                'value' => 'ppmpUnit.unit_description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center',
                ],
                'vAlign'=>'top',
                'width' => '150px',
            ],
            //'ppmpMode.mode',
            //'ppmp_mode_id',
            //'year',
            //'ppmpUnit.unit_description',
            //'ppmp_unit_id',
            // 'date_created',
            // 'encoder',
            // 'status',
            [
                'class' => ActionColumn::className(),
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'template'=>'{view}&nbsp;{update}',
                'buttons' => [
                    'view'=> function ($url, $model) {

                        return Html::a( $model->budget ? '<i class="glyphicon glyphicon-eye-open"></i>':'<i class="glyphicon glyphicon-eye-close"></i>' ,
                                Url::toRoute(['ppmp-item-original/index', 'id'=>$model['ppmp_id']]),
                                [
                                    'class'=> $model->budget ? 'btn btn-xs btn-warning btn-link-page':'btn btn-xs btn-default btn-link-page',
                                ]
                            );
                    },
                    'update'=> function ($url, $model) {

                        return Html::a( '<i class="glyphicon glyphicon-pencil"></i>',
                                Url::toRoute(['update', 'id'=>$model['ppmp_id']]),
                                [
                                    'class'=> 'btn btn-xs btn-primary',
                                ]
                            );
                    },
                ],
            ],
        ];
    ?>

    <?= GridView::widget([
        'id' => 'grid-ppmp',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns' => $column,
        'tableOptions'=>[
            'id'=>'table-grid-ppmp',
        ],
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'toolbar'=> false,
        'pjax'=>true,
        'showPageSummary'=>true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=> [
            'heading'=>'<b>Project Procurement Management Plan 2017</b>',
            'headingOptions' => [
                'class' => 'box-header box-solid header-inspinia no-border',
            ],
            'before' => false,
            'after' => false,
            'footer'=> false,
        ],
        'resizableColumns'=>false,
        'persistResize'=>true,
    ]); ?>
</div>

<!-- TOTAL SUMMARY QUERY -->
<?php
    $js ="
        $(document).ready(function(){

            var firstRow = '<tr><td></td><td><b>I. GOODS AND SERVICES</b></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
            $('table#table-grid-ppmp').prepend(firstRow);

            var budget = $( '#budget' ).html().replace(/,/g,\"\");

            var inflation = parseFloat(budget * 0.10).toFixed(2);
            var contingency = parseFloat(budget * 0.10).toFixed(2);

            var total_budget = parseFloat(Number(budget) + Number(inflation) + Number(contingency)).toFixed(2);

            var lastRow_1 = '<tr class=\" warning\"><td></td><td class=\"text-left text-warning kv-align-top\">Add : 10% Provision of Inflation</td>'+
                '<td>&nbsp;</td><td id=\"add-inflation\" class=\"text-right text-warning\">'+inflation.replace(/\B(?=(\d{3})+(?!\d))/g, \",\")+'</td><td></td><td></td><td></td><td></td></tr>';

            var lastRow_2 = '<tr class=\" warning\"><td></td><td class=\"text-left text-warning kv-align-top\">'+
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10% Contingency</td>'+
                '<td></td><td id=\"add-contingency\" class=\"text-right text-warning\">'+contingency.replace(/\B(?=(\d{3})+(?!\d))/g, \",\")+'</td><td></td><td></td><td></td><td></td></tr>';

            var lastRow_3 = '<tr class=\" warning\"><td></td><td class=\"text-left text-warning kv-align-top\"><b>Total Estimated Budget</b></td>'+
                '<td></td><td id=\"total-budget\" class=\"text-right text-warning\"><b>'+total_budget.replace(/\B(?=(\d{3})+(?!\d))/g, \",\")+'</b></td><td></td><td></td><td></td><td></td></tr>';

            $(\"table#table-grid-ppmp tfoot\").append(lastRow_1 + lastRow_2 + lastRow_3);
        });    
    ";

    //$this->registerJs($js, $this::POS_END);
?>