<?php
namespace common\components\widgets;

use Yii;

use yii\base\Widget;

class AlertMessages extends Widget
{
    public $params;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('alertMessagesView', array('params'=>$this->params));
    }

}
