<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-logs-index content-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'log_id',
            'encoder',
            'action',
            'tbl_name',
            'tbl_id',
            // 'details:ntext',
            // 'log_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
