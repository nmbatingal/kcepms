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

<div id="dashboard" class="site-index content-body">

	<!-- CHARTS -->
	<div class="container-fluid">
		
		<!--  -->
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title"></div>
				</div>
				<div class="panel-body">
					<div id="tracker_graph"></div>
				</div>
			</div>
		</div>

		<!--  -->
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title"></div>
				</div>
				<div class="panel-body">
					<div id="summary_graph"></div>
				</div>
			</div>
		</div>
	</div>

	Dashboard
	<?= Yii::$app->getRequest()->serverName ?>

</div>
