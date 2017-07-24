<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;
use kartik\datecontrol\DateControl;
use kartik\widgets\DatePicker;

use common\models\PrTracker;
use common\models\LibDivision;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrTrackerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PR Tracker';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    textarea {
        resize: none;
    }

    .item-list {
        list-style: none;
        margin: 0;
        padding: 0;
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

<div class="pr-tracker-index content-body">

    <div class="box box-solid">
        <div class="box-body">
            <div class="pull-right">
                <?= Html::button('Create Tracker', ['id' => '', 'data-toggle' => 'modal', 'data-target' => '#modal-create-tracker', 'data-backdrop' => 'static', 'data-keyboard' => false, 'class' => 'btn btn-success']) ?>
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
            //'pr_tracker_id',
            //'tracker_year',
            //'tracker_month',
            //'tracker_seq',
            //'tracker_no',
            [
                'label' => 'Tracking Number',
                'mergeHeader' => true,
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
                'width'=>'100px',
            ],
            //'proposal_no',
            //'tracker_title:ntext',
            [
                'attribute' => 'tracker_title',
                'label' => 'Title',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(PrTracker::find()->all(), 'tracker_title', 'tracker_title'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Search title ...', 'style' => 'display: block',],
                'value' => 'tracker_title',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                    'style'=>'min-width:500px;white-space:normal',
                ],
            ],
            //'unit_responsible',
            [
                'attribute' => 'unit_responsible',
                'label' => 'Responsible Unit',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(PrTracker::find()->all(), 'unit_responsible', 'unit_responsible'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Search unit ...', 'style' => 'display: block',],
                'value' => 'unit_responsible',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            //'proponent',
            [
                'attribute' => 'proponent',
                'label' => 'Requesting Proponent',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(PrTracker::find()->all(), 'proponent', 'proponent'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Search unit ...', 'style' => 'display: block',],
                'value' => 'proponent',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],
            //'encoder',
            //'date_created',
            [
                'attribute' => 'date_created',
                'label'=>'Tracker Created',
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
            //'date_updated',
            //'status',
            [
                'class' => ActionColumn::className(),
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'template'=>'{update}&nbsp;{delete}',
                'buttons' => [
                    'update'=> function ($url, $model) {
                        return Html::a( '<i class="glyphicon glyphicon-pencil"></i>',
                                Url::toRoute(['update', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-sm btn-primary btn-link-page',
                                    'title' => 'update tracker',
                                ]
                            );
                    },
                    'delete'=> function ($url, $model) {
                        return Html::a( '<i class="glyphicon glyphicon-trash"></i>',
                                Url::toRoute(['delete', 'id'=>$model['pr_tracker_id']]),
                                [
                                    'class'=> 'btn btn-sm btn-danger btn-delete-tracker',
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

<!-- CREATE NEW TRACKER MODAL -->
<div id="modal-create-tracker" class="fade modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="header-inspinia modal-header">
                <?= Html::button('<i class="fa fa-close"></i>', ['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => true]) ?>
                <h4 class="box-title">CREATE NEW TRACKER</h4>
            </div>
 
            <?php 
                $model = new PrTracker();

                $form  = ActiveForm::begin([
                    'id'    => 'frm-create-tracker',
                    'action'=> Url::toRoute(['create']),
                ]); 

                $model->date_created    = date("Y-m-d");
                $model->date_updated    = date("Y-m-d H:i:s");
                $model->encoder         = Yii::$app->user->identity->id;
                
                $sql                    = "SELECT code, acronym, acronym AS acr, description FROM libraries.lib_division 
                                            UNION 
                                                SELECT b.code, CONCAT(a.acronym,'/', b.acronynm) as acronym, b.acronynm as acr, b.description 
                                                FROM libraries.lib_division a, libraries.lib_unit b 
                                                WHERE b.division_id = a.division_id 
                                            UNION
                                                SELECT c.code, CONCAT(a.acronym,'/', b.acronynm, '/', c.acronym) as acronym, c.acronym as acr, c.description 
                                                FROM libraries.lib_division a, libraries.lib_unit b, libraries.lib_section c 
                                                WHERE c.unit_id = b.unit_id
                                                AND b.division_id = a.division_id 
                                            UNION
                                                SELECT d.code, CONCAT(a.acronym,'/', b.acronynm, '/', c.acronym, '/', d.acronym) as acronym, d.acronym as acr, d.description 
                                                FROM libraries.lib_division a, libraries.lib_unit b, libraries.lib_section c, libraries.lib_sub_section d
                                                WHERE d.section_id = c.section_id
                                                AND c.unit_id = b.unit_id
                                                AND b.division_id = a.division_id";

                $result = Yii::$app->getDb()->createCommand($sql)->queryAll();

                $model->unit_responsible = "20-001-03-00016-00003-02-03|OPD/PRPU/CDDKC";
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
                                <?= $form->field($model, 'unit_responsible')
                                    ->dropDownList(ArrayHelper::map($result, 
                                            function($model){
                                                return $model['code'].'|'.$model['acronym'];
                                            }, 
                                            function($model){
                                                return $model['acr'] .' - '. $model['description'];
                                        }), 
                                        ['prompt' => 'select responsible unit ...']) 
                                    ->label('Responsible Unit') ?>

                                <?= $form->field($model, 'proponent')
                                        ->textInput(['placeholder' => 'requesting proponent'])
                                        ->label(false) ?>

                                <hr>
                                
                                <?= $form->field($model, 'tracker_title')->textArea(['rows' => 3, 'placeholder' => 'Tracker title'])->label(false) ?>

                            </div>
                        </div>
                        <?= $form->field($model, 'encoder')->hiddenInput()->label(false) ?>
                        <?= $form->field($model, 'date_updated')->hiddenInput()->label(false) ?>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <?= Html::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
                        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>