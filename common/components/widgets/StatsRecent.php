<?php
namespace common\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class StatsRecent extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->params['response'] = Yii::$app->IEXTradingApi->getStatsRecent();
        return $this->render('statsRecentView', ['params' => $this->params]);
    }
    
}
