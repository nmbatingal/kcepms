<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>

<?php

	if(Yii::$app->user->isGuest) {
		echo '
			<div class="alert alert-warning alert-dismissible">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			    <h4><i class="icon fa fa-warning"></i> You are currently viewing as Guest!</h4>
			    Please login in your account to continue using the system.
			</div>
		';
	}
?>

<div class="site-index content-body">
	Dashboard
	<?= Yii::$app->getRequest()->serverName.Yii::getAlias('@web') ?>
</div>
