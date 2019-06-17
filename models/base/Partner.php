<?php

namespace app\models\base;

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
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'required'],
            [['name', 'specialization', 'person', 'phone', 'email', 'address', 'www'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'specialization' => 'Specialization',
            'person' => 'Person',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'www' => 'Www',
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
        return $this->hasMany(\app\models\User::className(), ['id' => 'user_id'])->viaTable('partner_user', ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['partner_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerQuery(get_called_class());
    }
}
