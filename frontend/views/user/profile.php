<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\components\widgets\AlertMessages;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\Country;

$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <div class="banner banner--light">
        <p class="banner__header">PROFILE</p>
        <p class="banner__info">Update your profile</p>
    </div>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= AlertMessages::widget(['params' => []]); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 profile-message-wrapper">
                <div class="profile-message">
                    <p class="profile-message__text">From here you can update your profile providing more information about you.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-7 profile-form-wrapper">
                <div class="profile-form">
                    <h1 class="profile-form__header header-2">Profile</h1>
                    <?php $form = ActiveForm::begin(['id' => 'form-profile']); ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email', 'disabled' => true]) ?>
                        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'placeholder' => 'Your Firstname']) ?>
                        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, 'placeholder' => 'Your Lastname']) ?>
                        <?= $form->field($model, 'country_id', [
                            'options' => [],
                            ])->label()->dropDownList(
                                ArrayHelper::map(Country::find()->all(), 'id', 'name'),  ['prompt' => 'Select']);
                        ?>
                        <?= $form->field($model, 'birthdate')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Enter birth date'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]); ?>
                        <div class="profile-form__button">
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn button button--default', 'name' => 'update-profile-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="change-password-message">
                    <p class="change-password-message__text">From here you can change your password to a new one.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-md-offset-2">
                <div class="change-password-form">
                    <h1 class="change-password-form__header header-2">Change Password</h1>
                    <?php $form = ActiveForm::begin(['id' => 'form-change-password']); ?>
                        <?= $form->field($model, 'currentPassword')->passwordInput(['placeholder' => 'Your current password']) ?>
                        <?= $form->field($model, 'newPassword')->passwordInput(['placeholder' => 'Your new password']) ?>
                        <?= $form->field($model, 'confirmPassword')->passwordInput(['placeholder' => 'Retype your password']) ?>
                        <div class="change-password-form__button">
                            <?= Html::submitButton(Yii::t('app', 'Change Password'), ['class' => 'btn button button--default', 'name' => 'change-password-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4 delete-account-message-wrapper">
                <div class="delete-account-message">
                    <p class="delete-account-message__text">If you want to delete your account and all your data from our system then this is the place. We will miss you!</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-7 delete-account-form-wrapper">
                <div class="delete-account-form">
                    <h1 class="delete-account-form__header header-2">Delete Account</h1>
                    <?php $form = ActiveForm::begin(['id' => 'form-delete-account']); ?>
                        <?= $form->field($model, 'confirmPasswordToDelete')->passwordInput(['placeholder' => 'Your password']) ?>
                        <div class="delete-account-form__button">
                            <?= Html::submitButton(Yii::t('app', 'Delete'), ['class' => 'btn button button--attention', 'name' => 'delete-account-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    </div>

</div>