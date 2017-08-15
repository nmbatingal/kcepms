<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KcPreObligate */

$this->title = 'Create Kc Pre Obligate';
$this->params['breadcrumbs'][] = ['label' => 'Kc Pre Obligates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kc-pre-obligate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
