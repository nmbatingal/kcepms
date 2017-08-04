<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<style>
    .main-header a {
        color: #fff !important;
    }

    .nav-inspinia {
        height: 51px !important;
        background-color: #1ab394 !important;
        box-shadow: 3px 2px 3px 0 rgba(0, 0, 0, 0.14), 
                    3px 1px 2px 0 rgba(0, 0, 0, 0.2), 
                    1px 3px 2px 0 rgba(0, 0, 0, 0.12);
    }
</style>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><b>KC</b>P</span><span class="logo-lg"><b>KC</b> Procurement</span>', Yii::$app->homeUrl, ['class' => 'logo nav-inspinia ']) ?>

    <nav class="navbar navbar-static-top nav-inspinia" role="navigation">
    </nav>
</header>
