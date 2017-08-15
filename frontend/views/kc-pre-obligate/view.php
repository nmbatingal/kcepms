<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KcPreObligate */

$this->title = $model->obligate_id;
$this->params['breadcrumbs'][] = ['label' => 'Kc Pre Obligates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kc-pre-obligate-view">

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
            'pr_no',
            'alobs_no',
            'encoder',
        ],
    ]) ?>

</div>
