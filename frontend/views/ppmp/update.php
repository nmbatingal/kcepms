<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Ppmp */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'PPMP', 'url' => ['index']];
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

<div class="ppmp-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
