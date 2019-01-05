<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Markets\Market;
?>

<div class="markets">
	<h1 class="header-3 markets__header">Markets</h1>
<?php if (!empty($params['response'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<?php foreach (Market::getPropertiesForTable() as $key): ?>
				<th data-toggle="tooltip" data-container="body" title="<?= Market::getPropertyTitle($key); ?>"><?= Market::getPropertyLabel($key); ?></th>
				<?php endforeach; ?>
			</tr>
		<?php foreach ($params['response'] as $key => $model): ?>
			<tr class="<?= VariousHelper::getUpDown($model->marketPercent); ?>">
				<td><?= $model->mic; ?></td>
				<td><?= VariousHelper::getEuropeanNumber($model->volume); ?></td>
				<td><?= VariousHelper::getEuropeanNumber($model->tapeA); ?></td>
				<td><?= VariousHelper::getEuropeanNumber($model->tapeB); ?></td>
				<td><?= VariousHelper::getEuropeanNumber($model->tapeC); ?></td>
				<td><?= VariousHelper::getEuropeanNumber($model->marketPercent * 100); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>
	<p>Currently there are no available Markets info.</p>
<?php endif; ?>
</div>
