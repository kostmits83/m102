<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('app', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <div class="banner banner--light banner--same">
        <p class="banner__header">RESET PASSWORD</p>
        <p class="banner__info">Reset your password to be able to login.</p>
    </div>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 reset-password-message">
                <p class="reset-password-message__text">Please choose your new password to change it.</p>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2 reset-password-form">
                <h1 class="reset-password-form__header header-2">Reset Password Form</h1>
                <?php $form = ActiveForm::begin(['id' => 'form-reset-password']); ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
                    <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Retype Your Password']) ?>
                    <div class="reset-password-form__button">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn button button--attention']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
