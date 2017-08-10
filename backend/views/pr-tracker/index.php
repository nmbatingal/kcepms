<?php

use yii\helpers\Html;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrTrackerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trackers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-tracker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'pr_tracker_id',
            'tracker_no',
            // 'tracker_year',
            // 'tracker_month',
            // 'tracker_seq',
            // 'proposal_no',
            'tracker_title:ntext',
            'unit_responsible',
            // 'responsibility_code',
            'proponent',
            // 'encoder',
            'date_created',
            // 'date_updated',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
