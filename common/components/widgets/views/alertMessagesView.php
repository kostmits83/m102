
<?php if (!empty(Yii::$app->session->getAllFlashes())): ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
	<?php foreach (Yii::$app->session->getAllFlashes() as $key => $value): ?>
			<div class="alert alert-<?= $key; ?> alert-dismissable">
	            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            <?= Yii::$app->session->getFlash($key) ?>
	        </div>
	<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
