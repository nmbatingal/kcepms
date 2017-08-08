<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblLogs */

$this->title = 'Create Tbl Logs';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
