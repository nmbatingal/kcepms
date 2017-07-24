<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblPurchaseRequest */

$this->title = 'Create Tbl Purchase Request';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Purchase Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-purchase-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
