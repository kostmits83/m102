<?php
namespace common\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class StockList extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $params = array_merge([
            'listType' => 'gainers',
            'header' => 'Top Gainers',
            'displayPercent' => 'false',
        ], $this->params);
        
        $this->params['response'] = Yii::$app->IEXTradingApi->getStockList($params['listType']);
        return $this->render('stockListView', ['params' => $this->params]);
    }

}
