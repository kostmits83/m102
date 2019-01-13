<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="header-1"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-info">
                <p class="panel-heading mb-0">Please fill out the following fields to login:</p>
            </div>
            
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'email')->textInput([]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group text-right">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn button--default button', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
