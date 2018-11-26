<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ContactMessage]].
 *
 * @see ContactMessage
 */
class ContactMessageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ContactMessage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContactMessage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
