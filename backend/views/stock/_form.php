<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'isEnabled')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iexId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exchange')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CEO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issueType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\labels', 'Save'), ['class' => 'btn button--default button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
