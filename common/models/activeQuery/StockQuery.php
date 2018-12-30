<?php

namespace common\models\activeQuery;

/**
 * This is the ActiveQuery class for [[Stock]].
 *
 * @see Stock
 */
class StockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Stock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Stock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
