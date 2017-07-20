<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */

$this->title = 'Update Pr Tracker: ' . $model->pr_tracker_id;
$this->params['breadcrumbs'][] = ['label' => 'Pr Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pr_tracker_id, 'url' => ['view', 'id' => $model->pr_tracker_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pr-tracker-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
