<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PreObligate */

$this->title = 'Create Pre Obligate';
$this->params['breadcrumbs'][] = ['label' => 'Pre Obligates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pre-obligate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
