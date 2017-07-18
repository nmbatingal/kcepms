<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pr Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pr Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pr_id',
            'pr_no',
            'tracker_id',
            'purpose:ntext',
            'date_created',
            // 'total_pr_amount',
            // 'requested_by',
            // 'approved_by',
            // 'encoder',
            // 'pr_type',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
