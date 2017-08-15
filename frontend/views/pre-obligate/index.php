<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PreObligateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Earmark';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pre-obligate-index content-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'obligate_id',
            //'fund_source_id',
            'alobs_no',
            'name',
            'purpose:ntext',
            //'obligate_amount',
            //'amt_release',
            // 'alobs_yr',
            // 'alobs_month',
            // 'alobs_seq',
            'alobs_date',
            'accountable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
