<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('app', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <div class="banner banner--light banner--same">
        <p class="banner__header">REQUEST PASSWORD RESET</p>
        <p class="banner__info">Locked out? Request to reset your password.</p>
    </div>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 request-password-reset-message">
                <p class="request-password-reset-message__text">Please fill out your email. A link to reset password form will be sent there.</p>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2 request-password-reset-form">
                <h1 class="request-password-reset-form__header header-2">Request Password Reset Form</h1>
                <?php $form = ActiveForm::begin(['id' => 'form-request-password-reset']); ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email']) ?>
                    <div class="request-password-reset-form__button">
                        <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn button button--attention']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>