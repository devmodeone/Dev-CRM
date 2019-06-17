<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;

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
class Report extends base\Report
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_type', 'created_at', 'end_at'], 'required'],
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
            'report_type' => 'Тип отчета',
            'user_id' => 'User ID',
            'created_at' => 'Дата и время создания',
            'end_at' => 'Дата и время завершения задачи',
            'description' => 'Описание для отчета',
        ];
    }

    public function init()
    {
        parent::init();

        $this->setAttributes([
            'created_at' => 0,
            'end_at' => 0,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->end_at = Yii::$app->formatter->asTimestamp($this->end_at);
            $this->created_at = Yii::$app->formatter->asTimestamp($this->created_at);

            return true;
        }

        return false;
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->user_id = Yii::$app->user->id;
        }

        return parent::beforeSave($insert);
    }
}
