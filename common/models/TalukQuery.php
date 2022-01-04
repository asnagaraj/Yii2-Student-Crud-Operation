<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Taluk]].
 *
 * @see Taluk
 */
class TalukQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Taluk[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Taluk|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
