<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblPurchaseRequest */

$this->title = $model->pr_no;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Purchase Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-purchase-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pr_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pr_no], [
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
            'pr_no',
            'doc_type_id',
            'div_id',
            'unit_id',
            'doc_date',
            'purpose',
            'tot_amount',
            'requested_by',
            'date_encoded',
            'place:ntext',
            'responsible',
            'prov_code',
            'city_code',
            'brgy_code',
            'encoded_by',
            'username',
        ],
    ]) ?>

</div>
