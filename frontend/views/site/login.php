<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

use common\components\widgets\AlertMessages;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="banner banner--light banner--same">
        <p class="banner__header">LOGIN</p>
        <p class="banner__info">Login to access the trading tools.</p>
    </div>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= AlertMessages::widget(['params' => []]); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 login-message">
                <p class="login-message__text">Please fill out the following fields to login. If you don't have an account there you can <?= Html::a('register here', ['site/signup'], ['class' => 'link link--state-1']); ?>.</p>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2 login-form">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <h1 class="login-form__header header-2">Login Form</h1>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email']) ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <p>If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset'], ['class' => 'inline-block link link--state-1']) ?>.</p>
                    <div class="login-form__button">
                        <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn button--attention button', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>