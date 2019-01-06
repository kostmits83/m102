<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IpAccess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-access-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\labels', 'Save'), ['class' => 'btn button--default button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
