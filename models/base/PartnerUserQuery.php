<?php

namespace app\models\base;

/**
 * This is the ActiveQuery class for [[PartnerUser]].
 *
 * @see PartnerUser
 */
class PartnerUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PartnerUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PartnerUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
