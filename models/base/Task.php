<?php

namespace app\models\base;

use Yii;

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
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'start_at', 'end_at', 'close_at'], 'required'],
            [['description'], 'string'],
            [['created_at', 'start_at', 'end_at', 'close_at', 'status'], 'integer'],
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
            'description' => 'Description',
            'created_at' => 'Created At',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'close_at' => 'Close At',
            'status' => 'Status',
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
        return $this->hasMany(\app\models\User::className(), ['id' => 'user_id'])->viaTable('task_user', ['task_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }
}
