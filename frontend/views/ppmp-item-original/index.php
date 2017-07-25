<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

use common\models\PpmpItemOriginal;
use common\models\LibItemUnit;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PpmpItemOriginalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PPMP Original';
$this->params['breadcrumbs'][] = ['label' => 'PPMP', 'url' => ['ppmp/index']];
$this->params['breadcrumbs'][] = 'PPMP Original';
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

<div class="ppmp-item-original-index content-body">

    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            //'ppmp_item_original_id',
            //'ppmp_id',
            //'ppmp_item_cat_id',
            [
                'attribute' => 'ppmp_item_cat_id',
                'label' => 'Category',
                'filter' => false,
                'value' => function($model){
                    return $model['ppmp_item_cat_id'] ? $model->ppmpItemCategory['description'] : ' - - - ';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => function($model) {
                    $class = 'kv-align-left kv-align-middle bg-olive col-pr-category';
                    $style = 'font-size: 16px; font-weight: bold;';
                    $key = $model['ppmp_item_cat_id'];
                    return [
                        'class' => $class,
                        'style' => $style,
                        'data-key' => $key,
                    ];
                },
                'group' => true,
                'groupedRow' => true,
                'groupOddCssClass'=>'bg-olive',
                'groupEvenCssClass'=>'bg-olive',
            ],
            //'ppmp_item_subcat_id',
            [
                'attribute' => 'ppmp_item_subcat_id',
                'label'=>'Subcategory',
                'filter' => false,
                'value' => 'ppmpItemSubcategory.description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => function($model) {
                    $class = 'kv-align-left kv-align-middle bg-success col-pr-subcategory';
                    $style = 'font-size: 16px; font-weight: bold;';
                    $key = $model['ppmp_item_subcat_id'];
                    return [
                        'class' => $class,
                        'style' => $style,
                        'data-key' => $key,
                    ];
                },
                'group' => true,
                'groupedRow' => true,
                'groupOddCssClass'=>'bg-info',
                'groupEvenCssClass'=>'bg-info',
                /*'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                    return [
                        'mergeColumns'=>[[1, 20]], // columns to merge in summary
                        'content'=>[
                            21=>GridView::F_SUM,
                        ],
                        'contentFormats'=>[      // content reformatting for each summary cell
                            21=>['format'=>'number', 'decimals'=>2, 'decPoint' => '.', 'thousandSep' => ','],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                            21=>['style'=>'text-align:right'],
                        ],
                        // html attributes for group summary row
                        'options'=>['class'=>'danger','style'=>'font-weight:bold;']
                    ];
                },*/
            ],
            //'item_description:ntext',
            [
                'attribute' => 'item_description',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(PpmpItemOriginal::find()->where(['ppmp_id'=>$ppmp_id])->all(), 'item_description', 'item_description'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'search item', 'style' => 'display: block',],
                'label'=>'Item & Specifications',
                'value'=> 'item_description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => function($model) {
                    $class = 'kv-align-left kv-align-middle col-inventory';
                    $style = 'max-width: 1000px; white-space: normal;';
                    $key = $model->inventory_id;
                    return [
                        'class' => $class,
                        'data-key' => $key,
                    ];
                },
                'width' => '1000px',
            ],
            //'inventory_id',
            //'unit_id',
            [
                'attribute' => 'unit_id',
                'label' => 'Unit of Measurement',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(LibItemUnit::find()->orderBy('name')->asArray()->all(), 'unit_id', 'name'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true, 'width'=>'100px',],
                ],
                'filterInputOptions'=>['placeholder'=>'search unit', 'style' => 'display: block',],
                'value' => function($model){
                    return $model->itemUnit['name'];
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => function($model) {
                    $class = 'kv-align-center kv-align-middle col-unit';
                    $key = $model->unit_id;
                    return [
                        'class' => $class,
                        'data-key' => $key,
                    ];
                },
            ],
            //'addtitional_number',
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Jan',
                'value' => function($model){
                    $value = $model->january;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Feb',
                'value' => function($model){
                    $value = $model->february;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Mar',
                'value' => function($model){
                    $value = $model->march;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Apr',
                'value' => function($model){
                    $value = $model->april;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'May',
                'value' => function($model){
                    $value = $model->may;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Jun',
                'value' => function($model){
                    $value = $model->june;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Jul',
                'value' => function($model){
                    $value = $model->july;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Aug',
                'value' => function($model){
                    $value = $model->august;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Sep',
                'value' => function($model){
                    $value = $model->september;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Oct',
                'value' => function($model){
                    $value = $model->october;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Nov',
                'value' => function($model){
                    $value = $model->november;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Dec',
                'value' => function($model){
                    $value = $model->december;
                    return $value ?: '';
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '100px',
            ],
            //'total_count',
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Total',
                'value' => 'total_count',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '120px',
            ],
            //'item_price',
            [
                'label' => 'Item Price',
                'filter' => false,
                'mergeHeader' => true,
                'value' => 'item_price',
                'format' => ['decimal', 2],
                'width'=>'80px',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-right',
                ],
                'pageSummary'=>'Grand Total',
                'pageSummaryOptions'=>['class'=>'text-right text-warning', 'id' => 'total-b'],
            ],
            //'total_amount',
            [
                'filter' => false,
                'mergeHeader' => true,
                'label' => 'Total Amount',
                'value' => 'total_amount',
                'format' => ['decimal', 2],
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '120px',
                'pageSummary'=>true,
                'pageSummaryOptions'=>['class'=>'text-right text-warning', 'id' => 'original-total-amount'],
            ],
            [
                'class' => ActionColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'template'=>'{update}',
                'buttons' => [
                    'update'=> function ($url, $model) {
                        return Html::a( '<i class="glyphicon glyphicon-pencil"></i>', Url::toRoute(['partial-update', 'id' => $model->ppmp_item_original_id]),
                                [
                                    'class'=> 'btn btn-xs btn-primary btn-item-update btn-link-page',
                                ]
                            );
                    },
                ],
            ],
        ];
    ?>

    <?= GridView::widget([
        'id' => 'grid-ppmp-original',
        'dataProvider'=>$dataProvider,
        //'filterModel'=>$searchModel,
        'columns'=> $column,
        'floatHeader' => true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions'=>['style'=>'overflow: auto;'],
        'rowOptions'=> [
            'height' => '40px',
        ],
        'pjax' => true,
        'toolbar'=> false,
        //'showPageSummary' => true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>false,
        'hover'=>true,
        'panel'=> [
            'heading'=>'<b>'.$model->ppmpCategory['description'].'</b>',
            'headingOptions' => [
                'class' => 'box-header box-solid bg-default no-border',
            ],
            'before' => false,
            'after' => false,
        ],
        'resizableColumns'=>false,
        'persistResize'=>true,
    ]); ?>
</div>
