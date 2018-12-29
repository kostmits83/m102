<?php
namespace common\components\widgets;

use Yii;

use yii\base\Widget;
use yii\helpers\Html;

use yii\helpers\Url;

class SidebarStockNews extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $params = array_merge([
            'items' => null,
        ], $this->params);
        
        $this->params['response'] = Yii::$app->IEXTradingApi->getStockNews($params['ticker'], $params['items']);
        return $this->render('sidebarStockNewsView', ['params' => $this->params]);
    }
}
