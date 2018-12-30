<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
use common\components\IEXTradingApi\Responses\Stats\StatsRecent;
?>

<div class="markets">
	<h1 class="header-3 stats-recent__header">Recents Stats</h1>
<?php if (!empty($params['response'])): ?>
	<table class="table table-responsive table-striped table-bordered table-hover">
		<tr>
			<?php foreach (StatsRecent::getPropertiesForTable() as $key): ?>
			<th data-toggle="tooltip" data-container="body" title="<?= StatsRecent::getPropertyTitle($key); ?>"><?= StatsRecent::getPropertyLabel($key); ?></th>
			<?php endforeach; ?>
		</tr>
	<?php foreach ($params['response'] as $key => $model): ?>
		<tr>
			<td><?= $model['date']; ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model['volume']); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model['routedVolume']); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model['marketShare'] * 100, 3); ?></td>
			<td><?= VariousHelper::getEuropeanNumber($model['litVolume']); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>Currently there are no available recents stats info.</p>
<?php endif; ?>
</div>
