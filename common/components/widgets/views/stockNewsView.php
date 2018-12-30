<?php
use yii\helpers\Html;
use common\helpers\VariousHelper;
?>

<div class="stock-news">
	<h1 class="header-3 stock-news__header">Stock News</h1>
<?php if (!empty($params['response'])): ?>
	<?php foreach ($params['response'] as $key => $stock): ?>
	<div class="stock-article">
		<div class="stock-article__header">
			<?= Html::a($stock->headline, $stock->url, ['class' => 'js-external link link--state-1']); ?>
		</div>
		<p class="stock-article__datetime"><?= VariousHelper::getFormattedDatetime($stock->datetime); ?></p>
		<p class="stock-article__summary"><?= $stock->summary; ?></p>
		<p class="stock-article__source">Source: <?= $stock->source; ?></p>
	</div>
	<?php endforeach; ?>
<?php else: ?>
	<p>Current there are no available Stock News.</p>
<?php endif; ?>
</div>
