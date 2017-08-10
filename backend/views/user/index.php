<?php

use yii\helpers\Html;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'username',
            [
                'attribute' => 'username',
                'label' => 'Username',
                'value' => 'username',
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
                'attribute' => 'user_level',
                'label' => 'User Level',
                'value' => function($model){
                    switch ($model['user_level']) {
                        case 0:
                            return Html::button('user', ['class' => 'btn btn-xs btn-block btn-default']);
                            break;
                        case 1:
                            return Html::button('admin', ['class' => 'btn btn-xs btn-block btn-default']);
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
        ],
    ]); ?>
</div>
