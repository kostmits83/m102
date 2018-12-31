<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\StockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'symbol') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'isEnabled') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'iexId') ?>

    <?php // echo $form->field($model, 'exchange') ?>

    <?php // echo $form->field($model, 'industry') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'CEO') ?>

    <?php // echo $form->field($model, 'issueType') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'logo_url') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\labels', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app\labels', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
