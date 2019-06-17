<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "task_user".
 *
 * @property int $task_id
 * @property int $user_id
 * @property int $owner
 * @property int $shared
 *
 * @property Task $task
 * @property User $user
 */
class TaskUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id'], 'required'],
            [['task_id', 'user_id', 'owner', 'shared'], 'integer'],
            [['task_id', 'user_id'], 'unique', 'targetAttribute' => ['task_id', 'user_id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'user_id' => 'User ID',
            'owner' => 'Owner',
            'shared' => 'Shared',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
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
     * @return TaskUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskUserQuery(get_called_class());
    }
}
