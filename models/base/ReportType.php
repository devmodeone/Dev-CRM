<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "report_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Report[] $reports
 */
class ReportType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['report_type' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ReportTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportTypeQuery(get_called_class());
    }
}
