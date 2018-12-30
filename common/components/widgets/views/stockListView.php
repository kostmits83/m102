<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Stocks\StockList;
?>

<div class="markets">
	<h1 class="header-3 stats-recent__header"><?= $params['header']; ?></h1>
<?php if (!empty($params['response'])): ?>
	<table class="table table-responsive table-striped table-bordered table-hover">
		<tr>
			<?php foreach (StockList::getPropertiesForTable() as $key): ?>
			<th><?= StockList::getPropertyLabel($key); ?></th>
			<?php endforeach; ?>
		</tr>
	<?php foreach ($params['response'] as $key => $model): ?>
		<tr>
			<td><?= $model->symbol; ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->latestPrice, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->latestVolume); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->previousClose, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->change, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->changePercent * 100, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->week52High, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->week52Low, 4); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model->ytdChange, 4); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>Currently there are no available recents stats info.</p>
<?php endif; ?>
</div>
