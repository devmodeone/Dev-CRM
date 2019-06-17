<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property int $birth_date
 * @property string $about
 *
 * @property User $user
 */
class Profile extends base\Profile
{
    public function rules()
    {
        return [
            [['birth_date'], 'integer'],
            [['about'], 'string'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 255],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'middlename' => 'Отчество',
            'birth_date' => 'Дата рождения',
            'about' => 'О себе',
        ];
    }

    public function init()
    {
        parent::init();

        $this->setAttributes([
            'birth_date' => 0,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         [
    //             'class' => TimestampBehavior::className(),
    //             'attributes' => [
    //                 // ActiveRecord::EVENT_BEFORE_INSERT => ['birth_date'],
    //             ],
    //             // 'value' => function () { return date('U'); },
    //         ]
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->birth_date = Yii::$app->formatter->asTimestamp($this->birth_date);

            return true;
        }

        return false;
    }
}
