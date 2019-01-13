<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

Modal::begin([
    'id' => 'modalAddStockToPortfolio',
    'header' => '<h2 class="header-2">Add to Porfolio</h2>',
    'toggleButton' => [
        'tag' => 'a',
        'label' => '<h2 class="header-2">Add to Porfolio</h2>',
        'id' => 'modalAddStockToPortfolioLink',
        'href' => Url::to(['stock/add-stock-to-portfolio']),
    ],
    'closeButton' => [
        'label' => '<i class="far fa-times-circle"></i>',
    ],
    'clientOptions' => [
        'keyboard' => false,
    ],
    'options' => [
        'class' => 'fade',
    ],
]);
Modal::end();