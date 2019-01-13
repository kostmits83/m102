<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Stocks\StockSectorPerformance;
?>

<div class="stock-sector-performance">
	<h1 class="header-3 stock-sector-performance__header">Sectors Performance</h1>
<?php if (!empty($params['response'])): ?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<?php foreach (StockSectorPerformance::getPropertiesForTable() as $key): ?>
				<th><?= StockSectorPerformance::getPropertyLabel($key); ?></th>
				<?php endforeach; ?>
			</tr>
		<?php foreach ($params['response'] as $key => $model): ?>
			<tr>
				<td><?= $model['name']; ?> <?= VariousHelper::getUpDownIndicator($model['performance']); ?></td>
				<td><?= VariousHelper::percentize($model['performance']); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>
	<p>Currently there are no available Sector Performance info.</p>
<?php endif; ?>
</div>
