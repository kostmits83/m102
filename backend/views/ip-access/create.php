<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IpAccess */

$this->title = Yii::t('app\labels', 'Create Ip Access');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\labels', 'Ip Accesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-access-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
