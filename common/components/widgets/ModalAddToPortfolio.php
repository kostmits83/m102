<?php
namespace common\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ModalAddToPortfolio extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('modalAddToPortfolioView', ['params' => []]);
    }
}