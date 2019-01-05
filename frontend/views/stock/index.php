<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\helpers\VariousHelper;
use kartik\growl\Growl;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\labels', 'Stocks');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="stock-index">
                
                <?= GridView::widget([
                    'dataProvider'=> $dataProvider,
                    'filterModel' => $searchModel,
                    'options' => [],

                    'responsive' => true,
                    'responsiveWrap' => true,
                    'hover' => true,

                    'pjax' => true,
                    'pjaxSettings' => [
                        'neverTimeout' => true,
                    ],
                    'showPageSummary' => false,

                    'toolbar' => [
                        [
                            'content' => Html::a('<i class="fas fa-redo-alt"></i> Reset Grid', ['index'], ['class' => 'btn button button--info']),
                        ],
                        '{export}',
                        '{toggleData}',
                    ],
                    'export' => [
                        'fontAwesome' => true,
                    ],
                    'toggleDataOptions' => [
                        'minCount' => 10,
                    ],

                    'panelHeadingTemplate' => '<h3 class="crud-panel__title"><span class="heading-2"><i class="fas fa-th-list"></i> Stocks</span> {summary}</h3>',

                    'panel' => [
                        'type' => GridView::TYPE_SUCCESS,
                        'headingOptions' => [
                            'class' => 'crud-panel__header',
                        ],
                        'showFooter' => false,
                        'footerOptions' => ['class' => 'panel-footer crud-panel__footer'],
                        'beforeOptions' => ['class' => 'grid-search__before'],
                        'afterOptions' => ['class' => 'grid-search__after'],
                    ],

                    'panelTemplate' => '
                        <div class="grid-search">
                            {panelHeading}
                            {panelBefore}
                            {items}
                            {panelAfter}
                            {panelFooter}
                        </div>',

                    'panelFooterTemplate' => '
                        <div class="grid-search__pager">
                            <div class="crud-panel__summary crud-panel__summary--footer">{summary}</div>
                            {pager}
                        </div>
                        {footer}',

                    'pager' => [
                        'options' => ['class' => 'pagination'],   // set class name used in ui list of pagination
                        'prevPageLabel' => '<i class="fa fa-angle-left"></i>',   // Set the label for the "previous" page button
                        'nextPageLabel' => '<i class="fa fa-angle-right"></i>',   // Set the label for the "next" page button
                        'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',   // Set the label for the "first" page button
                        'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',    // Set the label for the "last" page button
                        'nextPageCssClass' => 'next',    // Set CSS class for the "next" page button
                        'prevPageCssClass' => 'prev',    // Set CSS class for the "previous" page button
                        'firstPageCssClass' => 'first',    // Set CSS class for the "first" page button
                        'lastPageCssClass' => 'last',    // Set CSS class for the "last" page button
                        'maxButtonCount' => 10,    // Set maximum number of page buttons that can be displayed
                        'linkOptions' => [
                            'class' => 'page-link',
                        ],
                    ],

                    'columns' => [
                        [
                            'attribute' => 'logo_url',
                            'label' => 'Logo',
                            'contentOptions' => ['class' => 'column column--logo-url'],
                            'headerOptions' => ['class' => 'column column--logo-url', 'style' => 'width:5%'],
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::img($data->logo_url, ['alt' => ' ', 'class' => 'column--logo-url']);
                            },
                            'filter' => false,
                            'enableSorting' => false,
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
                            'headerOptions' => ['class' => 'column column--ceo', 'style' => 'width:9%'],
                        ],
                        [
                            'attribute' => 'sector',
                            'contentOptions' => ['class' => 'column column--sector'],
                            'headerOptions' => ['class' => 'column column--sector', 'style' => 'width:9%'],
                        ],
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'headerOptions' => ['class' => 'column column--actions', 'style' => 'width:12%'],
                            'template' => '{stats} {favorites} {compare}',
                            'buttons' => [
                                'stats' => function ($url, $model, $key) {
                                    return Html::a('<i class="fas fa-chart-bar"></i>', ['#', 'id' => $model->id], ['title' => 'View Stats', 'class' => 'column__action js-show-chart', 'data-toggle' => 'tooltip', 'data-container' => 'body', 'data-id' => $model->id]);
                                },
                                'favorites' => function ($url, $model, $key) {
                                    return Html::a('<i class="fas fa-heart"></i>', ['#', 'id' => $model->id], ['title' => 'Add to Favorites', 'class' => 'column__action js-add-to-favorites', 'data-toggle' => 'tooltip', 'data-container' => 'body', 'data-id' => $model->id]);
                                },
                                'compare' => function ($url, $model, $key) {
                                    return Html::a('<i class="fas fa-list-ol"></i>', ['#', 'id' => $model->id], ['title' => 'Add to Comparison List', 'class' => 'column__action js-add-to-comparison', 'data-toggle' => 'tooltip', 'data-container' => 'body', 'data-id' => $model->id]);
                                },
                            ],    
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

<div class="stock-details">
    
</div>

<?= Html::img('@commonImages/loader.gif', ['class' => 'loader-image']); ?>