<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Stock */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\labels', 'Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\labels', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app\labels', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app\labels', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'symbol',
            'name',
            'date',
            'isEnabled',
            'type',
            'iexId',
            'exchange',
            'industry',
            'website',
            'description:ntext',
            'CEO',
            'issueType',
            'sector',
            'tags',
            'logo_url:url',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
