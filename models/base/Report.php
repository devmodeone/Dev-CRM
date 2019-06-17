<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $report_type
 * @property int $user_id
 * @property int $created_at
 * @property int $end_at
 * @property string $description
 *
 * @property ReportType $reportType
 * @property User $user
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_type', 'user_id', 'created_at', 'end_at'], 'required'],
            [['report_type', 'user_id', 'created_at', 'end_at'], 'integer'],
            [['description'], 'string'],
            [['report_type'], 'exist', 'skipOnError' => true, 'targetClass' => ReportType::className(), 'targetAttribute' => ['report_type' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_type' => 'Report Type',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'end_at' => 'End At',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportType()
    {
        return $this->hasOne(ReportType::className(), ['id' => 'report_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportQuery(get_called_class());
    }
}
