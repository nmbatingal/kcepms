<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-logs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'log_id',
            //'action',
            //'encoder',
            [
                'attribute' => 'action',
                'label' => 'Action',
                'filter' => [
                    '0' => 'Create',
                    '1' => 'Update',
                    '2' => 'Delete',
                    '3' => 'Restore',
                    '4' => 'Login/Logout',
                ],
                'value' => function($model){
                    switch ($model['action']) {
                        case 0:
                            return '<span class="badge bg-green">Create</span>';
                            break;
                        case 1:
                            return '<span class="badge bg-blue">Update</span>';
                            break;
                        case 2:
                            return '<span class="badge bg-red">Delete</span>';
                            break;
                        case 3:
                            return '<span class="badge bg-green">Restore</span>';
                            break;
                        case 4:
                            return '<span class="badge bg-gray">Login/Logout</span>';
                            break;
                    }
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class' => 'kv-align-center kv-align-middle',
                    //'style' => 'padding: 0 !important;',
                ],
                'width' => '120px',
            ],
            [
                'attribute' => 'encoder',
                'label' => 'User',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(User::find()->all(), 'id', function($model){
                    return $model['username'];
                }), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Search encoder ...', 'style' => 'display: block',],
                'value' => function($model){
                    $name = User::findIdentity($model['encoder'])->username;

                    return Html::a($name, '#', ['class' => '']);
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class' => 'kv-align-center kv-align-middle',
                    'style' => 'font-weight: bold',
                ],
                'width' => '150px',
            ],
            //'tbl_name',
            //'tbl_col',
            // 'tbl_id',
            //'details:ntext',
            [
                'attribute' => 'details',
                'label' => 'Activity Details',
                'value' => function($model){
                    $string = explode('##', $model['details']);
                    if (count($string) > 1) {
                        $tracker = '<span class="text-red" style="font-weight:bold">'.$string[1].'</span>';
                        return $string[0].$tracker.$string[2];

                    } else {
                        return $model['details'];
                    }
                },
                'format' => 'raw',
                'headerOptions'=>[
                    'class'=>'kv-align-center kv-align-middle',
                ],
                'contentOptions' => [
                    'class'=>'kv-align-left kv-align-middle',
                ],
            ],
            //'log_date',
            [
                'attribute' => 'log_date',
                /*'filterType'=>GridView::FILTER_DATE,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>[
                        //'allowClear' => true,
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ],
                'filterInputOptions'=> [ 
                    'style' => 'display: block',
                ],*/
                'label' => 'Log Date',
                'value' => function($model){
                    $date = date("M-d-Y", strtotime($model['log_date']));
                    $time = date("H:i a", strtotime($model['log_date']));
                    
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
        ],
    ]); ?>
</div>
