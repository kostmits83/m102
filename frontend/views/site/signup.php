<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\captcha\Captcha;
use common\components\widgets\AlertMessages;

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="banner banner--light banner--same">
        <p class="banner__header">SIGNUP</p>
        <p class="banner__info">Signup to access the trading tools.</p>
    </div>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= AlertMessages::widget(['params' => []]); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="signup-message">
                    <p class="signup-message__text">Please fill out the following fields to signup. If you already have an account then you can <?= Html::a('login from here', ['site/login'], ['class' => 'link link--state-1']); ?>.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2">
                <div class="signup-form">
                    <h1 class="signup-form__header header-2">Sign Up Form</h1>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email']) ?>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
                        <?= $form->field($model, 'confirmPassword')->passwordInput(['placeholder' => 'Retype Your Password']) ?>
                        <?= $form->field($model, 'verifyCode', [
                            'labelOptions' => [
                                'class' => 'sr-only',
                            ]])->label()->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-xs-12 col-sm-4">{image}</div><div class="col-xs-12 col-sm-8">{input}</div></div>',
                                'options' => ['class' => 'form-control', 'placeholder' => 'Write the characters of the image'],
                         ]) ?>
                        <div class="signup-form__button">
                            <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn button button--attention', 'name' => 'signup-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>