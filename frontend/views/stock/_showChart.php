<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\components\widgets\StockNews;
use common\components\widgets\StockList;
use common\components\widgets\StockSectorPerformance;
use common\components\widgets\Markets;
use common\components\widgets\StatsRecent;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="stats">
                <div class="stats__logo">
                    <?= Html::img($data['stockLogo']->url, ['alt' => ' ', 'class' => '']); ?>
                </div>
                <div class="stats__price">
                    <p><?= $data['stockPrice']; ?></p>
                </div>
                <div class="stats__company">
                    <?php if (!empty($data['stockCompany'])): ?>
                        <?php foreach ($data['stockCompany'] as $key => $value): ?>
                            <?php if (is_array($value)): ?>
                    <ul>
                                <?php foreach ($value as $sKey => $sValue): ?>
                        <li><?= $sValue; ?></li>
                                <?php endforeach; ?>
                    </ul>
                            <?php else: ?>
                    <p class="stats__<?= $key; ?>"><?= $key . ': ' . $value; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="stats__quote">
                    <?php if (!empty($data['stockQuote'])): ?>
                        <p><?= $data['stockQuote']->primaryExchange; ?></p>
                        <p><?= $data['stockQuote']->sector; ?></p>
                        <p><?= $data['stockQuote']->calculationPrice; ?></p>
                        <p><?= $data['stockQuote']->open; ?></p>
                        <p><?= $data['stockQuote']->openTime; ?></p>
                        <p><?= $data['stockQuote']->close; ?></p>
                        <p><?= $data['stockQuote']->closeTime; ?></p>
                        <p><?= $data['stockQuote']->high; ?></p>
                        <p><?= $data['stockQuote']->low; ?></p>
                        <p><?= $data['stockQuote']->latestPrice; ?></p>
                        <p><?= $data['stockQuote']->latestSource; ?></p>
                        <p><?= $data['stockQuote']->latestTime; ?></p>
                        <p><?= $data['stockQuote']->latestVolume; ?></p>
                        <p><?= $data['stockQuote']->iexRealtimePrice; ?></p>
                        <p><?= $data['stockQuote']->iexRealtimeSize; ?></p>
                        <p><?= $data['stockQuote']->delayedPrice; ?></p>
                        <p><?= $data['stockQuote']->extendedPrice; ?></p>
                        <p><?= $data['stockQuote']->extendedChange; ?></p>
                        <p><?= $data['stockQuote']->previousClose; ?></p>
                        <p><?= $data['stockQuote']->extendedChangePercent; ?></p>
                        <p><?= $data['stockQuote']->change; ?></p>
                        <p><?= $data['stockQuote']->changePercent; ?></p>
                        <p><?= $data['stockQuote']->iexMarketPercent; ?></p>
                        <p><?= $data['stockQuote']->iexVolume; ?></p>
                        <p><?= $data['stockQuote']->avgTotalVolume; ?></p>
                        <p><?= $data['stockQuote']->iexBidPrice; ?></p>
                        <p><?= $data['stockQuote']->iexBidSize; ?></p>
                        <p><?= $data['stockQuote']->iexAskPrice; ?></p>
                        <p><?= $data['stockQuote']->iexAskSize; ?></p>
                        <p><?= $data['stockQuote']->marketCap; ?></p>
                        <p><?= $data['stockQuote']->peRatio; ?></p>
                        <p><?= $data['stockQuote']->week52High; ?></p>
                        <p><?= $data['stockQuote']->week52Low; ?></p>
                        <p><?= $data['stockQuote']->ytdChange; ?></p>
                    <?php endif; ?>
                </div>
                <div class="stats__peers">
                    <?php if (!empty($data['stockPeers'])): ?>
                    <ul>
                        <?php foreach ($data['stockPeers'] as $key => $value): ?>
                        <li class="stats__<?= $key; ?>"><?= $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>