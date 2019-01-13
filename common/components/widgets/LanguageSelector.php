<?php
namespace common\components\widgets;

use Yii;
use yii\base\Widget;

class LanguageSelector extends Widget
{
    public $params;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('languageSelectorView', ['params' => []]);
    }

}
