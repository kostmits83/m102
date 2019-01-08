<?php

namespace common\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Portfolio]].
 *
 * @see \common\models\Portfolio
 */
class PortfolioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Portfolio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Portfolio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
