<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblPurchaseRequest */

$this->title = 'Update Tbl Purchase Request: ' . $model->pr_no;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Purchase Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pr_no, 'url' => ['view', 'id' => $model->pr_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-purchase-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
