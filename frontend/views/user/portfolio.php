<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\helpers\VariousHelper;

$this->title = Yii::t('app', 'Portfolio');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-favorites">
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
                            <th>Shares Acquired</th>
                            <th>Price Acquired</th>
                            <th>Latest Price</th>
                            <th>Difference</th>
                            <th>Difference Percent</th>
                            <th>Year Change</th>
                            <th>Date Added</th>
                        </tr>
                    <?php foreach ($stockPortfolio as $data): ?>
                        <tr class="<?= VariousHelper::getUpDown($data['model']->price - $data['stockQuote']->latestPrice); ?>">
                            <td><?= $data['stockCompany']->symbol; ?></td>
                            <td><?= $data['model']->stock->name; ?></td>
                            <td><?= $data['model']->shares; ?></td>
                            <td><?= $data['model']->price; ?></td>
                            <td><?= $data['stockQuote']->latestPrice; ?></td>
                            <td><?= $data['model']->price - $data['stockQuote']->latestPrice; ?></td>
                            <td><?= number_format((($data['model']->price - $data['stockQuote']->latestPrice) / $data['stockQuote']->latestPrice) * 100, 2); ?></td>
                            <td><?= $data['stockQuote']->ytdChange; ?></td>
                            <td><?= $data['model']->created_at; ?></td>
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
