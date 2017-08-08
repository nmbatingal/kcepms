<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PrReport */

$this->title = 'Update Pr Report: ' . $model->pr_id;
$this->params['breadcrumbs'][] = ['label' => 'Pr Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pr_id, 'url' => ['view', 'id' => $model->pr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pr-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
