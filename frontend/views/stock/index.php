<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\labels', 'Stocks');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="col-xs-12">
        <div class="stock-index">
            
            <?= GridView::widget([
                'dataProvider'=> $dataProvider,
                'filterModel' => $searchModel,
                'options' => [],
                'columns' => [
                    [
                        'attribute' => 'logo_url',
                        'contentOptions' => ['class' => 'column column--logo-url'],
                        'headerOptions' => ['class' => 'column column--logo-url', 'style' => 'width:5%'],
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img($data->logo_url, ['alt' => ' ', 'class' => 'column--logo-url']);
                        },
                    ],
                    [
                        'attribute' => 'symbol',
                        'contentOptions' => ['class' => 'column column--symbol'],
                        'headerOptions' => ['class' => 'column column--symbol', 'style' => 'width:5%'],
                    ],
                    [
                        'attribute' => 'name',
                        'contentOptions' => ['class' => 'column column--name'],
                        'headerOptions' => ['class' => 'column column--name', 'style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'exchange',
                        'contentOptions' => ['class' => 'column column--exchange'],
                        'headerOptions' => ['class' => 'column column--exchange', 'style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'industry',
                        'contentOptions' => ['class' => 'column column--industry'],
                        'headerOptions' => ['class' => 'column column--industry', 'style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'website',
                        'contentOptions' => ['class' => 'column column--website'],
                        'headerOptions' => ['class' => 'column column--website', 'style' => 'width:20%'],
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->website, $data->website, ['class' => 'js-external link link--state-1']);
                        },
                    ],
                    [
                        'attribute' => 'CEO',
                        'contentOptions' => ['class' => 'column column--ceo'],
                        'headerOptions' => ['class' => 'column column--ceo', 'style' => 'width:10%'],
                    ],
                    [
                        'attribute' => 'sector',
                        'contentOptions' => ['class' => 'column column--sector'],
                        'headerOptions' => ['class' => 'column column--sector', 'style' => 'width:10%'],
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['class' => 'column column--actions', 'style' => 'width:10%'],
                    ],

                ],
                'responsive' => true,
                'responsiveWrap' => true,
                'hover' => true,

                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout' => true,
                ],
                'panel' => [
                    'heading' => '<h1 class="panel-title header-1"><i class="fas fa-chart-area"></i> Stocks</h1>',
                    'type' => 'success',
                    'before' => Html::a('<i class="fas fa-redo-alt"></i> Reset Grid', ['index'], ['class' => 'btn button button--info']),
                    'footer' => true,
                ],
            ]); ?>
        </div>
    </div>
</div>

<div class="stock-details">
    
</div>