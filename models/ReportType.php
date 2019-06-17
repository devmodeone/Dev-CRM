<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Report[] $reports
 */
class ReportType extends base\ReportType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return parent::rules();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['report_type' => 'id']);
    }
}
