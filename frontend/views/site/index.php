<?php
use common\components\widgets\StockNews;
use common\components\widgets\StockList;
use common\components\widgets\Markets;
use common\components\widgets\StatsRecent;

/* @var $this yii\web\View */
?>
<div class="site-index">

	<div class="container">
    	<div class="row">
    		<div class="col-xs-12 col-lg-9">

    			<?= Markets::widget(['params' => []]); ?>

    			<?= StatsRecent::widget(['params' => []]); ?>

    			<?= StockList::widget(['params' => ['listType' => 'gainers', 'header' => 'Top Gainers']]); ?>
    			<?= StockList::widget(['params' => ['listType' => 'losers', 'header' => 'Top Losers']]); ?>
    			<?= StockList::widget(['params' => ['listType' => 'infocus', 'header' => 'Top In Focus']]); ?>
				
			</div>
	    	<aside class="col-xs-12 col-lg-3 sidebar sidebar--stock-news">
				<?= StockNews::widget(['params' => ['ticker' => 'market']]); ?>
			</aside>
		</div>
	</div>
    
</div>
