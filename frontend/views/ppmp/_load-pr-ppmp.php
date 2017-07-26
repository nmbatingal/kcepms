<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/*use yii\grid\GridView;*/

use kartik\grid\SerialColumn;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
?>

<div class="load-pr-ppmp">
    <?php
        /*$column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            [
                'label' => 'Unit of Measurement',
                'value' => function($model){
                    $i = $model->item_id;

                    $html = Html::hiddenInput('item_id', $model['item_id'], ['id' => 'item_id-'.$i]);

                    return $html;
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'attribute' => 'description',
                'label' => 'Item Description',
                'value' => 'description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
            ],
        ];*/
    ?>

    <?php // Pjax::begin(['id' => 'admin-crud-id', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'POST']]); ?>

    <?php /*GridView::widget([
        'id' => 'grid-ppmp-items',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'filterUrl' => Url::toRoute('load-lib-search'),
        'columns' => $column,
        'tableOptions'=>[
            'id'=>'table-ppmp-items',
        ],
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        //'toolbar'=> false,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ],
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=> [
            'heading'=>'<b>ITEMS</b>',
            'headingOptions' => [
                'class' => 'box-header box-solid header-inspinia no-border',
            ],
            'before' => false,
            'after' => false,
        ],
        'resizableColumns'=>false,
        'persistResize'=>true,
    ]); */?>

    <?php
        $column = [

            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            [
                'label' => 'Unit of Measurement',
                'value' => function($model){
                    $i = $model->item_id;

                    $html = Html::textInput('item_id', $model['item_id'], ['id' => 'item_id-'.$i]);

                    return $html;
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'attribute' => 'description',
                'label' => 'Item Description',
                'value' => 'description',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
            ],
        ];
    ?>

    <?php Pjax::begin(['id' => 'load-ppmp-items', 'timeout' => false, 'enablePushState' => false, /*'clientOptions' => ['method' => 'POST']*/]); ?>   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterUrl' => Url::toRoute('ppmp/load-lib-search'),
        'columns' => $column,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    ]); ?>
    <?php Pjax::end(); ?>
</div>