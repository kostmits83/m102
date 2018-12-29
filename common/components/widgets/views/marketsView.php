<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Markets\Market;
?>

<div class="markets">
	<h1 class="header-3 markets__header">Markets</h1>
<?php if (!empty($params['response'])): ?>
	<table class="table table-responsive table-striped table-bordered table-hover">
		<tr>
			<?php foreach (Market::getPropertiesForTable() as $key): ?>
			<th title="<?= Market::getPropertyTitle($key); ?>"><?= Market::getPropertyLabel($key); ?></th>
			<?php endforeach; ?>
		</tr>
	<?php foreach ($params['response'] as $key => $model): ?>
		<tr>
			<td><?= $model->mic; ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->volume); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->tapeA); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->tapeB); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->tapeC); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->marketPercent * 100); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>Currently there are no available markets info.</p>
<?php endif; ?>
</div>
