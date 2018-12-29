<?php
use common\components\widgets\SidebarStockNews;
use common\components\widgets\Markets;

/* @var $this yii\web\View */
?>
<div class="site-index">

	<div class="container">
    	<div class="row">
    		<div class="col-xs-12 col-lg-9">

    			<?= Markets::widget(['params' => []]); ?>
				
			</div>
	    	<aside class="col-xs-12 col-lg-3 sidebar sidebar--stock-news">
				<?= SidebarStockNews::widget(['params' => ['ticker' => 'market']]); ?>
			</aside>
		</div>
	</div>
    
</div>
