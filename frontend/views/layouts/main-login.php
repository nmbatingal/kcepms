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
</style>

<body class="login-page">

<?php $this->beginBody() ?>
	

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
