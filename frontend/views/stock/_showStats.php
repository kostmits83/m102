<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\components\widgets\StockNews;
use common\components\widgets\StockList;
use common\components\widgets\StockSectorPerformance;
use common\components\widgets\Markets;
use common\components\widgets\StatsRecent;
?>

<div class="stats">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="row stats__primary">
                    <div class="col-xs-12 col-sm-2">
                        <div class="stats__identity">
                            <?= Html::img($data['stockLogo']->url, ['alt' => ' ', 'class' => 'stats__logo img-responsive']); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="stats__movement">
                            <h2 class="stats__company-info header-3"><span class="stats__symbol"><?= $data['stockCompany']->symbol; ?></span> | <span class="stats__company-name"><?= $data['stockCompany']->companyName; ?></span></h2>
                            <div class="stats__row">
                                <p class="stats__price stats-info-element"><span class="stats__label">Latest Price</span><?= $data['stockQuote']->latestPrice . ' USD'; ?></p>
                                <p class="stats__change stats-info-element"><span class="stats__label">Change</span><?= $data['stockQuote']->change; ?></p>
                                <p class="stats__change-percent stats-info-element"><span class="stats__label">Change Percent</span><?= $data['stockQuote']->changePercent; ?></p>
                                <p class="stats__latest-volume stats-info-element"><span class="stats__label">Latest Volume</span><?= $data['stockQuote']->latestVolume; ?></p>
                            </div>
                            <div class="stats__row">
                                <p class="stats__open-price stats-info-element"><span class="stats__label">Open</span><?= $data['stockQuote']->open; ?></p>
                                <p class="stats__close-price stats-info-element"><span class="stats__label">Close</span><?= $data['stockQuote']->close; ?></p>
                                <p class="stats__low-price stats-info-element"><span class="stats__label">Low</span><?= $data['stockQuote']->low; ?></p>
                                <p class="stats__high-price stats-info-element"><span class="stats__label">High</span><?= $data['stockQuote']->high; ?></p>
                            </div>
                            <div class="stats__row">
                                <p class="stats__week-52-high stats-info-element"><span class="stats__label">Week 52 High</span><?= $data['stockQuote']->week52High; ?></p>
                                <p class="stats__week-52-low stats-info-element"><span class="stats__label">Week 52 Low</span><?= $data['stockQuote']->week52Low; ?></p>
                                <p class="stats__pe-ration stats-info-element"><span class="stats__label">PE Ration</span><?= $data['stockQuote']->peRatio; ?></p>
                                <p class="stats__ytd-change stats-info-element"><span class="stats__label">Year Change</span><?= $data['stockQuote']->ytdChange; ?></p>
                            </div>
                            <div class="stats__row">
                                <p class="stats__avg-total-volume stats-info-element"><span class="stats__label">AVG Total Volume</span><?= $data['stockQuote']->avgTotalVolume; ?></p>
                                <p class="stats__iex-bid-price stats-info-element"><span class="stats__label">IEX Bid Price</span><?= $data['stockQuote']->iexBidPrice; ?></p>
                                <p class="stats__iex-bid-size stats-info-element"><span class="stats__label">IEX Bid Size</span><?= $data['stockQuote']->iexBidSize; ?></p>
                                <p class="stats__market-cap stats-info-element"><span class="stats__label">Market Cap</span><?= $data['stockQuote']->marketCap; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-4">
                        <div class="stats__additional-info">
                            <h3 class="header-3">Additional Info</h3>
                            <p><span class="bold">Exhange:</span> <?= $data['stockQuote']->primaryExchange; ?></p>
                            <p><span class="bold">Sector:</span> <?= $data['stockQuote']->sector; ?></p>
                            <p><span class="bold">Industry:</span> <?= $data['stockCompany']->industry; ?></p>
                            <p><span class="bold">CEO:</span> <?= $data['stockCompany']->CEO; ?></p>
                            <p><span class="bold">Website:</span> <?= Html::a( $data['stockCompany']->website,  $data['stockCompany']->website, ['class' => 'js-external link link--state-1']); ?></p>
                            <p><span class="bold">Description:</span> <?= $data['stockCompany']->description; ?></p>
                            <?php if (!empty($data['stockPeers'])): ?>
                            <span class="peers-label bold">Peers: </span>
                            <ul class="stats__peers">
                                <?php foreach ($data['stockPeers'] as $key => $value): ?>
                                <li class="stats__peer"><?= $value; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
