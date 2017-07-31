<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblLogs */

$this->title = 'Update Tbl Logs: ' . $model->log_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->log_id, 'url' => ['view', 'id' => $model->log_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-logs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
