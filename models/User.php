<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 */
class User extends base\User
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
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
            'username' => 'Логин',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'verification_token' => 'Verification Token',
        ];
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ]
        ];
    }

    /**
     * Add new user profile
     */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            if (!$this->profile) {
                $profile = new Profile();
                $profile->user_id = $this->id;
                $profile->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    public function getStatuses()
    {
        return [
            self::STATUS_INACTIVE => 'Деактивирован',
            self::STATUS_ACTIVE => 'Нанят',
            self::STATUS_DELETED => 'Уволен',
        ];
    }

    public function getFullName()
    {
        $fullName = implode(' ', array_filter([
            $this->profile->lastname,
            $this->profile->firstname,
            $this->profile->middlename,
        ]));

        if (empty($fullName)) {
            $fullName = $this->username;
        }

        return $fullName;
    }
}
