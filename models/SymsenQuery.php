<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Symsen]].
 *
 * @see Symsen
 */
class SymsenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Symsen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Symsen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
