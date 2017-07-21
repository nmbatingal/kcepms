<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

use common\models\PrReport;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */

$this->title = $model->tracker_no;
$this->params['breadcrumbs'][] = ['label' => 'Trackers', 'url' => ['index']];
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

<div class="pr-tracker-view content-body">

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
                <?= Html::a( '<i class="glyphicon glyphicon-pencil"></i>',
                    Url::toRoute(['update', 'id'=>$model['pr_tracker_id']]),
                    [
                        'class'=> 'btn btn-sm btn-primary btn-link-page',
                        'title' => 'update tracker',
                    ]) ?>
            </div>
        </div>
        <div class="box-footer no-padding">
            <?= DetailView::widget([
                    'model'=>$model,
                    'condensed'=>true,
                    'hover'=>true,
                    'mode'=> 'view',
                    'panel'=> false,
                    'attributes' => [
                        'tracker_no',
                        'tracker_title:ntext',
                        'unit_responsible',
                        'proponent',
                        'date_created',
                    ],
                    'rowOptions' => [
                        'height' => '35px',
                    ],
                ]);
            ?>
        </div>
    </div>

    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            //'pr_id',
            //'tracker_id',
            //'pr_no',
            [
                //'attribute' => 'pr_no',
                'label'=> 'PR Number',
                'value'=> function($model) {

                    return Html::a( '<b>'. $model->pr_no .'</b>',
                            Url::toRoute(['pr-report/view', 'id'=>$model['pr_id']]),
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
                'width' => '100px',
            ],
            [
                'attribute' => 'pr_type',
                'label'  =>'Supplemental',
                'value'  =>function($model){
                    $i = $model->pr_type;
                    if ( $i == 0 ) {
                        return '';
                    } else {
                        return '<i class="fa fa-check-circle-o"></i>';
                    }
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle text-green',
                    'style'=>'font-size: 25px',
                ],
                'width'=>'80px',
            ],
            //'purpose',
            [
                'label'=> 'Purpose',
                'value'=> 'purpose',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
            ],
            //'date_created',
            [
                //'attribute' => 'date_created',
                'label'=>'Date Created',
                'value'=>function($model){
                    $date = $model->date_created;
                    return date_format(date_create($date), "M d, Y");
                },
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width'=>'120px',
            ],
            //'total_pr_amount',
            [
                //'attribute' => 'total_pr_amount',
                'label'=>'Amount',
                'value'=>'total_pr_amount',
                'format' => ['decimal', 2],
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-right kv-align-middle',
                    'style'=>'padding-right:15px;'
                ],
                'width'=>'120px',
            ],
            //'requested_by',
            //'approved_by',
            //'encoder',
            //'pr_type',
            //'status',
            [
                'class' => ActionColumn::className(),
                'header' => '',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'template'=>'{delete}',
                'buttons' => [
                    'delete'=> function ($url, $model) {

                        return Html::a( '<i class="glyphicon glyphicon-trash"></i>',
                                Url::toRoute(['pr-report/delete', 'id'=>$model['pr_id']]),
                                [
                                    'class'=> 'btn btn-sm btn-danger btn-delete-pr',
                                    'title' => 'delete tracker',
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
        //'filterModel'=>$searchModel,
        'columns' => $column,
        'tableOptions'=>[
            'id'=>'table-grid-pr',
        ],
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'rowOptions' => [
            'height' => '50px',
        ],
        'toolbar'=> [
            'content' => Html::button('Create New Purchase Request', ['id' => '', 'data-toggle' => 'modal', 'data-target' => '#modal-create-pr', 'data-backdrop' => 'static', 'data-keyboard' => false, 'class' => 'btn btn-sm btn-success']),
        ],
        'pjax'=> false,
        //'showPageSummary'=>true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=> [
            'heading'=> '<b>Purchase Request (PR)</b><div class="box-tools pull-right">',
            'headingOptions' => [
                'class' => 'box-header box-solid bg-default no-border',
            ],
            'after' => false,
            'footer'=> false,
        ],
        'resizableColumns'=>false,
        'persistResize'=>true,
    ]); ?>
</div>

<!-- CREATE NEW PR MODAL -->
<div id="modal-create-pr" class="fade modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="header-inspinia modal-header">
                <?= Html::button('<i class="fa fa-close"></i>', ['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => true]) ?>
            </div>
 
            <?php 
                $pr_report = new PrReport();
                $pr_report->pr_type = 0;

                $form  = ActiveForm::begin([
                    'id'    => 'frm-create-pr',
                    'action'=> Url::toRoute(['create-items']),
                ]);
            ?>

                <div class="modal-body">
                    <div id="modal-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <?= Html::hiddenInput('PrReport[tracker_id]', $model->pr_tracker_id, []) ?>
                                <?= $form->field($pr_report, 'pr_type')->radio(['label' => 'with PPMP', 'value' => 0, 'uncheckValue' => null]) ?>
                                <?= $form->field($pr_report, 'pr_type')->radio(['label' => 'Supplemental PPMP', 'value' => 1, 'uncheckValue' => null]) ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <?= Html::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>