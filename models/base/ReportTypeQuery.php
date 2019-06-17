<?php

namespace app\models\base;

/**
 * This is the ActiveQuery class for [[ReportType]].
 *
 * @see ReportType
 */
class ReportTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ReportType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ReportType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
