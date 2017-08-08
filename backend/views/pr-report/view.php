<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PrReport */

$this->title = $model->pr_id;
$this->params['breadcrumbs'][] = ['label' => 'Pr Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pr_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pr_id',
            'pr_no',
            'tracker_id',
            'purpose:ntext',
            'date_created',
            'total_pr_amount',
            'requested_by',
            'noted_by',
            'reviewed_by',
            'approved_by',
            'encoder',
            'pr_type',
            'ppmp_mode',
            'status',
        ],
    ]) ?>

</div>
