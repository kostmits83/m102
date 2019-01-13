<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\models\UserStockFavors;
use common\helpers\VariousHelper;

$this->title = Yii::t('app', 'Favorites');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-favorites">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="header-3">My Favorites Stocks</h1>
            </div>
        </div>
    </div>
    <?php if (!empty($stockFavorites)): ?>
    <div class="container-fluid">
        <?php foreach ($stockFavorites as $data): ?>
        <div class="stock-favorite <?= VariousHelper::getStockFavorsDeleteCssClass($data['stock_id'], UserStockFavors::FAVOR_FAVORITE); ?>">
            <a href="<?= Url::to(['stock/delete-stock-from-favors']); ?>" class="icon-delete icon-delete--favorites js-delete-stock-from-favors" data-id="<?= $data['stock_id']; ?>" data-type_id="<?= UserStockFavors::FAVOR_FAVORITE; ?>" data-toggle="tooltip" data-container="body" title="<?= Yii::t('app/buttons', 'delete_from_favorites'); ?>"><i class="far fa-times-circle"></i></a>
            <?= $stockController->renderPartial('/stock/_showStats', ['data' => $data]); ?>
        </div>
        <?php endforeach; ?>
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
