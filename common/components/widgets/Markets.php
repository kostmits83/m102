<?php
namespace common\components\widgets;

use Yii;

use yii\base\Widget;
use yii\helpers\Html;

use yii\helpers\Url;

class Markets extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->params['response'] = Yii::$app->IEXTradingApi->getMarkets();
        return $this->render('marketsview', ['params' => $this->params]);
    }
}
