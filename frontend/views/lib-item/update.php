<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LibItem */

$this->title = 'Update Lib Item: ' . $model->item_id;
$this->params['breadcrumbs'][] = ['label' => 'Lib Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_id, 'url' => ['view', 'id' => $model->item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lib-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
