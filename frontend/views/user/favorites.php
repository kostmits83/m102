<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

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
        <div class="mb-4">
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
