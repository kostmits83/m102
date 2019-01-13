<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\Portfolio */
?>
<div>
    <?php
    $form = ActiveForm::begin([
        'id' => 'form-add-stock-to-portfolio',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'options' => [
            'role' => 'form',
            'class' => '',
            'validateOnSubmit' => true,
        ],
    ]); ?>
    <div class="add-stock-to-portfolio">
        <h2 class="header-3 add-stock-to-portfolio__symbol"><?= $stock->symbol . ' | ' . $stock->name; ?></h2>
        <?= $form->field($model, 'shares')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('shares'), 'maxlength' => true, 'class' => 'form-control stock-add-to-portfolio__shares js-stock-add-to-portfolio-shares']) ?>
        <?= $form->field($model, 'value')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('value'), 'maxlength' => true, 'class' => 'form-control stock-add-to-portfolio__price js-stock-add-to-portfolio-price']) ?>
        <p class="add-stock-to-portfolio__total-price total-price"><span class="total-price__label">Total Value: </span><span class="js-total-price-value">0.00</span> &dollar;</p>
        <div class='text-right'>
            <?= Html::submitButton(Yii::t('app/buttons', 'Add to Portfolio'), ['class' => 'btn button button--default add-stock-to-portfolio__button', 'name' => 'add-stock-to-portfolio-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>