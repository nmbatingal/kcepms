<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PpmpItemOriginal */

$this->title = 'Update Ppmp Item Original: ' . $model->ppmp_item_original_id;
$this->params['breadcrumbs'][] = ['label' => 'Ppmp Item Originals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ppmp_item_original_id, 'url' => ['view', 'id' => $model->ppmp_item_original_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppmp-item-original-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
