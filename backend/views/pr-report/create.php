<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PrReport */

$this->title = 'Create Pr Report';
$this->params['breadcrumbs'][] = ['label' => 'Pr Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
