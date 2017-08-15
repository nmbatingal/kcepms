<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PreObligate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pre Obligates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pre-obligate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->obligate_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->obligate_id], [
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
            'obligate_id',
            'fund_source_id',
            'name',
            'purpose:ntext',
            'obligate_amount',
            'amt_release',
            'alobs_yr',
            'alobs_month',
            'alobs_seq',
            'alobs_no',
            'alobs_date',
            'accountable',
        ],
    ]) ?>

</div>
