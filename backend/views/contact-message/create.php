<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */

$this->title = Yii::t('app', 'Create Contact Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
