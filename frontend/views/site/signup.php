<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

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

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 signup-message">
                <p class="signup-message__text">Please fill out the following fields to signup. If you already have an account then you can <?= Html::a('login from here', ['site/login'], ['class' => 'link link--state-1']); ?>.</p>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2 signup-form">
                <h1 class="signup-form__header header-2">Sign Up Form</h1>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email']) ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
                    <div class="signup-form__button">
                        <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn button--attention button', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>