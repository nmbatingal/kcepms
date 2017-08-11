<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrTrackerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trackers';
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
                echo '<small>Admin</small>';
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

<div class="pr-tracker-index content-body">
 
    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            // 'pr_tracker_id',
            // 'tracker_no',
            // 'status',
            [
                'attribute' => 'status',
                'value' => function($model){
                    switch ($model['status']) {
                        case 0:
                            return '<span class="label bg-red">removed</span>';
                            break;
                        case 1:
                            return '';
                            break;
                    }
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width'=>'100px',
            ],
            [
                'attribute' => 'tracker_no',
                'label' => 'Tracking Number',
                'value'=> function($model) {

                    return Html::a( '<b>'. $model->tracker_no .'</b>',
                            Url::toRoute(['view', 'id'=>$model['pr_tracker_id']]),
                            [
                                'class'=> 'btn-link-page',
                            ]
                        );
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width'=>'120px',
            ],
            // 'tracker_year',
            // 'tracker_month',
            // 'tracker_seq',
            // 'proposal_no',
            // 'tracker_title:ntext',
            [
                'attribute' => 'tracker_title',
                'label' => 'Title',
                'value' => 'tracker_title',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                    'style'=>'min-width:500px;white-space:normal',
                ],
            ],
            // 'unit_responsible',
            [
                'attribute' => 'unit_responsible',
                'label' => 'Responsible Unit',
                'value' => 'unit_responsible',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            // 'responsibility_code',
            // 'proponent',
            [
                'attribute' => 'proponent',
                'label' => 'Responsible Proponent',
                'value' => 'proponent',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            // 'encoder',
            // 'date_created',
            [
                'attribute' => 'date_created',
                'label'=>'Tracker Created',
                'value'=>function($model){
                    $date = date("M-d-Y", strtotime($model['date_created']));
                    $time = date("H:i a", strtotime($model['date_created']));
                    return $date . ' <i class="text-red">'.$time.'</i>';
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width'=>'120px',
            ],
            // 'date_updated',
            // 'status',

            [
                'class' => ActionColumn::className(),
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'template'=>'{view}&nbsp;{update}&nbsp;{delete}&nbsp;{restore}',
                'buttons' => [
                    'view'=> function ($url, $model) {
                        return Html::a( '<i class="fa fa-eye"></i>',
                                Url::toRoute(['view', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-xs btn-warning',
                                    'title' => 'view tracker',
                                ]
                            );
                    },
                    'update'=> function ($url, $model) {
                        return Html::a( '<i class="fa fa-pencil"></i>',
                                Url::toRoute(['update', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-xs btn-primary',
                                    'title' => 'update tracker',
                                ]
                            );
                    },
                    'delete'=> function ($url, $model) {
                        return Html::a( '<i class="fa fa-trash"></i>',
                                Url::toRoute(['delete', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-xs btn-danger',
                                    'title' => 'delete tracker',
                                ]
                            );
                    },
                    'restore'=> function ($url, $model) {
                        return Html::a( '<i class="fa fa-history"></i>',
                                Url::toRoute(['restore', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-xs btn-success',
                                    'title' => 'restore tracker',
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
        'rowOptions' => [
            'height' => '50px',
        ],
        'toolbar'=> false,
        'pjax'=> true,
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
