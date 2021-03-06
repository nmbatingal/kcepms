<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PpmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items & Supplies';
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

<div class="lib-item-index content-body">
    
    <div class="box box-solid">
        <div class="box-body">
            <div class="pull-right">
                <?= Html::a('Add item to inventory', Url::toRoute(['create']), ['id' => '', 'class' => 'btn btn-success btn-link-page']) ?>
            </div>
        </div>
    </div>

    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],

            //'item_id',
            //'item_category_id',
            [
                'attribute' => 'item_category_id',
                'label' => 'Category',
                'filter' => false,
                'value' => 'item_category_id',
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
            'generic_id',
            'subgeneric_id',
            'item_description:ntext',
            // 'unit_id',
            // 'uacs_id',
            // 'barcode',
            // 'price',
            // 'date_added',
            // 'encoder',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ];
    ?>

    <?= GridView::widget([
        'id' => 'grid-lib-item',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns' => $column,
        'tableOptions'=>[
            'id'=>'table-grid-ppmp',
        ],
        'floatHeader' => true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'toolbar'=> false,
        'pjax'=>true,
        //'showPageSummary'=>true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=> [
            'heading'=>'&nbsp;',
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
