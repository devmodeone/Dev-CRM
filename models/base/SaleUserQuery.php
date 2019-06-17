<?php

namespace app\models\base;

/**
 * This is the ActiveQuery class for [[SaleUser]].
 *
 * @see SaleUser
 */
class SaleUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SaleUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SaleUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
