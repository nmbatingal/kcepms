<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\PrTracker */

$this->title = 'Update Tracker';
$this->params['breadcrumbs'][] = ['label' => 'Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tracker_no, 'url' => ['view', 'id' => $model->pr_tracker_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section class="content-header page-heading white-bg">
    <?php if (isset($this->blocks['content-header'])) { ?>
        <h1><?= $this->blocks['content-header'] ?></h1>
    <?php } else { ?>
        <h1>
            <?php
            if ($this->title !== null) {
                echo \yii\helpers\Html::encode($this->title);
            } else {
                echo \yii\helpers\Inflector::camel2words(
                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                );
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            } ?>
        </h1>
    <?php } ?>

    <?= Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
    ) ?>
</section>

<div class="pr-tracker-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
