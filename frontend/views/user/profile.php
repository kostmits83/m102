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

    <div class="container mb-4">
        <div class="row">
            <div class="col-sm-12 profile-form">
                <h1 class="profile-form__header header-2">Update your profile</h1>
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
                        'options' => ['placeholder' => 'Enter birth date...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ],
                    ]); ?>
                    <div class="profile-form__button">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn button button--attention', 'name' => 'profile-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>