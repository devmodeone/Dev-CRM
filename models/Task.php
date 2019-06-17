<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\db\Expression;
use \yii\behaviors\TimestampBehavior;
use \yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $created_at
 * @property int $start_at
 * @property int $end_at
 * @property int $close_at
 * @property int $status
 *
 * @property TaskUser[] $taskUsers
 * @property User[] $users
 */
class Task extends base\Task
{
    const STATUS_SET = 0;
    const STATUS_START = 1;
    const STATUS_FINISH = 2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'end_at'], 'required'],
            [['description'], 'string'],
            [['created_at', 'start_at', 'end_at', 'close_at', 'status'], 'integer'],
            [['end_at'], 'compare', 'compareValue' => '0', 'operator' => '!='],
            [['name'], 'string', 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_SET],
            ['status', 'in', 'range' => array_flip(self::getStatuses())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'start_at' => 'Дата начала',
            'end_at' => 'Дата завершения планируемая',
            'close_at' => 'Дата завершения фактическая',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskUsers()
    {
        return $this->hasMany(TaskUser::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('task_user', ['task_id' => 'id']);
    }

    public function getStatuses()
    {
        return [
            self::STATUS_SET => 'Поставлено',
            self::STATUS_START => 'В процессе',
            self::STATUS_FINISH => 'Завершено',
        ];
    }

    public function init()
    {
        parent::init();

        $this->setAttributes([
            'end_at' => strtotime('+1 day'),
            'close_at' => 0,
            'status' => self::STATUS_SET,
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
            $this->close_at = Yii::$app->formatter->asTimestamp($this->close_at);

            return true;
        }

        return false;
    }

    public function beforeSave($insert)
    {
        /**
         * Prevent saving if task is done
         */

        if (ArrayHelper::keyExists('status', $this->oldAttributes)) {
            if ((int)$this->oldAttributes['status'] === (int)self::STATUS_FINISH) {
                return false;
            }
        }

        if ((int)$this->attributes['status'] === (int)self::STATUS_FINISH) {
            $this->close_at = time();
        }

        if ((int)$this->attributes['status'] === (int)self::STATUS_START) {
            $this->start_at = time();
        }

        return parent::beforeSave($insert);
    }

}
