<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Stocks\StockSectorPerformance;
?>

<div class="stock-sector-performance">
	<h1 class="header-3 stock-sector-performance__header">Sectors Performance</h1>
<?php if (!empty($params['response'])): ?>
	<table class="table table-responsive table-striped table-bordered table-hover">
		<tr>
			<?php foreach (StockSectorPerformance::getPropertiesForTable() as $key): ?>
			<th><?= StockSectorPerformance::getPropertyLabel($key); ?></th>
			<?php endforeach; ?>
		</tr>
	<?php foreach ($params['response'] as $key => $model): ?>
		<tr>
			<td><?= $model['name']; ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model['performance'] * 100, 3); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>Currently there are no available Sector Performance info.</p>
<?php endif; ?>
</div>
