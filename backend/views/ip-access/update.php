<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IpAccess */

$this->title = Yii::t('app\labels', 'Update Ip Access: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\labels', 'Ip Accesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\labels', 'Update');
?>
<div class="ip-access-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
