<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property string $specialization
 * @property string $person
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $www
 *
 * @property PartnerUser[] $partnerUsers
 * @property User[] $users
 * @property Sale[] $sales
 */
class Partner extends base\Partner
{
    const TYPE_CLIENT = 1;
    const TYPE_CONTRACTOR = 2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'required'],
            [['name', 'specialization', 'person', 'phone', 'email', 'address', 'www'], 'string', 'max' => 255],
            ['type', 'default', 'value' => self::TYPE_CLIENT],
            ['type', 'in', 'range' => array_flip(self::getTypes())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'name' => 'Название',
            'specialization' => 'Специализация',
            'person' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'Email',
            'address' => 'Адрес',
            'www' => 'Сайт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerUsers()
    {
        return $this->hasMany(PartnerUser::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('partner_user', ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['partner_id' => 'id']);
    }

    public function getTypes()
    {
        return [
            self::TYPE_CLIENT => 'Клиент',
            self::TYPE_CONTRACTOR => 'Подрядчик',
        ];
    }
}
