<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Stock */

$this->title = Yii::t('app\labels', 'Update Stock: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\labels', 'Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\labels', 'Update');
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
