<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\helpers\VariousHelper;

$this->title = Yii::t('app', 'Portfolio');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-portfolio">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="header-3">My Portfolio</h1>
            </div>
        </div>
    </div>
    <?php if (!empty($stockPortfolio)): ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Symbol</th>
                            <th>Name</th>
                            <th>Shares</th>
                            <th>Price</th>
                            <th>Latest Price</th>
                            <th>Difference</th>
                            <th>Difference %</th>
                            <th>Initial Capital</th>
                            <th>Profit/Loss</th>
                            <th>Date Added</th>
                            <th> </th>
                        </tr>
                    <?php foreach ($stockPortfolio as $data): ?>
                        <?php $difference = $data['model']->price - $data['stockQuote']->latestPrice; ?>
                        <tr class="portfolio-<?= $data['model']->id; ?>">
                            <td><?= $data['stockCompany']->symbol; ?> <?= VariousHelper::getUpDownIndicator($difference); ?></td>
                            <td><?= $data['model']->stock->name; ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['model']->shares, 0); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['model']->price); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($data['stockQuote']->latestPrice); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber($difference, 2); ?></td>
                            <td><?= VariousHelper::percentize($difference / $data['stockQuote']->latestPrice); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber( ($data['model']->shares * $data['model']->price) , 2); ?></td>
                            <td><?= VariousHelper::getEuropeanNumber( ($data['model']->shares * $data['model']->price) - ($data['model']->shares * $data['stockQuote']->latestPrice) , 2); ?></td>
                            <td><?= $data['model']->created_at; ?></td>
                            <td><a href="<?= Url::to(['user/delete-stock-from-portfolio']); ?>" class="icon-delete icon-delete--portfolio js-delete-stock-from-portfolio" data-id="<?= $data['model']->id; ?>" data-toggle="tooltip" data-container="body" title="<?= Yii::t('app/buttons', 'delete_from_portfolio'); ?>"><i class="fas fa-times"></i></a></td>
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
                <p>You have not selected any stocks in your portfolio yet.</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
