<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblPurchaseRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Requests';
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

<div class="tbl-purchase-request-index content-body">

    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            //'pr_no',
            [
                'attribute' => 'pr_no',
                'label' => 'PR No',
                'value' => 'pr_no',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                    'style'=>'font-weight: bold',
                ],
                'width' => '150px',
            ],
            //'doc_type_id',
            //'div_id',
            [
                'attribute' => 'div_id',
                'label' => 'Office',
                'value' => 'div_id',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
                'width' => '150px',
            ],
            //'unit_id',
            //'doc_date',
            //'purpose',
            [
                'attribute' => 'purpose',
                'label' => 'Purpose',
                'value' => 'purpose',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                    'style'=>'max-width: 250px; white-space: normal;',
                ],
            ],
            //'tot_amount',
            [
                'attribute' => 'tot_amount',
                'label' => 'Cert. Amount',
                'value' => 'tot_amount',
                'format' => ['decimal', 2],
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                ],
                'width' => '150px',
            ],
            //'requested_by',
            [
                'attribute' => 'requested_by',
                'label' => 'Requested By',
                'value' => 'requested_by',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '200px',
            ],
            // 'date_encoded',
            // 'place:ntext',
            // 'responsible',
            // 'prov_code',
            // 'city_code',
            // 'brgy_code',
            // 'encoded_by',
<<<<<<< HEAD
            'username',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
=======
            //'username',
            [
                'attribute' => 'username',
                'label' => 'Encoder',
                'value' => 'username',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '100px',
            ],
        ]; 
    ?>

    <?= GridView::widget([
        'id' => 'grid-purchase-request',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns' => $column,
        'tableOptions'=>[
            'id'=>'table-grid-ppmp',
        ],
        'floatHeader' => true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'rowOptions'=>[
            'height' => '50px',
        ],
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
        ],
        'resizableColumns'=>false,
        'persistResize'=>true,
>>>>>>> a061c6fa84226ae2e87c35a20b54c4c58354be42
    ]); ?>
</div>
