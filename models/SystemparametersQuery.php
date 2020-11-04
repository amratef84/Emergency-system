<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Systemparameters]].
 *
 * @see Systemparameters
 */
class SystemparametersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Systemparameters[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Systemparameters|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
