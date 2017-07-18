<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */

$this->title = 'Create Pr Tracker';
$this->params['breadcrumbs'][] = ['label' => 'Pr Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-tracker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
