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
			<th><?= Market::getPropertyLabel($key); ?></th>
			<?php endforeach; ?>
		</tr>
	<?php foreach ($params['response'] as $key => $market): ?>
		<tr>
			<td><?= $market->mic; ?></td>
			<td><?= VariousHelper::getEuropeanNumber($market->volume); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($market->tapeA); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($market->tapeB); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($market->tapeC); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($market->marketPercent); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>Current there are no available markets info.</p>
<?php endif; ?>
</div>
