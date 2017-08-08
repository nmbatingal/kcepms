<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */

$this->title = $model->pr_tracker_id;
$this->params['breadcrumbs'][] = ['label' => 'Pr Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-tracker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pr_tracker_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pr_tracker_id], [
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
            'pr_tracker_id',
            'tracker_no',
            'tracker_year',
            'tracker_month',
            'tracker_seq',
            'proposal_no',
            'tracker_title:ntext',
            'unit_responsible',
            'responsibility_code',
            'proponent',
            'encoder',
            'date_created',
            'date_updated',
            'status',
        ],
    ]) ?>

</div>
