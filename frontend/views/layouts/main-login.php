<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use dmstr\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<style>
    .header-inspinia {
        background-color: #1ab394 !important; 
        color: #fff !important;
    }

    .btn-success {
        color: #fff;
        background-color: #1ab394 !important;
    }

    .login-page {
        /*background: url("img/bg/img_1.jpg") no-repeat center center fixed; */
        background-color: #fff;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .bg-shadow {
        box-shadow: 1px 2px 2px #888888;
    }

    .custom-footer {
        background: #fff;
        padding: 15px;
        color: #444;
        border-top: 1px solid #d2d6de;
    }
</style>

<body class="login-page">

<?php $this->beginBody() ?>
	
    <?= $this->render('header-login.php') ?>
    <?= $content ?>

    <footer class="custom-footer">
        <div class="pull-right hidden-xs">
            <b>KC-ePMS</b> v2.0
        </div>

        <strong>Copyright &copy; <?= date('Y') ?> <a href="http://apps.caraga.dswd.gov.ph">DSWD-KC CARAGA</a>.</strong> All rights reserved.

    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
