<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LibItem */

$this->title = $model->item_id;
$this->params['breadcrumbs'][] = ['label' => 'Lib Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lib-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->item_id], [
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
            'item_id',
            'item_category_id',
            'generic_id',
            'subgeneric_id',
            'item_description:ntext',
            'unit_id',
            'uacs_id',
            'barcode',
            'price',
            'date_added',
            'encoder',
            'status',
        ],
    ]) ?>

</div>
