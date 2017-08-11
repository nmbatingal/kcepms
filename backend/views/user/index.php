<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
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

<div class="user-index content-body">

    <?php
        $column = [
            [
                'class' => SerialColumn::className(),
                'header' => false,
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
            ],

            // 'id',
            // 'username',
            [
                'attribute' => 'username',
                'label' => 'Username',
                'value' => function($model){
                    return '<b>'.$model['username'].'</b>';
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
                'width' => '100px',
            ],
            [
                'attribute' => 'user_level',
                'label' => 'User Level',
                'value' => function($model){
                    switch ($model['user_level']) {
                        case 0:
                            return '<span>user</span>';
                            break;
                        case 1:
                            return '<span class="text-red">admin</span>';
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
                'width' => '100px',
            ],
            [
                'attribute' => 'fullname',
                'label' => 'Date Created',
                'value' => function($model){
                    $ext      = !empty($model['ext']) ? $model['ext'] : ''; 
                    $fullname = $model['lastname'].', '.$model['firstname'].' '.$ext.' '.$model['mi'][0].'.';
                    return $fullname;
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
                'width' => '200px',
            ],
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute' => 'position_abr',
                'label' => 'Position',
                'value' => 'position_abr',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '100px',
            ],
            //'status',
            // 'created_at',
            [
                'attribute' => 'created_at',
                'label' => 'Date Created',
                'value' => function($model){
                    $timestamp = $model['created_at'];
                    $date = date("M-d-Y", $timestamp);
                    $time = date("H:i a", $timestamp);
                    
                    return $date.' <i class="text-red">'.$time.'</i>';
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'width' => '120px',
            ],
            // 'updated_at',
            // 'lastname',
            // 'firstname',
            // 'mi',
            // 'position_abr',
            // 'user_level',
            [
                'attribute' => 'status',
                'label' => 'Status',
                'value' => function($model){
                    switch ($model['status']) {
                        case 0:
                            return Html::button('Inactive', ['class' => 'btn btn-xs btn-block btn-danger']);
                            break;
                        case 10:
                            return Html::button('Active', ['class' => 'btn btn-xs btn-block btn-success']);
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
                'width' => '100px',
            ],

            //['class' => 'yii\grid\ActionColumn'],
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
