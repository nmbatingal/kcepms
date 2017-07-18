<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PpmpItemOriginal */

$this->title = 'Create Ppmp Item Original';
$this->params['breadcrumbs'][] = ['label' => 'Ppmp Item Originals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppmp-item-original-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
