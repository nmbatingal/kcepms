<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<style>
    .login-header a {
        color: #fff !important;
        font-size: 18pt;
    }

    .nav-inspinia {
        height: 50px !important;
        background-color: #1ab394 !important;
        box-shadow: 3px 2px 3px 0 rgba(0, 0, 0, 0.14), 
                    3px 1px 2px 0 rgba(0, 0, 0, 0.2), 
                    1px 3px 2px 0 rgba(0, 0, 0, 0.12);
    }

    .login-title {
        padding: 10px 30px;
    }
</style>

<header class="login-header">
    <div class="nav-inspinia">
        <div class="login-title">
            <?= Html::a('<b>KC</b> Electronic Procurement Management System (Admin)', Yii::$app->homeUrl, ['class' => '']) ?>
        </div>
    </div>
</header>
