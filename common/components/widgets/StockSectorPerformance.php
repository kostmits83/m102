<?php
namespace common\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class StockSectorPerformance extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $params = array_merge([
        ], $this->params);
        
        $this->params['response'] = Yii::$app->IEXTradingApi->getStockSectorPerformance();
        return $this->render('stockSectorPerformanceView', ['params' => $this->params]);
    }

}
