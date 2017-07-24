<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblPurchaseRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Requests';
$this->params['breadcrumbs'][] = $this->title;
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

<div class="tbl-purchase-request-index content-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pr_no',
            //'doc_type_id',
            'div_id',
            //'unit_id',
            //'doc_date',
            'purpose',
            'tot_amount',
            'requested_by',
            // 'date_encoded',
            // 'place:ntext',
            // 'responsible',
            // 'prov_code',
            // 'city_code',
            // 'brgy_code',
            // 'encoded_by',
            'username',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
