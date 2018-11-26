<?php

namespace common\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\common\models\ContactMessage]].
 *
 * @see \common\models\ContactMessage
 */
class ContactMessageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ContactMessage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ContactMessage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
