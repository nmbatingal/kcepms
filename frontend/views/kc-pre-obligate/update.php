<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KcPreObligate */

$this->title = 'Update Kc Pre Obligate: ' . $model->obligate_id;
$this->params['breadcrumbs'][] = ['label' => 'Kc Pre Obligates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->obligate_id, 'url' => ['view', 'id' => $model->obligate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kc-pre-obligate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
