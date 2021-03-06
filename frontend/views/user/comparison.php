<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\models\UserStockFavors;
use common\helpers\VariousHelper;

$this->title = Yii::t('app', 'Comparison');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-comparison">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="header-3">Stock Comparison List</h1>
            </div>
        </div>
    </div>
    <?php if (!empty($stockComparison)): ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Symbol</th>
                            <th>Latest Price</th>
                            <th>Change</th>
                            <th>Change Percent</th>
                            <th>Latest Volume</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>Low</th>
                            <th>High</th>
                            <th>Week 52 High</th>
                            <th>Week 52 Low</th>
                            <th>PE Ratio</th>
                            <th>Year Change</th>
                            <th>AVG Total Volume</th>
                            <th>Market Cap</th>
                            <th> </th>
                        </tr>
                    <?php foreach ($stockComparison as $data): ?>
                        <tr class="<?= VariousHelper::getStockFavorsDeleteCssClass($data['stock_id'], UserStockFavors::FAVOR_COMPARISON); ?>">
                            <td><?= $data['stockCompany']->symbol; ?> <?= VariousHelper::getUpDownIndicator($data['stockQuote']->change); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->latestPrice); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->change); ?></td>
                            <td><?= VariousHelper::percentize($data['stockQuote']->changePercent); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->latestVolume, 0); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->open); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->close); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->low); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->high); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->week52High); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->week52Low); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->peRatio); ?></td>
                            <td><?= VariousHelper::percentize($data['stockQuote']->ytdChange); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->avgTotalVolume, 0); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->marketCap, 0); ?></td>
                            <td><a href="<?= Url::to(['stock/delete-stock-from-favors']); ?>" class="icon-delete icon-delete--comparison js-delete-stock-from-favors" data-id="<?= $data['stock_id']; ?>" data-type_id="<?= UserStockFavors::FAVOR_COMPARISON; ?>" data-toggle="tooltip" data-container="body" title="<?= Yii::t('app/buttons', 'delete_from_comparison_list'); ?>"><i class="fas fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>You have not selected any favorites stocks yet.</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
