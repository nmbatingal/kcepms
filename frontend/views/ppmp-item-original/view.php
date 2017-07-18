<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PpmpItemOriginal */

$this->title = $model->ppmp_item_original_id;
$this->params['breadcrumbs'][] = ['label' => 'Ppmp Item Originals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppmp-item-original-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ppmp_item_original_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ppmp_item_original_id], [
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
            'ppmp_item_original_id',
            'ppmp_id',
            'ppmp_item_cat_id',
            'ppmp_item_subcat_id',
            'item_description:ntext',
            'inventory_id',
            'unit_id',
            'addtitional_number',
            'item_price',
            'january',
            'february',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december',
            'total_count',
            'total_amount',
        ],
    ]) ?>

</div>
